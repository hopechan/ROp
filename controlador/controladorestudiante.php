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

            return $ColeccionPromces;
        } catch (mysqli_sql_exception $e) {

            throw new MySQLiQueryException($sql, $e->getMessage(), $e->getCode());
        }
    }
}
?>