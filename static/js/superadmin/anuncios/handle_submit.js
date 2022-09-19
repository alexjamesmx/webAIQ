//EDITAR 0 AGREGAR EVENTO
$("#modal-form-anuncios").on("submit", function (event) {
	event.preventDefault();
	const form = document.getElementById("modal-form-anuncios");

	action = $("#modal-actions-anuncios").data("action");
	console.log("action submit ", action);
	if (validateForm_anuncios(action)) {
		$(".close").click();
		if (action == "Agregar") {
			const inicio_anuncio = form.elements[0].value;
			const finanuncio = form.elements[1].value;
			const id_ad = form.elements[2].value;

			console.log(inicio_anuncio);
			console.log(finanuncio);
			console.log(id_ad);

			// $.ajax({
			// 	type: "post",
			// 	url: appData.base_url + "anuncios/addAnuncio",
			// 	data: $("#modal-form-repartidores").serialize(),
			// 	dataType: "json",
			// })
			// 	.done((res) => {
			// 		if (res.res === true) {
			// 			message("success", "", res.message);
			// 			$("button[name='reload_repartidores']").click();
			// 		}
			// 		if (res.res === false) {
			// 			message("danger", "Error: ", res.message);
			// 		}
			// 		if (res.res === "exists") {
			// 			message("danger", "Error: ", res.message);
			// 		}
			// 	})
			// 	.fail(() => {
			// 		message("danger", "", "Error: Hubo un problema con la petición");
			// 	});
		}
		if (action == "Editar") {
			// $.ajax({
			// 	type: "post",
			// 	url: appData.base_url + "repartidores/updateRepartidor",
			// 	data: $("#modal-form-repartidores").serialize(),
			// 	dataType: "json",
			// })
			// 	.done((res) => {
			// 		if (res.res === true) {
			// 			$("#" + id_rep + "_nombre_repartidor").text(nombre_repartior);
			// 			$("#" + id_rep + "_phone_repartidor").text(phone_repartidor);
			// 			$("#" + id_rep + "_repartidores_actions_edit").attr(
			// 				"data-id",
			// 				id_rep
			// 			);
			// 			$("#" + id_rep + "_repartidores_actions_edit").attr(
			// 				"data-phone",
			// 				phone_repartidor
			// 			);
			// 			$("#" + id_rep + "_repartidores_actions_edit").attr(
			// 				"data-nombre",
			// 				nombre_repartior
			// 			);
			// 			message("success", "", nombre_repartior + res.message);
			// 		}
			// 		if (res.res === false) {
			// 			message("danger", "Error: ", res.message);
			// 		}
			// 		if (res.res === "exists") {
			// 			message(
			// 				"danger",
			// 				"Error: ",
			// 				`El telefono <small>${phone_repartidor}</small> ya existe en la base de datos`
			// 			);
			// 		}
			// 		if (res.res) {
			// 		} else {
			// 			message("danger", "", res.message);
			// 		}
			// 	})
			// 	.fail(() => {
			// 		message("danger", "", "Error: Hubo un problema con la petición");
			// 	});
		}
	} else {
		console.log("algo mal");
		if ($("#fin_anuncio").val() == "") {
			$(".fin_anuncio").text("Este campo es requerido");
		}
		if ($("#inicio_anuncio").val() == "") {
			$(".inicio_anuncio").text("Este campo es requerido");
		}
	}
});
