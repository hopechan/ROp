<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="<?php echo constant('URL') ?>public/js/buscar.js"></script>
  <title>Notas</title>
</head>

<body>
  <?php require 'views/header.php' ?>
  <?php require 'views/navbar.php' ?>
  <div class="container">
    <div class="row tamaño">
      <div class="col s12 m12 l12">
        <div id="modal1" class="modal">
          <div class="modal-content">
            <h4 class="center">Nueva Nota</h4>
            <form method="post" class="col s12" id="tipe-form" action="<?php echo constant('URL'); ?>nota/agregarNota">
              <div class="row red-text text-accent-4">
                <div class="input-field col s12">
                  <i class="material-icons prefix">rate_review</i>
                  <select name="idestudiante" id="estudiante">
                    <option value="" disabled selected>Estudiante</option>
                    <?php
                    require_once 'models/estudiantes.php';
                    foreach ($this->estudiantes as $item) {
                      $estudiante = new Estudiantes();
                      $estudiante = $item;
                      ?>
                      <option value="<?php echo $estudiante->idEstudiante; ?>"><?php echo $estudiante->Estudiantes; ?></option>
                    <?php } ?>
                  </select>
                  <label>Estudiante</label>
                  <span class="helper-text" data-error="Error" data-success="Correcto">Vacio</span>
                </div>
                <div class="input-field col s12 m12 l12">
                  <i class="material-icons prefix">class</i>
                  <select name="idmateria" id="materia">
                    <option value="" disabled selected>Materia</option>
                    <?php
                    require_once 'models/materias.php';
                      foreach ($this->materias as $item) {
                        $materia = new Materias();
                        $materia = $item;
                        $idmateria=$materia->idmateria;
                        $tipo=$materia->tipo;
                        $materia=$materia->materia;
                        
                        ?>
                        <option value="<?php echo $idmateria ?>"><?php echo $materia."-".$tipo;?></option>
                      <?php }?>
                  </select>
                  <label>Materia</label>
                  <span class="helper-text" data-error="Error" data-success="Correcto">Vacio</span>
                </div>
                <div class="input-field col s12 m12 l3">
                  <i class="material-icons prefix">class</i>
                  <input type="number" name="nota_p1" class="validate" id="nota_p1" step="0.01">
                  <label for="nota_p1">Nota Periodo 1</label>
                </div>
                <div class="input-field col s12 m12 l3">
                  <i class="material-icons prefix">class</i>
                  <input type="number" name="nota_p2" class="validate" id="nota_p2" min="0" max="10" step="0.01" data-length="3">
                  <label for="nota_p2">Nota Periodo 2</label>
                </div>
                <div class="input-field col s12 m12 l3">
                  <i class="material-icons prefix">class</i>
                  <input type="number" name="nota_p3" class="validate" id="nota_p3" min="0" max="10" step="0.01" data-length="3">
                  <label for="nota_p3">Nota Periodo 3</label>
                </div>
                <div class="input-field col s12 m12 l3">
                  <i class="material-icons prefix">class</i>
                  <input type="number" name="nota_p4" class="validate" id="nota_p4" min="0" max="10" step="0.01" data-length="3">
                  <label for="nota_p4">Nota Periodo 4</label>
                </div>
              </div>
              <!-- footer del formulario modal -->
              <div class="modal-footer">
                <div class="center-align">
                  <button class="btn boton-save white-text" type="submit" id="ok">Guardar
                    <i class="material-icons left">send</i>
                  </button>&nbsp;&nbsp;
                  <a class="modal-close white-text boton-delete btn">Cancelar <i class="material-icons left">close</i></a>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <h3 class="col s4 m4">Notas</h3>
      <br><br>

      <div class="col s4 m4">
        <div class="center">
          <p>Agregar Nota</p>
          <a href="#modal1" id="add" class="btn-floating btn-large waves-effect boton-save btn modal-trigger"><i class="material-icons">add</i></a>
        </div>
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
        <!--Tabla de la vista de notas-->
        <table class="centered highlight responsive-table" id="tabla">
          <thead class="black white-text">
            <tr>
              <th hidden class="center-align">idNota</th>
              <th>Estudiante</th>
              <th>Materia</th>
              <th>Nota Periodo 1</th>
              <th>Nota Periodo 2</th>
              <th>Nota Periodo 3</th>
              <th>Nota Periodo 4</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody id="tbody-id">
            <?php
            require_once 'models/notas.php';
            foreach ($this->notas['datos'] as $item) {
              $nota = new Notas();
              $nota = $item;
              ?>
              <input type="hidden" id="idnota" value="<?php echo $nota->idnota; ?>">
              <tr id="fila-<?php echo $nota->idnota; ?>">
                <td hidden><?php echo $nota->idnota; ?></td>
                <td><?php echo $nota->idestudiante; ?></td>
                <td><?php echo $nota->idmateria; ?></td>
                <td><?php echo $nota->nota_p1 ?></td>
                <td><?php echo $nota->nota_p2 ?></td>
                <td><?php echo $nota->nota_p3 ?></td>
                <td><?php echo $nota->nota_p4 ?></td>
                <td>
                  <!--botones de la tabla de vista notas-->
                  <a href="#" class="btn-floating btn grey darken-3 waves-effect"><i class="material-icons">account_circle</i></a>
                  <a href="<?php echo constant('URL') . 'nota/verNota/' . $nota->idnota; ?>" class="btn-floating btn-medium waves-effect waves-white btn-flat white-text grey darken-3 btn modal-trigger"><i class="material-icons">refresh</i></a>
                  <a class="btn-floating btn-medium waves-effect waves-black btn-flat white-text red accent-4 btn btndrop" data-id="<?php echo $nota->idnota; ?>"><i class="material-icons">delete</i></a></td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
    <div class="row">
      <div class="col s12 m12 l12">
        <ul class="pagination center">
          <li class="disabled"><a href=""><i class="material-icons">chevron_left</i></a></li>
          <?php
          for ($i = 0; $i < $this->notas['numero']; $i++) {
            $activa = "";
            if (isset($_GET['pagina'])) {
              $pagina_activa = $_GET['pagina'];
              if ($pagina_activa == ($i + 1)) {
                $activa = "active black";
              }
            } else {
              $pagina_activa = 1;
              if ($pagina_activa == ($i + 1)) {
                $activa = "active black";
              }
            }
            echo "<li class='waves-effect " . $activa . "' name='" . ($i + 1) . "'><a href='" . constant('URL') . "nota?pagina=" . ($i + 1) . "'>" . ($i + 1) . "</a></li>";
          }
          ?>
          <li class="disabled"><a href=""><i class="material-icons">chevron_right</i></a></li>
        </ul>
      </div>
    </div>
  </div>
  <script src="<?php echo constant('URL'); ?>public/js/nota.js"></script>
  <?php require 'views/footer.php' ?>
  <script>
    $('input.validate, textarea.validate').characterCounter();
    $('.dropdown-trigger').dropdown();
  </script>
  <!--<script src="./public/js/buscar.js"></script>-->
</body>

</html>