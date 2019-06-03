<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <?php require 'views/header.php' ?>
    <?php require 'views/navbar.php' ?>
    <div class="container">
        <br><br>
        <!-- modal triggers para vistas estudiantes 1,2,3 años -->
        <div class="row">
            <div class="col s12 m12 l4">
                <div class="card">
                    <div class="card-image waves-block">
                        <img src="public/img/chicos.jpg" class="acativator size-cards">
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
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis maiores provident laboriosam, quisquam dicta assumenda ab ex culpa nisi sequi voluptatem expedita. Officiis modi, rerum alias ut illo voluptate fugit.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col s12 m12 l4">
                <div class="card">
                    <div class="card-image waves-block">
                        <img src="public/img/programa.jpg" class="acativator size-cards">
                    </div>
                    <div class="card-content black">
                        <span class="card-title activator white-text">
                            Segundo Año
                            <i class="material-icons right">more_vert</i>
                        </span>
                        <p><a href="#" class="btn grey darken-2">Visualizar</a></p>
                    </div>
                    <div class="card-reveal grey">
                        <span class="card-title grey-text text-darken-4">
                            <strong>
                                Segundo Año
                            </strong>
                            <i class="material-icons right red-text">close</i>
                        </span>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis maiores provident laboriosam, quisquam dicta assumenda ab ex culpa nisi sequi voluptatem expedita. Officiis modi, rerum alias ut illo voluptate fugit.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col s12 m12 l4">
                <div class="card">
                    <div class="card-image waves-block">
                        <img src="public/img/chicas.jpg" class="acativator size-cards">
                    </div>
                    <div class="card-content black">
                        <span class="card-title activator white-text">
                            Tercer Año
                            <i class="material-icons right">more_vert</i>
                        </span>
                        <p><a href="#" class="btn grey darken-2">Visualizar</a></p>
                    </div>
                    <div class="card-reveal grey">
                        <span class="card-title grey-text text-darken-4">
                            <strong>
                                Tercer Año
                            </strong>
                            <i class="material-icons right red-text">close</i>
                        </span>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis maiores provident laboriosam, quisquam dicta assumenda ab ex culpa nisi sequi voluptatem expedita. Officiis modi, rerum alias ut illo voluptate fugit.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- fin de las cards que contienen los triggers modales años 1,2,3 -->
        <div class="row estu-size">
            <div class="col s12 m12 l12 estu-size">
                <div id="modal1" class="modal modal-fixed-footer">
                    <div class="modal-content center-align">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require 'views/footer.php' ?>
</body>

</html>