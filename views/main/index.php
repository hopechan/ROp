<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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
</div>
<br>
<div id="container" style="min-width: 200px; height: 400px; margin: 0 auto"></div>
</div>
    <?php require 'views/footer.php' ?>
</body>
<script src="<?php echo constant('URL')?>views/main/grafica.js"></script>
</html>