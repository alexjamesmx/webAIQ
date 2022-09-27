//zona_mesas

function handleModal_mesas(e) {
	$("#nombre_mesa").attr("placeholder", "");
	$("#descripcion_mesas").attr("placeholder", "");
	$("#password_mesas").attr("placeholder", "");
	$("#nombre_mesa").val("");
	$("#descripcion_mesas").val("");
	$("#password_mesas").val("");
	$("#zona_mesas").val("");
	

	//INVALID FEEDBACK
	$(".nombre_mesa").text(null);
	$(".descripcion_mesas").text(null);
	$(".password_mesas").text(null);
	$(".zona_mesas").text(null);

	action = $(e).data("action");

	if (action == "Agregar") {
		$("#modal-actions-title-mesas").text("Agregar Mesa");
		$("#nombre_mesa").attr("placeholder", "Nombre de la mesa");
		$("#descripcion_mesas").attr("placeholder", "Descripción de la mesa");
		$("#password_mesas").attr("placeholder", "Contraseña");
		$("#modal-actions-mesas").data("action", action);
	}
	if (action == "Editar") {
		let id_mesa = $(e).attr("data-id");
		let nombre_mesa = $(e).attr("data-nombre");
		let descripcion_mesas = $(e).attr("data-descripcion");
		let password_mesas = $(e).attr("data-password");
		let zona_mesas = $(e).attr("data-zona_mesas");
		$("#modal-actions-title-mesas").html(
			"Editar Mesa <b>" + nombre_mesa + "</b>"
		);
		$("#nombre_mesa").attr("placeholder", nombre_mesa);
		$("#descripcion_mesas").attr("placeholder", descripcion_mesas);
		$("#password_mesas").attr("placeholder", "Contraseña");
		$("#descripcion_mesas").val(descripcion_mesas);
		$("#password_mesas").val(password_mesas);
		$("#nombre_mesa").val(nombre_mesa);
		$("#zona_mesas").val(zona_mesas);
		$("#id_mesa").val(id_mesa);
		$("#old_name").val(nombre_mesa);
		$("#modal-actions-mesas").data("action", action);
	}
}

function handleModalDelete_mesas(e) {
	let id_mesa = $(e).data("id");
	let nombre_mesa = $(e).data("nombre");
	$("#delete-boton-mesas").attr("data-id", id_mesa);
	$("#modal-delete-title_mesas").html(
		`¿Estás seguro de eliminar a mesa <b>${nombre_mesa}</b>?`
	);
	$("#modal-delete-text-mesas").html(`Eliminar a mesa ${nombre_mesa}`);

	$("button[name='delete']").click(function () {
		$.ajax({
			type: "post",
			url: appData.base_url + "mesas/deleteMesa",
			data: { id_mesa },
			dataType: "json",
		})
			.done((res) => {
				$("#" + id_mesa + "_registro").remove();
				message("info", "", nombre_mesa + res.message);
				setTimeout(() => {
					$("#" + id_mesa + "_registro").remove();
				}, 1000);
			})
			.fail(() => {
				message("danger", "", "Error: Hubo un problema con la petición");
			});
	});
}
