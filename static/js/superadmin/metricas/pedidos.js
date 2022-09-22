$(function () {
	document.getElementById("datePicker").valueAsDate = new Date();
	let date = $("#datePicker").val();
	pedidos_fecha(date);
});
$("#datePicker").on("change", function (e) {
	const date = $("#datePicker").val();
	pedidos_fecha(date);
});

const pedidos_fecha = (date) => {
	$.ajax({
		type: "post",
		url: appData.base_url + "metricas/pedidos_restaurantes_mes",
		data: {
			mes: date,
		},
		dataType: "json",
	})
		.done((res) => {
			const countries = res.map(({ Restaurante }) => ({
				["name"]: Restaurante,
				["flag"]: "us",
				["color"]: "rgb(215, 0, 38)",
			}));

			const month = [
				"enero",
				"febrero",
				"marzo",
				"abril",
				"mayo",
				"junio",
				"julio",
				"agosto",
				"septiembre",
				"octubre",
				"noviembre",
				"diciembre",
			];

			const monthnum = [
				"2022-01-01",
				"2022-02-01",
				"2022-03-01",
				"2022-04-01",
				"2022-05-01",
				"2022-06-01",
				"2022-07-01",
				"2022-08-01",
				"2022-09-01",
				"2022-10-01",
				"2022-11-01",
				"2022-12-01",
			];

			let dataPrev = {};

			var wait = new Promise((resolve, reject) => {
				monthnum.forEach((item, i) => {
					$.ajax({
						type: "post",
						url: appData.base_url + "metricas/pedidos_restaurantes_mes",
						data: {
							mes: item,
						},
						dataType: "json",
					})
						.done((res) => {
							const arr = [];
							res.forEach((item) => {
								arr.push(Object.values(item));
							});

							dataPrev[i + 1] = arr;

							// console.log(Object.entries(res));

							if (i === monthnum.length - 1) resolve();
						})
						.fail((err) => console.error(err));
				});
			});

			wait.then(() => {
				console.log("RES", dataPrev);
			});

			dataPrev2 = {
				01: [
					["South Korea", 9],
					["Japan", 12],
					["Australia", 8],
					["Germany", 17],
					["Russia", 19],
					["China", 26],
					["Great Britain", 27],
					["United States", 46],
				],
				02: [
					["South Korea", 13],
					["Japan", 7],
					["Australia", 8],
					["Germany", 11],
					["Russia", 20],
					["China", 38],
					["Great Britain", 29],
					["United States", 47],
				],
				03: [
					["South Korea", 13],
					["Japan", 9],
					["Australia", 14],
					["Germany", 16],
					["Russia", 24],
					["China", 48],
					["Great Britain", 19],
					["United States", 36],
				],
				04: [
					["South Korea", 9],
					["Japan", 17],
					["Australia", 18],
					["Germany", 13],
					["Russia", 29],
					["China", 33],
					["Great Britain", 9],
					["United States", 37],
				],
				05: [
					["South Korea", 8],
					["Japan", 5],
					["Australia", 16],
					["Germany", 13],
					["Russia", 32],
					["China", 28],
					["Great Britain", 11],
					["United States", 37],
				],
				06: [
					["South Korea", 7],
					["Japan", 3],
					["Australia", 9],
					["Germany", 20],
					["Russia", 26],
					["China", 16],
					["Great Britain", 1],
					["United States", 44],
				],
			};

			console.log("QUIERO", dataPrev2);
			const data = {
				2020: [
					["South Korea", 6],
					["Japan", 27],
					["Australia", 17],
					["Germany", 10],
					["Russia", 20],
					["China", 38],
					["Great Britain", 22],
					["United States", 39],
				],
				2016: [
					["South Korea", 9],
					["Japan", 12],
					["Australia", 8],
					["Germany", 17],
					["Russia", 19],
					["China", 26],
					["Great Britain", 27],
					["United States", 46],
				],
				2012: [
					["South Korea", 13],
					["Japan", 7],
					["Australia", 8],
					["Germany", 11],
					["Russia", 20],
					["China", 38],
					["Great Britain", 29],
					["United States", 47],
				],
				2008: [
					["South Korea", 13],
					["Japan", 9],
					["Australia", 14],
					["Germany", 16],
					["Russia", 24],
					["China", 48],
					["Great Britain", 19],
					["United States", 36],
				],
				2004: [
					["South Korea", 9],
					["Japan", 17],
					["Australia", 18],
					["Germany", 13],
					["Russia", 29],
					["China", 33],
					["Great Britain", 9],
					["United States", 37],
				],
				2000: [
					["South Korea", 8],
					["Japan", 5],
					["Australia", 16],
					["Germany", 13],
					["Russia", 32],
					["China", 28],
					["Great Britain", 11],
					["United States", 37],
				],
			};

			// console.log("COUNTRIES", countries);
			const getData = (data) =>
				data.map(
					(country, i) => (
						console.log(country),
						{
							name: country[0],
							y: country[1],
							color: countries[i].color,
						}
					)
				);

			const chart = Highcharts.chart("container", {
				chart: {
					type: "column",
				},
				title: {
					text: "Summer Olympics 2020 - Top 5 countries by Gold medals",
					align: "left",
				},
				subtitle: {
					text:
						"Comparing to results from Summer Olympics 2016 - Source: <a " +
						'href="https://olympics.com/en/olympic-games/tokyo-2020/medals"' +
						'target="_blank">Olympics</a>',
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
						'<span style="color:{point.color}">\u25CF</span> {series.name}: <b>{point.y} medals</b><br/>',
				},
				xAxis: {
					type: "category",
					accessibility: {
						description: "Countries",
					},
					max: 4,
					labels: {
						useHTML: true,
						animate: true,
						formatter: (ctx) => {
							let flag;

							countries.forEach(function (country) {
								if (country.name === ctx.value) {
									flag = country.flag;
								}
							});

							return `${flag.toUpperCase()}<br><span class="f32">
								<span class="flag ${flag}"></span>
							</span>`;
						},
						style: {
							textAlign: "center",
						},
					},
				},
				yAxis: [
					{
						title: {
							text: "Gold medals",
						},
						showFirstLabel: false,
					},
				],
				series: [
					{
						color: "rgb(158, 159, 163)",
						pointPlacement: -0.2,
						linkedTo: "main",
						data: dataPrev[2020].slice(),
						name: "2016",
					},
					{
						name: "2020",
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
						data: getData(data[2020]).slice(),
					},
				],
				exporting: {
					allowHTML: true,
				},
			});

			const locations = [
				{
					city: "Tokyo",
					year: 2020,
				},
				{
					city: "Rio",
					year: 2016,
				},
				{
					city: "London",
					year: 2012,
				},
				{
					city: "Beijing",
					year: 2008,
				},
				{
					city: "Athens",
					year: 2004,
				},
				{
					city: "Sydney",
					year: 2000,
				},
			];

			locations.forEach((location) => {
				const btn = document.getElementById(location.year);

				btn.addEventListener("click", () => {
					document
						.querySelectorAll(".buttons button.active")
						.forEach((active) => {
							active.className = "";
						});
					btn.className = "active";

					chart.update(
						{
							title: {
								text:
									"Summer Olympics " +
									location.year +
									" - Top 5 countries by Gold medals",
							},
							subtitle: {
								text:
									"Comparing to results from Summer Olympics " +
									(location.year - 4) +
									' - Source: <a href="https://olympics.com/en/olympic-games/' +
									location.city.toLowerCase() +
									"-" +
									location.year +
									'/medals" target="_blank">Olympics</a>',
							},
							series: [
								{
									name: location.year - 4,
									data: dataPrev[location.year].slice(),
								},
								{
									name: location,
									data: getData(data[location.year]).slice(),
								},
							],
						},
						true,
						false,
						{
							duration: 800,
						}
					);
				});
			});
		})
		.fail((err) => {
			console.error(err);
		});
};
