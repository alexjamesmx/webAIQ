//EDITAR 0 AGREGAR EVENTO
$("#modal-form-mesas").on("submit", function (event) {
	event.preventDefault();

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
						getMesas();
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
				.done((result) => {
					if (result.res) {
						const form = document.getElementById("modal-form-mesas");
						let id_mesa = form.elements[0].value;
						let descripcion = form.elements[1].value;
						let password = form.elements[2].value;
						$("#" + id_mesa + "_id_mesa").text(descripcion);
						$("#" + id_mesa + "_descrpcion_mesa").text(email);
						$("#" + id_user + "_mesas_actions_edit").attr("data-id", id_mesa);

						$("#" + id_user + "modal-actions-mesas").attr(
							"data-password",
							password
						);
						$("#" + id_user + "_mesas_actions_edit").attr(
							"data-descripcion",
							descripcion
						);
						message("success", "", result.message);
					} else {
						message("danger", "", result.message);
					}
				})
				.fail(() => {
					message("danger", "", "Error: Hubo un problema con la petición");
				});
		}
	} else {
		if ($("#id_mesa").val() == "") {
			$(".id_mesa").text("Este campo es requerido");
		}
		if ($("#descripcion_mesas").val() == "") {
			$(".descripcion_mesas").text("Este campo es requerido");
		}

		if ($("#password_mesas").val() == "") {
			$(".password_mesas").text("Este campo es requerido");
		}
	}
});
