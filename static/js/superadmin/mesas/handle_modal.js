function handleModal_mesas(e) {
	$("#id_mesa").attr("placeholder", "");
	$("#descripcion_mesas").attr("placeholder", "");
	$("#password_mesas").attr("placeholder", "");
	$("#id_mesa").val("");
	$("#descripcion_mesas").val("");
	$("#password_mesas").val("");

	//INVALID FEEDBACK
	$(".id_mesa").text(null);
	$(".descripcion_mesas").text(null);
	$(".password_mesas").text(null);

	action = $(e).data("action");

	if (action == "Agregar") {
		$("#modal-actions-title-mesas").text("Agregar Mesa");
		$("#id_mesa").attr("placeholder", "Identificador de la mesa");
		$("#descripcion_mesas").attr("placeholder", "Descripción de la mesa");
		$("#password_mesas").attr("placeholder", "Contraseña");
		$("#modal-actions-mesas").data("action", action);
	}
	if (action == "Editar") {
		let id_mesa = $(e).attr("data-id");
		let descripcion_mesas = $(e).attr("data-descripcion");
		let password_mesas = $(e).attr("data-password");
		$("#modal-actions-title-mesas").html(
			"Editar Mesa no.<b>" + id_mesa + "</b>"
		);
		$("#id_mesa").attr("placeholder", id_mesa);
		$("#descripcion_mesas").attr("placeholder", descripcion_mesas);
		$("#password_mesas").attr("placeholder", password_mesas);
		$("#descripcion_mesas").val(descripcion_mesas);
		$("#password_mesas").val(password_mesas);
		$("#id_mesa").val(id_mesa);
		$("#modal-actions-mesas").data("action", action);
	}
}

function handleModalDelete_mesas(e) {
	let id_mesa = $(e).data("id");

	$("#modal-delete-title_mesas").html(
		`¿Estás seguro de eliminar a mesa <b>${id_mesa}</b>?`
	);
	$("#modal-delete-text-mesas").html(`Eliminar a mesa ${id_mesa}`);

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
