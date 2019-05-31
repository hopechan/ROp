<?php
require_once("../modelos/conexion.php");
require_once("../modelos/notafunda.php");

class ControladornotaFunda{

    public function agregarnotafunda(notafunda $n){
        try {
           $conn=new Conexion();
           $sql = "INSERT INTO notafunda(idnotafunda, idestudiante, idtipo, nota) VALUES (null, '".$n->getIdestudiante()."','".$n->getIdtipo()."','".$n->getNota()."')";
           $resultado = $conn->ejecutar($sql);
           $conn = null;
           echo "<script>
                    alert('Nota agregada con Exito');
                </script>";
        } catch (mysqli_sql_exception $e) {
            throw new MySQLiQueryException($sql, $e->getMessage(), $e->getCode());
        }
    }

    public function obtenernotafunda(){
        try {
            $conn= new Conexion();
            $sql = "SELECT idnotafunda, idestudiante, idtipo, nota FROM notafunda";
            $resultado = $conn->ejecutar($sql);
            $coleccion= array();
            while ($nota = $resultado->fetch_assoc()) {
                $n = new notafunda();
                $n->setIdnotafunda($nota['idnotafunda']);
                $n->setIdestudiante($nota['idestudiante']);
                $n->setIdtipo($nota['idtipo']);
                $n->setNota($nota['nota']);
                array_push($coleccion, $n);
            }
            $conn=null;
            return $coleccion;
        } catch (mysqli_sql_exception $e) {
            throw new MySQLiQueryException($sql, $e->getMessage(), $e->getCode());
        }
    }

    public function BuscarnotafundaXid($idnotafunda){
        try {
            $conn=new Conexion();
            $sql="SELECT idnotafunda, idestudiante, idtipo, nota FROM notafunda WHERE idnotafunda=". $idnotafunda;
            $resultado = $conn->ejecutar($sql);
            $coleccion= array();
            while ($notafunda= $resultado->fetch_assoc()) {
                $n = new notafunda();
                $n->setIdnotafunda($notafunda['idnotafunda']);
                $n->setIdestudiante($notafunda['idestudiante']);
                $n->setIdtipo($notafunda['idtipo']);
                $n->setNota($notafunda['nota']);
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
    public function borrarnotafunda($idnotafunda){

    }

    public function Editarnotafunda(notafunda $n){
        try {
           $conn=new Conexion();
           $sql="UPDATE notafunda SET nota='".$n->getNota()."' WHERE idnotafunda=". $n->getIdnotafunda();
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