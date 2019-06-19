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
  <?php
  $total=$this->total->idestudiante;
  if($total<=10){
    $ranking=$total;
  }else{
  $ranking=$total*0.1;  
  }
  ?>
  <div class="container">
    <div class="row">
      <!--Card uno-->
      <div class="col s12 m3">
        <div class="card teal black">
          <div class="card-content white-text">
            <i class=" medium material-icons red-text text-accent-4 right">school</i>
            <span class="card-title center"> Ranking Estudiantes</span>
            <p class="center"><?php echo "N°".$ranking;?></p>
          </div>
        </div>
      </div>
      <!--Card dos-->
      <div class="col s12 m3">
        <div class="card teal black">
          <div class="card-content white-text">
            <i class=" medium material-icons red-text text-accent-4 right">language</i>
            <span class="card-title center">Todos los estudiantes</span>
            <p class="center"><?php echo "N°".$total; ?></p>
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
      require_once 'models/notas.php';
      require_once 'models/estudiantes.php';

      $notas=0;

      foreach ($this->estudiantes as $item) {
        $estudiante = new Estudiantes();
        $estudiante = $item;

        $idestudiante = $estudiante->idestudiante;
        $nombre = $estudiante->nombre;
        $apellidos = $estudiante->apellidos;

      foreach ($this->notas as $item) {
        $nota = new Notas();
        $nota = $item;

        $idnota = $nota->idnota;
        $idestudiante2 = $nota->idestudiante;
        $idmateria = $nota->idmateria;
        $nota = $nota->nota;

        if($idestudiante==$idestudiante2){

          $notas=$notas+$nota;
        }

        }
        $prom=$notas/5;
      }
      ?>
  </div>
  <!--Incluyendo Grafica de ranking-->
  <script src="<?php echo constant('URL');?>public/js/grafica.js"></script>
  <?php require 'views/footer.php' ?>
</body>


</html>