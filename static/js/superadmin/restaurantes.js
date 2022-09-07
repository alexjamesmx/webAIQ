var restaurant = "",
	phone = "",
	email = "",
	password = "";

$(function () {
	$("#results").empty();

	const validateEmail = (email) => {
		return email.match(
			/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
		);
	};
	const isLetter = (str) => {
		return str.match(/[a-z]/i);
	};

	$("#modal-form").on("submit", function (event) {
		event.preventDefault();
		console.log(password);
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
			console.log("password mal");
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
			restaurant.trim();
			email.trim();
			phone.trim();
			$(".close").click();
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
	});
	getUsers();
});

function handleModal(e) {
	let action = $(e).data("action");
	console.log(action);

	if (action == "agregar") {
		$("#restaurant").attr("placeholder", "Nombre del restaurante");
		$("#password").attr("placeholder", "Contraseña");
		$("#email").attr("placeholder", "Correo electrónico");
		$("#phone").attr("placeholder", "Teléfono");
		$("#restaurant").on("input", (e) => {
			restaurant = e.target.value;
		});
		$("#email").on("input", (e) => {
			email = e.target.value;
		});
		$("#phone").on("input", (e) => {
			phone = e.target.value;
		});
		$("#password").on("input", (e) => {
			password = e.target.value;
		});
	} else if (action == "editar") {
		item = $(e).attr("data-item");
		item = JSON.parse(item);
		console.log(item);
		console.log(item.restaurant);
		$("#restaurant").attr("placeholder", item.restaurant);
		$("#password").attr("placeholder", item.password);
		$("#email").attr("placeholder", item.email);
		$("#phone").attr("placeholder", item.phone);
		$("#restaurant").on("input", (e) => {
			restaurant = e.target.value;
		});
		$("#restaurant").val(item.restaurant);
		$("#password").val(item.password);
		$("#email").val(item.email);
		$("#phone").val(item.phone);
		$("#restaurant").on("input", (e) => {
			restaurant = e.target.value;
		});
		$("#email").on("input", (e) => {
			email = e.target.value;
		});
		$("#phone").on("input", (e) => {
			phone = e.target.value;
		});
		$("#password").on("input", (e) => {
			password = e.target.value;
		});
	}
}

function getUsers() {
	$.ajax({
		url: appData.base_url + "user/getUsers",
		dataType: "json",
	})
		.done((result) => {
			if (result.res) {
				result.data.map((item) => {
					$("#results").append(`
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
						<!-- EDITAR -->
						<a class="align-self-center mr-4" href="#" data-toggle="modal" data-target="#exampleModalContent" data-whatever="Editar" data-${item.id_user} data-action="editar" onclick="return handleModal(this)" data-item={"restaurant":"${item.nombre}","password":"${item.password}","email":"${item.email}","phone":"${item.phone}"}>
							<i class="iconos-size simple-icon-pencil pencil"></i>
						</a>
						<!-- ELIMINAR -->
						<a class="align-self-center mr-4" href="#" data-toggle="modal" data-target=".bd-example-modal-sm">
							<i class="iconos-size simple-icon-trash trash"></i>
						</a>
					</td>
				</tr>
					`);
				});
			}
		})
		.fail(() => {
			message("danger", "", "Error: Hubo un problema con la petición");
		});
}
