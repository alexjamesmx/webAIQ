function validateForm_anuncios(action) {
	const form = document.getElementById("modal-form-anuncios");
	const inicio_anuncio = form.elements[0].value;
	const finanuncio = form.elements[1].value;

	if (action === "Agregar") {
		console.log(form);
		$("#imagen_anuncios").on("input", () => {
			if ($("#imagen_anuncios-anuncio").val() == "") {
				$(".imagen_anuncios").text("Este campo es requerido");
			}
		});
	}
	if (inicio_anuncio != "" && finanuncio != "") {
		return true;
	} else {
		return false;
	}
}
$("#inicio-anuncio").on("input", () => {
	if ($("#inicio_anuncio").val() == "") {
		$(".inicio_anuncio").text("Este campo es requerido");
	}
});
$("#inicio-anuncio").on("input", () => {
	if ($("#inicio-anuncio").val() == "") {
		$(".inicio_anuncio").text("Este campo es requerido");
	}
	if (
		$("#phone_repartidor").val() != "" &&
		isLetter($("#phone_repartidor").val())
	) {
		$(".phone_repartidor").text("Debe contener sólo numeros");
	}
});
