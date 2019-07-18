<!DOCTYPE html>
<html lang="en">
<?php require 'views/header.php' ?>
<?php require 'views/navbar.php' ?>

<body>
    <div class="container">
        <div class="row">
            <div class="col s4 m4">
                <a href="/rop/estudiante/reportes" class="btn black boton-g"><i class="material-icons left">arrow_back</i>Atrás</a>
            </div>
            <div class="">
                <h1>Lista por promoción</h1>
                <div class="input-field col s6 m3">
                </div>
                <div class="input-field col s6">
                    <i class="material-icons prefix">search</i>
                    <input id="icon_prefix" type="text" class="validate">
                    <label for="icon_prefix">Alumno</label>
                </div>
            </div>
        </div>
        <div class="row">
            <!--linea 1 -->
            <div class="col s12 m6">
                <ul class="collection">
                    <?php
                    require_once 'models/estudiantes.php';
                    $array = $this->estudiantes;
                    list($array1, $array2) = array_chunk($array, ceil(count($array) / 2));

                    foreach ($array1 as $item) {
                        $estudiante = new Estudiantes();
                        $estudiante = $item;
                        ?>
                        <?php $id = $estudiante->idestudiante; ?>
                        <!--contenido -->
                        <li class="collection-item avatar valign-wrapper">
                            <img src="<?php echo constant('URL') ?>public/img/default-images/defaultuser.png" alt="imagen" class="circle">
                            <span class="title"><?php echo $estudiante->nombre . ' ' . $estudiante->apellidos ?></span>
                            <p><?php echo "-".$estudiante->anio ?></p>
                            <div class="right">
                            <a href="reportecxalumno/<?php echo $id ?>" class="btn btn-floating btn-large waves-effect waves-black btn-flat white-text red accent-4 right"><i class="material-icons">local_printshop</i></a>
                        </div>
                        </li>
                    <?php } ?>
                </ul>
            </div>
            <!--linea 2 -->
            <div class="col s12 m6">
                <ul class="collection">
                    <?php
                    foreach ($array2 as $item) {
                        $estudiante = new Estudiantes();
                        $estudiante = $item;
                        ?>
                        <?php $id = $estudiante->idestudiante; ?>
                        <!--contenido -->
                        <li class="collection-item avatar valign-wrapper">
                            <img src="<?php echo constant('URL') ?>public/img/default-images/defaultuser.png" alt="imagen" class="circle">
                            <span class="title"><?php echo $estudiante->nombre . ' ' . $estudiante->apellidos ?></span>
                            <p><?php echo "-".$estudiante->anio ?></p>
                            <div class="right">
                            <a href="reportecxalumno/<?php echo $id ?>" class="btn btn-floating btn-large waves-effect waves-black btn-flat white-text red accent-4 right"><i class="material-icons">local_printshop</i></a>
                        </div>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</body>
<?php require 'views/footer.php' ?>

</html>