$(function () {
	$("#results_tabla_restaurantes").empty();
	getUsers();
	$(".dataTables_empty").remove();
});

function getUsers() {
	$(".dataTables_empty").remove();
	$("#results_tabla_restaurantes").empty();
	$.ajax({
		url: appData.base_url + "user/getUsers",
		dataType: "json",
	})
		.done((result) => {
			if (result.res) {
				if ($("#results_tabla_restaurantes").empty()) {
					result.data.forEach((item) => {
						$("#results_tabla_restaurantes").append(
							`
					<tr class='item' id='${item.id_user}_registro'>
					<td>
						<p id="${item.id_user}_id" class="text-muted">${item.id_user}</p>
					</td>
					<td>
						<p id="${item.id_user}_nombre" class="list-item-heading">${item.nombre}</p>
					</td>
					<td>
						<p id="${item.id_user}_email"class="text-muted">${item.email}</p>
					</td>
					<td>
						<p id="${item.id_user}_phone"class="text-muted">${item.phone}</p>
					</td>

					<td>
					<label class="switch">
					<input class='status'
							type="checkbox"
							id="${item.id_user}_restaurantes_input" 
							name="checkbox" 
							data-id='${item.id_user}'
							data-nombre="${item.nombre}" 
							${item.status == 1 ? "checked" : ""}>
							<span 
								class="sliderdis round" 
							></span>
					</label>
					</td> 
					<td> 
						<a class="align-self-center mr-4"
							id="${item.id_user}_restaurantes_actions_edit" 
							href="#" 
							data-toggle="modal" 
							data-target="#modal-actions-restaurantes" 
							data-action="Editar"  
							onclick="return handleModal_restaurantes (this)" 
							data-id=\"${item.id_user}\"
							data-nombre=\"${item.nombre}\"
							data-password=\"${item.password}\"
							data-email=\"${item.email}\"
							data-phone=\"${item.phone}\">
							<i class="iconos-size simple-icon-pencil pencil"></i>
						</a>
						<a class="align-self-center mr-4"
							id="${item.id_user}_restaurantes_actions_delete" 
							onclick="return handleModalDelete_restaurantes(this)" 
							href="#" 
							data-toggle="modal" 
							data-target="#modal-delete-restaurantes"
							data-id=\"${item.id_user}\">
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
					id_user = $(this).data("id");
					nombre = $(this).data("nombre");
					$.ajax({
						type: "POST",
						dataType: "json",
						url: appData.base_url + "user/updateUserStatus",
						data: {
							id_user,
							status,
						},
					}).done(function (result) {
						if (result.res) {
							if (status == "1") {
								message("info", "", nombre + " deshabilitado");
							} else if (status == "0") {
								message("info", "", nombre + " habilitado");
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

function reload_restaurantes() {
	$("#results_tabla_restaurantes").empty();
	getUsers();
	$(".dataTables_empty").remove();
}
