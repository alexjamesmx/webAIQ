var restaurant, email, phone;

function handleModal(e) {
	let action = $(e).data("action");
	console.log(action);

	if (action == "agregar") {
		$("#restaurant").attr("placeholder", "Nombre del restaurante");
		$("#email").attr("placeholder", "Correo electrónico");
		$("#phone").attr("placeholder", "Teléfono");
		$("#restaurant").on("input", (e) => {
			restaurant = e.target.value;
		});
		$("#email").on("input", (e) => {
			email = e.target.value;
		});
		$("#phone").on("input", (e) => {
			phone = e.target.value;
		});

		$("#");
	}
}

function handleModalSubmit(e) {
	e.preventDefault();
	alert("quee");
}
