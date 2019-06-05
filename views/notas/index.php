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
    <br><br>
    <div class="container">
      <div class="row">
        <h3 class="col s8 m8">Notas</h3>
        <br><br>
        <div class="col s4 m4">
          <!-- Dropdown Trigger -->
          <a class='dropdown-trigger btn' data-target='dropdown1'>Opciones de Filtrado</a>
          <!-- Dropdown Structure -->
          <ul id='dropdown1' class='dropdown-content'>
            <li><a href="#!" >CCGK</a></li>
            <li><a href="#!">Centro Escolar</a></li>
            <li><a href="#!">Certificaciones</a></li>
            <li class="divider" tabindex="-1"></li>
            <li><a href="#!">Año</a></li>
            <li><a href="#!">Seccion</a></li>
          </ul>
        </div>
      </div>
      <div class="row">
        <div id="tbCE" class="">
          <table class="highlight table-responsive" id="tabla">
            <thead class="black white-text">
              <tr class="center-align">
                <th hidden class="center-align">idNota</th>
                <th>Estudiante</th>
                <th>Materia</th>
                <th>Nota</th>
                <th colspan="2">Acciones</th>
              </tr>
              </thead>
              <tbody>
                <?php 
                  require_once 'models/notas.php';
                  foreach($this->notasCE as $item){
                    $notaCE = new Notas();
                    $notaCE = $item;
                ?>
                <tr>
                  <td hidden><?php echo $notaCE->idnota; ?></td>
                  <td><?php echo $notaCE->idestudiante; ?></td>
                  <td><?php echo $notaCE->idmateria; ?></td>
                  <td><?php echo $notaCE->nota?></td>
                  <td><a href="<?php echo constant('URL') . 'nota/editar/' . $notaCE->idnota;?>" class="right btn-floating btn-large waves-effect waves-white btn-flat white-text grey darken-3 btn modal-trigger"><i class="material-icons">refresh</i></button></a></td>
                  <td><a href="<?php echo constant('URL').'nota/eliminar/'. $notaCE->idnota;?>" class="left btn-floating btn-large waves-effect waves-black btn-flat white-text red accent-4 btn"><i class="material-icons">delete</i></a></td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
      </div>
    </div>
    <?php require 'views/footer.php' ?>
    <script>
      $('.dropdown-trigger').dropdown();
    </script>
</body>
</html>