$(function () {
	if ($(".alerta").length) {
		setTimeout(() => {
			$(".alerta").alert("close");
		}, 10000);
	}
});

function message(type, boldText, text) {
	if (!$(".alerta").length) {
		$(".message").append(`
        <div data-dismiss="alert" aria-label="Close"class="alert alert-${type} alerta alert-dismissible fade show mt-3 alertaAIQ" role="alert"data-bs-dismiss="alert" aria-label="Close"><strong>${boldText}</strong>${text}</div>`);
		console.log(`${boldText} ${text}`);
		setTimeout(() => {
			$(".alerta").alert("close");
		}, 3000);
	} else {
		$(".alerta").remove();
		$(".message").append(`
        <div data-dismiss="alert" aria-label="Close"class="alert alert-${type} alerta alert-dismissible fade show mt-3 alertaAIQ" role="alert"data-bs-dismiss="alert" aria-label="Close"><strong>${boldText}</strong>${text}</div>`);
		console.log(`${boldText} ${text}`);
	}
}
