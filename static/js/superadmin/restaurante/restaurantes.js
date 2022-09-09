$(function () {
	$("#results").empty();
	getUsers();
});

function getUsers() {
	$.ajax({
		url: appData.base_url + "user/getUsers",
		dataType: "json",
	})
		.done((result) => {
			if (result.res) {
				result.data.map((item) => {
					$("#results").append(
						item.status == 1
							? `
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
						<input 
							id=\"${item.id_user}_status\" 
							type="checkbox"
							data-status=\"${item.status}\" 
							onclick="return handleStatus(${item.id_user},this,\`${item.nombre}\`)"
							>
							<span 
								data-id='${item.id_user}'
								class="slider round"
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
							href="#" 
							data-toggle="modal" 
							data-target=".bd-example-modal-sm"
							data-id=\"${item.id_user}\"
							data-action="Delete">
						<i class="iconos-size simple-icon-trash trash"></i>
						</a>
					</td>
					</tr>
					`
							: `
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
							<input type="checkbox"
							id=\"${item.id_user}_status\" 
							data-status=\"${item.status}\"
							onclick="return handleStatus(${item.id_user},this,\`${item.nombre}\`)"
							>
							<span 
								data-id="${item.id_user}"
								class="sliderdis round">
							</span>
						</label>
					</td>
					<td> 
						<a class="align-self-center mr-4" href="#" data-toggle="modal" data-target="#exampleModalContent" 
						data-whatever="Editar \`${item.nombre}\`" 
						data-action="Editar" 
						onclick="return handleModal(this)" 
						data-id=\"${item.id_user}\"
						data-nombre=\"${item.nombre}\"
						data-password=\"${item.password}\"
						data-email=\"${item.email}\"
						data-phone=\"${item.phone}\">
							<i class="iconos-size simple-icon-pencil pencil"></i>
						</a>
						<a class="align-self-center mr-4" href="#" data-toggle="modal" data-target=".bd-example-modal-sm"
						data-id=\"${item.id_user}\"
						data-action="Delete"
						>
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
