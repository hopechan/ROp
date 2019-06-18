<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Ranking</title>
</head>

<body>
  <?php require 'views/header.php' ?>
  <?php require 'views/navbar.php' ?>
  <br>
  <div class="container">
    <div class="row">
      <!--Card uno-->
      <div class="col s12 m3">
        <div class="card teal black">
          <div class="card-content white-text">
            <i class=" medium material-icons red-text text-accent-4 right">school</i>
            <span class="card-title center"> Ranking Estudiantes</span>
            <p class="center">N° 10</p>
          </div>
        </div>
      </div>
      <!--Card dos-->
      <div class="col s12 m3">
        <div class="card teal black">
          <div class="card-content white-text">
            <i class=" medium material-icons red-text text-accent-4 right">language</i>
            <span class="card-title center">Todos los estudiantes</span>
            <p class="center">N° 80</p>
          </div>
        </div>
      </div>
      <!--Card tres-->
      <div class="col s12 m3">
        <div class="card teal black">
          <div class="card-content white-text">
            <i class=" medium material-icons red-text text-accent-4 right">poll</i>
            <span class="card-title center">Más datos del rarnking</span>
            <p class="center">Ranking</p>
          </div>
        </div>
      </div>
      <!--Card cuantro-->
      <div class="col s12 m3">
        <div class="card teal black">
          <div class="card-content white-text">
            <i class=" medium material-icons red-text text-accent-4 right">dvr</i>
            <span class="card-title center">Información del Ranking</span>
            <p class="center">Ranking</p>
          </div>
        </div>
      </div>
    <br>
    <div id="container" style="min-width: 200px; height: 400px; margin: 0 auto"></div>
  </div>
    <tbody id="tbody-id">
      <?php
      $a= json_encode($this->notas);
      echo $a;
      ?>
  </div>
  <?php require 'views/footer.php' ?>
</body>


</html><script>
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
</script>