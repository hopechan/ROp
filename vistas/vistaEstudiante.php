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
                        <img src="img/estudiantes.jpg" class="acativator">
                    </div>
                    <div class="card-content black">
                        <span class="card-title activator white-text">
                            Primer Año
                            <i class="material-icons right">more_vert</i>
                        </span>
                        <p><a href="#" class="btn grey darken-2">Visualizar</a></p>
                    </div>
                    <div class="card-reveal">
                        span.card-title
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