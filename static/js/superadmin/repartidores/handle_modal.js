function handleModal_repartidores(e) {
	$("#nombre_repartidor").attr("placeholder", "");
	$("#phone_repartidor").attr("placeholder", "");
	$("#nombre_repartidor").val("");
	$("#phone_repartidor").val("");

	//INVALID FEEDBACK
	$(".nombre_repartidor").text(null);
	$(".phone_repartidor").text(null);

	action = $(e).data("action");

	if (action == "Agregar") {
		$("#modal-actions-title-repartidores").text("Agregar Repartidor");
		$("#nombre_repartidor").attr("placeholder", "Nombre del repartidor");
		$("#phone_repartidor").attr("placeholder", "Teléfono");
		$("#modal-actions-repartidores").data("action", action);
	}
	if (action == "Editar") {
		let id_rep = $(e).attr("data-id");
		let nombre_repartidor = $(e).attr("data-nombre");
		let phone_repartidor = $(e).attr("data-phone");
		$("#modal-actions-title-repartidores").html(
			"Editar a <b>" + nombre_repartidor + "</b>"
		);
		$("#nombre_repartidor").attr("placeholder", nombre_repartidor);
		$("#phone_repartidor").attr("placeholder", phone_repartidor);
		$("#nombre_repartidor").val(nombre_repartidor);
		$("#phone_repartidor").val(phone_repartidor);
		$("#id_rep").val(id_rep);
		$("#old_telefono").val(phone_repartidor);
		$("#modal-actions-repartidores").data("action", action);
	}
}

function handleModalDelete_repartidores(e) {
	let id_rep = $(e).data("id");
	let nombre_repartidor = $(e).data("nombre");
	$("#delete-boton-repartidores").attr("data-id", id_rep);
	$("#modal-delete-title-repartidores").html(
		`¿Estás seguro de eliminar a <b>${nombre_repartidor}</b>?`
	);
	$("#modal-delete-text-repartidores").html(`Eliminar a ${nombre_repartidor}`);

	$("button[name='delete']").click(function () {
		$.ajax({
			type: "post",
			url: appData.base_url + "repartidores/deleteRepartidor",
			data: { id_rep },
			dataType: "json",
		})
			.done((res) => {
				$("#" + id_rep + "_registro").remove();
				message("info", "", nombre_repartidor + res.message);
				setTimeout(() => {
					$("#" + id_rep + "_registro").remove();
				}, 1000);
			})
			.fail(() => {
				message("danger", "", "Error: Hubo un problema con la petición");
			});
	});
}
