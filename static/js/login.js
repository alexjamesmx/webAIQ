$(function () {
	$("#message").hide();
});

const hanldeLogin = (e) => {
	e.preventDefault();
	const form = new FormData(e.target);
	const email = form.get("email").replace(/\s+/g, "");
	const password = form.get("password").replace(/\s+/g, "");
	$.ajax({
		url: appData.base_url + "/user/existsUser/",
		dataType: "json",
		type: "post",
		data: {
			email: email,
			password: password,
		},
	})
		.done((result) => {
			if (result.res) {
				window.location.replace(appData.base_url + "home");
			} else {
				message("danger", "Error: ", result.message);
			}
		})
		.fail(() => {
			message("danger", "Error: Hubo un problema con la petición");
		});
};

const handleSignout = () => {
	$.ajax({
		url: appData.base_url + "/user/signout/",
	})
		.done(() => {
			window.location.replace(appData.base_url);
		})
		.fail(() => {
			message("danger", "", "Error: Hubo un problema con la petición");
		});
};
