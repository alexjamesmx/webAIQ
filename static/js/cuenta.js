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
			$("#nombre12").val(obj.data.nombre);
			$("#email").val(obj.data.email);
			$("#password").val(obj.data.password);
			$("#phone").val(obj.data.phone);
		});
	});

	$("#btn-save").click(function (e) {
		// e.preventDefault();
		$.ajax({
			url: appData.base_url + "cuenta/updateCuenta",
			dataType: "json",
			type: "POST",
			data: {
				nombre: $("#nombre12").val(),
				password: $("#password").val(),
				email: $("#email").val(),
				phone: $("#phone").val(),
			},
		})
			.done(function (obj) {
				if (obj) {
					console.log("Se enviaron los datos");
				}
				console.log("No se enviaron datos");
				location.reload();
			})
			.fail(() => {
				console.log("No se enviaron datos");
			});
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
			var lector = new FileReader();
			console.log(avatar);
			//Ojo: En este caso 'avatar' será el nombre con el que recibiremos el archivo en el servidor
			formData.append("avatar", avatar);
			$.ajax({
				url: appData.base_url + "Cuenta/update_avatar",
				data: formData,
				type: "POST",
				contentType: false,
				processData: false,
				success: function (resultados) {
					console.log(resultados);
					update_avatar();
					message("success", "Listo", "se agrego platillo");
					location.reload();
				},
			});
		}
	});
});

function update_avatar() {}
