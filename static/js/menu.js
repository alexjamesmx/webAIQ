var id_user = "",
	nombre = "",
	precio = "",
	tiempo = "",
	tipo = "",
	descripcion = "";
imagen = "";

function handleModal(e) {
	let action = $(e).data("action");
	console.log(action);

	if (action == "agregar") {
		$("#nombre").attr("placeholder", "Ej. Torta");
		$("#precio").attr("placeholder", "Ej. 13.00");
		$("#tiempo").attr("placeholder", "Ej. 15:00 (min)");
		$("#descripcion").attr(
			"placeholder",
			"Ej: torta de salchicha con  jitomate, cebolla, mayoneza"
		);

		id_user = $("#id").val();
		$("#nombre").on("input", (e) => {
			nombre = e.target.value;
		});
		$("#precio").on("input", (e) => {
			precio = e.target.value;
		});

		$("#tiempo").on("input", (e) => {
			tiempo = e.target.value;
		});

		$("#tipo").on("input", (e) => {
			tipo = e.target.value;
		});

		$("#descripcion").on("input", (e) => {
			descripcion = e.target.value;
		});

		$("#imagen").on("input", (e) => {
			imagen = e.target.value;
		});
	}
}

$("#agregar_platillo").on("submit", function (e) {
	e.preventDefault();
	console.log("hove");

	if (
		nombre != "" &&
		precio != "" &&
		tiempo != "" &&
		tipo != "" &&
		descripcion != ""
	) {
		nombre.trim();
		precio.trim();
		tiempo.trim();
		descripcion.trim();

		$.ajax({
			url: appData.base_url + "Menu/add",
			dataType: "json",
			type: "POST",
			data: {
				id_user: id_user,
				nombre: nombre,
				precio: precio,
				tiempo: tiempo,
				tipo: tipo,
				descripcion: descripcion,
				imagen: imagen,
			},
		})
			.done(() => {
				// message("success", "Listo", "se agrego platillo");
				
				$("#agregar_platillo").addClass("d-none");
				$("#form-subir-img").removeClass("d-none");
				console.log("listosssss");
			})
			.fail(() => {
				message("danger", "Error", "Hubo un problema con la petición");
				console.log("eroorrrrr");
			});
	}
});
