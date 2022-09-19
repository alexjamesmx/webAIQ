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
	$(".nombre").text(null);
	$(".email").text(null);
	$(".password").text(null);
	$(".phone").text(null);

	action = $(e).data("action");
	$("#modal-form").data("action", action);
	if (action == "Agregar") {
		$("#modal-actions-title-restaurante").text("Agregar Restaurante");
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
		$("#modal-actions-title-restaurante").text("Editar " + nombre);
		$("#nombre").attr("placeholder", nombre);
		$("#password").attr("placeholder", password);
		$("#email").attr("placeholder", email);
		$("#phone").attr("placeholder", phone);
		$("#nombre").val(nombre);
		$("#password").val(password);
		$("#email").val(email);
		$("#phone").val(phone);
		$("#id_user").val(id_user);

		$("#" + id_user + "_restaurantes_actions_edit").data(
			"whatever",
			"Editar " + nombre
		);
	}
}

function handleModalDelete(e) {
	id_user = $(e).data("id");
	nombre = $(e).data("nombre");
	$("#modal-delete-title-restaurante").text(
		`¿Estás seguro de eliminar a ${nombre}?`
	);
	$("#modal-delete-text-restaurante").text(`Eliminar a ${nombre}`);

	$("button[name='delete']").click(function () {
		$.ajax({
			type: "post",
			url: appData.base_url + "user/deleteUser",
			data: { id_user },
			dataType: "json",
			success: function (response) {
				if (response.res) {
					message("info", "", nombre + response.message);
					$("#" + id_user + "_registro").remove();
				} else {
					message("danger", "", nombre + response.message);
				}
			},
			error: function (XMLHttpRequest, textStatus, errorThrown) {
				message("Estado: ", "", textStatus);
				message("Error: ", "", errorThrown);
			},
		});
	});
}
