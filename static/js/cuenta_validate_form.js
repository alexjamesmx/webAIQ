function validateForm() {
	const form = document.getElementById("modal-form-cuenta");

	const nombre = form.elements[0].value;
	const password = form.elements[1].value;
	const email = form.elements[2].value;
	const phone = form.elements[3].value;

	if (
		nombre != "" &&
		email != "" &&
		phone != "" &&
		!isLetter(phone) &&
		validateEmail(email) &&
		password != ""
	) {
		return true;
	} else {
		return false;
	}
}

$("#cuenta_nombre").on("input", (e) => {
	if ($("#cuenta_nombre").val() == "") {
		$(".cuenta_nombre").text("Este campo es requerido");
	}
});
$("#cuenta_password").on("input", (e) => {
	if ($("#cuenta_password").val() == "") {
		$(".cuenta_password").text("Este campo es requerido");
	}
});
$("#cuenta_email").on("input", (e) => {
	if (
		$("#cuenta_email").val() != "" &&
		!validateEmail($("#cuenta_email").val())
	) {
		$(".cuenta_email").text("El formato es incorrecto");
	}
	if ($("#cuenta_email").val() == "") {
		$(".cuenta_email").text("Este campo es requerido");
	}
});
$("#cuenta_phone").on("input", (e) => {
	if ($("#cuenta_phone").val() == "") {
		$(".cuenta_phone").text("Este campo es requerido");
	}
	if ($("#cuenta_phone").val() != "" && isLetter($("#cuenta_phone").val())) {
		$(".cuenta_phone").text("Debe contener sólo numeros");
	}
});

function validateEmail(email) {
	return email.match(
		/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
	);
}
function isLetter(str) {
	return str.match(/[a-z]/i);
}
