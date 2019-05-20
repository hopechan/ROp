<?php
require_once("../modelos/conexion.php");
require_once("../modelos/promfunda.php");
class ControladorPromfunda
{
    public function agregarPromfunda(Promfunda $t)
    {
        try {
            $conn = new Conexion();

            $sql = "INSERT INTO Promfunda(idPromfunda,idestudiante,promfunda) VALUES('".$t->getIdpromfunda()."','".$t->getIdestudiante()."','".$t->getPromfunda()."')";

            $conn->ejecutar($sql);

            $conn = null;
        } catch (mysqli_sql_exception $e) {

            throw new MySQLiQueryException($sql, $e->getMessage(), $e->getCode());
        }
    }
    public function obtenerPromfunda()
    {

        try {

            $conn = new Conexion();

            $sql = "SELECT idpromfunda,idestudiante,promfunda FROM promfunda";

            $rs = $conn->ejecutar($sql);

            $ColeccionPromfunda = array();
            //Se crea y llena un objeto Promfunda con los datos correspondientes
            while ($Promfunda = $rs->fetch_assoc()) {

                $t = new Promfunda;

                $t->setIdpromfunda($Promfunda['idpromfunda']);

                $t->setIdestudiante($Promfunda['idestudiante']);

                $t->setPromfunda($Promfunda['promfunda']);

                //se agrega el objeto a una coleccion
                array_push($ColeccionPromfunda, $t);
            }

            $conn = null;

            return $ColeccionPromfunda;
        } catch (mysqli_sql_exception $e) {

            throw new MySQLiQueryException($sql, $e->getMessage(), $e->getCode());
        }
    }
    public function buscarPromfunda($Promfunda)
    {

        try {

            $conn = new Conexion();

            $sql = "SELECT idpromfunda,idestudiante,promfunda FROM promfunda WHERE promfunda LIKE '%".$Promfunda."%'";

            $rs = $conn->ejecutar($sql);

            $PromfundaEncontrado = array();

            while ($Promfunda = $rs->fetch_assoc()) {

                $t = new Promfunda();

                $t->setIdPromfunda($Promfunda['idpromfunda']);

                $t->setIdestudiante($Promfunda['idestudiante']);

                $t->setPromfunda($Promfunda['promfunda']);

                array_push($PromfundaEncontrado, $t);
            }
            $conn = null;

            return $PromfundaEncontrado;
        } catch (mysqli_sql_exception $e) {

            throw new MySQLiQueryException($sql, $e->getMessage(), $e->getCode());
        }
    }
    public function borrarPromfunda($idPromfunda)
    {
        try {

            $conn = new Conexion();

            $sql = "DELETE FROM Promfunda WHERE idpromfunda = ".$idPromfunda;

            $conn->ejecutar($sql);

            echo '<script type="text/javascript">
     
           alert("Se ha borrado el elemento");
       
         window.location="../index.php";
          
      </script>';
        } catch (mysqli_sql_exception $e) {

            throw new MySQLiQueryException($sql, $e->getMessage(), $e->getCode());
        }
    }

    public function ObtenerPromfundaxid($idpromfunda)
    {
        try {
            $conn = new Conexion();

              $sql="SELECT idpromfunda, promfunda FROM promfunda WHERE idpromfunda =" . $idpromfunda;

            $rs = $conn->ejecutar($sql);

            $coleccion = array();

            while ($Promfunda = $rs->fetch_assoc()) {

                $t = new Promce;

                $t->setIdPromfunda($Promfunda['idpromfunda']);

                $t->setIdestudiante($Promfunda['idestudiante']);

                $t->setPromfunda($Promfunda['promfunda']);

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