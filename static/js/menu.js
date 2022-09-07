var id_res = "",
	nombre = "",
	precio = "",
	tiempo = "",
	tipo = "",
	descripcion = ""
	imagen = "";

	function handleModal(e) {
		let action = $(e).data("action");
		console.log(action);
	
		if (action == "agregar") {
			$("#nombre").attr("placeholder", "Ej. Torta");
			$("#precio").attr("placeholder", "Ej. 13.00");
			$("#tiempo").attr("placeholder", "Ej. 15:00 (min)");
			$("#tiempo").attr("placeholder", "Ej. 15:00 (min)");
			$("#restaurant").on("input", (e) => {
				restaurant = e.target.value;
			});
			$("#email").on("input", (e) => {
				email = e.target.value;
			});
			$("#phone").on("input", (e) => {
				phone = e.target.value;
			});
	
			$("#");
		}
	}

$("#agregar_platillo").on("submit", function (e) {
	e.preventDefault();
	console.log("hove");
	if (condition) {
		
	}
	$.ajax({
		url: appData.base_url + "Menu/add",
		dataType: "json",
		type: "POST",
		data: {
			id_res: $("#id").val(),
			nombre: $("#nombre").val(),
			precio: $("#precio").val(),
			tiempo: $("#tiempo").val(),
			tipo: $("#tipo").val(),
			descripcion: $("#descripcion").val()
		},
	})
	.done(() => {
		message("success","Listo", "se agrego platillo");
	})
	.fail(() => {
		message("danger","Error", "Hubo un problema con la petición")
	});
}); 