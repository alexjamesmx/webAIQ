var restaurant = "",
	phone = "",
	email = "",
	password = "";

$(function () {
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

			$.ajax({
				type: "post",
				url: appData.base_url + "user/addUser",
				data: {
					restaurant,
					email,
					phone,
					password,
				},
				dataType: "dataType",
			})
				.done((res) => {})
				.fail(() => {
					message("danger", "", "Error: Hubo un problema con la petición");
				});
		}
	});
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
	}
}
