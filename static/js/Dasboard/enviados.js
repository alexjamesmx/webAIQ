let url_get_enviado = appData.base_url + "Dasboard/enviado";

$(document).ready(function () {
	get_table3();
});

function get_table3() {
	fetch(url_get_enviado)
		.then((response) => response.json())
		.then((data) => tabla_enviado(data))
		.then((error) => console.log(error));

	const tabla_enviado = (data) => {
		let cuerpo = "";
		if (data.pedidos == null) {
			cuerpo = `<td colspan="5" >No tienes pedidos por cobrar</td>`;
		} else {
			document.getElementById("contidadenviados").innerHTML = data.cantidad;
			for (let i = 0; i < data.pedidos.length; i++) {
				let id = data.pedidos[i].id_pedido;
				let id_rep = data.pedidos[i].id_repartidor;

				cuerpo += `<tr> 
				<td> <p> ${id} </p> </td>
				<td> <p> ${data.pedidos[i].nombre} </p> </td>
				<td> <p> ${data.pedidos[i].total} </p> </td>
				<td> <p> ${data.pedidos[i].metodo} </p> </td>
				<td> <div class='btn-group btn-group-sm' role='group' aria-label='Basic example'>
						<button type="button" onclick="finalizado_pedido(${id},${id_rep})" class="btn btn-outline-success btn-sm">
							<i class="iconsminds-financial"></i>
						</button>
						<button type="button" onclick="devolucion_pedido(${id},${id_rep})" class="btn btn-outline-danger btn-sm">
							<i class="simple-icon-close"></i>
						</button>
					</div>
				</td>
				</tr>`;
			}
		}
		document.getElementById("table-enviados").innerHTML = cuerpo;
	};
}

function finalizado_pedido(id_pedido, id_repartidor) {
	//alert("pedido devolucion o cancelado con id: " + id_pedido + id_repartidor);
	$.ajax({
		url: appData.base_url + "Dasboard/btn_finalizado",
		dataType: "json",
		type: "post",
		data: {
			id_pedido: id_pedido,
			id_repartidor: id_repartidor,
		},
	})
		.done(function (data) {
			//alert(JSON.stringify(data))
			$("#table-enviados").empty();
			$("#contidadenviados").empty();
			setTimeout(function () {
				get_table3();
			}, 500);
		})
		.fail();
}

function devolucion_pedido(id_pedido, id_repartidor) {
	//alert("pedido devolucion o cancelado con id: " + id_pedido + id_repartidor);
	$.ajax({
		url: appData.base_url + "Dasboard/btn_devolucion",
		dataType: "json",
		type: "post",
		data: {
			id_pedido: id_pedido,
			id_repartidor: id_repartidor,
		},
	})
		.done(function (data) {
			//alert(JSON.stringify(data))
			$("#table-enviados").empty();
			$("#contidadenviados").empty();
			setTimeout(function () {
				get_table3();
			}, 500);
		})
		.fail();
}

function refrescar_enviados() {
	$("#table-enviados").empty();
	$("#contidadenviados").empty();
	get_table3();
}
