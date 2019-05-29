<?php
    require_once("../modelos/conexion.php");
    require_once("controladornotace.php");
    if (isset($_GET['tabla']) && isset($_GET['busqueda'])) {
        $cn = new ControladorNotaCe();
        $notas = $cn->buscarNota($_GET['busqueda']);
        $json = json_encode($notas, JSON_PRETTY_PRINT);
        
    }
?>