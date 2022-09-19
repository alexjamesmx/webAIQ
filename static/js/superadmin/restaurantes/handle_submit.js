//EDITAR 0 AGREGAR EVENTO
$("#modal-form-restaurantes").on("submit", function (event) {
	event.preventDefault();
	action = $("#modal-actions-restaurantes").data("action");
	if (validateForm(action)) {
		const form = document.getElementById("modal-form-restaurantes");

		$(".close").click();
		if (action == "Agregar") {
			const nombre = form.elements[1].value;
			const password = form.elements[2].value;
			const email = form.elements[3].value;
			const phone = form.elements[4].value;

			const fotoProducto = $("#imagen_input_restaurantes");
			const formData = new FormData();
			const archivos = fotoProducto[0].files;

			if (archivos.length > 0) {
				const avatar = archivos[0]; //Sólo queremos la primera imagen, ya que el usuario pudo seleccionar más
				//Ojo: En este caso 'foto' será el nombre con el que recibiremos el archivo en el servidor
				formData.append("avatar", avatar);
				formData.append("nombre", nombre);
				formData.append("password", password);
				formData.append("email", email);
				formData.append("phone", phone);
				$.ajax({
					url: appData.base_url + "user/subirImagen",
					data: formData,
					type: "POST",
					contentType: false,
					processData: false,
				})
					.done((res) => {
						if (res.res === true) {
							message("success", "", res.message);
							getUsers();
							$("button[name='reload_restaurantes']").click();
						}
						if (res.res === false) {
							message("danger", "Error: ", res.message);
						}
						if (res.res === "exists") {
							message(
								"danger",
								"Error: ",
								`El registro (<small>${nombre} \\ ${email}</small>) ya existen en la base de datos`
							);
						}
					})
					.fail(() => {
						message("danger", "", "Error: Hubo un problema con la petición");
					});
			}
		}
		if (action == "Editar") {
			const nombre = form.elements[0].value;
			const email = form.elements[1].value;
			const phone = form.elements[2].value;
			const id_user = form.elements[3].value;
			$.ajax({
				type: "post",
				url: appData.base_url + "user/updateUser",
				data: $("#modal-form-restaurantes").serialize(),
				dataType: "json",
			})
				.done((result) => {
					if (result.res === true) {
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
						message("success", "", nombre + result.message);
					}
					if (result.res === false) {
						message("danger", "Error: ", res.message);
					}
					if (result.res === "exists") {
						message(
							"danger",
							"Error: ",
							`El registro <small>${nombre} \\ ${email}</small> ya existen en la base de datos`
						);
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
		if ($("#imagen_input_restaurantes").val() == "") {
			$(".imagen_input_restaurantes").text("Este campo es requerido");
		}
	}
});
