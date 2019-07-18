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
            <div class="col s4 m4">
            </div>
            <div class="col s4 m4">
                <button class="btn black right imprimir" id="imprimir">Imprimir</button>
            </div>
        </div>
        <!-- Cabecera necesita mejora-->
        <div class="row">
            <div class="col s4 m3"><img src="<?php echo constant('URL') ?>public/img/fgk.png" alt="Fundacion Gloria de Kriete" height="70" width="50"></div>
            <div class="col s4 m6">
                <h6 class="texto"><b>Programa Oportunidades Fundacion Gloria de Kriette</b></h6>
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
                        <tr>
                            <td class="center" colspan="7"><b >Notas CCGK</b></td>
                        </tr>
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
                        <tr>
                            <td class="center" colspan="7"><b >Notas de Centro Escolar</b></td>
                        </tr>
                        <?php
                        foreach ($this->estudiante2 as $item) {
                            $estudiante2 = new Estudiantes();
                            $estudiante2 = $item;
                            ?>
                            <tr>
                                <td><?php echo $estudiante2->estudiante; ?></td>
                                <td><?php echo $estudiante2->materia; ?></td>
                                <td><?php echo $estudiante2->periodo_1; ?></td>
                                <td><?php echo $estudiante2->periodo_2; ?></td>
                                <td><?php echo $estudiante2->periodo_3; ?></td>
                                <td><?php echo $estudiante2->periodo_4; ?></td>
                                <td><?php echo $estudiante2->promedio; ?></td>
                            </tr>
                        <?php } ?>
                        <tr>
                            <td class="center" colspan="7"><b >Notas de Certificaciones</b></td>
                        </tr>
                        <?php
                        foreach ($this->estudiante3 as $item) {
                            $estudiante3 = new Estudiantes();
                            $estudiante3 = $item;
                            ?>
                            <tr>
                                <td><?php echo $estudiante3->estudiante; ?></td>
                                <td><?php echo $estudiante3->materia; ?></td>
                                <td><?php echo $estudiante3->periodo_1; ?></td>
                                <td><?php echo $estudiante3->periodo_3; ?></td>
                                <td><?php echo $estudiante3->periodo_3; ?></td>
                                <td><?php echo $estudiante3->periodo_4; ?></td>
                                <td><?php echo $estudiante3->promedio; ?></td>
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