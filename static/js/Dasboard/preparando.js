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
					$.ajax({
						url: appData.base_url + "Dasboard/contador",
						dataType: "json",
						type: "post",
						data: {
							id_pedido: id,
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
