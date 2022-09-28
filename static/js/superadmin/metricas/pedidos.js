var countries,
	chart,
	month = new Date().getMonth() + 1,
	year = new Date().getFullYear();
const monthArray = [
		year + "-01-10",
		year + "-02-10",
		year + "-03-10",
		year + "-04-10",
		year + "-05-10",
		year + "-06-10",
		year + "-07-10",
		year + "-08-10",
		year + "-09-10",
		year + "-10-10",
		year + "-11-10",
		year + "-12-10",
	],
	monthNames = [
		"Enero",
		"Febrero",
		"Marzo",
		"Abril",
		"Mayo",
		"Junio",
		"Julio",
		"Agosto",
		"Septiembre",
		"Octubre",
		"Noviembre",
		"Diciembre",
	];

//WHEN DOCUMENT IS READY
$(function () {
	$("#datePicker").hide();
	$("#selected-category-year").hide();
	document.getElementById("datePicker").valueAsDate = new Date();
	getData();
});

function getData(update = null) {
	//DYNAMIC TITLES
	$("#selected-category-month").val(month);
	$("#selected-category-year").val(year);
	//GET ALL USERS
	return $.ajax({
		url: appData.base_url + "user/getUsers",
		dataType: "json",
	})
		.done((result) => {
			//BUILD ARRAY FOR CHART
			countries = result.data.map(({ nombre, avatar }) => ({
				["name"]: nombre,
				["flag"]: appData.base_url + "static/img/" + avatar,
				["color"]: "#0071CE",
			}));
			//CREATE OR UPDATE CHART
			if (update) build_chart(update);
			else build_chart();
		})
		.fail(() => {
			message("danger", "", "Error: Hubo un problema con la petición");
		});
}

const build_chart = async (update = null) => {
	const dataPrev = {};
	const elem_year = document.getElementById("selected-category-year");
	const elem_month = document.getElementById("selected-category-month");
	const elem_days = document.getElementById("datePicker");

	return new Promise((resolve) => {
		if (!isHidden(elem_year)) {
		}
		if (!isHidden(elem_month)) {
			monthArray.forEach((item, i) => {
				$.ajax({
					type: "post",
					url: appData.base_url + "metricas/pedidos_restaurantes_mes",
					data: {
						mes: item,
					},
					dataType: "json",
				})
					.done((result) => {
						const arr = [];

						Object.keys(result).map((key) => {
							result[key].forEach((item) => {
								item.totalPedidos = Number(item.totalPedidos);
								arr.push([item.Restaurante, item.totalPedidos]);
							});
						});
						dataPrev[i + 1] = arr.sort();

						if (i === monthArray.length - 1) resolve(dataPrev);
					})
					.fail((err) => console.error(err));
			});
		}
		if (!isHidden(elem_days)) {
		}
	})
		.then((d) => {
			const hcTittle =
				"Pedidos totales en " + monthNames[month - 1] + " " + year;

			const data = d;

			var timeout = setInterval(function () {
				console.log(checkIfFinished(data));
				if (checkIfFinished(data)) {
					clearInterval(timeout);
					const getData = (data) =>
						data.map((country, i) => ({
							name: country[0],
							y: country[1],
							color: countries[i].color,
						}));
					if (update) {
						chart.update(
							{
								title: {
									text: hcTittle,
								},
								series: [
									{
										name: monthNames[month - 2],
										data: month != 1 ? data[month - 1] : data[month - 1],
									},
									{
										name: monthNames[month - 1],
										data: getData(data[month]).slice(),
									},
								],
							},
							true,
							false,
							{
								duration: 800,
							}
						);
					} else {
						chart = Highcharts.chart({
							chart: {
								style: {
									fontFamily: "Nunito,sans-serif",
									fontSize: "1.1rem",
								},
								renderTo: container,
								type: "column",
								spacingBottom: 60,
								spacingTop: 40,
								spacingRight: 20,
								spacingLeft: 20,
								borderColor: "#0071CE",
								borderWidth: 2,
								borderRadius: 20,
								shadow: true,
							},
							title: {
								text: hcTittle,
								align: "left",
							},
							subtitle: {
								text: "",
								align: "left",
							},
							plotOptions: {
								series: {
									grouping: false,
									borderWidth: 0,
								},
							},
							legend: {
								enabled: false,
							},
							tooltip: {
								shared: true,
								headerFormat:
									'<span style="font-size: 15px">{point.point.name}</span><br/>',
								pointFormat:
									'<span style="color:{point.color}">\u25CF</span> {series.name}: <b>{point.y} pedidos</b><br/>',
							},
							xAxis: {
								type: "category",
								accessibility: {
									description: "Restaurantes",
								},
								max: countries.length - 1,
								labels: {
									useHTML: true,
									animate: true,
									formatter: (ctx) => {
										let name, flag;
										countries.forEach(function (country) {
											if (country.name === ctx.value) {
												name = country.name;
												flag = country.flag;
											}
										});
										return `${name}<br><img src="${flag}" alt="Nature" class="responsiveImg">`;
									},
									style: {
										textAlign: "center",
									},
								},
							},
							yAxis: [
								{
									tickInterval: 1,
									gridLineWidth: 1,
									title: {
										text: "Pedidos",
									},
									showFirstLabel: false,
								},
							],
							series: [
								{
									color: "rgb(158, 159, 163)",
									// pointPlacement: -0.2,
									linkedTo: "main",
									data: month != 1 ? data[month - 1] : data[month - 1],
									name: monthNames[month - 2],
								},
								{
									name: monthNames[month - 1],
									id: "main",
									dataSorting: {
										enabled: true,
										matchByName: true,
									},
									dataLabels: [
										{
											enabled: true,
											inside: true,
											style: {
												fontSize: "16px",
											},
										},
									],
									data: getData(data[month]).slice(),
								},
							],
							exporting: {
								allowHTML: true,
							},
						});
					}
				}
			}, 100);
		})
		.catch((err) => console.log(err));
};

function checkIfFinished(arr) {
	return Object.keys(arr).length == "12";
}

$("#selected-category").on("change", function (e) {
	const o = $("#selected-category option:selected").index();

	if (o == "1 ") {
		$("#datePicker").hide();
		$("#selected-category-month").hide();
		$("#selected-category-year").show();
		hcTittle = "Pedidos totales en " + monthNames[month];
	} else if (o == "2") {
		$("#datePicker").hide();
		$("#selected-category-year").hide();
		$("#selected-category-month").show();

		hcTittle = "Pedidos totales en " + year;
	} else if (o == "3") {
		$("#selected-category-month").hide();
		$("#selected-category-year").hide();
		$("#datePicker").show();
		hcTittle = "Pedidos totales en dias";
	}
});

$("#selected-category-month").on("change", function (e) {
	const o = document.getElementById("selected-category-month").selectedIndex;
	month = o + 1;
	const update = true;
	getData(update);
});

document
	.getElementById("selected-category-year")
	.addEventListener("focusout", (e) => {
		year = e.target.value;
		getData();
	});

$("#datePicker").on("change", function (e) {
	const date = $("#datePicker").val();
	var d = new Date(date);
	month = d.getMonth() + 1;
	var y = new Date(date);
	year = y.getFullYear();
});

const isHidden = (elem) => {
	const styles = window.getComputedStyle(elem);
	return styles.display === "none" || styles.visibility === "hidden";
};
