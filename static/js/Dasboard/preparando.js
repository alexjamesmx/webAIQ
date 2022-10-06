//enpreparacion

var cronometro;
// solo por acetar

$(document).ready(function () {
	get_table1();
	tiempo();
});

function get_table1() {
	$.ajax({
		url: appData.base_url + "Dasboard/enpreparacion",
		dataType: "json",
		type: "post",
	})
		.done(function (data) {
			//alert(JSON.stringify(data))
			tiempo();
			$("#contidadpreparando").html(data.cantidad);
			if (data.res) {
				$.each(data.pedidos, function (i, p) {
					id = p.id_pedido;
					$("#table-preparando").append(
						"<tr>" +
							'<td id="detallepreparando' +
							id +
							'">' +
							"</td>" +
							'<td class="text-center mx-2">' +
							'<p class="text-muted timeres">' +
							'<span id="color-time" class="badge badge-pill badge-success"> <span id="tiempoTranscurrido' +
							id +
							'"></span> </span>' +
							"</p>" +
							"</td>" +
							'<td class="text-center mx-2">' +
							'<p class="list-item-heading">2022-' +
							id +
							"</p>" +
							"</td>" +
							'<td class="text-center my-auto">' +
							"<p>" +
							'<a href="#" onclick="listo_pedido(' +
							id +
							')" class="btn btn-outline-success restaricon">' +
							'<i class="iconsminds-chef-hat"></i>Si</a>' +
							"</p>" +
							"</td>" +
							"</tr>"
					);
					$.ajax({
						url: appData.base_url + "Dasboard/detalle_pedido",
						dataType: "json",
						type: "post",
						data: {
							id_pedido: id,
						},
					})
						.done(function (response) {
							//alert(JSON.stringify(response))
							$.each(response.detalle, function (i, d) {
								if (d.comentario != null) {
									$("#detallepreparando" + d.id_pedido).append(
										'<p class="ml-3">' +
											d.cantidad +
											" ----- " +
											d.nombre +
											"</p>" +
											'<span class=" text-muted ml-4">' +
											d.comentario +
											"</span>"
									);
								} else {
									$("#detallepreparando" + d.id_pedido).append(
										'<p class="ml-3">' +
											d.cantidad +
											" ----- " +
											d.nombre +
											"</p>"
									);
								}
							});
						})
						.fail();
				});
			}
		})
		.fail();
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

function tiempo() {
	$.ajax({
		url: appData.base_url + "Dasboard/enpreparacion",
		dataType: "json",
		type: "post",
	})
		.done(function (data) {
			if (data.res) {
				//alert(JSON.stringify(data))
				$.each(data.pedidos, function (i, p) {
					id = p.id_pedido;
					id_carrito = p.id_carrito;
					$.ajax({
						url: appData.base_url + "Dasboard/contador",
						dataType: "json",
						type: "post",
						data: {
							id_pedido: id,
							id_carrito: id_carrito,
						},
					})
						.done(function (response) {
							//alert(JSON.stringify(response))
							var tiempo_asignado = 0;
							$("#tiempoTranscurrido" + response.id_pedido).html(
								response.tiempo
							);
							$.each(response.asignado, function (i, p) {
								tiempo_asignado = p.tiempo;
							});
							if (response.minutos >= tiempo_asignado) {
								$("#color-time").addClass("badge-danger");
								$("#color-time").removeClass("badge-success");
							}
							setTimeout(function () {
								tiempo();
							}, 10000);
						})
						.fail();
				});
			}
		})
		.fail();
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
									"Tienes una nueva entrega por realizar\nID: " +
									id_ped +
									". \nRestaurante: " +
									nom_resta +
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
									"Tienes una nueva entrega por realizar\nID: " +
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
