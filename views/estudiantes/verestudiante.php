<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="<?php echo constant('URL')?>public/js/buscarEstu.js"></script>
    <title>Ver Estudiantes</title>
</head>
<body>
    <?php require 'views/header.php' ?>
    <?php require 'views/navbar.php' ?>
    <div class="container">
        <br><br>
        <div class="row">
            <div class="col s5 m6 l6">
                <a href="<?php echo constant('URL');?>estudiante" class="btn black boton-g"><i class="material-icons left">arrow_back</i>Atrás</a>
            </div>
            <div class="col s7 m4 right">
            <div class="input-field">
          <i class="material-icons prefix">search</i>
          <input type="text" name="txtFiltro" id="txtFiltro" list="filtros">
          <label for="txtFiltro">Filtrar: </label>
        </div>
        <datalist id="filtros">
          <option disabled selected>Filtrar Por</option>
          <option>Primer Año</option>
          <option>Segundo Año</option>
          <option>Tercer Año</option>
        </datalist>
      </div>
        </div>
        <div class="row">
            <div class="col s12 m12 l12">
                <table class="centered highlight responsive-table" id="tabla">
                    <thead class="black white-text">
                        <tr>
                            <th>Nombre</th>
                            <th>Centro Escolar</th>
                            <th>Sección</th>
                            <th>Año</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include_once 'models/estudiantes.php';
                        foreach ($this->estudiantes['registros'] as $item) {
                           $estudiante = new Estudiantes();
                           $estudiante = $item;
                        ?>
                        <tr>
                            <td><?php  echo $estudiante->nombre . " " . $estudiante->apellidos; ?></td>
                            <td><?php  echo $estudiante->centro_escolar; ?></td>
                            <td><?php  echo $estudiante->seccion; ?></td>
                            <td><?php  echo $estudiante->anio; ?></td>
                            <td><a href="<?php echo constant('URL').'estudiante/subeditar/'. $estudiante->idestudiante;?>" class="btn-floating waves-effect waves-white btn-flat white-text grey darken-3 btn "><i class="material-icons">refresh</i></a>&nbsp;&nbsp;<a href="<?php echo constant('URL').'estudiante/eliminar/' . $estudiante->idestudiante;?>" class="btn-floating waves-effect waves-white btn-flat white-text red darken-3 btn"><i class="material-icons">delete</i></a>&nbsp;&nbsp;<a href="/" class="btn-floating btn grey darken-3 waves-effect"><i class="material-icons">account_circle</i>
                            </a></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <div class="row">
                    <div class="col l12 m12 s12">
                <ul class="pagination center">
                    <li class="disabled"><a href=""><i class="material-icons">chevron_left</i></a></li>
                    <?php 
                        for ($i=0; $i < $this->estudiantes['numero'] ; $i++) { 
                            $activa = "";
                            if (isset($_GET['pagina'])) {  
                                $pagina_activa = $_GET['pagina'];
                                if ($pagina_activa == ($i+1)) {
                                $activa = "active black";
                            }
                            }else{
                            $pagina_activa = 1;
                            if ($pagina_activa == ($i+1)) {
                                $activa = "active black";
                            }
                            
                        }
                            echo "<li class='waves-effect ".$activa."' name='".($i+1)."'><a href='" . constant('URL')."estudiante/verestudiante?pagina=".($i+1)."'>". ($i+1) ."</a></li>";
                        }
                    ?>
                    <li class="disabled"><a href=""><i class="material-icons">chevron_right</i></a></li>
                </ul>
                </div>
                </div>
            </div>
        </div>
    </div>
    <?php require 'views/footer.php' ?>
</body>
</html>