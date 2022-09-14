//EDITAR 0 AGREGAR EVENTO
$("#modal-form-restaurantes").on("submit", function (event) {
	event.preventDefault();

	action = $("#modal-actions-restaurantes").data("action");
	if (validateForm()) {
		$(".close").click();
		console.log(action);
		if (action == "Agregar") {
			$("#results").empty();
			$.ajax({
				type: "post",
				url: appData.base_url + "user/addUser",
				data: $("#modal-form-restaurantes").serialize(),
			})
				.done((res) => {
					getUsers();
				})
				.fail(() => {
					message("danger", "", "Error: Hubo un problema con la petición");
				});
		}
		if (action == "Editar") {
			$.ajax({
				type: "post",
				url: appData.base_url + "user/updateUser",
				data: $("#modal-form-restaurantes").serialize(),
				dataType: "json",
			})
				.done((result) => {
					if (result.res) {
						const form = document.getElementById("modal-form-restaurantes");
						let nombre = form.elements[0].value;
						let email = form.elements[2].value;
						let phone = form.elements[3].value;
						let id_user = form.elements[4].value;
						$("#" + id_user + "_nombre").text(nombre);
						$("#" + id_user + "_email").text(email);
						$("#" + id_user + "_phone").text(phone);
						$("#" + id_user + "_restaurantes_input").data("nombre", nombre);
						$("#" + id_user + "_restaurantes_actions_edit").attr(
							"data-nombre",
							nombre
						);

						$("#" + id_user + "_restaurantes_actions_edit").attr(
							"data-email",
							email
						);
						$("#" + id_user + "_restaurantes_actions_edit").attr(
							"data-phone",
							phone
						);
						$("#" + id_user + "_restaurantes_actions_edit").attr(
							"data-whatever",
							"Editar " + nombre
						);
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
		if ($("#password").val() != "") {
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
