function validateForm_anuncios(action) {
	const form = document.getElementById("modal-form-anuncios");

	if (action === "Agregar") {
		const imagen_input = form.elements[0].value;
		const inicio_anuncio = form.elements[1].value;
		const fin_anuncio = form.elements[2].value;
		if (imagen_input != "") {
			$(".imagen_input").text("Este campo es requerido");
		}
		if (inicio_anuncio != "" && fin_anuncio != "" && imagen_input != "") {
			return true;
		} else {
			return false;
		}
	}
	if (action === "Editar") {
		const inicio_anuncio = form.elements[0].value;
		const fin_anuncio = form.elements[1].value;

		if (inicio_anuncio != "" && fin_anuncio != "") {
			return true;
		} else {
			return false;
		}
	}
}
$("#inicio-anuncio").on("input", () => {
	if ($("#inicio_anuncio").val() == "") {
		$(".inicio_anuncio").text("Este campo es requerido");
	}
});
$("#fin-anuncio").on("input", () => {
	if ($("#fin-anuncio").val() == "") {
		$(".fin").text("Este campo es requerido");
	}
	if (
		$("#phone_repartidor").val() != "" &&
		isLetter($("#phone_repartidor").val())
	) {
		$(".phone_repartidor").text("Debe contener sólo numeros");
	}
});

$("#imagen_input").on("input", () => {
	if ($("#imagen_input").val() == "") {
		$(".imagen_input").text("Este campo es requerido");
	}
});
