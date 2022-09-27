var countries,
	hcTittle = "";

var arrfinal = [];
var month = new Date().getMonth() + 1;
var year = new Date().getFullYear();
var monthArray = [];

const monthNames = [
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

$(function () {
	$("#datePicker").hide();
	$("#selected-category-year").hide();
	document.getElementById("datePicker").valueAsDate = new Date();
	getData();
});

$("#datePicker").on("change", function (e) {
	const date = $("#datePicker").val();
	var d = new Date(date);
	month = d.getMonth() + 1;
	var y = new Date(date);
	year = y.getFullYear();
	getData();
});

function getData() {
	return $.ajax({
		url: appData.base_url + "user/getUsers",
		dataType: "json",
	})
		.done((result) => {
			countries = result.data.map(({ nombre, avatar }) => ({
				["name"]: nombre,
				["flag"]: appData.base_url + "static/img/" + avatar,
				["color"]: "#0071CE",
			}));

			pedidos_fecha();
		})
		.fail(() => {
			message("danger", "", "Error: Hubo un problema con la petición");
		});
}

const pedidos_fecha = () => {
	$("#selected-category-month").val(month);
	$("#selected-category-year").val(year);

	const dataPrev = {};

	const wait = new Promise((resolve, reject) => {
		const isHidden = (elem) => {
			const styles = window.getComputedStyle(elem);
			return styles.display === "none" || styles.visibility === "hidden";
		};
		const elem_year = document.getElementById("selected-category-year");
		const elem_month = document.getElementById("selected-category-month");
		const elem_days = document.getElementById("datePicker");
		if (!isHidden(elem_year)) {
		}
		if (!isHidden(elem_month)) {
			hcTittle = "Pedidos totales en " + monthNames[month - 1] + " " + year;
			monthArray = [
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
			];

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
	});

	wait.then((d) => {
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

				Highcharts.chart({
					chart: {
						renderTo: container,
						type: "column",
						spacingBottom: 50,
						spacingTop: 40,
						spacingRight: 20,
						spacingLeft: 20,
						// backgroundColor: "#",
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
		}, 100);

		// }, 5000);

		// const locations = [
		// 	{
		// 		city: "Tokyo",
		// 		year: 2020,
		// 	},
		// 	{
		// 		city: "Rio",
		// 		year: 2016,
		// 	},
		// 	{
		// 		city: "London",
		// 		year: 2012,
		// 	},
		// 	{
		// 		city: "Beijing",
		// 		year: 2008,
		// 	},
		// 	{
		// 		city: "Athens",
		// 		year: 2004,
		// 	},
		// 	{
		// 		city: "Sydney",
		// 		year: 2000,
		// 	},
		// ];
		// locations.forEach((location) => {
		// 	const btn = document.getElementById(location.year);
		// 	btn.addEventListener("click", () => {
		// 		document
		// 			.querySelectorAll(".buttons button.active")
		// 			.forEach((active) => {
		// 				active.className = "";
		// 			});
		// 		btn.className = "active";
		// 		chart.update(
		// 			{
		// 				title: {
		// 					text:
		// 						"Summer Olympics " +
		// 						location.year +
		// 						" - Top 5 countries by Gold medals",
		// 				},
		// 				subtitle: {
		// 					text:
		// 						"Comparing to results from Summer Olympics " +
		// 						(location.year - 4) +
		// 						' - Source: <a href="https://olympics.com/en/olympic-games/' +
		// 						location.city.toLowerCase() +
		// 						"-" +
		// 						location.year +
		// 						'/medals" target="_blank">Olympics</a>',
		// 				},
		// 				series: [
		// 					{
		// 						name: location.year - 4,
		// 						data: dataPrev[location.year].slice(),
		// 					},
		// 					{
		// 						name: location,
		// 						data: getData(data[location.year]).slice(),
		// 					},
		// 				],
		// 			},
		// 			true,
		// 			false,
		// 			{
		// 				duration: 800,
		// 			}
		// 		);
		// 	});
		// });
	});

	wait.catch((err) => console.log(err));
};

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
	getData();
});

document
	.getElementById("selected-category-year")
	.addEventListener("focusout", (e) => {
		year = e.target.value;
		getData();
	});

function checkIfFinished(arr) {
	return Object.keys(arr).length == "12";
}
