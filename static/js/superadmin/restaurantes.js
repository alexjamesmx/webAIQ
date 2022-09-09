$(function () {
	$("#results").empty();
	getUsers();

	//EDITAR 0 AGREGAR EVENTO
	$("#modal-form").on("submit", function (event) {
		event.preventDefault();
		action = $("#btn-modal").data("action");

		if (validateForm()) {
			$(".close").click();
			console.log(action);
			if (action == "Agregar") {
				console.log("NO SE ESTA MANDANDO");

				$("#results").empty();

				$.ajax({
					type: "post",
					url: appData.base_url + "user/addUser",
					data: $("#modal-form").serialize(),
				})
					.done((res) => {
						getUsers();
					})
					.fail(() => {
						message("danger", "", "Error: Hubo un problema con la petición");
					});
			}
			if (action == "Editar") {
				nombre = $.ajax({
					type: "post",
					url: appData.base_url + "user/updateUser",
					data: $("#modal-form").serialize(),
				})
					.done((res) => {})
					.fail(() => {
						message("danger", "", "Error: Hubo un problema con la petición");
					});
			}
		} else {
		}
	});
});

function handleModal(e) {
	$("#nombre").attr("placeholder", "");
	$("#password").attr("placeholder", "");
	$("#email").attr("placeholder", "");
	$("#phone").attr("placeholder", "");
	$("#nombre").val("");
	$("#password").val("");
	$("#email").val("");
	$("#phone").val("");
	//INVALID FEEDBACK
	$(".nombre").text("");
	$(".email").text("");
	$(".password").text("");
	$(".phone").text("");

	action = $(e).data("action");
	if (action == "Agregar") {
		$("#nombre").attr("placeholder", "Nombre del restaurante");
		$("#password").attr("placeholder", "Contraseña");
		$("#email").attr("placeholder", "Correo electrónico");
		$("#phone").attr("placeholder", "Teléfono");
	} else if (action == "Editar") {
		let id_user = $(e).attr("data-id");
		let nombre = $(e).attr("data-nombre");
		let password = $(e).attr("data-password");
		let email = $(e).attr("data-email");
		let phone = $(e).attr("data-phone");
		$("#nombre").attr("placeholder", nombre);
		$("#password").attr("placeholder", password);
		$("#email").attr("placeholder", email);
		$("#phone").attr("placeholder", phone);
		$("#nombre").val(nombre);
		$("#password").val(password);
		$("#email").val(email);
		$("#phone").val(phone);
		$("#id_user").val(id_user);
	}
}
function handleStatus(id_user, e, nombre) {
	let status = $(e).data("status");
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

					<label class="switch">
						<input 
							id=\"${item.id_user}_status\" 
							type="checkbox"
							data-status=\"${item.status}\" 
							onclick="return handleStatus(${item.id_user},this,\`${item.nombre}\`)"
							>
								<span 
									data-id='${item.id_user}'
									class="slider round"
								></span>
					</label>
					</td>
					<td> 
						<a class="align-self-center mr-4"
							href="#" 
							data-toggle="modal" 
							data-target="#exampleModalContent" 
							data-whatever="Editar \`${item.nombre}\`" 
							data-action="Editar" 
							onclick="return handleModal (this)" 
							data-id=\"${item.id_user}\"
							data-nombre=\"${item.nombre}\"
							data-password=\"${item.password}\"
							data-email=\"${item.email}\"
							data-phone=\"${item.phone}\">
							<i class="iconos-size simple-icon-pencil pencil"></i>
						</a><a class="align-self-center mr-4" href="#" data-toggle="modal" data-target=".bd-example-modal-sm"><i class="iconos-size simple-icon-trash trash"><i></a>
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
						data-action="editar" 
						onclick="return handleModal(this)" 
						data-id=\"${item.id_user}\"
						data-nombre=\"${item.nombre}\"
						data-password=\"${item.password}\"
						data-email=\"${item.email}\"
						data-phone=\"${item.phone}\">
						<i class="iconos-size simple-icon-pencil pencil"></i>
						</a>
						<a class="align-self-center mr-4" href="#" data-toggle="modal" data-target=".bd-example-modal-sm"><i class="iconos-size simple-icon-trash trash"></i></a>
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

function validateForm() {
	const form = document.getElementById("modal-form");

	let nombre = form.elements[0].value;
	let password = form.elements[1].value;
	let email = form.elements[2].value;
	let phone = form.elements[3].value;

	if (
		nombre != "" &&
		email != "" &&
		phone != "" &&
		!isLetter(phone) &&
		validateEmail(email) &&
		password != "" &&
		password.length >= 4
	) {
		return true;
	} else {
		return false;
	}
}

$("#nombre").on("input", () => {
	if ($("#nombre").val() == "") {
		$(".nombre").text("Este campo es requerido");
	}
});
$("#password").on("input", () => {
	if ($("#password").val() == "") {
		$(".password").text("Este campo es requerido");
	}
	if ($("#password").val() != "" && $("#password").val().length < 4) {
		$(".password").text("Debe ser contener 4 caracteres o más");
	}
});
$("#email").on("input", () => {
	if ($("#email").val() != "" && !validateEmail($("#email").val())) {
		$(".email").text("El formato es incorrecto");
	}
	if ($("#email").val() == "") {
		$(".email").text("Este campo es requerido");
	}
});
$("#phone").on("input", () => {
	if ($("#phone").val() == "") {
		$(".phone").text("Este campo es requerido");
	}
	if ($("#phone").val() != "" && isLetter($("#phone").val())) {
		$(".phone").text("Debe contener sólo numeros");
	}
});

function validateEmail(email) {
	return email.match(
		/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
	);
}
function isLetter(str) {
	return str.match(/[a-z]/i);
}
