<?php
    require_once("../modelos/conexion.php");
    require_once("controladornotace.php");
    $cn = new ControladorNotaCe();
    $notas = $cn->buscarNota($_GET['busqueda']);
    //echo $notas;
    $json = json_encode($notas, JSON_PRETTY_PRINT);
    echo $json;
?>