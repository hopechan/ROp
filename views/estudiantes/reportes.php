<!DOCTYPE html>
<html lang="en">
<?php require 'views/header.php' ?>
<?php require 'views/navbar.php' ?>

<body>
    <br>
    <div class="container">
        <div class="row">
            <div class="col s4 m4">
                <a href="/rop/estudiante" class="btn black boton-g"><i class="material-icons left">arrow_back</i>Atrás</a>
            </div>
        </div>
        <div class="row">
            <!--Card uno-->
            <div class="col s12 m6">
                <a href="reportealumnos">
                    <div class="card teal black">
                        <div class="card-image">
                            <img src="<?php echo constant('URL') ?>public/img/estudiantes.jpg" alt="Promociones" height="300" width="300">
                            <span class="card-title">Reportes de un alumno</span>
                            <button class="btn-floating halfway-fab waves-effect waves-light black"><i class="large material-icons red-text text-accent-4">book</i></button>
                        </div>
                        <div class="card-content white-text center">
                            <p>Aquí se podra realizar un reporte de un alumno</p>
                            <p>Realizando una busqueda por alumno</p>
                        </div>
                    </div>
                </a>
            </div>
            <!--Card dos-->
            <div class="col s12 m6">
                <a href="reportepromo">
                    <div class="card teal black">
                        <div class="card-image">
                            <img src="<?php echo constant('URL') ?>public/img/estudiantes.jpg" alt="Promociones" height="300" width="300">
                            <span class="card-title ">Reportes de una promoción</span>
                            <button class="btn-floating halfway-fab waves-effect waves-light black"><i class="large material-icons red-text text-accent-4">book</i></button>
                        </div>
                        <div class="card-content white-text">
                            <p>Aquí se podra realizar un reporte de una promoción</p>
                            <p>Realizando una busqueda por promoción</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</body>
<?php require 'views/footer.php' ?>

</html>