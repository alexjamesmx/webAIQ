$(function () {
	$("#results_tabla_repartidores").empty();
	getRepartidores();
	$(".dataTables_empty").remove();
});

function getRepartidores() {
	$(".dataTables_empty").remove();
	$("#results_tabla_repartidores").empty();
	$.ajax({
		url: appData.base_url + "repartidores/getRepartidores",
		dataType: "json",
	})
		.done((result) => {
			if (result.res) {
				if ($("#results_tabla_repartidores").empty()) {
					result.data.forEach((item) => {
						$("#results_tabla_repartidores").append(
							`
					<tr class='item' id='${item.id_rep}_registro'>
					<td>
						<p class="text-muted">${item.id_rep}</p>
					</td>
					<td>
						<p id="${item.id_rep}_nombre_repartidor" class"list-item-heading">${
								item.nombre
							}</p>
					</td>
					<td>
						<p id="${item.id_rep}_phone_repartidor" class="text-muted">${item.telefono}</p>
					</td>
                    <td>
					<label class="switch">
					<input class='status'
							type="checkbox"
							id="${item.id_rep}_repartidores_input" 
							name="checkbox" 
							data-id='${item.id_rep}'
							data-nombre="${item.nombre}" 
							${item.activo == 1 ? "checked" : ""}>
							<span 
								class="sliderdis round" 
							></span>
					</label>
					</td> 
					<td> 
						<a class="align-self-center mr-4"
							id="${item.id_rep}_repartidores_actions_edit" 
							href="#" 
							data-toggle="modal" 
							data-target="#modal-actions-repartidores" 
							data-action="Editar"  
							onclick="return handleModal_repartidores (this)" 
							data-phone=\"${item.telefono}\"
                            data-id=\"${item.id_rep}\"
							data-nombre=\"${item.nombre}\"
                            >
							<i class="iconos-size simple-icon-pencil pencil"></i>
						</a>
						<a class="align-self-center mr-4"
							id="${item.id_rep}_repartidores_actions_delete" 
							onclick="return handleModalDelete_repartidores(this)" 
							href="#" 
							data-toggle="modal" 
							data-target="#modal-delete-repartidores"
							data-id=\"${item.id_rep}\"
							data-nombre=\"${item.nombre}\">
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
					id_rep = $(this).data("id");
					nombre = $(this).data("nombre");
					$.ajax({
						type: "POST",
						dataType: "json",
						url: appData.base_url + "repartidores/updateRepartidorStatus",
						data: {
							id_rep,
							activo: status,
						},
					}).done(function (result) {
						if (result.res) {
							if (status == "1") {
								message("info", "", nombre + " desactivo");
							} else if (status == "0") {
								message("info", "", nombre + " activo");
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

function reload_repartidores() {
	$("#results_tabla_repartidores").empty();
	getRepartidores();
	$(".dataTables_empty").remove();
}
