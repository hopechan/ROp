<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="<?php echo constant('URL')?>public/js/buscar.js"></script>
  <title>Notas</title>
</head>

<body>
  <?php require 'views/header.php' ?>
  <?php require 'views/navbar.php' ?>
  <div class="container">
    <div id="modal1" class="modal">
      <div class="modal-content">
        <h4 class="center">Nuevo Nota</h4>
        <form method="post" class="col s12" id="tipe-form" action="<?php echo constant('URL'); ?>nota/agregarNota">
          <input type="hidden" id="idnota" value="<?php echo $notaCE->idnota; ?>">
          <div class="row red-text text-accent-4">
            <div class="input-field col s12">
              <i class="material-icons prefix">rate_review</i>
              <select name="idestudiante" required>
                <option value="" disabled selected>Seleccione un estudiante</option>
                <?php
                require_once 'models/estudiantes.php';
                foreach ($this->estudiantes as $item) {
                  $estudiante = new Estudiantes();
                  $estudiante = $item;
                  ?>
                  <option value="<?php echo $estudiante->idEstudiante; ?>"><?php echo $estudiante->Estudiantes;?></option>
                <?php } ?>
              </select>
              <label>Estudiante</label>
              <span class="helper-text" data-error="Error" data-success="Correcto">Vacio</span>
            </div>
            <div class="input-field col s6">
              <i class="material-icons prefix">class</i>
              <select name="idmateria" required>
                <option value="" disabled selected>Seleccione una materia</option>
                <?php
                require_once 'models/materias.php';
                foreach ($this->materias as $item) {
                  $materia = new Materias();
                  $materia = $item;
                  ?>
                  <option value="<?php echo $materia->idmateria; ?>"><?php echo $materia->materia; ?></option>
                <?php } ?>
              </select>
              <label>Materia</label>
              <span class="helper-text" data-error="Error" data-success="Correcto">Vacio</span>
            </div>
            <div class="input-field col s6">
              <i class="material-icons prefix">class</i>
              <input type="number" name="nota" class="validate" id="nota" min="0" max="10" step="0.01">
              <label for="nota">Nota</label>
            </div>
          </div>
          <!-- footer del formulario modal -->
          <div class="center">
            <button class="modal-close btn boton-save white-text" type="submit">Enviar
              <i class="material-icons left">send</i>
            </button>&nbsp;&nbsp;
            <a class="modal-close white-text boton-delete btn">Cancelar <i class="material-icons left">close</i></a>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <h3 class="col s4 m7">Notas</h3>
      <br><br>
      <div class="col s4 m1">
        <br>
        <a href="#modal1" class="waves-effect waves-light btn modal-trigger">Nuevo</a>
      </div>
      <div class="col s4 m4">
        <div class="input-field">
          <i class="material-icons prefix">filter_list</i>
          <input type="text" name="txtFiltro" id="txtFiltro" list="filtros">
          <label for="txtFiltro">Filtrar: </label>
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
      <div class="col l12 m12 s12">
        <table class="centered highlight responsive-table" id="tabla">
          <thead class="black white-text">
            <tr>
              <th hidden class="center-align">idNota</th>
              <th>Estudiante</th>
              <th>Materia</th>
              <th>Nota</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody id="tbody-id">
            <?php
            require_once 'models/notas.php';
            foreach ($this->notas as $item) {
              $nota = new Notas();
              $nota = $item;
              ?>
              <tr id="fila-<?php echo $nota->idnota; ?>">
                <td hidden><?php echo $nota->idnota; ?></td>
                <td><?php echo $nota->idestudiante; ?></td>
                <td><?php echo $nota->idmateria; ?></td>
                <td><?php echo $nota->nota ?></td>
                <td><a href="<?php echo constant('URL') . 'nota/verNota/' . $nota->idnota; ?>" class="right btn-floating btn-large waves-effect waves-white btn-flat white-text grey darken-3 btn modal-trigger"><i class="material-icons">refresh</i></a>
                <a class="left btn-floating btn-large waves-effect waves-black btn-flat white-text red accent-4 btn btndrop" data-id="<?php echo $nota->idnota; ?>"><i class="material-icons">delete</i></a></td>
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
  <script src="<?php echo constant('URL');?>public/js/nota.js"></script>
  <?php require 'views/footer.php' ?>
  <script>
    $('.dropdown-trigger').dropdown();
  </script>
  <!--<script src="./public/js/buscar.js"></script>-->
</body>

</html>