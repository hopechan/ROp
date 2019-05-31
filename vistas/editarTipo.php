<?php
include("../controlador/controladorTipo.php");

    $id = $_POST['id'];
    $tipo = $_POST['name'];
    $descripcion = $_POST['descripcion'];
    $ct = new ControladorTipo();
    $actualizarTipo = new Tipo();
    $actualizarTipo->setIdTipo($id);
    $actualizarTipo->setTipo($tipo);
    $actualizarTipo->setDescripcion($descripcion);
    $ct->actualizarTipo($actualizarTipo); 
?>