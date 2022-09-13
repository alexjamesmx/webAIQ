$(function () {
	$("#results").empty();
	getUsers();
});

function getUsers() {
	$("#results").empty();
	$.ajax({
		url: appData.base_url + "user/getUsers",
		dataType: "json",
	})
		.done((result) => {
			if (result.res) {
				result.data.map((item) => {
					$("#results").append(
						`
					<tr class='item'>
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
							name="checkbox" 
							data-id='${item.id_user}'
							data-nombre=${item.nombre} 
							${item.status == 1 ? "checked" : ""}>
							<span 
								class="sliderdis round" 
							></span>
					</label>
					</td> 
					<td> 
						<a class="align-self-center mr-4"
							href="#" 
							data-toggle="modal" 
							data-target="#exampleModalContent" 
							data-whatever="Editar \`${item.nombre}\`" 
							data-action="Editar"  
							onclick="return handleModal (this)" 
							data-id=\"${item.id_user}\"
							data-nombre=\"${item.nombre}\"
							data-password=\"${item.password}\"
							data-email=\"${item.email}\"
							data-phone=\"${item.phone}\">
							<i class="iconos-size simple-icon-pencil pencil"></i>
						</a>
						<a class="align-self-center mr-4" 
							onclick="return handleModalDelete(this)" 
							href="#" 
							data-toggle="modal" 
							data-target=".bd-example-modal-sm"
							data-nombre=\"${item.nombre}\"
							data-id=\"${item.id_user}\">
						<i class="iconos-size simple-icon-trash trash"></i>
						</a>
					</td>
					</tr>
					`
					);
				});
				$(".status").click(function () {
					let status = null;
					if ($(this).is(":checked")) {
						status = 0;
						console.log("Checkbox is checked..");
					} else {
						status = 1;
						console.log("Checkbox is not checked..");
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
