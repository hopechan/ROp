<?php
require_once("conexion.php");
class ControladorPromce
{
    public function agregarPromce(Promce $t)
    {
        try {
            $conn = new Conexion();

            $idPromce = $t->getIdPromce();

            $idestudiante = $t->getIdEstudiante()();

            $promce = $t->getPromce();

            $sql = "INSERT INTO promce(idpromce,idestudiante,promce) VALUES('".$idPromce."','".$idestudiante."','".$promce."')";

            $conn->execQueryO($sql);

            $conn = null;
        } catch (mysqli_sql_exception $e) {

            throw new MySQLiQueryException($sql, $e->getMessage(), $e->getCode());
        }
    }
    public function obtenerPromce()
    {

        try {

            $conn = new Conexion();

            $sql = "SELECT idpromce,idestudiante,promce FROM promce";

            $rs = $conn->execQueryO($sql);

            $ColeccionPromces = array();
            //Se crea y llena un objeto Promce con los datos correspondientes
            while ($Promce = $rs->fetch_assoc()) {
                $t = new Promce;
                $t->setIdPromce($Promce['idpromce']);
                $t->setPromce($Promce['promce']);
                //se agrega el objeto a una coleccion
                array_push($ColeccionPromces, $t);
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