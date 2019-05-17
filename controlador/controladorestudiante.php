<?php
require_once("conexion.php");
class ControladorEstudiante
{
    public function agregarEstudiante(Estudiante $t)
    {
        try {
            $conn = new Conexion();

            $idestudiante = $t->getIdestudiante();

            $nombre = $t->getIdnombre();

            $apellido = $t->getapellido();

            $fecha_nacimiento = $t->getIdfecha_nacimiemto();

            $telefono = $t->getIdtelefono();

            $email = $t->getIdemail();

            $direccion = $t->getIddirreccion();

            $anio = $t->getIdanio();

            $seccion = $t->getIdseccion();

            $centroescolar = $t->getIdcentroescolar();

            $sql = "INSERT INTO estudiante VALUES('".$idestudiante."','".$nombre."','".$apellido."','".$fecha_nacimiento."','".$telefono."','".$email."','".$direccion."','".$anio."','".$seccion."','".$centroescolar."')";

            $conn->execQueryO($sql);

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

            $rs = $conn->execQueryO($sql);

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
    public function buscarPromce($Promce)
    {

        try {

            $conn = new Conexion();

            $sql = "SELECT idpromce,idestudiante,promce FROM promce WHERE promce LIKE '%".$Promce."%'";

            $rs = $conn->execQueryO($sql);

            $PromceEncontrado = array();

            while ($Promce = $rs->fetch_assoc()) {

                $t = new Promce();

                $t->setIdPromce($Promce['idpromce']);

                $t->setPromce($Promce['promce']);

                array_push($PromceEncontrado, $t);
            }
            $conn = null;

            return $PromceEncontrado;
        } catch (mysqli_sql_exception $e) {

            throw new MySQLiQueryException($sql, $e->getMessage(), $e->getCode());
        }
    }
    public function borrarPromce($idPromce)
    {
        try {

            $conn = new Conexion();

            $id = $_GET['idpromce'];

            $sql = "DELETE FROM Promce WHERE idpromce = ".$idPromce;

            $conn->execQueryO($sql);

            echo '<script type="text/javascript">
     
           alert("Se ha borrado el elemento");
       
         window.location="../index.php";
          
      </script>';
        } catch (mysqli_sql_exception $e) {

            throw new MySQLiQueryException($sql, $e->getMessage(), $e->getCode());
        }
    }

    public function ObtenerPromcexid($idpromce)
    {
        try {
            $conn = new Conexion();

              $sql="SELECT idpromce, promce FROM promce WHERE idpromce =" . $idpromce;

            $rs = $conn->execQueryO($sql);

            $coleccion = array();

            while ($Promce = $rs->fetch_assoc()) {

                $t = new Promce;

                $t->setIdPromce($Promce['idPromce']);

                $t->setPromce($Promce['Promce']);

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