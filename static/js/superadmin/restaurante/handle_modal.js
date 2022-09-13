function handleModal(e) {
	$("#nombre").attr("placeholder", "");
	$("#password").attr("placeholder", "");
	$("#email").attr("placeholder", "");
	$("#phone").attr("placeholder", "");
	$("#nombre").val("");
	$("#password").val("");
	$("#email").val("");
	$("#phone").val("");
	//INVALID FEEDBACK
	$(".nombre").text(null);
	$(".email").text(null);
	$(".password").text(null);
	$(".phone").text(null);

	action = $(e).data("action");
	$("#modal-form").data("action", action);
	if (action == "Agregar") {
		$("#nombre").attr("placeholder", "Nombre del restaurante");
		$("#password").attr("placeholder", "Contraseña");
		$("#email").attr("placeholder", "Correo electrónico");
		$("#phone").attr("placeholder", "Teléfono");
	} else if (action == "Editar") {
		let id_user = $(e).attr("data-id");
		let nombre = $(e).attr("data-nombre");
		let password = $(e).attr("data-password");
		let email = $(e).attr("data-email");
		let phone = $(e).attr("data-phone");
		$("#nombre").attr("placeholder", nombre);
		$("#password").attr("placeholder", password);
		$("#email").attr("placeholder", email);
		$("#phone").attr("placeholder", phone);
		$("#nombre").val(nombre);
		$("#password").val(password);
		$("#email").val(email);
		$("#phone").val(phone);
		$("#id_user").val(id_user);
	}
}
