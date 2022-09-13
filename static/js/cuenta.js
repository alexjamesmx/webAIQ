function get_user() {
	$.ajax({
		url: appData.base_url + "Cuenta/getCuenta",
		dataType: "json",
		type: "post",
	}).done(function () {
		let nombre = $data("nombre");
		let email = $data("email");
		let password = $data("password");
		let phone = $data("phone");
	});
}
