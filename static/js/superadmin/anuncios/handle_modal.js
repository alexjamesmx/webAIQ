function handleModal_anuncios(e) {
	$("#imagen-input").remove();

	$("#imagen_input").attr("placeholder", "");
	$("#inicio_anuncio").attr("placeholder", "");
	$("#fin_anuncio").attr("placeholder", "");
	$("#imagen_input").val("");
	$("#inicio_anuncio").val("");
	$("#fin_anuncio").val("");

	//INVALID FEEDBACK

	$(".was-validated").removeClass("was-validated");
	action = $(e).data("action");
	if (action == "Agregar") {
		$("#modal-actions-title-anuncios").html("Agregar anuncio");
		$("#modal-form-anuncios").prepend(
			`
		<div id="imagen-input">
			<div class="col-12 mb-2">
				<div class="alert alert-warning">
					<h9>
						<i class="fas fa-exclamation-triangle"></i>
						El logo de la empresa debe ser un archivo en formato
						<h9 class="text-success"> .gif .jpeg .png o .jpg</h9>.
						<br>
						Con un peso máximo de <h9 class="text-success"> 512 kb.</h9>
					</h9>
				</div>
			</div>
			<div class="col-12 mb-2">
				<input type="file" class="form-control" id="imagen_input" required>
				<div class="valid-feedback"></div>
				<div class="imagen_input invalid-feedback"></div>
			</div>
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
		$("#inicio_anuncio").attr("placeholder", fechainicio);
		$("#fin_anuncio").attr("placeholder", fechafin);
		$("#inicio_anuncio").val(fechainicio);
		$("#fin_anuncio").val(fechafin);
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
				message("info", "", "Anuncio eliminado");
				setTimeout(() => {
					$("#" + id_ad + "_registro").remove();
				}, 1000);
			})
			.fail(() => {
				message("danger", "", "Error: Hubo un problema con la petición");
			});
	});
}
