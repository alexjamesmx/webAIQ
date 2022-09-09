function handleStatus(id_user, e, nombre) {
	let status = $(e).data("status");
	if (status) {
		$("#id_user").removeClass("slider");
		$("#id_user").addClass("sliderdis");
	} else {
		$("#id_user").removeClass("sliderdis");
		$("#id_user").addClass("slider");
	}
	$.ajax({
		type: "POST",
		dataType: "json",
		url: appData.base_url + "user/updateUserStatus",
		data: {
			id_user,
			status,
		},
	}).done(function (result) {
		if (result.res) {
			let available = result.data[0].status;

			$(e).data("status", available);
			if (available == "1") {
				message("info", "", nombre + " habilitado");
			} else if (available == "0") {
				message("info", "", nombre + " deshabilitado");
			}
		} else {
			message("danger", "Error", result.message);
		}
	});
}
