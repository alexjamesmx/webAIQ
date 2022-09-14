function handleModal_mesas(e) {
	$("#descripcion_mesas").attr("placeholder", "");
	$("#password_mesas").attr("placeholder", "");
	$("#descripcion_mesas").val("");
	$("#password_mesas").val("");

	//INVALID FEEDBACK
	$(".descripcion_mesas").text(null);
	$(".password_mesas").text(null);

	action = $(e).data("action");

	if (action == "Agregar") {
		$("#modal-actions-title-restaurantes").text("Agregar Restaurante");
		$("#descripcion_mesas").attr("placeholder", "Nombre de la mesa");
		$("#password_mesas").attr("placeholder", "Contraseña");
	} else if (action == "Editar") {
		let id_mesa = $(e).attr("data-id");
		let descripcion_mesas = $(e).attr("data-descripcion");
		let password_mesas = $(e).attr("data-password");

		$("#modal-actions-title-mesas").text(
			"Editar mesa no.<bold>" + id_mesa + "</bold>"
		);
		$("#descripcion_mesas").attr("placeholder", descripcion_mesas);
		$("#password_mesas").attr("placeholder", password_mesas);
		$("#descripcion_mesas").val(descripcion_mesas);
		$("#password_mesas").val(password_mesas);
		$("#id_mesa").val(id_mesa);

	
	}
}
