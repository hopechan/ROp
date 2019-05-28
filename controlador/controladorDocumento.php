<?php
include_once("../modelos/conexion.php");
include_once("../modelos/documento.php");

class ControladorDocumento{

    public function obtenerDocumentos($idEstudiante){
        try {
            $conn = new Conexion();
            $sql = "SELECT idDocumentos, idEstudiantes, tipoDocumentos, documento, descripcion FROM Documento WHERE idEstudiante =".$idEstudiante;
            $coleccionDocumentos = array();
            $rs = $conn->ejecutar($sql);
            while ($documento = $rs->fetch_assoc()) {
                $d = new Documento();
                    $d->setIddocumento($documento['idDocumento']);
                    $d->setIdestudiante($documento['idEstudiante']);
                    $d->setTipodocumento($documento['tipoDocumento']);
                    $d->setDocumento($documento['documento']);
                    $d->setDescripcion($documento['descripcion']);
                array_push($coleccionDocumentos, $d);
            }
            return $coleccionDocumentos;
        } catch (mysqli_sql_exception $e) {
            throw new MySQLiQueryException($sql, $e->getMessage(), $e->getCode());
        }
    }

    function guardarDocumento(Documento $d){
        try {
            $conn = new Conexion();
            $sql = "INSERT INTO documento(iddocumento, idestudiante, tipodocumento, documento, descripcion) VALUES ('".$d->getIdDocumento()."',
                    '".$d->getIdEstudiante()."', '".$d->getTipodocumento()."', '".$d->getDocumento()."', '".$d->getDescripcion()."')";
            $conn->ejecutar($sql);
            $conn = null;
        } catch (mysqli_sql_exception $e) {
            throw new MySQLiQueryException($sql, $e->getMessage(), $e->getCode());
        }
    }

    function borrarDocumento($idDocumento){
        try {
            $conn = new Conexion();
            $sql = "DELETE FROM Documento WHERE idEstudiante=".$idDocumento;
            $conn->ejecutar($sql);
            $conn = null;
        } catch (mysqli_sql_exception $e) {
            throw new MySQLiQueryException($sql, $e->getMessage(), $e->getCode());
        }
    }

    public function actualizarDocumento(Documento $t){
        # code...
    }

    public function MaxId(){
        try {
            $conn= new Conexion();
            $sql = "SELECT MAX(idestudiante) FROM estudiante";
            $resultado = $conn->ejecutar($sql);
            while ($maximo = $resultado->fetch_assoc()) {
                $max = $maximo['MAX(idestudiante)'];
            }
            return $max;
        } catch (mysqli_sql_exception $e) {
            throw new MySQLiQueryException($sql, $e->getMessage(), $e->getCode());
        }
    }

}

?>