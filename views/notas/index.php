<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Notas</title>
</head>

<body>
  <?php require 'views/header.php' ?>
  <?php require 'views/navbar.php' ?>
  <div class="container">
    <div class="row"><h3 class="center">Control de Notas</h3></div>
    <div class="row">
      <div class="col l4 m6 s12">
          <div class="card">
            <div class="card-image">
              <img src="<?php echo constant('URL')?>public/img/chicas.jpg" alt="No se pudo cargar la imagen" style="height: 15rem;">
              <a class="btn-floating halfway-fab red accent-4 btn-large" href="<?php echo constant('URL'); ?>nota/nccgk/0"><i class="material-icons">add</i></a>
            </div>
            <div class="black card-content">
              <h4 class="white-text">Primer Año</h4>
            </div>
          </div>
      </div>
      <div class="col l4 m6 s12">
      <div class="card">
            <div class="card-image">
              <img src="<?php echo constant('URL')?>public/img/chicos.jpg" alt="No se pudo cargar la imagen" style="height: 15rem;">
              <a class="btn-floating halfway-fab red accent-4 btn-large" href="<?php echo constant('URL'); ?>nota/nccgk/1"><i class="material-icons">add</i></a>
            </div>
            <div class="black card-content">
              <h4 class="white-text">Segundo Año</h4>
            </div>
          </div>
      </div>
      <div class="col l4 m6 s12">
      <div class="card">
            <div class="card-image">
              <img src="<?php echo constant('URL')?>public/img/estudiantes.jpg" alt="No se pudo cargar la imagen" style="height: 15rem;">
              <a class="btn-floating halfway-fab red accent-4 btn-large" href="<?php echo constant('URL'); ?>nota/nccgk/2"><i class="material-icons">add</i></a>
            </div>
            <div class="black card-content">
              <h4 class="white-text">Tercer Año</h4>
            </div>
          </div>
      </div>
    </div>
  </div>
  <?php require 'views/footer.php' ?>

</body>

</html>