// Create the chart
Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Ranking Oportunidades'
    },
    yAxis: {
        title: {
            text: 'Notas'

        }

    },
    xAxis: {
        categories: ['Alumno 1', 'Alumno 2', 'Alumno 3', 'Alumno 4', 'Alumno 5', 'Alumno 6', 'Alumno 7', 'Alumno 8', 'Alumno 9','Alumno 10']//nombres de abajo de la grafica
      },
    legend: {
        enabled: false
    },
    tooltip: {
        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> de nota<br/>'
    },

    series: [
        {
            name: "Alumno:",
            colorByPoint: true,
            data: [
                {
                    name: "Alumno 1",
                    y: 10,
                    color:"red",
                },
                {
                    name: "Alumno 2",
                    y: 20,
                    color:"black",
                },
                {
                    name: "Alumno 3",
                    y: 30,
                    color:"red",
                },
                {
                    name: "Alumno 4",
                    y: 40,
                    color:"black",
                },  
                {
                    name: "Alumno 5",
                    y: 50,
                    color:"red",
                },
                {
                    name: "Alumno 6",
                    y: 60,
                    color:"black",
                },
                {
                    name: "Alumno 7",
                    y: 70,
                    color:"red",
                },
                {
                    name: "Alumno 8",
                    y: 80,
                    color:"black",
                },
                {
                    name: "Alumno 9",
                    y: 90,
                    color:"red",
                },
                {
                    name: "Alumno 10",
                    y: 100,
                    color:"black",
                },
            ]
        }
    ],
});