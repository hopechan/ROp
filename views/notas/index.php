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
          <ul id="tabsNotas" class="tabs col s8 m8">
            <li class="tab col s3"><a class="active" href="#tbCE">Centro Escolar</a></li>
            <li class="tab col s3"><a href="#tbOpor">CCGK</a></li>
            <li class="tab col s3"><a href="#tbCert">Certificaciones</a></li>
          </ul>
          <div class="input-field col s4 m4">
            
          </div>
          <!-- Tablas que consumen datos-->

          <!-- Tabla Centro Escolar-->
          <br>
          <div id="tbCE" class="">
            <table class="highlight table-responsive" id="tabla">
                <thead class="black white-text">
                    <tr>
                        <th hidden>idNota</th>
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

          <!--Tabla CCGK-->
          <div id="tbOpor" class="">
            <table class="highlight table-responsive" id="tabla">
                <thead class="black white-text">
                    <tr>
                        <th hidden>idNota</th>
                        <th>Estudiante</th>
                        <th>Materia</th>
                        <th>Nota</th>
                        <th colspan="2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                  <?php 
                    require_once 'models/notas.php';
                    foreach($this->notasCCGK as $item){
                      $notaCCGK = new Notas();
                      $notaCCGK = $item;
                  ?>
                  <tr>
                      <td hidden><?php echo $notaCCGK->idnota; ?></td>
                      <td><?php echo $notaCCGK->idestudiante; ?></td>
                      <td><?php echo $notaCCGK->idmateria; ?></td>
                      <td><?php echo $notaCCGK->nota?></td>
                      <td><a href="<?php echo constant('URL') . 'nota/editar/' . $tipo->idtipo;?>" class="right btn-floating btn-large waves-effect waves-white btn-flat white-text grey darken-3 btn modal-trigger"><i class="material-icons">refresh</i></button></a></td>
                      <td><a href="<?php echo constant('URL').'nota/eliminar/'. $tipo->idtipo;?>" class="left btn-floating btn-large waves-effect waves-black btn-flat white-text red accent-4 btn"><i class="material-icons">delete</i></a></td>
                  </tr>
                <?php } ?>
                </tbody>
            </table>
          </div>

          <!-- Tabla Certificacion-->
      </div>
    </div>
    <?php require 'views/footer.php' ?>
</body>
</html>