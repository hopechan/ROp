<!DOCTYPE html>
<html lang="en">
<?php require 'views/header.php' ?>
<link rel="stylesheet" type="text/css" href="<?php echo constant('URL') ?>public/css/reporte.css" media="print" />
<?php require 'views/navbar.php' ?>

<body>
    <div class="container">
        <br>
        <div class="row atras">
            <div class="col s4 m4">
                <a href="/rop/estudiante/reportealumnos" class="btn black">Atras</a>
            </div>
        </div>
        <!-- Cabecera necesita mejora-->
        <div class="row">
            <div class="col s4 m3"><img src="<?php echo constant('URL') ?>public/img/fgk.png" alt="Fundacion Gloria de Kriete" height="100" width="70"></div>
            <div class="col s4 m6">
                <h6><b>Programa Oportunidades Fundacion Gloria de Kriette</b></h6>
            </div>
            <div class="col s4 m3"><img src="<?php echo constant('URL') ?>public/img/logo.png" alt="Fundacion Gloria de Kriete" height="70" width="240"></div>
        </div>
        <div class="row">
            <div class="col s12 m12">
                <table>
                    <thead>
                        <tr>
                            <th>Estudiante</th>
                            <th>Materia</th>
                            <th>Periodo 1</th>
                            <th>Periodo 2</th>
                            <th>Periodo 3</th>
                            <th>Periodo 4</th>
                            <th>Promedio</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require_once 'models/estudiantes.php';
                        foreach ($this->estudiante as $item) {
                            $estudiante = new Estudiantes();
                            $estudiante = $item;
                            ?>
                            <tr>
                                <td><?php echo $estudiante->estudiante; ?></td>
                                <td><?php echo $estudiante->materia; ?></td>
                                <td><?php echo $estudiante->periodo_1; ?></td>
                                <td><?php echo $estudiante->periodo_2; ?></td>
                                <td><?php echo $estudiante->periodo_3; ?></td>
                                <td><?php echo $estudiante->periodo_4; ?></td>
                                <td><?php echo $estudiante->promedio; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
<script src="<?php echo constant('URL'); ?>public/js/reporte.js"></script>
<?php require 'views/footer.php' ?>

</html>