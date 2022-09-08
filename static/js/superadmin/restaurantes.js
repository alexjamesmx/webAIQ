$(function () {
	$("#results").empty();
	getUsers();

	const validateEmail = (email) => {
		return email.match(
			/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
		);
	};
	const isLetter = (str) => {
		return str.match(/[a-z]/i);
	};

	$("#modal-form").on("submit", function (event) {
		action = $(".accion").text();
		restaurant = $("#restaurant").val();
		password = $("#password").val();
		email = $("#email").val();
		phone = $("#phone").val();
		id_user = $("#id").val();
		event.preventDefault();
		if (restaurant == "") {
			$(".restaurant").text("Este campo es requerido");
		}
		if (email != "" && !validateEmail(email)) {
			$(".email").text("El formato es incorrecto");
		}
		if (email == "") {
			$(".email").text("Este campo es requerido");
		}
		if (phone == "") {
			$(".phone").text("Este campo es requerido");
		}
		if (phone != "" && isLetter(phone)) {
			$(".phone").text("Debe contener sólo numeros");
		}
		if (password == "") {
			$(".password").text("Este campo es requerido");
		}
		if (password != "" && password.length < 4) {
			$(".password").text("Debe ser contener 4 caracteres o más");
		}
		if (
			restaurant != "" &&
			email != "" &&
			phone != "" &&
			!isLetter(phone) &&
			validateEmail(email) &&
			password != "" &&
			password.length >= 4
		) {
			console.log("BIEN");
			restaurant.trim();
			email.trim();
			phone.trim();
			$(".close").click();
			if (action == "Agregar") {
				$("#results").empty();

				$.ajax({
					type: "post",
					url: appData.base_url + "user/addUser",
					data: {
						restaurant,
						email,
						phone,
						password,
					},
					dataType: "json",
				})
					.done((res) => {
						getUsers();
					})
					.fail(() => {
						message("danger", "", "Error: Hubo un problema con la petición");
					});
			}
			if (action == "Editar") {
				restaurant = $.ajax({
					type: "post",
					url: appData.base_url + "user/updateUser",
					data: {
						id_user,
						restaurant,
						email,
						phone,
						password,
					},
					dataType: "json",
				})
					.done((res) => {
						console.log("EDITAR", res);
					})
					.fail(() => {
						message("danger", "", "Error: Hubo un problema con la petición");
					});
			}
		} else {
			console.log("FORM incorrexto");
		}
	});
});

function handleModal(e) {
	let restaurant = "";
	let phone = "";
	let email = "";
	let password = "";
	let id = "";
	$("#restaurant").attr("placeholder", null);
	$("#password").attr("placeholder", null);
	$("#email").attr("placeholder", null);
	$("#phone").attr("placeholder", null);
	$("#restaurant").val(restaurant);
	$("#password").val(password);
	$("#email").val(email);
	$("#phone").val(phone);
	$("#id").val(id);

	action = $(e).data("action");
	if (action == "Agregar") {
		console.log("QUE");

		$("#restaurant").attr("placeholder", "Nombre del restaurante");
		$("#password").attr("placeholder", "Contraseña");
		$("#email").attr("placeholder", "Correo electrónico");
		$("#phone").attr("placeholder", "Teléfono");
	} else if (action == "Editar") {
		id = $(e).attr("data-id");
		restaurant = $(e).attr("data-restaurant");
		password = $(e).attr("data-password");
		email = $(e).attr("data-email");
		phone = $(e).attr("data-phone");
		$("#restaurant").attr("placeholder", restaurant);
		$("#password").attr("placeholder", password);
		$("#email").attr("placeholder", email);
		$("#phone").attr("placeholder", phone);
		$("#restaurant").on("input", (e) => {
			restaurant = e.target.value;
		});
		$("#restaurant").val(restaurant);
		$("#password").val(password);
		$("#email").val(email);
		$("#phone").val(phone);
		$("#id").val(id);
	}
}
function handleStatus(id_user, e, nombre) {
	console.log(e);
	let status = $(e).data("status");
	console.log("El status", status);
	if (status) {
		$("#id_user").removeClass("slider");
		$("#id_user").addClass("sliderdis");
	} else {
		$("#id_user").removeClass("sliderdis");
		$("#id_user").addClass("slider");
	}
	$.ajax({
		type: "POST",
		dataType: "json",
		url: appData.base_url + "user/updateUserStatus",
		data: {
			id_user,
			status,
		},
	}).done(function (result) {
		if (result.res) {
			let available = result.data[0].status;

			console.log("AQUI DEBERIA ACTUALIZAR EL STATUS DATA");
			$(e).data("status", available);
			if (available == "1") {
				message("info", "", nombre + " habilitado");
			} else if (available == "0") {
				message("info", "", nombre + " deshabilitado");
			}
		} else {
			message("danger", "Error", result.message);
		}
	});
}

function getUsers() {
	$.ajax({
		url: appData.base_url + "user/getUsers",
		dataType: "json",
	})
		.done((result) => {
			if (result.res) {
				result.data.map((item) => {
					$("#results").append(
						item.status == 1
							? `
					<tr class='item'>
					<td>
						<p class="list-item-heading">${item.nombre}</p>
					</td>
					<td>
						<p class="text-muted">${item.password}</p>
					</td>
					<td>
						<p class="text-muted">${item.email}</p>
					</td>
					<td>
						<p class="text-muted">${item.phone}</p>
					</td>
					<td>

					<label class="switch"><input id=\"${item.id_user}_status\" type="checkbox"data-status=\"${item.status}\" onclick="return handleStatus(${item.id_user},this,\`${item.nombre}\`)"><span data-id='${item.id_user}'class="slider round"></span></label>
					</td>
					<td> 
						<!-- EDITAR -->
						<a class="align-self-center mr-4" href="#" data-toggle="modal" data-target="#exampleModalContent" data-whatever="Editar" 
						data-${item.id_user} 
						data-action="Editar" 
						onclick="return handleModal (this)" 
						data-id=\"${item.id_user}\"
						data-restaurant=\"${item.nombre}\"
						data-password=\"${item.password}\"
						data-email=\"${item.email}\"
						data-phone=\"${item.phone}\">
							<i class="iconos-size simple-icon-pencil pencil"></i>
						</a>
						<a class="align-self-center mr-4" href="#" data-toggle="modal" data-target=".bd-example-modal-sm">
							<i class="iconos-size simple-icon-trash trash"><i>
						</a>
					</td>
				</tr>
					`
							: `
					<tr class='item'>
					<td>
						<p class="list-item-heading">${item.nombre}</p>
					</td>
					<td>
						<p class="text-muted">${item.password}</p>
					</td>
					<td>
						<p class="text-muted">${item.email}</p>
					</td>
					<td>
						<p class="text-muted">${item.phone}</p>
					</td>
					<td>

					<label class="switch"><input type="checkbox"id=\"${item.id_user}_status\" data-status=\"${item.status}\"onclick="return handleStatus(${item.id_user},this,\`${item.nombre}\`)">
					<span data-id="${item.id_user}"class="sliderdis round"></span>
					</label>
					</td>
					<td> 
						<a class="align-self-center mr-4" href="#" data-toggle="modal" data-target="#exampleModalContent" data-whatever="Editar" 
						data-${item.id_user} 
						data-action="editar" 
						onclick="return handleModal(this)" 
						data-id=\"${item.id_user}\"
						data-restaurant=\"${item.nombre}\"
						data-password=\"${item.password}\"
						data-email=\"${item.email}\"
						data-phone=\"${item.phone}\">
						<i class="iconos-size simple-icon-pencil pencil"></i>
						</a>
						<a class="align-self-center mr-4" href="#" data-toggle="modal" data-target=".bd-example-modal-sm">
						<i class="iconos-size simple-icon-trash trash">
						</i>
						</a>
					
						</td>
						</tr>
						`
					);
				});
			}
		})
		.fail(() => {
			message("danger", "", "Error: Hubo un problema con la petición");
		});
}
