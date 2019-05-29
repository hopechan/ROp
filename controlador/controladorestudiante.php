<?php
require_once("../modelos/conexion.php");
require_once("../modelos/estudiante.php");
class ControladorEstudiante
{
    public function agregarEstudiante(Estudiante $t)
    {
        try {
            $conn = new Conexion();

            $sql = "INSERT INTO estudiante VALUES('".$t->getIdestudiante()."','".$t->getNombre()."','".$t->getApellidos()."','".$t->getFechanacimiento()."','".$t->getTelefono()."','".$t->getEmail()."','".$t->getDireccion()."','".$t->getAnio()."','".$t->getSeccion()."','".$t->getCentroescolar()."')";

            $conn->ejecutar($sql);

            $conn = null;
        } catch (mysqli_sql_exception $e) {

            throw new MySQLiQueryException($sql, $e->getMessage(), $e->getCode());
        }
    }
    public function obtenerEstudiante()
    {

        try {

            $conn = new Conexion();

            $sql = "SELECT * FROM estudiante";

            $rs = $conn->ejecutar($sql);

            $ColeccionEstudiantes = array();
            //Se crea y llena un objeto Estudiante con los datos correspondientes
            while ($Estudiante = $rs->fetch_assoc()) {
                $t = new Estudiante;
                $t->setIdEstudiante($Estudiante['idestudiante']);
                $t->setNombre($Estudiante['nombre']);
                $t->setApellidos($Estudiante['apellidos']);
                $t->setFecha_nacimiento($Estudiante['fecha_nacimiento']);
                $t->setTelefono($Estudiante['telefono']);
                $t->setEmail($Estudiante['email']);
                $t->setDireccion($Estudiante['direccion']);
                $t->setAnio($Estudiante['anio']);
                $t->seteccion($Estudiante['seccion']);
                $t->set($Estudiante['']);
                //se agrega el objeto a una coleccion
                array_push($ColeccionEstudiantes, $t);
            }
            $conn = null;
            return $ColeccionEstudiantes;
        } catch (mysqli_sql_exception $e) {

            throw new MySQLiQueryException($sql, $e->getMessage(), $e->getCode());
        }
    }


    public function BuscarExId($idestudiante){

        try {
           $conn=new Conexion();
           $sql="SELECT idestudiante, nombre, apellidos, fechanacimiento, telefono, email, direccion, anio, seccion, centroescolar FROM estudiante WHERE idestudiante=" . $idestudiante;
           $resultado= $conn->ejecutar($sql);
           $coleccionEstudiante= arrya();
           while ($rs = $resultado->fetch_assoc()) {
              $estudiante = new Estudiante();
              $estudiante->setIdestudiante($resultado['idestudiante']);
              $estudiante->setNombre($resultado['nombre']);
              $estudiante->setApellidos($resultado['apellidos']);
              $estudiante->setFechanacimiento($resultado['fecha_nacimiento']);
              $estudiante->setTelefono($resultado['telefono']);
              $estudiante->setEmail($resultado['email']);
              $estudiante->setDireccion($resultado['direccion']);
              $estudiante->setAnio($resultado['anio']);
              $estudiante->setSeccion($resultado['seccion']);
              $estudiante->setCentroescolar($resultado['centroescolar']);
              array_push($coleccionEstudiante, $estudiante);
           }

           return $coleccionEstudiante;
        } catch (mysqli_sql_exception $e) {
            throw new MySQLiQueryException($sql, $e->getMessage(), $e->getCode());
        }

    }

    public function BorrarEstudiante($idEstudiante){
        try {
            $conn= new Conexion();
            $sql = "DELETE FROM estudiante WHERE idestudiante=" . $idEstudiante;
            $conn->ejecutar($sql);
            $conn=null;
            echo "<script> alert('Estudiante eliminado con exito');</script>";
        } catch (mysqli_sql_exception $e) {
            throw new MySQLiQueryException($sql, $e->getMessage(), $e->getCode());
        }
    }

    public function EditarEstudiante(Estudiante $e){
        try {
            $conn = new Conexion();
            $idestudiante=$e->getIdestudiante();
            $nombre = $e->getNombre();
            $apellidos=$e->getApellidos();
            $fechanacimiento=$e->getFechanacimiento();
            $telefono=$e->getTelefono();
            $email=$e->getEmail();
            $direccion=$e->getDireccion();
            $anio=$e->getAnio();
            $seccion = $e->getSeccion() ;
            $centroescolar=$e->getCentroescolar();
            $telefono=$e->getTelefono();
            $sql = "UPDATE estudiante SET nombre='".$nombre."', apellidos='".$apellidos."', fecha_nacimiento='".$fechanacimiento."', telefono='".$telefono."', email='".$email."', direccion='".$direccion."', anio='".$anio."', seccion='".$seccion."', centroescolar='".$centroescolar."' WHERE idestudiante=".$idestudiante;
            $conn->ejecutar($sql);
            echo "<script>
                    alert('Estudiante actualizado con exito');
                 </script>";
        } catch (mysqli_sql_exception $e) {
            throw new MySQLiQueryException($sql, $e->getMessage(), $e->getCode());
        }
    }

}

    

?>