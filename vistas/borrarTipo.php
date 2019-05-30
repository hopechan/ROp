<?php
include("../controlador/controladorTipo.php");
if(isset($_POST['id'])){
    $id = $_POST['id'];
    $ct = new ControladorTipo();
    $ct->borrarTipo($id);
        }
?>