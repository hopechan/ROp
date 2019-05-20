<?php
require_once("../modelos/conexion.php");
require_once("../modelos/estudiante.php");
class ControladorPromcertificacion
{
    public function agregarPromcertificacion(Promcertificacion $t)
    {
        try {
            $conn = new Conexion();

            $sql = "INSERT INTO Promcertificacion(idpromcertificacion,idestudiante,promcertificacion) VALUES('".$t->getIdpromcertificacion()."','".$t->getIdestudiante()."','".$t->getPromcertificacion()."')";

            $conn->ejecutar($sql);

            $conn = null;
        } catch (mysqli_sql_exception $e) {

            throw new MySQLiQueryException($sql, $e->getMessage(), $e->getCode());
        }
    }
    public function obtenerPromcertificacion()
    {

        try {

            $conn = new Conexion();

            $sql = "SELECT idpromcertificacion,idestudiante,promcertificacion FROM promcertificacion";

            $rs = $conn->ejecutar($sql);

            $ColeccionPromcertificacion = array();
            //Se crea y llena un objeto Promcertificacion con los datos correspondientes
            while ($Promcertificacion = $rs->fetch_assoc()) {

                $t = new Promcertificacion;

                $t->setIdpromcertificacion($Promcertificacion['idpromcertificacion']);

                $t->setIdestudiante($Promcertificacion['idestudiante']);

                $t->setPromcertificacion($Promcertificacion['promcertificacion']);

                //se agrega el objeto a una coleccion
                array_push($ColeccionPromcertificacion, $t);
            }

            $conn = null;

            return $ColeccionPromcertificacion;
        } catch (mysqli_sql_exception $e) {

            throw new MySQLiQueryException($sql, $e->getMessage(), $e->getCode());
        }
    }
    public function buscarPromcertificacion($Promcertificacion)
    {

        try {

            $conn = new Conexion();

            $sql = "SELECT idpromcertificacion,idestudiante,promcertificacion FROM promcertificacion WHERE promcertificacion LIKE '%".$Promcertificacion."%'";

            $rs = $conn->ejecutar($sql);

            $PromcertificacionEncontrado = array();

            while ($Promcertificacion = $rs->fetch_assoc()) {

                $t = new Promcertificacion();

                $t->setIdpromcertificacion($Promcertificacion['idpromcertificacion']);

                $t->setIdestudiante($Promcertificacion['idestudiante']);

                $t->setPromcertificacion($Promcertificacion['promcertificacion']);

                array_push($PromcertificacionEncontrado, $t);
            }
            $conn = null;

            return $PromcertificacionEncontrado;
        } catch (mysqli_sql_exception $e) {

            throw new MySQLiQueryException($sql, $e->getMessage(), $e->getCode());
        }
    }
    public function borrarPromcertificacion($idPromcertificacion)
    {
        try {

            $conn = new Conexion();

            $sql = "DELETE FROM Promcertificacion WHERE idpromcertificacion = ".$idPromcertificacion;

            $conn->ejecutar($sql);

            echo '<script type="text/javascript">
     
           alert("Se ha borrado el elemento");
       
         window.location="../index.php";
          
      </script>';
        } catch (mysqli_sql_exception $e) {

            throw new MySQLiQueryException($sql, $e->getMessage(), $e->getCode());
        }
    }

    public function ObtenerPromcertificacionxid($idpromcertificacion)
    {
        try {
            $conn = new Conexion();

              $sql="SELECT idpromcertificacion, promcertificacion FROM promcertificacion WHERE idpromcertificacion =" . $idpromcertificacion;

            $rs = $conn->ejecutar($sql);

            $coleccion = array();

            while ($Promcertificacion = $rs->fetch_assoc()) {

                $t = new Promce;

                $t->setIdpromcertificacion($Promcertificacion['idpromcertificacion']);

                $t->setIdestudiante($Promcertificacion['idestudiante']);

                $t->setPromcertificacion($Promcertificacion['promcertificacion']);

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