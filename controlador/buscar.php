<?php
    require_once("../modelos/conexion.php");
    require_once("controladornotace.php");
    if (isset($_GET['tabla']) && isset($_GET['busqueda'])) {
        //echo $_GET['tabla'];
        $cn = new ControladorNotaCe();
        $notas = $cn->buscarNota($_GET['busqueda']);
        $n = json_encode($notas, JSON_FORCE_OBJECT);
        //var_dump($notas);
        echo $n;
    }
?>