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
        <h3 class="col s4 m7">Notas</h3>
        <br><br>
        <div class="col s4 m1">
          <br>
          <a href="nota#modal1" class="waves-effect waves-light btn modal-trigger">Nuevo</a>
        </div>
        <div class="col s4 m4">
          <div class="input-field">
            <i class="material-icons prefix">filter_list</i>
            <input type="text" name="txtFiltro" id="txtFiltro" list="filtros">
            <label for="nombre">Filtrar: </label>
          </div>
          <datalist id="filtros">
            <option disabled selected>Filtrar Por</option>
            <option>CCGK</option>
            <option>Centro Educativo</option>
            <option>Certificaciones</option>
          </datalist>
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
          <ul class="pagination center">
            <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
            <li class="active"><a href="#!">1</a></li>
            <li class="waves-effect"><a href="#!">2</a></li>
            <li class="waves-effect"><a href="#!">3</a></li>
            <li class="waves-effect"><a href="#!">4</a></li>
            <li class="waves-effect"><a href="#!">5</a></li>
            <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
          </ul>
      </div>
    </div>

    <div id="modal1" class="modal">
      <div class="modal-content">
        <h4 class="center">Nuevo Materia</h4>
        <form method="post" class="col s12" id="tipe-form" action="<?php echo constant('URL'); ?>materia/agregarMateria">
          <input type="hidden" id="idmateria">
          <div class="row red-text text-accent-4">
            <div class="input-field col s12">
              <i class="material-icons prefix">rate_review</i>
              <select name="idtipo" required>
                <option value="" disabled selected>Seleccione el IdTipo</option>
                  <?php
                    require_once 'models/tipos.php';
                    foreach($this->tipos as $item){
                      $tipo =new Tipos();
                      $tipo = $item;
                  ?>
                  <option value="<?php echo $tipo->idtipo; ?>"><?php echo $tipo->tipo; ?></option>
                  <?php } ?>
              </select>
              <label>Id Tipo</label>
              <span class="helper-text" data-error="Error" data-success="Correcto">Vacio</span>
            </div>
            <div class="input-field col s12" >
              <i class="material-icons prefix">class</i>
              <select name="materia" required>
                
              </select>
              <label>Materia</label>
              <span class="helper-text" data-error="Error" data-success="Correcto">Vacio</span>
            </div>
          </div>
           <!-- footer del formulario modal -->
          <div class="center">
            <button class="modal-close waves-effect waves-green btn green white-text" type="submit">Enviar
              <i class="material-icons left">send</i>
            </button>&nbsp;&nbsp;
            <a class="modal-close waves-effect waves-red btn-flat white-text red accent-4 btn">Cancelar <i class="material-icons left">close</i></a>
          </div>
        </form>
      </div>
    </div>
    <?php require 'views/footer.php' ?>
    <script>
      $('.dropdown-trigger').dropdown();
    </script>
    <!--<script src="./public/js/buscar.js"></script>-->
</body>
</html>