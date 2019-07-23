<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script type="module" src="<?php echo constant('URL') ?>public/js/ranking.js"></script>
  <title>Ranking</title>
</head>

<body>
  <?php require 'views/header.php' ?>
  <?php require 'views/navbar.php' ?>
  <br>
  <?php
  $total = $this->total->idestudiante;
  if ($total <= 10) {
    $ranking = $total;
  } else {
    $ranking = $total * 0.1;
  }
  ?>
  <div class="container">
    <div class="row">
      <!--Card uno-->
      <div class="col s12 m3">
        <a href="<?php echo constant('URL')?>">
          <div class="card teal black">
            <div class="card-content white-text">
              <i class=" medium material-icons red-text text-accent-4 right">school</i>
              <span class="card-title center"> Ranking Estudiantes</span>
              <p class="center"><?php echo "N°" . round($ranking) ?></p>
            </div>
          </div>
        </a>
      </div>
      <!--Card dos-->
      <div class="col s12 m3">
        <a href="<?php echo constant('URL')?>estudiante/ver">
          <div class="card teal black">
            <div class="card-content white-text">
              <i class=" medium material-icons red-text text-accent-4 right">language</i>
              <span class="card-title center">Todos los estudiantes</span>
              <p class="center"><?php echo "N°" . $total; ?></p>
            </div>
          </div>
        </a>
      </div>
      <!--Card tres-->
      <div class="col s12 m3">
        <a href="<?php echo constant('URL') ?>ranking">
          <div class="card teal black">
            <div class="card-content white-text">
              <i class=" medium material-icons red-text text-accent-4 right">poll</i>
              <span class="card-title center">Ranking Completo</span>
              <p class="center">Ranking</p>
            </div>
          </div>
        </a>
      </div>
      <!--Card cuantro-->
      <div class="col s12 m3">
        <a href="#">
          <div class="card teal black">
            <div class="card-content white-text">
              <i class=" medium material-icons red-text text-accent-4 right">dvr</i>
              <span class="card-title center">Información del Ranking</span>
              <p class="center">Ranking</p>
            </div>
        </a>
        </div>
      </div>
    </div>
    <!-- Card para el ranking al 10, este estara en una row diferente-->
    <div class="row">
      <div class="col s10 m10 center">
        <div class="card">
          <canvas id="ranking">Su navegador no soporta canvas, por favor actualize a una version mas reciente</canvas>
        </div>
      </div>
    </div>
  </div>
  <?php require 'views/footer.php' ?>
</body>
</html>
<script>
var f=new Date();
cad=f.getHours()+":"+f.getMinutes()+":"+f.getSeconds(); 
window.status =cad;
console.log(cad)
if(cad >"12:00:00"){
  M.toast({html: 'hola! buenas tardes', classes: 'blue accent-4 rounded white-text'});
}else if(cad > "19:00:00"){
  M.toast({html: 'hola! buenas noches', classes: 'blue accent-4 rounded white-text'});
}else if(cad > "07:00:00"){
  M.toast({html: 'hola! buenos dias', classes: 'blue accent-4 rounded white-text'});
}
</script>