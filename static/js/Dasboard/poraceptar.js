// solo por acetar
let viejo = 0;
let nuevo = 0;
let url_get_poraceptar = appData.base_url + "Dasboard/poraceptar";
let url_get_detalle = appData.base_url + "Dasboard/detalle_pedido";
let idPedido = new FormData();

$(document).ready(function () {
	$.ajax({
		url: appData.base_url + "Dasboard/poraceptar_cantidad",
		dataType: "json",
		type: "post",
	})
		.done(function (data) {
			viejo = data.cantidad;
			console.log(viejo);
			cantidad();
		})
		.fail();
	get_table();
});

let rechazados = 0;

function get_table() {
	fetch(url_get_poraceptar)
		.then((response) => response.json())
		.then((data) => tabla_aceptar(data))
		.then((error) => console.log(error));

	const tabla_aceptar = (data) => {
		//console.log(data.cantidad);
		//console.log(data.pedidos);
		let cuerpo = "";
		if (data.pedidos == null) {
			cuerpo = `<td colspan="3" >No tienes pedidos pendientes</td>`;
		} else {
			document.getElementById("contidadporacetpar").innerHTML = data.cantidad;
			for (let i = 0; i < data.pedidos.length; i++) {
				cuerpo += `<tr>
            <td>${data.pedidos[i].id_pedido}</td>
            <td id="detalleporaceptar${data.pedidos[i].id_pedido}">detalle</td>
            <td>
            <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                <button type="button" onclick="aceptar_pedido(${data.pedidos[i].id_pedido})" class="btn btn-outline-success">
					<i class="simple-icon-check"></i>
				</button>
                <button type="button" onclick="declinar_pedido(${data.pedidos[i].id_pedido})" class="btn btn-outline-danger">
					<i class="simple-icon-close"></i>
				</button>
            </div>
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
							`detalleporaceptar${json.detalle[i].id_pedido}`
						).innerHTML = detalles;
					}
				};
			}
		}
		document.getElementById("table-poraceptar").innerHTML = cuerpo;
	};
}

function aceptar_pedido(id_pedido) {
	//alert('Aceptar pedido ' + id_pedido)
	$.ajax({
		url: appData.base_url + "Dasboard/btn_aceptar",
		dataType: "json",
		type: "post",
		data: {
			id_pedido: id_pedido,
		},
	})
		.done(function (data) {
			//alert(JSON.stringify(data))
			$("#table-poraceptar").empty();
			$("#table-preparando").empty();
			$("#contidadporacetpar").empty();
			setTimeout(function () {
				get_table();
				get_table1();
				viejo = --viejo;
				rechazados = 0;
			}, 500);
		})
		.fail();
}

function declinar_pedido(id_pedido) {
	//alert('declinar pedido ' + id_pedido)
	$.ajax({
		url: appData.base_url + "Dasboard/btn_declinar",
		dataType: "json",
		type: "post",
		data: {
			id_pedido: id_pedido,
		},
	})
		.done(function (data) {
			//alert(JSON.stringify(data))
			$("#table-poraceptar").empty();
			$("#contidadporacetpar").empty();
			setTimeout(function () {
				get_table();
				viejo = --viejo;
				rechazados = ++rechazados;
				console.log(rechazados);
				if (rechazados == 3) {
					alert(
						"Has declinado 3 pedidos, tu restaurante estara Fuera de Linea"
					);
					$("#icon-estado").click();
				}
			}, 500);
		})
		.fail();
}

function beep(volume) {
	return new Promise((resolve, reject) => {
		volume = volume || 100;

		try {
			// You're in charge of providing a valid AudioFile that can be reached by your web app
			let soundSource = "https://www.w3schools.com/html/horse.mp3";
			let sound = new Audio(soundSource);

			// Set volume
			sound.volume = volume / 100;

			sound.onended = () => {
				resolve();
			};

			sound.play();
		} catch (error) {
			reject(error);
		}
	});
}

function cantidad() {
	$.ajax({
		url: appData.base_url + "Dasboard/poraceptar_cantidad",
		dataType: "json",
		type: "post",
	})
		.done(function (data) {
			nuevo = data.cantidad;
			console.log(nuevo);
			if (viejo < nuevo) {
				console.log(viejo);
				beep(100);
				viejo = ++viejo;
				$("#table-poraceptar").empty();
				get_table();
			}

			setTimeout(() => {
				cantidad();
			}, 5000);
		})
		.fail();
}

function refrescar_aceptar() {
	$("#table-poraceptar").empty();
	$("#contidadporacetpar").empty();
	get_table();
}
