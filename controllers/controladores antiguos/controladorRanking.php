<?php
include_once("../modelos/ranking.php");
include_once("../modelos/conexion.php");

class ControladorRanking{
    public function obtenerRanking(){
        try {
            $conn = new Conexion();
            $sql = "SELECT idranking, idestudiante, idpromfunda, idpromce, idpromcertificacion, promfundayce, diferencia, idnota_ap, puntuacion FROM ranking";
            $coleccionRanking = array();
            $rs = $conn->ejecutar($sql);
            while ($ranking = $rs->fetch_assoc()) {
                $r = new Ranking();
                    $r->setIdranking($ranking['idranking']);
                    $r->setIdestudiante($ranking['idestudiante']);
                    $r->setIdpromfunda($ranking['idpromfunda']);
                    $r->setIdpromce($ranking['idpromcertificacion']);
                    $r->setPromfundayce($ranking['promfundayce']);
                    $r->setDiferencia($ranking['diferencia']);
                    $r->setIdnota_ap($ranking['idnota_ap']);
                    $r->setPuntaje($ranking['puntuacion']);
                array_push($coleccionRanking, $r);
            }
            $conn = null;
            return $coleccionRanking;
        } catch (mysqli_sql_exception $e) {
            throw new MySQLiQueryException($sql, $e->getMessage(), $e->getCode());
        }
      
    }

    public function guardarRanking(Ranking $r){
        try{
            $conn = new Conexion();
            $sql = "INSERT INTO ranking(idranking, idestudiante, idpromfunda, idpromce, idpromcertificacion, promfundayce, diferencia, idnota_ap, puntuacion) VALUES ('".$r->getIdranking()."', '".$r->getIdestudiante()."', '".$r->getIdpromfunda()."', '".$r->getIdpromce()."', '".$r->getIdpromcertificacion()."', '".$r->getPromfundayce()."', '".$r->getDifencia()."', '".$r->getDiferencia()."', '".$r->getIdnota_ap()."', '".$r->getPuntuacion()."')";
            $conn->ejecutar($sql);
            $conn = null;
        } catch (mysqli_sql_exception $e) {
            throw new MySQLiQueryException($sql, $e->getMessage(), $e->getCode());
        }
    }

    public function borrarRanking($idRanking){
        try{
            $conn = new Conexion();
            $sql = "DELETE FROM ranking WHERE idranking = ".$idRanking;
            $conn->ejecutar($sql);
            $conn = null;   
        }catch (mysqli_sql_exception $e) {
            throw new MySQLiQueryException($sql, $e->getMessage(), $e->getCode());
        }
    }
}

?>