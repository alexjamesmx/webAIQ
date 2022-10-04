$(document).ready(function () {
	$("#cuenta-clic").click(function () {
		$.ajax({
			url: appData.base_url + "Cuenta/getCuenta",
			dataType: "json",
		}).done(function (obj) {
			$("#img-pr").attr(
				"src",
				appData.base_url + "static/img/" + obj.data.avatar
			);
			$("#cuenta_nombre").val(obj.data.nombre);
			$("#cuenta_email").val(obj.data.email);
			$("#cuenta_password").val(obj.data.password);
			$("#cuenta_phone").val(obj.data.phone);
		});
	});

	$("#modal-form-cuenta").submit(function (e) {
		e.preventDefault();
		const validate = validateForm();
		if (validate) {
			$.ajax({
				type: "post",
				url: appData.base_url + "cuenta/updateCuenta",
				data: $("#modal-form-cuenta").serialize(),
				dataType: "json",
			})
				.done((result) => {
					alert(result);
					if (result.res) {
						message("success", "", nombre + result.message);
					} else {
						message("danger", "Error: ", result.message);
					}
				})
				.fail(() => {
					message("danger", "", "Error: Hubo un problema con la petición");
				});
		} else {
			if ($("#cuenta_nombre").val() == "") {
				$(".cuenta_nombre").text("Este campo es requerido");
			}

			if ($("#cuenta_password").val() == "") {
				$(".cuenta_password").text("Este campo es requerido");
			}

			if (
				$("#cuenta_email").val() != "" &&
				!validateEmail($("#cuenta_email").val())
			) {
				console.log("QUEEE");
				$(".cuenta_email").text("El formato es incorrecto");
			}
			if ($("#cuenta_email").val() == "") {
				$(".cuenta_email").text("Este campo es requerido");
			}

			if ($("#cuenta_phone").val() == "") {
				$(".cuenta_phone").text("Este campo es requerido");
			}
			if (
				$("#cuenta_phone").val() != "" &&
				isLetter($("#cuenta_phone").val())
			) {
				$(".cuenta_phone").text("Debe contener sólo numeros");
			}
			if ($("#imagen_input_restaurantes").val() == "") {
				$(".imagen_input_restaurantes").text("Este campo es requerido");
			}
		}
	});
});

$(function () {
	var $fotoAvatar = $("#fileAvatar"),
		$btnAGuardar = $("#guardarAvatar");
	var formData = new FormData();

	$btnAGuardar.click(function () {
		var archivos = $fotoAvatar[0].files;
		if (archivos.length > 0) {
			var avatar = archivos[0]; //Sólo queremos la primera imagen, ya que el usuario pudo seleccionar más
			//Ojo: En este caso 'avatar' será el nombre con el que recibiremos el archivo en el servidor
			formData.append("avatar", avatar);
			$.ajax({
				url: appData.base_url + "Cuenta/update_avatar",
				data: formData,
				type: "POST",
				contentType: false,
				processData: false,
				success: function (resultados) {
					update_avatar();
					message("success", "Listo", "se agrego platillo");
					location.reload();
				},
			});
		}
	});
});
