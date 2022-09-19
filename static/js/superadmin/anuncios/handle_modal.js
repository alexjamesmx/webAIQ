function handleModal_anuncios(e) {
	$("#imagen-input").remove();

	$("#inicio_anuncio").attr("placeholder", "");
	$("#fin_anuncio").attr("placeholder", "");
	$("#inicio_anuncio").val("");
	$("#fin_anuncio").val("");

	//INVALID FEEDBACK
	$(".inicio_anuncio").text(null);
	$(".fin_anuncio").text(null);

	action = $(e).data("action");
	if (action == "Agregar") {
		$("#modal-form-anuncios").prepend(
			`
		<div id="imagen-input">
			</br>
			<label>Imagen</label>
			<div id='imagen-anuncio'class="custom-file">
				<input type="file" class="custom-file-input" id="validatedCustomFile" required>
				<label class="custom-file-label" for="validatedCustomFile">Elegir banner de anuncio...</label>
				<div class="imagen_anuncios invalid-feedback mt-4"></div>
			</div>
			</br>
		</div>
		`
		);
		$("#modal-actions-anuncios").data("action", action);
	}
	if (action == "Editar") {
		let id_ad = $(e).attr("data-id");
		let fechainicio = $(e).attr("data-fechainicio");
		let fechafin = $(e).attr("data-fechafin");
		$("#modal-actions-title-anuncios").html("Editar Anuncio");
		$("#fechainicio").attr("placeholder", fechainicio);
		$("#fechafin").attr("placeholder", fechafin);
		$("#fechainicio").val(fechainicio);
		$("#fechafin").val(fechafin);
		$("#id_ad").val(id_ad);
		$("#modal-actions-anuncios").data("action", action);
	}
}

function handleModalDelete_anuncios(e) {
	let id_ad = $(e).data("id");
	$("#delete-boton-anuncios").attr("data-id", id_ad);
	$("#modal-delete-title-anuncios").html(
		`¿Estás seguro de eliminar este anuncio</b>?`
	);
	$("#modal-delete-text-anuncios").html(`Eliminar anuncio`);

	$("button[name='delete']").click(function () {
		$.ajax({
			type: "post",
			url: appData.base_url + "anuncios/deleteAnuncio",
			data: { id_ad },
			dataType: "json",
		})
			.done((res) => {
				$("#" + id_ad + "_registro").remove();
				message("info", "", "Anuncio" + res.message);
				setTimeout(() => {
					$("#" + id_ad + "_registro").remove();
				}, 1000);
			})
			.fail(() => {
				message("danger", "", "Error: Hubo un problema con la petición");
			});
	});
}
