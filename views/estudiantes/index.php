<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Estudiantes</title>
</head>
<body>
<?php require 'views/header.php'; ?>
<?php require 'views/navbar.php'; ?>
    <div class="container">
        <!-- inicia el contenido del cuerpo de la pagina index de estudiantes -->
            <div class="row">
                <div class="col s12 m6 l4">
                    <div class="card horizontal">
                            <div class="card-content black center" style="display:block;">
                                <span class="card-title activator white-text waves-effect">
                                    Matrícula
                                </span>
                            </div>
                            <div class="card-image waves-effect waves-blue waves-block center black">
                                <i class="material-icons grey-text large">group_add</i>
                                </div>
                            <div class="card-reveal grey">
                                <span class="card-title black-text">
                                    <i class="material-icons right">close</i>
                                    Matricula a un estudiante
                                </span>
                                </div>
                        </div>
                </div>
                <div class="col s12 m6 l4">
                    <div class="card">
                        <div class="card-image waves-effect waves-blue waves-block center black">
                            <i class="material-icons red-text text-accent-4 medium">group</i>
                        </div>
                        <div class="black center">
                            <span class="card-title activator white-text waves-effect" style="display:block;">
                                Estudiantes
                            </span>
                        </div>
                        <div class="card-reveal grey">
                            <span class="card-title black-text div">
                                <i class="material-icons right">close</i>
                                    Visualiza los estudiantes existentes
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col s12 m6 l4">
                    <div class="card">
                        <div class="card-image waves-effect waves-blue waves-block center black">
                            <i class="material-icons red-text text-accent-4 medium">book</i>
                        </div>
                        <div class="black center">
                            <span class="card-title activator white-text waves-effect" style="display:block-inline;">
                                Reportes
                            </span>
                            <i class="material-icons">help</i>
                        </div>
                        <div class="card-reveal grey">
                            <span class="card-title black-text div">
                                <i class="material-icons right">close</i>
                                    Genera un reporte de un estudiante
                            </span>
                        </div>
                    </div>
                </div>
            </div>
    </div>
<?php require 'views/footer.php'; ?>
</body>
</html>