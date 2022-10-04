function validateForm_repartidores() {
	const form = document.getElementById("modal-form-repartidores");
	let nombre_repartidor = form.elements[0].value;
	let phone_repartidor = form.elements[1].value;

	if (
		nombre_repartidor != "" &&
		phone_repartidor != "" &&
		!isLetter(phone_repartidor)
	) {
		return true;
	} else {
		return false;
	}
}
$("#nombre_repartidor").on("input", () => {
	if ($("#nombre_repartidor").val() == "") {
		$(".nombre_repartidor").text("Este campo es requerido");
	}
});
$("#phone_repartidor").on("input", () => {
	if ($("#phone_repartidor").val() == "") {
		$(".phone_repartidor").text("Este campo es requerido");
	}
	if (
		$("#phone_repartidor").val() != "" &&
		isLetter($("#phone_repartidor").val())
	) {
		$(".phone_repartidor").text("Debe contener sólo numeros");
	}
});
