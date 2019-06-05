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
                <a href="<?php echo constant('URL');?>estudiante" class="btn black"><i class="material-icons left">arrow_back</i>Atrás</a>
            </div>
        </div>
        <!-- modal triggers para vistas estudiantes 1,2,3 años -->
        <div class="row">
            <div class="col s12 m12 l4">
                <div class="card">
                    <div class="card-image waves-block">
                        <img src="<?php echo constant('URL');?>public/img/chicos.jpg" class="acativator size-cards">
                    </div>
                    <div class="card-content black">
                        <span class="card-title activator white-text">
                            Primer Año
                            <i class="material-icons right">more_vert</i>
                        </span>
                        <p><a href="#modal1" class="btn grey darken-2 modal-trigger">Visualizar</a></p>
                    </div>
                    <div class="card-reveal grey">
                        <span class="card-title grey-text text-darken-4">
                        <strong>
                            Primer Año
                        </strong>
                        <i class="material-icons right red-text">close</i>
                        </span>
                        <p>
                           <a href="" class="btn black white-text">Sección A</a><br><br>
                           <a href="" class="btn black white-text">Sección B</a><br><br>
                           <a href="" class="btn black white-text">Sección C</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col s12 m12 l4">
                <div class="card">
                    <div class="card-image waves-block">
                        <img src="<?php echo constant('URL');?>public/img/programa.jpg" class="acativator size-cards">
                    </div>
                    <div class="card-content black">
                        <span class="card-title activator white-text">
                            Segundo Año
                            <i class="material-icons right">more_vert</i>
                        </span>
                        <p><a href="#modal2" class="btn grey darken-2 modal-trigger">Visualizar</a></p>
                    </div>
                    <div class="card-reveal grey">
                        <span class="card-title grey-text text-darken-4">
                        <strong>
                            Segundo Año
                        </strong>
                        <i class="material-icons right red-text">close</i>
                        </span>
                        <p>
                            <a href="" class="btn black white-text">Sección A</a><br><br>
                           <a href="" class="btn black white-text">Sección B</a><br><br>
                           <a href="" class="btn black white-text">Sección C</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col s12 m12 l4">
                <div class="card">
                    <div class="card-image waves-block">
                        <img src="<?php echo constant('URL');?>public/img/chicas.jpg" class="acativator size-cards">
                    </div>
                    <div class="card-content black">
                        <span class="card-title activator white-text">
                            Tercer Año
                            <i class="material-icons right">more_vert</i>
                        </span>
                        <p><a href="#modal3" class="btn grey darken-2 modal-trigger">Visualizar</a></p>
                    </div>
                    <div class="card-reveal grey">
                        <span class="card-title grey-text text-darken-4">
                        <strong>
                            Tercer Año
                        </strong>
                        <i class="material-icons right red-text">close</i>
                        </span>
                        <p>
                           <a href="" class="btn black white-text">Sección A</a><br><br>
                           <a href="" class="btn black white-text">Sección B</a><br><br>
                           <a href="" class="btn black white-text">Sección C</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- fin de las cards que contienen los triggers modales años 1,2,3 -->
        <div class="row estu-size">
            <div class="col s12 m12 l12 estu-size">
                <div id="modal1" class="modal">
                    <div class="modal-content center-align">
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="row size-estu">
            <div class="col s12 m12 l12">
              <div class="modal" id="modal2">
                 <div class="modal-content center-align">
                 
                 </div>
              </div>
            </div>
        </div>
        <div class="row">
            <div class="col s12 m12 l12">
                <div class="modal" id="modal3">
                    <div class="modal-content center-align">
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require 'views/footer.php' ?>
</body>
</html>