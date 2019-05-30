<?php
include_once("../modelos/conexion.php");

//Mostrando un tipo
$conn = new Conexion();
$sql = "SELECT idtipo, tipo, descripcion FROM tipo";
$rs = $conn->ejecutar($sql);
$json = array();
while ($row = $rs->fetch_array()) {
    $json[] = array(
        'id' => $row['idtipo'],
        'name' => $row['tipo'],
        'descripcion' => $row['descripcion']
    );
}
$jsonstring = json_encode($json);
echo $jsonstring;
