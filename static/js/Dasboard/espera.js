let url_get_espera = appData.base_url + "Dasboard/espera";

$(document).ready(function () {
	get_table2();
});

function get_table2() {
	fetch(url_get_espera)
		.then((response) => response.json())
		.then((data) => tabla_espera(data))
		.then((error) => console.log(error));

	const tabla_espera = (data) => {
		let cuerpo = "";
		if (data.pedidos == null) {
			cuerpo = `<td colspan="5" >No tienes pedidos para enviar</td>`;
		} else {
			document.getElementById("contidadespera").innerHTML = data.cantidad;
			for (let i = 0; i < data.pedidos.length; i++) {
				let id = data.pedidos[i].id_pedido;
				let id_rep = data.pedidos[i].id_repartidor;

				cuerpo += `<tr> 
				<td> <p> ${id} </p> </td>
				<td> <p> ${data.pedidos[i].metodo} </p> </td>
				<td> <p> ${data.pedidos[i].nombre} </p> </td>
				<td> <p> ${data.pedidos[i].nombre_alias} </p> </td>
				<td> <div class='btn-group btn-group-sm' role='group' aria-label='Basic example'>
						<button type="button" onclick="enviado_pedido(${id})" class="btn btn-outline-success">
							<i class="simple-icon-check"></i>
						</button>
						<button type="button" onclick="cancelado_pedido(${id},${id_rep})" class="btn btn-outline-danger">
							<i class="simple-icon-close"></i>
						</button>
					</div>
				</td>
				</tr>`;
			}
		}
		document.getElementById("table-espera").innerHTML = cuerpo;
	};
}

function enviado_pedido(id_pedido) {
	//alert("pedido enviado con id: " + id_pedido);
	$.ajax({
		url: appData.base_url + "Dasboard/btn_enviado",
		dataType: "json",
		type: "post",
		data: {
			id_pedido: id_pedido,
		},
	})
		.done(function (data) {
			//alert(JSON.stringify(data))
			$("#table-espera").empty();
			$("#table-enviados").empty();
			$("#contidadespera").empty();
			setTimeout(function () {
				get_table2();
				get_table3();
				rechazados = 0;
			}, 500);
		})
		.fail();
}

function cancelado_pedido(id_pedido, id_repartidor) {
	//alert("pedido devolucion o cancelado con id: " + id_pedido + id_repartidor);
	$.ajax({
		url: appData.base_url + "Dasboard/btn_cancelado",
		dataType: "json",
		type: "post",
		data: {
			id_pedido: id_pedido,
			id_repartidor: id_repartidor,
		},
	})
		.done(function (data) {
			//alert(JSON.stringify(data))
			$("#table-espera").empty();
			$("#contidadespera").empty();
			setTimeout(function () {
				get_table2();
			}, 500);
		})
		.fail();
}

function refrescar_espera() {
	$("#table-espera").empty();
	$("#contidadespera").empty();
	get_table2();
}
