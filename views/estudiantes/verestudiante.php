<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
        <div id="tabla-estu">
            
        </div>
    </div>
    <?php require 'views/footer.php' ?>
</body>
</html>
<script src="<?php echo constant('URL')?>public/js/estu.js"></script>
