//zona_mesas

//EDITAR 0 AGREGAR EVENTO
$("#modal-form-mesas").on("submit", function (event) {
	event.preventDefault();
	const form = document.getElementById("modal-form-mesas");
	const nombre_mesa = form.elements[0].value;
	const descripcion = form.elements[1].value;
	const password = form.elements[2].value;
	const zona_mesas = form.elements[3].value;
	const id_mesa = form.elements[4].value;
	action = $("#modal-actions-mesas").data("action");
	if (validateForm_mesas()) {
		$(".close").click();
		if (action == "Agregar") {
			$.ajax({
				type: "post",
				url: appData.base_url + "mesas/addMesa",
				data: $("#modal-form-mesas").serialize(),
				dataType: "json",
			})
				.done((res) => {
					if (res.res === true) {
						message("success", "", res.message);
						$("button[name='reload_mesas']").click();
					}
					if (res.res === false) {
						message("danger", "Error: ", res.message);
					}
					if (res.res === "exists") {
						message("danger", "Error: ", res.message);
					}
				})
				.fail(() => {
					message("danger", "", "Error: Hubo un problema con la petición");
				});
		}
		if (action == "Editar") {
			$.ajax({
				type: "post",
				url: appData.base_url + "mesas/updateMesa",
				data: $("#modal-form-mesas").serialize(),
				dataType: "json",
			})
				.done((res) => {
					if (res.res === true) {
						$("#" + id_mesa + "_nombre_mesa").text(nombre_mesa);
						$("#" + id_mesa + "_descripcion_mesa").text(descripcion);
						$("#" + id_mesa + "_zona_mesa").text(zona_mesas);
						$("#" + id_mesa + "_mesas_actions_edit").attr("data-id", id_mesa);
						$("#" + id_mesa + "_mesas_actions_edit").attr(
							"data-password",
							password
						);
						$("#" + id_mesa + "_mesas_actions_edit").attr(
							"data-descripcion",
							descripcion
						);
						$("#" + id_mesa + "_mesas_actions_edit").attr(
							"data-nombre",
							nombre_mesa
						);
						$("#" + id_mesa + "_mesas_actions_edit").attr(
							"data-zona_mesas",
							zona_mesas
						);
						message("success", "", nombre_mesa + res.message);
					}
					if (res.res === false) {
						message("danger", "Error: ", res.message);
					}
					if (res.res === "exists") {
						message(
							"danger",
							"Error: ",
							`El registro <small>${nombre_mesa}</small> ya existe en la base de datos`
						);
					}
					if (res.res) {
					} else {
						message("danger", "", result.message);
					}
				})
				.fail(() => {
					message("danger", "", "Error: Hubo un problema con la petición");
				});
		}
	} else {
		if ($("#nombre_mesa").val() == "") {
			$(".nombre_mesa").text("Este campo es requerido");
		}
		if ($("#descripcion_mesas").val() == "") {
			$(".descripcion_mesas").text("Este campo es requerido");
		}

		if ($("#password_mesas").val() == "") {
			$(".password_mesas").text("Este campo es requerido");
		}

		if ($("#zona_mesas").val() == "") {
			$(".zona_mesas").text("Este campo es requerido");
		}
	}
});
