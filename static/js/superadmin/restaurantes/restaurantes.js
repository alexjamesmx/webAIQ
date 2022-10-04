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
						if (item.status !== "3") {
							$("#results_tabla_restaurantes").append(
								`
						<tr class='item' id='${item.id_user}_registro'>
						<td>
							<p id="${item.id_user}_id" class="text-muted">${item.id_user}</p>
						</td>
						<td scope="row" style="padding-right:5px">
							<a type="button" data-toggle="modal" data-target="#restaurantes_imagen_modal" data-id="${
								item.id_user
							}"  data-nombre="${
									item.nombre
								}"onclick="return imagenModal_restaurantes(this)"> 
								<div class="contenedor-img ejemplo-1">
									<img src="${appData.base_url}static/img/${
									item.avatar
								}" class="list-thumbnail responsive border-0" />
									<div class="mascara">
										<a class="link"><i class="simple-icon-pencil"></i></a>
									</div>
								</div> 
							</a> 
						</td> 
						<td>
							<p id="${item.id_user}_nombre" class="list-item-heading">${item.nombre}</p>
						</td>
						<td>
							<p id="${item.id_user}_email"class="text-muted">${item.email}</p>
						</td>
						<td>
							<p id="${item.id_user}_zona"class="text-muted">${item.zona}</p>
						</td>
						<td>
							<p id="${item.id_user}_phone"class="text-muted">${item.phone}</p>
						</td>
	
						<td>
						<label class="switch">
						<input class='status_restaurantes'
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
								data-zona=\"${item.zona}\"
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
						}
					});
				}
				$(".status_restaurantes").click(function () {
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

$("#actualizaImagen_restaurante_btn").click(function (e) {
	const $fotoActualProducto = $("#actualizaImagen_restaurante");
	var formData = new FormData();
	const id_user = $("#restaurantes_imagen_modal").attr("data-id");

	console.log(id_user);
	var archivos = $fotoActualProducto[0].files;

	if (archivos.length > 0) {
		var fotos = archivos[0]; //Sólo queremos la primera imagen, ya que el usuario pudo seleccionar más
		//Ojo: En este caso 'fotoa' será el nombre con el que recibiremos el archivo en el servidor
		formData.append("fotos", fotos);
		formData.append("id_user", id_user);
		$.ajax({
			url: appData.base_url + "user/actualizarImagen",
			data: formData,
			type: "POST",
			contentType: false,
			processData: false,
			success: function (res) {
				console.log(res);
				if (res) {
					message("success", "", "Logo actualizado");
					$("button[name='reload_restaurantes']").click();
				} else {
					message("danger", "Error: Hubo un error al actualizar imagen");
				}
			},
		});
	}
});
function imagenModal_restaurantes(e) {
	$("#actualizaImagen_restaurante").val(null);
	const id_user = $(e).data("id");

	$("#restaurantes_imagen_modal").attr("data-id", id_user);
	$("#restaurantes_imagen_modal").data("id", id_user);
	$(".modal-title-imagen").html(
		"Cambiar logo a <b>" + $(e).data("nombre") + "</b>"
	);
}

function reload_restaurantes() {
	$("#results_tabla_restaurantes").empty();
	getUsers();
	$(".dataTables_empty").remove();
}
