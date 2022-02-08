Highcharts.setOptions({
  lang: {
    numericSymbols: null, //otherwise by default ['k', 'M', 'G', 'T', 'P', 'E']
  },
  colors: [
    "#058DC7",
    "#50B432",
    "#ED561B",
    "#DDDF00",
    "#24CBE5",
    "#64E572",
    "#FF9655",
    "#FFF263",
    "#6AF9C4",
  ],
});
function grafico1VentasDiarias(año, semana, dia) {
  (async () => {
    const respuestaRaw = await fetch(
      "ajax/dataCharts.php?grafico=grafico1&año=" +
        año +
        "&semana=" +
        semana +
        "&dia=" +
        dia
    );

    const respuesta = await respuestaRaw.json();

    const $grafica = document.querySelector("#graficoVentasDiariasBar");

    const etiquetas = respuesta.etiquetas;
    const series = respuesta.series;

    // Create the chart
    Highcharts.chart($grafica, {
      chart: {
        type: "column",
        options3d: {
          enabled: true,
          alpha: 15,
          beta: 15,
          viewDistance: 25,
          depth: 40,
        },
      },
      title: {
        text: "Ventas Semana #" + semana,
      },
      subtitle: {
        text: "Dar click en el canal para ver mas detalles",
      },
      accessibility: {
        announceNewData: {
          enabled: true,
        },
      },
      xAxis: {
        type: "category",
      },
      yAxis: {
        title: {
          text: "Ventas Totales Diarias",
        },
      },
      legend: {
        enabled: false,
      },
      plotOptions: {
        column: {
          stacking: "normal",
          depth: 40,
        },
        series: {
          borderWidth: 0,
          dataLabels: {
            enabled: true,
            format: "$ {point.y:.2f}",
          },
        },
      },

      tooltip: {
        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        pointFormat:
          '<span style="color:{point.color}">{point.name}</span>: <b>$ {point.y:.2f}</b><br/>',
      },

      series: [
        {
          name: "Canales",
          colorByPoint: true,
          data: etiquetas,
        },
      ],
      drilldown: {
        series: [
          {
            name: "TIENDAS",
            id: "TIENDAS",
            data: series,
          },
        ],
      },
    });
  })();
}

function grafico2VentasDiarias(año, semana, dia) {
  (async () => {
    const respuestaRaw = await fetch(
      "ajax/dataCharts.php?grafico=grafico1&año=" +
        año +
        "&semana=" +
        semana +
        "&dia=" +
        dia
    );

    const respuesta = await respuestaRaw.json();
    $("#graficoVentasDiariasPie").innerHTML = "";
    const $grafica = document.querySelector("#graficoVentasDiariasPie");

    const etiquetas = respuesta.etiquetas;

    // Build the chart
    Highcharts.chart($grafica, {
      chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: "pie",
        options3d: {
          enabled: true,
          alpha: 45,
          beta: 0,
        },
      },
      title: {
        text: "Participación de Ventas Semana # " + semana,
      },
      tooltip: {
        pointFormat: "{series.name}: <b>$ {point.y:.1f}</b>",
      },
      accessibility: {
        point: {
          valueSuffix: "%",
        },
      },
      plotOptions: {
        pie: {
          allowPointSelect: true,
          cursor: "pointer",
          depth: 35,
          dataLabels: {
            enabled: true,
            format: "<b>{point.name}</b>: {point.percentage:.1f} %",
            connectorColor: "silver",
          },
        },
      },
      series: [
        {
          name: "Canal",
          data: etiquetas,
        },
      ],
    });
  })();
}
function graficoVentasYearToDay() {
  (async () => {
    const respuestaRaw = await fetch("ajax/dataCharts.php?grafico=grafico2");

    const respuesta = await respuestaRaw.json();

    const $grafica = document.querySelector("#graficoYearToDayBar");
    const ventas2022 = respuesta.ventas1;
    const ventas2021 = respuesta.ventas2;

    var dataPrev = {
      2022: ventas2022,
      2021: ventas2021,
    };

    var data = {
      2022: ventas2022,
      2021: ventas2021,
    };

    var names = [
      {
        name: "CEDIS",

        color: "rgb(201, 36, 39)",
      },
      {
        name: "E-COMMERCE",

        color: "rgb(0,188,212)",
      },
      {
        name: "FLOTILLAS",

        color: "rgb(215, 0, 38)",
      },
      {
        name: "RUTAS",

        color: "rgb(0, 82, 180)",
      },
      {
        name: "SIN ASIGNAR",

        color: "rgb(25, 82, 70)",
      },
      {
        name: "TIENDAS",

        color: "rgb(255, 217, 68)",
      },
    ];

    function getData(data) {
      return data.map(function (name, i) {
        return {
          name: name[0],
          y: name[1],
          color: names[i].color,
        };
      });
    }
    Highcharts.setOptions({
      lang: {
        numericSymbols: null, //otherwise by default ['k', 'M', 'G', 'T', 'P', 'E']
      },
    });
    Highcharts.chart($grafica, {
      chart: {
        type: "column",
      },
      title: {
        text: "YEAR TO DAY 2021-2022",
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
          '<span style="color:{point.color}">\u25CF</span> {series.name}: <b>$ {point.y:.2f}</b><br/>',
      },
      xAxis: {
        type: "category",
        max: 4,
        labels: {
          useHTML: true,
          animate: true,
          formatter: function () {
            var value = this.value,
              output;

            names.forEach(function (name) {
              if (name.name === value) {
                output = name.name;
              }
            });

            return output;
          },
        },
      },
      yAxis: [
        {
          title: {
            text: "VENTA POR CANAL",
          },
          showFirstLabel: false,
        },
      ],
      series: [
        {
          color: "rgb(158, 159, 163)",
          pointPlacement: -0.2,
          linkedTo: "main",
          data: dataPrev[2021].slice(),
          name: "2021",
        },
        {
          name: "2022",
          id: "main",
          dataSorting: {
            enabled: true,
            matchByName: true,
          },
          dataLabels: [
            {
              enabled: false,
              inside: false,
              style: {
                fontSize: "12px",
              },
            },
          ],
          data: getData(data[2022]).slice(),
        },
      ],
      exporting: {
        allowHTML: true,
      },
    });
  })();
}
function graficoVentasYearToWeek() {
  (async () => {
    const respuestaRaw = await fetch("ajax/dataCharts.php?grafico=grafico3");
    const $grafica = document.querySelector("#graficoYearToWeekBar");
    const respuesta = await respuestaRaw.json();
    const fechas = respuesta.fechas;
    const ventas = respuesta.ventas;
    Highcharts.setOptions({
      lang: {
        numericSymbols: null, //otherwise by default ['k', 'M', 'G', 'T', 'P', 'E']
      },
    });
    Highcharts.chart($grafica, {
      chart: {
        type: "column",
      },
      title: {
        text: "VENTAS YEAR TO WEEK",
      },
      subtitle: {
        text: "",
      },
      xAxis: {
        categories: fechas,
        crosshair: true,
      },
      yAxis: {
        min: 0,
        title: {
          text: "Ventas $",
        },
      },
      tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat:
          '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
          '<td style="padding:0"><b>$ {point.y:.2f}</b></td></tr>',
        footerFormat: "</table>",
        shared: true,
        useHTML: true,
      },
      plotOptions: {
        column: {
          pointPadding: 0.2,
          borderWidth: 0,
        },
      },
      series: ventas,
    });
  })();
}
function graficoVentasYearToMonth() {
  (async () => {
    const respuestaRaw = await fetch("ajax/dataCharts.php?grafico=grafico4");
    const $grafica = document.querySelector("#graficoYearToMonthBar");
    const respuesta = await respuestaRaw.json();
    const fechas = respuesta.fechas;
    const ventas = respuesta.ventas;
    Highcharts.setOptions({
      lang: {
        numericSymbols: null, //otherwise by default ['k', 'M', 'G', 'T', 'P', 'E']
      },
    });
    Highcharts.chart($grafica, {
      chart: {
        type: "column",
      },
      title: {
        text: "VENTAS YEAR TO MONTH",
      },
      subtitle: {
        text: "",
      },
      xAxis: {
        categories: [
          "ENE 2021",
          "ENE 2022",
          "FEB 2021",
          "FEB 2022",
          "MAR 2021",
          "MAR 2022",
          "ABR 2021",
          "ABR 2022",
          "MAY 2021",
          "MAY 2022",
          "JUN 2021",
          "JUN 2022",
          "JUL 2021",
          "JUL 2022",
          "AGO 2021",
          "AGO 2022",
          "SEP 2021",
          "SEP 2022",
          "OCT 2021",
          "OCT 2022",
          "NOV 2021",
          "NOV 2022",
          "DIC 2021",
          "DIC 2022",
        ],
        crosshair: true,
      },
      yAxis: {
        min: 0,
        title: {
          text: "Ventas $",
        },
      },
      tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat:
          '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
          '<td style="padding:0"><b>$ {point.y:.2f}</b></td></tr>',
        footerFormat: "</table>",
        shared: true,
        useHTML: true,
      },
      plotOptions: {
        column: {
          pointPadding: 0.2,
          borderWidth: 0,
        },
      },
      series: ventas,
    });
  })();
}
