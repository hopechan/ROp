<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="<?php echo constant('URL')?>public/css/vanilla-dataTables.css" rel="stylesheet" type="text/css">
    <script src="<?php echo constant('URL')?>public/js/libs/vanilla-dataTables.js" type="text/javascript"></script>
    <title>Estudiantes</title>
</head>

<body>
    <?php require 'views/header.php' ?>
    <?php require 'views/navbar.php' ?>

    <div class="container">
        <p></p>
        <div class="row">
            <div class="col s5 m6 l6">
                <a href="<?php echo constant('URL'); ?>estudiante" class="btn black boton-g"><i class="material-icons left">arrow_back</i>Atrás</a>
            </div>
        </div>
        <div class="row">
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
                    foreach ($this->estudiantes as $item) {
                        $estudiante = new Estudiantes();
                        $estudiante = $item;
                        ?>
                        <tr id="fila-<?php echo $estudiante->idestudiante; ?>">
                            <td><?php echo $estudiante->nombre . " " . $estudiante->apellidos; ?></td>
                            <td><?php echo $estudiante->centro_escolar; ?></td>
                            <td><?php echo $estudiante->seccion; ?></td>
                            <td><?php echo $estudiante->anio; ?></td>
                            <td>
                                <a  href="<?php echo constant('URL').'estudiante/subeditar/'.$estudiante->idestudiante;?>" class="modal-trigger btn-floating waves-effect waves-white btn-flat white-text grey darken-3 btn actu"><i class="material-icons">refresh</i></a>&nbsp;&nbsp;
                                <a href="<?php echo constant('URL').'estudiante/eliminar/'.$estudiante->idestudiante;?>" class="btn-floating waves-effect waves-white btn-flat white-text red darken-3 btn elim"><i class="material-icons">delete</i></a>&nbsp;&nbsp;<a href="<?php echo constant('URL').'estudiante/perfil/'.$estudiante->idestudiante;?>" class="btn-floating btn grey darken-3 waves-effect"><i class="material-icons">account_circle</i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php require 'views/footer.php' ?>
</body>
<script>
let tabla = document.querySelector("#tabla");
let dt = new DataTable(tabla);
</script>
</html>