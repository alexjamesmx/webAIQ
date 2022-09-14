function handleModal_restaurantes(e) {
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
	if (action == "Agregar") {
		$("#modal-actions-title-restaurantes").text("Agregar Restaurante");
		$("#nombre").attr("placeholder", "Nombre del restaurante");
		$("#password").attr("placeholder", "Contraseña");
		$("#email").attr("placeholder", "Correo electrónico");
		$("#phone").attr("placeholder", "Teléfono");
		$("#modal-actions-restaurantes").data("action", "Agregar");
	} else if (action == "Editar") {
		let id_user = $(e).attr("data-id");
		let nombre = $(e).attr("data-nombre");
		let password = $(e).attr("data-password");
		let email = $(e).attr("data-email");
		let phone = $(e).attr("data-phone");
		$("#modal-actions-title-restaurantes").html("Editar <b>" + nombre + "</b>");
		$("#nombre").attr("placeholder", nombre);
		$("#password").attr("placeholder", "Contraseña");
		$("#email").attr("placeholder", email);
		$("#phone").attr("placeholder", phone);
		$("#nombre").val(nombre);
		$("#password").val(password);
		$("#email").val(email);
		$("#phone").val(phone);
		$("#id_user").val(id_user);
		$("#modal-actions-restaurantes").data("action", "Editar");
	}
}

function handleModalDelete_restaurantes(e) {
	let id_user = $(e).data("id");
	let nombre = $("#" + id_user + "_nombre").text();
	$("#modal-delete-title-restaurantes").html(
		`¿Estás seguro de eliminar a <b>${nombre}</b>?`
	);
	$("#modal-delete-text-restaurantes").html(`Eliminar a ${nombre}`);

	$("button[name='delete']").click(function () {
		$.ajax({
			type: "post",
			url: appData.base_url + "user/deleteUser",
			data: { id_user },
			dataType: "json",
			success: function (response) {
				if (response.res) {
					message("info", "", nombre + response.message);
					$("#" + id_user + "_registro").remove();
				} else {
					message("danger", "", nombre + response.message);
				}
			},
			error: function (XMLHttpRequest, textStatus, errorThrown) {
				message("Estado: ", "", textStatus);
				message("Error: ", "", errorThrown);
			},
		});
	});
}
