function validateForm_mesas() {
	const form = document.getElementById("modal-form-mesas");
	let nombre_mesa = form.elements[0].value;
	let descripcion = form.elements[1].value;
	let password = form.elements[2].value;
	if (nombre_mesa != "" && descripcion != "" && password != "") {
		return true;
	} else {
		return false;
	}
}
$("#descripcion_mesas").on("input", () => {
	if ($("#descripcion_mesas").val() == "") {
		$(".descripcion_mesas").text("Este campo es requerido");
	}
});
$("#password_mesas").on("input", () => {
	if ($("#password_mesas").val() == "") {
		$(".password_mesas").text("Este campo es requerido");
	}
});
$("#nombre_mesa").on("input", () => {
	if ($("#nombre_mesa").val() == "") {
		$(".nombre_mesa").text("Este campo es requerido");
	}
});
