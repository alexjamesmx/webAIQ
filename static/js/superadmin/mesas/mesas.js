$(function () {
	$("#results_tabla_mesas").empty();
	getMesas();
	$(".dataTables_empty").remove();
});

function getMesas() {
	$(".dataTables_empty").remove();
	$("#results_tabla_mesas").empty();
	$.ajax({
		url: appData.base_url + "mesas/getMesas",
		dataType: "json",
	})
		.done((result) => {
			if (result.res) {
				result.data.map((item) => {
					$("#results_tabla_mesas").append(
						`
					<tr class='item' id='${item.id_mesa}_registro'>
					<td>
						<p id="${item.id_mesa}_id" class="text-muted">${item.id_mesa}</p>
					</td>
					<td>
						<p id="${item.id_mesa}_nombre" class="list-item-heading">${item.descripcion}</p>
					</td>
					<td> 
						<a class="align-self-center mr-4"
							id="${item.id_mesa}_mesas_actions_edit" 
							href="#" 
							data-toggle="modal" 
							data-target="#modal-actions-mesas" 
							data-whatever="" 
							data-action="Editar"  
							onclick="return handleModal_mesas (this)" 
							data-password=\"${item.password}\"
                            data-id=\"${item.id_mesa}\"
							data-descripcion=\"${item.descripcion}\"
                            >
							<i class="iconos-size simple-icon-pencil pencil"></i>
						</a>
						<a class="align-self-center mr-4"
							id="${item.id_mesa}_mesas_actions_delete" 
							onclick="return handleModalDelete(this)" 
							href="#" 
							data-toggle="modal" 
							data-target="#modal-delete"
							data-id=\"${item.id_mesa}\">
						<i class="iconos-size simple-icon-trash trash"></i>
						</a>
					</td>
					</tr>
					`
					);
				});
			}
		})
		.fail(() => {
			message("danger", "", "Error: Hubo un problema con la petición");
		});
}
