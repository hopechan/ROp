<!DOCTYPE html>
<html lang="es">
<?php

include ("head.php");

?>
<body>
<?php
include ("navbar.php");
?>
    
    <div class="container">
        <br><br>
        <!-- modal triggers para vistas estudiantes 1,2,3 años -->
        <div class="row">
            <div class="col s12 m12 l4">
                <div class="card">
                    <div class="card-image waves-block">
                        <img src="img/chicos.jpg" class="acativator size-cards">
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
                        <img src="img/programa.jpg" class="acativator size-cards">
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
                        <img src="img/chicas.jpg" class="acativator size-cards">
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
            <div class="col s12 m12 l12">
                <div id="modal1" class="modal modal-fixed-footer">
                    <div class="modal-content center-align">
                        <?php
                        
                        include_once ("../controlador/controladorestudiante.php");

                        include_once ("../controlador/controladorDocumento.php");

                        //instancia del objeto estudiante y del controlador para llamar los estudiantes de la db y presentarlos en una tabla
                        $ce = new ControladorEstudiante();

                        $todos = $ce->obtenerEstudiante();
                        for ($o=0; $o < 1 ; $o++){ 
                            echo "<div class='row'>";
                            for ($i=0; $i < 4 ; $i++) { 
                                echo "<div class='col s12 m12 l3'>
                                    <div class='card'>
                                        <div class='card-image'>
                                            <img src='img/default-images/defaultuser.png'> 
                                            <a href='' class='btn-floating halfway-fab grey darken-2'>
                                            <i class='material-icons'>more_vert</i>
                                            </a>
                                        </div>
                                        <div class='card-content black white-text'>
                                        <span class='card-title'>Alugno de prueba</span>
                                        </div>
                                    </div>
                                </div>";
                            }
                            echo "</div>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php
include ("footer.php");
?>
</body>
</html>