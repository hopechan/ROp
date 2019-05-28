<?php
    require_once("../modelos/conexion.php");
    require_once("controladornotace.php");
    if (isset($_GET['tabla']) && isset($_GET['busqueda'])) {
        //echo $_GET['tabla'];
        $cn = new ControladorNotaCe();
        $notas = $cn->buscarNota($_GET['busqueda']);
        //var_dump($notas[0]);
        $json = json_encode($notas);
        echo $json;
    }
?>