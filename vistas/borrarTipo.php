<?php
include("head.php");
include("navbar.php");
include("../controlador/controladorTipo.php");
    $id = $_GET['idTipo'];
    $ct = new ControladorTipo();
    $ct->borrarTipo($id);
    echo '<script type="text/javascript">
            alert("Se ha eliminado el registro");
            window.location="/Rop/vistas/vistaTipo.php";
            </script>';

include("footer.php");
?>