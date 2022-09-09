//EDITAR 0 AGREGAR EVENTO
$("#modal-form").on("submit", function (event) {
	event.preventDefault();
	action = $("#modal-form").data("action");
	if (validateForm()) {
		$(".close").click();
		if (action == "Agregar") {
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
			console.log("cuantas veces");
			$.ajax({
				type: "post",
				url: appData.base_url + "user/updateUser",
				data: $("#modal-form").serialize(),
				dataType: "json",
			})
				.done((result) => {
					if (result.res) {
						const form = document.getElementById("modal-form");
						let nombre = form.elements[0].value;
						let email = form.elements[2].value;
						let phone = form.elements[3].value;
						let id_user = form.elements[4].value;

						$("#" + id_user + "_nombre").text(nombre);
						$("#" + id_user + "_email").text(email);
						$("#" + id_user + "_phone").text(phone);
						message("success", "", result.message);
					} else {
						message("danger", "", result.message);
					}
				})
				.fail(() => {
					message("danger", "", "Error: Hubo un problema con la petición");
				});
		}
	} else {
		if ($("#nombre").val() == "") {
			$(".nombre").text("Este campo es requerido");
		}

		if ($("#password").val() == "") {
			$(".password").text("Este campo es requerido");
		}
		if ($("#password").val() != "" && $("#password").val().length < 4) {
			$(".password").text("Debe ser contener 4 caracteres o más");
		}

		if ($("#email").val() != "" && !validateEmail($("#email").val())) {
			$(".email").text("El formato es incorrecto");
		}
		if ($("#email").val() == "") {
			$(".email").text("Este campo es requerido");
		}

		if ($("#phone").val() == "") {
			$(".phone").text("Este campo es requerido");
		}
		if ($("#phone").val() != "" && isLetter($("#phone").val())) {
			$(".phone").text("Debe contener sólo numeros");
		}
	}
});
