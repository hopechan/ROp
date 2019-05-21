<?php
include_once("../modelos/conexion.php");
include_once("../modelos/tipo.php");

class ControladorTipo{
    public function obtenerTipos(){
        try {
            $conn = new Conexion();
            $sql = "SELECT idTipo, tipo, descripcion FROM tipo";
            $rs = $conn->ejecutar($sql);
            $coleccionTipos = array();
            while ($tipos = $rs->fetch_assoc()) {
                $t = new Tipo();
                    $t->setIdTipo($tipos['idTipo']);
                    $t->setTipo($tipos['tipo']);
                    $t->setDescripcion($tipos['descripcion']);
                array_push($coleccionTipos, $t);
            }
            $conn = null;
            return $coleccionTipos;
        } catch (mysqli_sql_exception $e) {
            throw new MySQLiQueryException($sql, $e->getMessage(), $e->getCode());
        }
    }

    public function agregarTipo(Tipo $t){
        try {
            $conn = new Conexion();
            $sql = "INSERT INTO Tipo(idTipo, tipo, descripcion) VALUES '".$t->getIdTipo()."', '".$t->getTipo()."', '".$t->getDescripcion()."'";
            $conn->ejecutar($sql);
            $conn = null;
        } catch (mysqli_sql_exception $e) {
            throw new MySQLiQueryException($sql, $e->getMessage(), $e->getCode());
        }
    }

    public function borrarTipo($idTipo){
        try {
            $conn = new Conexion();
            $sql = "DELETE FROM Tipo WHERE idTipo = ".$idTipo;
            $conn->ejecutar($sql);
            $conn = null;
        } catch (mysqli_sql_exception $e) {
            throw new MySQLiQueryException($sql, $e->getMessage(), $e->getCode());
        }   
    }

    public function actualizarTipo(Tipo $t){
        try {
            $conn = new Conexion();
            $sql = "UPDATE Tipo SET idTipo = '".$t->getIdTipo()."', tipo = '".$t->getTipo()."', descripcion = '".$t->getDescripcion()."' WHERE idTipo =".$t->getIdTipo();
            $conn->ejecutar($sql);
            $conn = null;
        } catch (mysqli_sql_exception $e) {
            throw new MySQLiQueryException($sql, $e->getMessage(), $e->getCode());
        }
    }

    public function buscarTipo($tipo){
        try {
            $conn = new Conexion();
            $sql = "SELECT idTipo, tipo, descripcion FROM tipo WHERE tipo LIKE '%".$tipo."%'";
            $rs = $conn->ejecutar($sql);
            $tipoEncontrado = array();
            while ($tipo = $rs->fetch_assoc()) {
                $t = new Tipo();
                $t->setIdTipo($tipo['idTipo']);
                $t->setTipo($tipo['tipo']);
                $t->setDescripcion($tipo['descripcion']);
                array_push($ColeccionTipos, $t);
            }
            $conn = null;
            return $tipoEncontrado;
        } catch (mysqli_sql_exception $e) {
            throw new MySQLiQueryException($sql, $e->getMessage(), $e->getCode());
        }
    }

    public function ObtenerTipoxid($idTipo){
        try {
            $conn = new Conexion();
            $sql="SELECT idTipo, tipo, descripcion FROM tipo WHERE idTipo =" . $idTipo;
            $rs = $conn->ejecutar($sql);
            $coleccion = array();
            while ($tipo = $rs->fetch_assoc()) {
                $t = new Tipo;
                $t->setIdTipo($tipo['idTipo']);
                $t->setTipo($tipo['tipo']);
                $t->setDescripcion($tipo['descripcion']);
                array_push($coleccion, $t);
            }
            $conn = null;
            return $coleccion;
        } catch (mysqli_sql_exception $e) {
            throw new MySQLiQueryException($sql, $e->getMessage(), $e->getCode());
        }
    }
}

?>