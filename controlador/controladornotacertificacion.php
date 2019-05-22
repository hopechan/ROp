<?php

require_once("../modelos/conexion.php");
require_once("../modelos/notacertificacion.php");

class ControladornotaCertificacion{

    public function agregarnotacertificacion(notacertificacion $n){
        try {
           $conn=new Conexion();
           $sql = "INSERT INTO notacertificacion(idnotacertificacion, idestudiante, idtipo, nota) VALUES (null, '".$n->getIdestudiante()."','".$n->getIdtipo()."','".$n->getNota()."')";
           $resultado = $conn->ejecutar($sql);
           $conn = null;
           echo "<script>
                    alert('Nota agregada con Exito');
                </script>";
        } catch (mysqli_sql_exception $e) {
            throw new MySQLiQueryException($sql, $e->getMessage(), $e->getCode());
        }
    }

    public function obtenernotacertificacion(){
        try {
            $conn= new Conexion();
            $sql = "SELECT idnotacertificacion, idestudiante, idtipo, nota FROM notacertificacion";
            $resultado = $conn->ejecutar($sql);
            $coleccion= array();
            while ($nota = $resultado->fetch_assoc()) {
                $n = new notacertificacion();
                $n->setIdnotacertificacion();
                $n->setIdestudiante();
                $n->setIdtipo();
                $n->setNota();
                array_push($coleccion, $n);
            }
            $conn=null;
            return $coleccion;
        } catch (mysqli_sql_exception $e) {
            throw new MySQLiQueryException($sql, $e->getMessage(), $e->getCode());
        }
    }

    public function BuscarnotacertificacionXid($idnotacertificacion){
        try {
            $conn=new Conexion();
            $sql="SELECT idnotacertificacion, idestudiante, idtipo, nota FROM notacertificacion WHERE idnotacertificacion=". $idnotacertificacion;
            $resultado = $conn->ejecutar($sql);
            $coleccion= array();
            while ($notacertificacion= $resultado->fetch_assoc()) {
                $n = new notacertificacion();
                $n->setIdnotacertificacion($notacertificacion['idnotacertificacion']);
                $n->setIdestudiante($notacertificacion['idestudiante']);
                $n->setIdtipo($notacertificacion['idtipo']);
                $n->setNota($notacertificacion['nota']);
                array_push($coleccion, $n);
            }
            $conn=null;
            return $coleccion;
        } catch (mysqli_sql_exception $e) {
            throw new MySQLiQueryException($sql, $e->getMessage(), $e->getCode());
        }
    }

    //la funcion borrar queda en pausa por lo del documento que esta de mas 
    // cuando hallemos la forma de generar la funcion sin el documento extra la sigo :v
    public function borrarnotacertificacion($idnotacertificacion){

    }

    public function Editarnotacertificacion(notacertificacion $n){
        try {
           $conn=new Conexion();
           $sql="UPDATE notacertificacion SET nota='".$n->getNota()."' WHERE idnotacertificacion=". $n->getIdnotacertificacion();
           $resultado = $conn->ejecutar($sql);
           $conn=null;
           echo "<script>
                    alert('Nota actualizada con exito');
                </script>";
        } catch (mysqli_sql_exception $e) {
            throw new MySQLiQueryException($sql, $e->getMessage(), $e->getCode());
        }
    }

}

?>