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
        <div class="row">
            <div class="col s12 m12 l12">
                <a href="webEstudiante.php" class="btn black"><i class="material-icons left">arrow_back</i>Atrás</a>
            </div>
        </div>
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
                    <div class="card-reveal">
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
                        <img src="img/programa.jpg" class="acativator size-cards">
                    </div>
                    <div class="card-content black">
                        <span class="card-title activator white-text">
                            Segundo Año
                            <i class="material-icons right">more_vert</i>
                        </span>
                        <p><a href="#modal2" class="btn grey darken-2 modal-trigger">Visualizar</a></p>
                    </div>
                    <div class="card-reveal">
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
                        <img src="img/chicas.jpg" class="acativator size-cards">
                    </div>
                    <div class="card-content black">
                        <span class="card-title activator white-text">
                            Tercer Año
                            <i class="material-icons right">more_vert</i>
                        </span>
                        <p><a href="#modal3" class="btn grey darken-2 modal-trigger">Visualizar</a></p>
                    </div>
                    <div class="card-reveal">
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
                        <?php
                        
                        include_once ("../controlador/controladorestudiante.php");

                        include_once ("../controlador/controladorDocumento.php");

                        //instancia del objeto estudiante y del controlador para llamar los estudiantes de la db y presentarlos en una tabla
                        $ce = new ControladorEstudiante();
                        $cd = new controladorDocumento();
                        $año = $ce->SacarYear();
                        $todos = $ce->obtenerEstudiante($año);
                        for ($o=0; $o < 1 ; $o++){ 
                            echo "<div class='row'>";
                            for ($i=0; $i < sizeof($todos) ; $i++) { 
                                $id = $todos[$i]->getIdEstudiante();
                                echo "<div class='col s12 m12 l3'>
                                    <div class='card'>
                                        <div class='card-image'>
                                            <img src='img/default-images/defaultuser.png'>";
                                            echo "<span>" . $todos[$i]->getNombre() . "</span><br>";
                                            echo "<span>" . $todos[$i]->getApellidos() . "</span>";
                                    echo "</div>
                                        <div class='card-content black white-text'>
                                        <a href='' class='btn-floating  grey darken-2 center'>
                                        <i class='material-icons left'>account_circle</i>
                                        </a>
                                        &nbsp;
                                        <a href='' class='btn-floating  grey darken-2'>
                                        <i class='material-icons left'>book</i>
                                        </a>  
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
        <div class="row size-estu">
            <div class="col s12 m12 l12">
              <div class="modal" id="modal2">
                 <div class="modal-content center-align">
                 <?php
                        
                        include_once ("../controlador/controladorestudiante.php");

                        include_once ("../controlador/controladorDocumento.php");

                        //instancia del objeto estudiante y del controlador para llamar los estudiantes de la db y presentarlos en una tabla
                        $ce = new ControladorEstudiante();
                        $cd = new controladorDocumento();
                        $año = $ce->SacarYear();
                        $todos = $ce->obtenerEstudiante($año-1);
                        for ($o=0; $o < 1 ; $o++){ 
                            echo "<div class='row'>";
                            for ($i=0; $i < sizeof($todos) ; $i++) { 
                                $id = $todos[$i]->getIdEstudiante();
                                echo "<div class='col s12 m12 l3'>
                                    <div class='card'>
                                        <div class='card-image'>
                                            <img src='img/default-images/defaultuser.png'>";
                                            echo "<span>" . $todos[$i]->getNombre() . "</span><br>";
                                            echo "<span>" . $todos[$i]->getApellidos() . "</span>";
                                    echo "</div>
                                        <div class='card-content black white-text'>
                                        <a href='' class='btn-floating  grey darken-2 center'>
                                        <i class='material-icons left'>account_circle</i>
                                        </a>
                                        &nbsp;
                                        <a href='' class='btn-floating  grey darken-2'>
                                        <i class='material-icons left'>book</i>
                                        </a>  
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
        <div class="row">
            <div class="col s12 m12 l12">
                <div class="modal" id="modal3">
                    <div class="modal-content center-align">
                    <?php
                        
                        include_once ("../controlador/controladorestudiante.php");

                        include_once ("../controlador/controladorDocumento.php");

                        //instancia del objeto estudiante y del controlador para llamar los estudiantes de la db y presentarlos en una tabla
                        $ce = new ControladorEstudiante();
                        $cd = new controladorDocumento();
                        $año = $ce->SacarYear();
                        $todos = $ce->obtenerEstudiante($año-2);
                        for ($o=0; $o < 1 ; $o++){ 
                            echo "<div class='row'>";
                            for ($i=0; $i < sizeof($todos) ; $i++) { 
                                $id = $todos[$i]->getIdEstudiante();
                                echo "<div class='col s12 m12 l3'>
                                    <div class='card'>
                                        <div class='card-image'>
                                            <img src='img/default-images/defaultuser.png'>";
                                            echo "<span>" . $todos[$i]->getNombre() . "</span><br>";
                                            echo "<span>" . $todos[$i]->getApellidos() . "</span>";
                                    echo "</div>
                                        <div class='card-content black white-text'>
                                        <a href='' class='btn-floating  grey darken-2 center'>
                                        <i class='material-icons left'>account_circle</i>
                                        </a>
                                        &nbsp;
                                        <a href='' class='btn-floating  grey darken-2'>
                                        <i class='material-icons left'>book</i>
                                        </a>  
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
    $ce = new Controladorestudiante();

include ("footer.php");
?>
</body>
</html>
