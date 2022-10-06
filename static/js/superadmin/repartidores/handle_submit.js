//EDITAR 0 AGREGAR EVENTO
$("#modal-form-repartidores").on("submit", function (event) {
	event.preventDefault();
	const form = document.getElementById("modal-form-repartidores");
	const nombre_repartior = form.elements[0].value;
	const phone_repartidor = form.elements[1].value;
	const zona_repartidor = form.elements[2].value;
	const id_rep = form.elements[3].value;

	//console.log(nombre_repartior);
	//console.log(phone_repartidor);
	//console.log(id_rep);

	action = $("#modal-actions-repartidores").data("action");
	if (validateForm_repartidores()) {
		$(".close").click();
		if (action == "Agregar") {
			$.ajax({
				type: "post",
				url: appData.base_url + "repartidores/addRepartidor",
				data: $("#modal-form-repartidores").serialize(),
				dataType: "json",
			})
				.done((res) => {
					if (res.res === true) {
						message("success", "", res.message);
						$("button[name='reload_repartidores']").click();
						let numero = phone_repartidor;
						let tipo = "nuevoR";

						$.ajax({
							url: appData.base_url + "MensajesW/sendTextMessage",
							dataType: "json",
							type: "post",
							data: {
								numero: numero,
								tipo: tipo,
							},
						})
							.done(function (response) {
								if (response.res) {
									alert(response.msg);
								}
							})
							.fail();
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
				url: appData.base_url + "repartidores/updateRepartidor",
				data: $("#modal-form-repartidores").serialize(),
				dataType: "json",
			})
				.done((res) => {
					if (res.res === true) {
						$("#" + id_rep + "_nombre_repartidor").text(nombre_repartior);
						$("#" + id_rep + "_phone_repartidor").text(phone_repartidor);
						$("#" + id_rep + "_zona_repartidor").text(zona_repartidor);
						$("#" + id_rep + "_repartidores_actions_edit").attr(
							"data-id",
							id_rep
						);

						$("#" + id_rep + "_repartidores_actions_edit").attr(
							"data-phone",
							phone_repartidor
						);
						$("#" + id_rep + "_repartidores_actions_edit").attr(
							"data-nombre",
							nombre_repartior
						);
						$("#" + id_rep + "_repartidores_actions_edit").attr(
							"data-zona",
							zona_repartidor
						);
						message("success", "", nombre_repartior + res.message);
					}
					if (res.res === false) {
						message("danger", "Error: ", res.message);
					}
					if (res.res === "exists") {
						message(
							"danger",
							"Error: ",
							`El telefono <small>${phone_repartidor}</small> ya existe en la base de datos`
						);
					}
					if (res.res) {
					} else {
						message("danger", "", res.message);
					}
				})
				.fail(() => {
					message("danger", "", "Error: Hubo un problema con la petición");
				});
		}
	} else {
		console.log("que");
		if ($("#nombre_repartidor").val() == "") {
			$(".nombre_repartidor").text("Este campo es requerido");
		}
		if ($("#phone_repartidor").val() == "") {
			$(".phone_repartidor").text("Este campo es requerido");
		}
		if ($("#zona_repartidor").val() == "") {
			$(".zona_repartidor").text("Este campo es requerido");
		}
		if (
			$("#phone_repartidor").val() != "" &&
			isLetter($("#phone_repartidor").val())
		) {
			$(".phone_repartidor").text("Debe contener sólo numeros");
		}
	}
});
