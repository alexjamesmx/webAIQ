function validateForm() {
	const form = document.getElementById("modal-form-restaurantes");

	let nombre = form.elements[0].value;
	let password = form.elements[1].value;
	let email = form.elements[2].value;
	let phone = form.elements[3].value;

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
$("#nombre").on("input", () => {
	if ($("#nombre").val() == "") {
		$(".nombre").text("Este campo es requerido");
	}
});
$("#password").on("input", () => {
	if ($("#password").val() == "") {
		$(".password").text("Este campo es requerido");
	}
});
$("#email").on("input", () => {
	if ($("#email").val() != "" && !validateEmail($("#email").val())) {
		$(".email").text("El formato es incorrecto");
		$(".nombre").text("Este campo es requerido");
	}
	if ($("#email").val() == "") {
		$(".email").text("Este campo es requerido");
	}
});
$("#phone").on("input", () => {
	if ($("#phone").val() == "") {
		$(".phone").text("Este campo es requerido");
	}
	if ($("#phone").val() != "" && isLetter($("#phone").val())) {
		$(".phone").text("Debe contener sólo numeros");
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
