function handleModal_restaurantes(e) {
	$(".was-validated").removeClass("was-validated");
	$("#imagen-input-restaurantes").remove();
	$("#nombre").attr("placeholder", "");
	$("#password").attr("placeholder", "");
	$("#email").attr("placeholder", "");
	$("#phone").attr("placeholder", "");
	$("#nombre").val("");
	$("#password").val("");
	$("#email").val("");
	$("#phone").val("");
	$("#zona").val("");
	//INVALID FEEDBACK
	$(".nombre").text(null);
	$(".email").text(null);
	$(".password").text(null);
	$(".phone").text(null);
	$(".zona").text(null);

	action = $(e).data("action");
	if (action == "Agregar") {
		$("#modal-form-restaurantes").prepend(
			`
		<div id="imagen-input-restaurantes">
			<div class="col-12 mb-2">
				<div class="alert alert-warning">
					<h9>
						<i class="fas fa-exclamation-triangle"></i>
						El logo de la empresa debe ser un archivo en formato
						<h9 class="text-success"> .gif .jpeg .png o .jpg</h9>.
						<br>
						Con un peso máximo de <h9 class="text-success"> 512 kb.</h9>
					</h9>
				</div>
			</div>
			<div class="col-12 mb-2">
				<input type="file" class="form-control" id="imagen_input_restaurantes" required>
				<div class="valid-feedback"></div>
				<div class="imagen_input_restaurantes invalid-feedback"></div>
			</div>
		</div>
		`
		);

		$("#modal-actions-title-restaurantes").text("Agregar Restaurante");
		$("#nombre").attr("placeholder", "Nombre del restaurante");
		$("#password").attr("placeholder", "Contraseña");
		$("#email").attr("placeholder", "Correo electrónico");
		$("#phone").attr("placeholder", "Teléfono");
		$("#modal-actions-restaurantes").data("action", "Agregar");
	} else if (action == "Editar") {
		let id_user = $(e).attr("data-id");
		let nombre = $(e).attr("data-nombre");
		let password = $(e).attr("data-password");
		let email = $(e).attr("data-email");
		let phone = $(e).attr("data-phone");
		let zona = $(e).attr("data-zona");
		$("#modal-actions-title-restaurantes").html("Editar <b>" + nombre + "</b>");
		$("#nombre").attr("placeholder", nombre);
		$("#password").attr("placeholder", "Contraseña");
		$("#email").attr("placeholder", email);
		$("#phone").attr("placeholder", phone);
		$("#nombre").val(nombre);
		$("#password").val(password);
		$("#email").val(email);
		$("#phone").val(phone);
		$("#zona").val(zona);
		$("#id_user").val(id_user);
		$("#modal-actions-restaurantes").data("action", "Editar");
	}
}

function handleModalDelete_restaurantes(e) {
	$("button[name='delete']").remove();
	let id_user = $(e).data("id");
	let nombre = $("#" + id_user + "_nombre").text();
	$("#delete_users").append(`
	<button type="button" class="btn btn-outline-danger" data-dismiss="modal" name='delete' id='delete_users_${id_user}'>Eliminar</button>`);
	$("");
	$("#modal-delete-title-restaurantes").html(
		`¿Estás seguro de eliminar a <b>${nombre}</b>?`
	);
	$("#modal-delete-text-restaurantes").html(`Eliminar a ${nombre}`);

	$("#delete_users_" + id_user).click(function () {
		$.ajax({
			type: "post",
			url: appData.base_url + "user/deleteUser",
			data: { id_user },
			dataType: "json",
			success: function (res) {
				if (res) {
					$("#" + id_user + "_registro").remove();
					message("info", "", nombre + res.message);
					setTimeout(() => {
						$("#" + id_user + "_registro").remove();
					}, 1000);
				}
			},
			error: function (XMLHttpRequest, textStatus, errorThrown) {
				message("Estado: ", "", textStatus);
				message("Error: ", "", errorThrown);
			},
		});
	});
}
