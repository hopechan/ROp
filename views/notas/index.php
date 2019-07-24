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
    <br>
    <div class="row"><h3 class="center">Control de Notas</h3></div>
    <div class="row">
            <div class="col s5 m6 l6">
                <a href="<?php echo constant('URL'); ?>" class="btn black boton-g"><i class="material-icons left">arrow_back</i>Atrás</a>
            </div>
        </div>
    <div class="row">
      <div class="col l4 m6 s12">
          <div class="card">
            <div class="card-image waves-effect waves-block waves-light">
              <img class="activator" src="<?php echo constant('URL')?>public/img/chicas.jpg" alt="No se pudo cargar la imagen" style="height: 15rem;">
            </div>
            <div class="card-content black">
              <span class="card-title activator white-text">Primer Año<i class="material-icons right">more_vert</i></span>
            </div>
            <div class="card-reveal grey">
              <span class="card-title black-text text-darken-4">Primer Año<i class="material-icons right">close</i></span>
              <p><?php 
                require_once 'models/materias.php';
                foreach ($this->materia as $item) {
                  $materia = new Materias();
                  $materia = $item;
                  echo "<li class='black-text'><a class='black-text' href='".constant('URL')."nota/nccgk/0/".$materia->idmateria."'>".$materia->materia."</a></li>";
                }
              ?></p>
            </div>
          </div>
      </div>
      <div class="col l4 m6 s12">
      <div class="card">
            <div class="card-image waves-effect waves-block waves-light">
              <img class="activator" src="<?php echo constant('URL')?>public/img/chicos.jpg" alt="No se pudo cargar la imagen" style="height: 15rem;">
            </div>
            <div class="card-content black">
              <span class="card-title activator white-text">Segundo Año<i class="material-icons right">more_vert</i></span>
            </div>
            <div class="card-reveal grey">
              <span class="card-title black-text text-darken-4">Segundo Año<i class="material-icons right">close</i></span>
              <p><?php 
                require_once 'models/materias.php';
                foreach ($this->materia as $item) {
                  $materia = new Materias();
                  $materia = $item;
                  echo "<li class='black-text'><a class='black-text' href='".constant('URL')."nota/nccgk/1/".$materia->idmateria."'>".$materia->materia."</a></li>";
                }
              ?></p>
            </div>
          </div>
      </div>
      <div class="col l4 m6 s12">
      <div class="card">
            <div class="card-image waves-effect waves-block waves-light">
              <img class="activator" src="<?php echo constant('URL')?>public/img/estudiantes.jpg" alt="No se pudo cargar la imagen" style="height: 15rem;">
            </div>
            <div class="card-content black">
              <span class="card-title activator white-text">Tercer Año<i class="material-icons right">more_vert</i></span>
            </div>
            <div class="card-reveal grey">
              <span class="card-title black-text text-darken-4">Tercer Año<i class="material-icons right">close</i></span>
              <p><?php 
                require_once 'models/materias.php';
                foreach ($this->materia as $item) {
                  $materia = new Materias();
                  $materia = $item;
                  echo "<li class='black-text'><a class='black-text' href='".constant('URL')."nota/nccgk/2/".$materia->idmateria."'>".$materia->materia."</a></li>";
                }
              ?></p>
            </div>
          </div>
      </div>
    </div>
  </div>
  <?php require 'views/footer.php' ?>

</body>

</html>