$(function () {
	$("#results_tabla_anuncios").empty();
	getAnuncios();
	$(".dataTables_empty").remove();
});

function getAnuncios() {
	$(".dataTables_empty").remove();
	$("#results_tabla_anuncios").empty();
	$.ajax({
		url: appData.base_url + "anuncios/getAnuncios",
		dataType: "json",
	})
		.done((result) => {
			if (result.res) {
				if ($("#results_tabla_anuncios").empty()) {
					result.data.forEach((item) => {
						$("#results_tabla_anuncios").append(
							`
					<tr class='item' id='${item.id_ad}_registro'>
					<td>
						<p class="text-muted">${item.id_ad}</p>
					</td> 
					<td scope="row">
						<a type="button" data-toggle="modal" data-target="#exampleModal" data-id="${
							item.id_ad
						} 
						onclick="return imagenModal(this)"> 
							<div class="contenedor-img ejemplo-1">
								<img src="${item.imagen}" class="list-thumbnail responsive border-0" />
								<div class="mascara">
									<a class="link"><i class="simple-icon-pencil"></i></a>
								</div>
							</div> 
						</a> 
					</td> 
					<td>
						<p id="${item.id_ad}_fechainicio_anuncio" class="text-muted">${
								item.fecha_inicio
							}</p>
					</td>
					<td>
						<p id="${item.id_ad}_fechafin_anuncio" class="text-muted">${item.fecha_fin}</p>
					</td>
                    <td>
					<label class="switch">
					<input class='status'
							type="checkbox"
							id="${item.id_ad}_anuncios_input" 
							name="checkbox" 
							data-id='${item.id_ad}'
							data-imagen="${item.imagen}" 
							${item.activo == 1 ? "checked" : ""}>
							<span 
								class="sliderdis round" 
							></span>
					</label>
					</td> 
					<td> 
						<a class="align-self-center mr-4"
							id="${item.id_ad}_anuncios_actions_edit" 
							href="#" 
							data-toggle="modal" 
							data-target="#modal-actions-anuncios" 
							data-action="Editar"  
							onclick="return handleModal_anuncios (this)" 
							data-fechainicio=\"${item.fecha_inicio}\"
							data-fechafin=\"${item.fecha_fin}\"
                            data-id=\"${item.id_ad}\"
                            >
							<i class="iconos-size simple-icon-pencil pencil"></i>
						</a>
						<a class="align-self-center mr-4"
							id="${item.id_ad}_anuncios_actions_delete" 
							onclick="return handleModalDelete_anuncios(this)" 
							href="#" 
							data-toggle="modal" 
							data-target="#modal-delete-anuncios"
							data-id=\"${item.id_ad}\"
							data-imagen=\"${item.imagen}\">
						<i class="iconos-size simple-icon-trash trash"></i>
						</a>
					</td>
					</tr>
					`
						);
					});
				}
				$(".status").click(function () {
					let status = null;
					if ($(this).is(":checked")) {
						status = 0;
					} else {
						status = 1;
					}
					id_ad = $(this).data("id");
					nombre = $(this).data("nombre");
					$.ajax({
						type: "POST",
						dataType: "json",
						url: appData.base_url + "anuncios/updateRepartidorStatus",
						data: {
							id_ad,
							activo: status,
						},
					}).done(function (result) {
						if (result.res) {
							if (status == "1") {
								message("info", "", "Anuncio desactivo");
							} else if (status == "0") {
								message("info", "", "Anuncio activo");
							}
						} else {
							message("danger", "Error", result.message);
						}
					});
				});
			}
		})
		.fail(() => {
			message("danger", "", "Error: Hubo un problema con la petición");
		});
}

function reload_anuncios() {
	$("#results_tabla_anuncios").empty();
	getAnuncios();
	$(".dataTables_empty").remove();
}
