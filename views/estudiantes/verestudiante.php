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
            <div class="col s12 m12 l12">
                <a href="<?php echo constant('URL');?>estudiante" class="btn black boton-g"><i class="material-icons left">arrow_back</i>Atrás</a>
            </div>
        </div>
        <div class="row">
            <div class="col s12 m12 l12">
                <table class="centered highlight responsive-table">
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
                        foreach ($this->estudiantes as $item) {
                           $estudiante = new Estudiantes();
                           $estudiante = $item;
                        ?>
                        <tr>
                            <td><?php  echo $estudiante->nombre . " " . $estudiante->apellidos; ?></td>
                            <td><?php  echo $estudiante->centro_escolar; ?></td>
                            <td><?php  echo $estudiante->seccion; ?></td>
                            <td><?php  echo $estudiante->anio; ?></td>
                            <td><a href="<?php echo constant('URL').'estudiante/subeditar'?>" class="btn-floating waves-effect waves-white btn-flat white-text grey darken-3 btn "><i class="material-icons">refresh</i></a>&nbsp;&nbsp;<a href="<?php echo constant('URL').'estudiante/eliminar/' . $estudiante->idestudiante;?>" class="btn-floating waves-effect waves-white btn-flat white-text red darken-3 btn"><i class="material-icons">delete</i></a></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php require 'views/footer.php' ?>
</body>
</html>