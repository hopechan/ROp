<?php
require_once("../modelos/conexion.php");
require_once("../modelos/notace.php");

class ControladorNotaCe{

    public function agregarNotaCe(NotaCe $n){
        try {
           $conn=new Conexion();
           $sql = "INSERT INTO notace(idnotace, idestudiante, idtipo, nota) VALUES (null, '".$n->getIdestudiante()."','".$n->getIdtipo()."','".$n->getNota()."')";
           $resultado = $conn->ejecutar($sql);
           $conn = null;
           echo "<script>
                    alert('Nota agregada con Exito');
                </script>";
        } catch (mysqli_sql_exception $e) {
            throw new MySQLiQueryException($sql, $e->getMessage(), $e->getCode());
        }
    }

    public function obtenerNotace(){
        try {
            $conn= new Conexion();
            $sql = "SELECT idnotace, idestudiante, idtipo, nota FROM notace";
            $resultado = $conn->ejecutar($sql);
            $coleccion= array();
            while ($nota = $resultado->fetch_assoc()) {
                $n = new NotaCe();
                $n->setIdnotace();
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

    public function BuscarnotaceXid($idnotace){
        try {
            $conn=new Conexion();
            $sql="SELECT idnotace, idestudiante, idtipo, nota FROM notace WHERE idnotace=". $idnotace;
            $resultado = $conn->ejecutar($sql);
            $coleccion= array();
            while ($notace= $resultado->fetch_assoc()) {
                $n = new NotaCe();
                $n->setIdnotace($notace['idnotace']);
                $n->setIdestudiante($notace['idestudiante']);
                $n->setIdtipo($notace['idtipo']);
                $n->setNota($notace['nota']);
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
    public function borrarNotace($idnotace){

    }

    public function EditarNotace(NotaCe $n){
        try {
           $conn=new Conexion();
           $sql="UPDATE notace SET nota='".$n->getNota()."' WHERE idnotace=". $n->getIdnotace();
           $resultado = $conn->ejecutar($sql);
           $conn=null;
           echo "<script>
                    alert('Nota actualizada con exito');
                </script>";
        } catch (mysqli_sql_exception $e) {
            throw new MySQLiQueryException($sql, $e->getMessage(), $e->getCode());
        }
    }

    public function notasEstudiante(){
        $conn = new Conexion();
        $sql ="SELECT nc.idnotace, e.nombre, e.apellidos, t.tipo, nc.nota 
                FROM notace as nc
                INNER JOIN estudiante as e ON nc.idestudiante = e.idestudiante
                INNER JOIN tipo as t ON nc.idtipo = t.idtipo";
        $rs = $conn->ejecutar($sql);
        $coleccion= array();
            while ($nota = $rs->fetch_assoc()) {
                $n = new NotaCe();
                $n->setIdnotace($nota['idnotace']);
                $n->setIdestudiante($nota['nombre']." ".$nota['apellidos']);
                $n->setIdtipo($nota['tipo']);
                $n->setNota($nota['nota']);
                array_push($coleccion, $n);
            }
            $conn=null;
            return $coleccion;

    }

}

?>