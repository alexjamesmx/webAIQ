var restaurantes,
	chart,
	month = new Date().getMonth() + 1,
	year = new Date().getFullYear(),
	elem_year = document.getElementById("selected-category-year"),
	elem_month = document.getElementById("selected-category-month"),
	elem_days = document.getElementById("datePicker"),
	update = true;
var monthArr = [];

//WHEN DOCUMENT IS READY
$(function () {
	$("#datePicker").hide();
	$("#selected-category-year").hide();
	document.getElementById("datePicker").valueAsDate = new Date();
	getData();
});

function getData(update = null) {
	//DYNAMIC VALUES
	$("#selected-category-month").val(month);
	$("#selected-category-year").val(year);
	//GET ALL RESTAURANTES
	return $.ajax({
		url: appData.base_url + "user/getUsers",
		dataType: "json",
	})
		.done((result) => {
			//BUILD ARRAY FOR CHART
			restaurantes = result.data.map(({ nombre, avatar: logo }) => ({
				["name"]: nombre,
				["logo"]: appData.base_url + "static/img/" + logo,
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
	monthArr = [
		[year + "-01-10", "Enero"],
		[year + "-02-10", "Febrero"],
		[year + "-03-10", "Marzo"],
		[year + "-04-10", "Abril"],
		[year + "-05-10", "Mayo"],
		[year + "-06-10", "Junio"],
		[year + "-07-10", "Julio"],
		[year + "-08-10", "Agosto"],
		[year + "-09-10", "Septiembre"],
		[year + "-10-10", "Octubre"],
		[year + "-11-10", "Noviembre"],
		[year + "-12-10", "Diciembre"],
	];

	const data = {};

	return new Promise((resolve) => {
		if (!isHidden(elem_year)) {
			const arr = [year + "-01-01", year - 1 + "-01-01"];

			arr.forEach((item, i) => {
				$.ajax({
					type: "post",
					url: appData.base_url + "metricas/pedidos_restaurantes_year",
					data: {
						mes: item,
					},
					dataType: "json",
				})
					.done((result) => {
						const arr = [];

						Object.keys(result).forEach((key) => {
							result[key].forEach((item) => {
								item.totalPedidos = Number(item.totalPedidos);
								arr.push(Object.values(item));
							});
						});

						data[year - i] = arr.sort();

						if (i == 1 && data[year - 1].length === restaurantes.length)
							resolve(data);
					})
					.fail((err) => console.error(err));
			});
		}
		if (!isHidden(elem_month)) {
			monthArr.forEach((item, i) => {
				$.ajax({
					type: "post",
					url: appData.base_url + "metricas/pedidos_restaurantes_mes",
					data: {
						mes: item[0],
					},
					dataType: "json",
				})
					.done((result) => {
						const arr = [];

						Object.keys(result).forEach((key) => {
							result[key].forEach((item) => {
								item.totalPedidos = Number(item.totalPedidos);
								arr.push(Object.values(item));
							});
						});
						data[i + 1] = arr.sort();

						if (i === monthArr.length - 1) resolve(data);
					})
					.fail((err) => console.error(err));
			});
		}
		if (!isHidden(elem_days)) {
		}
	})
		.then((data) => {
			if (!isHidden(elem_year)) {
				// const tmp = [year, year - 1];
				const dataPrev = {};

				const timeout = setInterval(() => {
					Object.keys(data).forEach((key, i) => {
						const arr = [];

						if (key == year - 1) {
							data[year - 1].forEach((item) => {
								arr.push(Object.values(item));
							});
						} else {
							data[key - 1].forEach((item) => {
								arr.push(Object.values(item));
							});
						}
						dataPrev[key] = arr.sort();
					});

					if (dataPrev[year].length == restaurantes.length) {
						clearInterval(timeout);

						const hcTittle = "Pedidos totales en " + year;
						const getData = (data) =>
							data.map((restaurante, i) => ({
								name: restaurante[0],
								y: restaurante[1],
								color: restaurantes[i].color,
							}));

						if (update) {
							chart.update(
								{
									title: {
										text: hcTittle,
									},
									series: [
										{
											pointPlacement: year == year - 1 ? 0 : -0.2,
											name: year,
											data: dataPrev[year].slice(),
										},
										{
											name: year,
											data: getData(data[year]).slice(),
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
									style: {
										fontFamily: "Nunito,sans-serif",
										fontSize: "1.1rem",
									},
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
									max: restaurantes.length - 1,
									labels: {
										useHTML: true,
										animate: true,
										formatter: (ctx) => {
											let name, logo;
											restaurantes.forEach(function (restaurante) {
												if (restaurante.name === ctx.value) {
													name = restaurante.name;
													logo = restaurante.logo;
												}
											});
											return `${name}<br><img src="${logo}" class="responsiveImg">`;
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
											text: "No. pedidos",
										},
										showFirstLabel: false,
									},
								],
								series: [
									{
										color: "rgb(158, 159, 163)",
										pointPlacement: month == 1 ? 0 : -0.2,
										linkedTo: "main",
										data: dataPrev[month].slice(),
										name: month == 1 ? monthArr[0][1] : monthArr[month - 2][1],
									},
									{
										name: monthArr[month - 1][1],
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
				});
			}

			if (!isHidden(elem_month)) {
				const timeout = setInterval(function () {
					if (checkIfFinished(data)) {
						clearInterval(timeout);
						const dataPrev = {};

						Object.keys(data).forEach((key, i) => {
							const arr = [];

							if (key == 1) {
								data[key].forEach((item) => {
									arr.push(Object.values(item));
								});
							} else {
								data[i].forEach((item) => {
									arr.push(Object.values(item));
								});
							}

							dataPrev[i + 1] = arr.sort();

							// tmp++;
						});

						const hcTittle =
							"Pedidos totales en " + monthArr[month - 1][1] + " " + year;
						const getData = (data) =>
							data.map((restaurante, i) => ({
								name: restaurante[0],
								y: restaurante[1],
								color: restaurantes[i].color,
							}));
						if (update) {
							chart.update(
								{
									title: {
										text: hcTittle,
									},
									series: [
										{
											pointPlacement: month == 1 ? 0 : -0.2,
											name:
												month == 1 ? monthArr[0][1] : monthArr[month - 2][1],
											data: dataPrev[month].slice(),
										},
										{
											name:
												month == 1 ? monthArr[0][1] : monthArr[month - 1][1],
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
									style: {
										fontFamily: "Nunito,sans-serif",
										fontSize: "1.1rem",
									},
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
									max: restaurantes.length - 1,
									labels: {
										useHTML: true,
										animate: true,
										formatter: (ctx) => {
											let name, logo;
											restaurantes.forEach(function (restaurante) {
												if (restaurante.name === ctx.value) {
													name = restaurante.name;
													logo = restaurante.logo;
												}
											});
											return `${name}<br><img src="${logo}" class="responsiveImg">`;
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
											text: "No. pedidos",
										},
										showFirstLabel: false,
									},
								],
								series: [
									{
										color: "rgb(158, 159, 163)",
										pointPlacement: month == 1 ? 0 : -0.2,
										linkedTo: "main",
										data: dataPrev[month].slice(),
										name: month == 1 ? monthArr[0][1] : monthArr[month - 2][1],
									},
									{
										name: monthArr[month - 1][1],
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
			}
		})
		.catch((e) => console.log(e));
};

$("#selected-category").on("change", function (e) {
	const o = $("#selected-category option:selected").index();

	if (o == "1 ") {
		$("#datePicker").hide();
		$("#selected-category-month").hide();
		$("#selected-category-year").show();
		hcTittle = "Pedidos totales en " + monthArr[month];
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
	getData(update);
});

document
	.getElementById("selected-category-year")
	.addEventListener("focusout", (e) => {
		year = e.target.value;
		getData(update);
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

const checkIfFinished = (arr) => {
	return Object.keys(arr).length == "12";
};
