//EDITAR 0 AGREGAR EVENTO
$("#modal-form-anuncios").on("submit", function (event) {
	event.preventDefault();

	action = $("#modal-actions-anuncios").data("action");
	if (validateForm_anuncios(action)) {
		const form = document.getElementById("modal-form-anuncios");

		$(".close").click();
		if (action == "Agregar") {
			const inicio_anuncio = form.elements[1].value;
			const fin_anuncio = form.elements[2].value;
			const fotoProducto = $("#imagen_input");
			const formData = new FormData();
			const archivos = fotoProducto[0].files;

			console.log(inicio_anuncio);
			console.log(fin_anuncio);
			if (archivos.length > 0) {
				var foto = archivos[0]; //Sólo queremos la primera imagen, ya que el usuario pudo seleccionar más
				//Ojo: En este caso 'foto' será el nombre con el que recibiremos el archivo en el servidor
				formData.append("foto", foto);
				formData.append("inicio_anuncio", inicio_anuncio);
				formData.append("fin_anuncio", fin_anuncio);
				$.ajax({
					url: appData.base_url + "anuncios/subirImagen",
					data: formData,
					type: "POST",
					dataType: "json",
					contentType: false,
					processData: false,
				})
					.done((res) => {
						if (res) {
							message("success", "", "Anuncio agregado correctamente...");
							$("button[name='reload_anuncios']").click();
						} else {
							message("danger", "Error: Hubo un error el anuncio");
						}
					})
					.fail(() => {
						message("danger", "", "Error: Hubo un problema con la petición");
					});
			}
		}
		if (action == "Editar") {
			console.log(form.elements);
			const inicio_anuncio = form.elements[0].value;
			const fin_anuncio = form.elements[1].value;
			const id_ad = form.elements[2].value;

			console.log(inicio_anuncio, "   ", fin_anuncio);
			console.log("bien");
			$.ajax({
				type: "post",
				url: appData.base_url + "anuncios/updateAnuncioFecha",
				data: {
					inicio_anuncio,
					fin_anuncio,
					id_ad,
				},
				dataType: "json",
			})
				.done((res) => {
					if (res) {
						$("#" + id_ad + "_fechainicio_anuncio").text(inicio_anuncio);
						$("#" + id_ad + "_fechafin_anuncio").text(fin_anuncio);
						$("#" + id_ad + "_anuncios_actions_edit").attr(
							"data-fechainicio",
							inicio_anuncio
						);
						$("#" + id_ad + "_anuncios_actions_edit").attr(
							"data-fechafin",
							fin_anuncio
						);

						message("success", "", "Fecha actualizada");
					} else {
						message("danger", "", "No se pudo actualizar la fecha");
					}
				})
				.fail(() => {
					message("danger", "", "Error: Hubo un problema con la petición");
				});
		}
	} else {
		if ($("#fin_anuncio").val() == "") {
			$(".fin_anuncio").text("Este campo es requerido");
		}
		if ($("#inicio_anuncio").val() == "") {
			$(".inicio_anuncio").text("Este campo es requerido");
		}
		if ($("#imagen_input").val() == "") {
			$(".imagen_input").text("Este campo es requerido");
		}
	}
});
