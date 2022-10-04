//enpreparacion
let url_get_preparando = appData.base_url + "Dasboard/enpreparacion";
var cronometro;
$(document).ready(function () {
	get_table1();
	tiempo();
});

function get_table1() {
	fetch(url_get_preparando)
		.then((response) => response.json())
		.then((data) => tabla_preparando(data))
		.then((error) => console.log(error));

	const tabla_preparando = (data) => {
		let cuerpo = "";
		if (data.pedidos == null) {
			cuerpo = `<td colspan="3" >No tienes pedidos preparando</td>`;
		} else {
			document.getElementById("contidadpreparando").innerHTML = data.cantidad;
			for (let i = 0; i < data.pedidos.length; i++) {
				cuerpo += `<tr>
            <td id="detallepreparando${data.pedidos[i].id_pedido}"></td>
			<td><p class="timeres">
			<span id="color-time${data.pedidos[i].id_pedido}" class="badge badge-pill badge-success">
			<span id="tiempoTranscurrido${data.pedidos[i].id_pedido}"></span></span>
			</p></td>
            <td>
			<button type="button" onclick="listo_pedido(${data.pedidos[i].id_pedido})" class="btn btn-outline-success btn-sm">Si</button>
            </td>
            </tr>`;
				idPedido.append("id_pedido", data.pedidos[i].id_pedido);
				fetch(url_get_detalle, {
					method: "POST",
					body: idPedido,
				})
					.then((response) => response.json())
					.then((json) => detalle_aceptar(json))
					.catch((err) => console.log(err));

				const detalle_aceptar = (json) => {
					let detalles = "";
					for (let i = 0; i < json.detalle.length; i++) {
						if (json.detalle[i].comentario != null) {
							detalles += `
                            <p class="font-weight-bold">${json.detalle[i].cantidad} - ${json.detalle[i].nombre}</p>
                            <span>${json.detalle[i].comentario}</span>
                            `;
						} else {
							detalles += `
                            <p class="ml-4">${json.detalle[i].cantidad} - ${json.detalle[i].nombres}</p>
                            `;
						}
						document.getElementById(
							`detallepreparando${json.detalle[i].id_pedido}`
						).innerHTML = detalles;
					}
				};
			}
		}
		document.getElementById("table-preparando").innerHTML = cuerpo;
		tiempo();
	};
}

function listo_pedido(id_pedido) {
	$.ajax({
		url: appData.base_url + "Dasboard/btn_listo",
		dataType: "json",
		type: "post",
		data: {
			id_pedido: id_pedido,
		},
		success: function (data) {
			if (data.res) {
				//alert(data.mes);
				repartidor = data.id_repartidor;
				id_ped = id_pedido;
				mensajessss(repartidor, id_ped);
				$("#table-preparando").empty();
				$("#table-espera").empty();
				$("#contidadpreparando").empty();
				setTimeout(function () {
					get_table1();
					get_table2();
				}, 500);
			} else {
				alert("Error: " + data.mes);
			}
		},
		error: function () {
			alert("Error de Ajax");
		},
	});
}

function refrescar_preparando() {
	$("#table-preparando").empty();
	$("#contidadpreparando").empty();
	get_table1();
}

async function postData(url = "", formdata) {
	// Default options are marked with *
	const response = await fetch(url, {
		method: "POST", // *GET, POST, PUT, DELETE, etc.
		body: formdata, // body data type must match "Content-Type" header
	});
	return response.json(); // parses JSON response into native JavaScript objects
}

function tiempo() {
	fetch(appData.base_url + "Dasboard/enpreparacion")
		.then((response) => response.json())
		.then((data) => datos(data))
		.then((error) => console.log(error));

	const datos = (data) => {
		if (data.res) {
			for (let i = 0; i < data.pedidos.length; i++) {
				let datsos = new FormData();
				datsos.append("id_pedido", data.pedidos[i].id_pedido);
				datsos.append("id_carrito", data.pedidos[i].id_carrito);
				postData(appData.base_url + "Dasboard/contador", datsos).then((data) =>
					cambio(data)
				);
				const cambio = (data) => {
					document.getElementById(
						`tiempoTranscurrido${data.id_pedido}`
					).innerHTML = data.tiempo;
					//console.log(data.asignado[0].tiempo);
					let tiempo_asignado = data.asignado[0].tiempo;
					//console.log(tiempo_asignado);
					//console.log(data.tiempo);
					if (data.tiempo >= tiempo_asignado) {
						$(`#color-time${data.id_pedido}`).addClass("badge-danger");
						$(`#color-time${data.id_pedido}`).removeClass("badge-success");
					}
				};
			}
			setTimeout(function () {
				tiempo();
			}, 10000);	
		}
	};
}


function mensajessss(id_rep, id_ped) {
	let mesaje = "";
	let numero = "";
	let tipo = "repartidor";
	let id_repartidor = id_rep;
	let id_pedido = id_ped;
	let nom_resta = "";

	$.ajax({
		url: appData.base_url + "Dasboard/numero_repartidor",
		dataType: "json",
		type: "post",
		data: {
			repartidor: id_repartidor,
		},
	})
		.done(function (data) {
			if (data.res) {
				numero = data.telefono;
				nom_resta = appData.nom;
				console.log(nom_resta);
				$.ajax({
					url: appData.base_url + "Dasboard/mesajepedido",
					dataType: "json",
					type: "post",
					data: {
						pedido: id_pedido,
					},
				})
					.done(function (data) {
						console.log("respode bine");
						$.each(data.detalles, function (i, d) {
							console.log("ingrese al each");
							if (d.metodo == "efectivo") {
								mesaje =
									"Tienes un nuevo pedido \nID: " +
									id_ped +
									". \nRestaurante: " +
									`${nom_resta}` +
									"\nMesa: " +
									d.nombre +
									"\nUbicada en: " +
									d.descripcion +
									". \nPago con " +
									d.metodo +
									"\nLa cantidad de: $" +
									d.total +
									". \nPagará con $" +
									d.cambio +
									". \nFavor de llevar el cambio requerido.";
							} else if (d.metodo != "efectivo") {
								mesaje =
									"Tienes un nuevo pedido \nID: " +
									id_ped +
									". \nRestaurante: " +
									nom_resta +
									"\nMesa: " +
									d.nombre +
									"\nUbicada en: " +
									d.descripcion +
									". \nPaga con " +
									d.metodo +
									"\nLa cantidad de: " +
									d.total +
									".";
							}
							console.log(mesaje);
							$.ajax({
								url: appData.base_url + "MensajesW/sendTextMessage",
								dataType: "json",
								type: "post",
								data: {
									numero: numero,
									mensaje: mesaje,
									tipo: tipo,
								},
							})
								.done(function (response) {
									if (response.res) {
										alert(response.msg);
									}
								})
								.fail();
						});
					})
					.fail();
			} else {
				console.log("el id del repartidor no existe");
			}
		})
		.fail();
}
