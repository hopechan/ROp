<?php
include_once("../modelos/reporteap.php");
include_once("../modelos/conexion.php");

class ControladorReporteAp{
    public function obtenerReporteAp(){
        try {
            $conn = new Conexion();
            $sql = "SELECT idreporteap, idestudiante, idtipo, anio, seccion, nota, observaciones FROM reporteap";
            $rs = $conn->ejecutar($sql);
            $coleccionReporte = array();
            while ($reporte = $rs->fetch_assoc()) {
                $rap = new Reporteap();
                    $rap->setIdreporteap($reporte['idreporte']);
                    $rap->setIdestudiante($reporte['idestudiante']);
                    $rap->setIdtipo($reporte['idtipo']);
                    $rap->setAnio($reporte['anio']);
                    $rap->setSeccion($reporte['seccion']);
                    $rap->setNota($reporte['nota']);
                    $rap->setObservaciones($reporte['observaciones']);
                array_push($coleccionReporte, $rap);
            }
            $conn = null;
            return $coleccionReporte;
        } catch (mysqli_sql_exception $e) {
            throw new MySQLiQueryException($sql, $e->getMessage(), $e->getCode());
        }
    }

    public function agregarReporteAp(Reporteap $rap){
        try {
            $conn = new Conexion();
            $sql = "INSERT INTO reporteap(idreporte, idestudiante, idtipo, anio, seccion, nota, observaciones) VALUES ('".$rap->getIdreporte."', '".$rap->getIdestudiante()."', '".$rap->getIdtipo()."', '".$rap->getAnio()."', '".$rap->getSeccion()."', '".$rap->getNota()."', '".$rap->getObservaciones()."')"; 
            $conn->ejecutar($sql);
            $conn = null;
        } catch (mysqli_sql_exception $e) {
            throw new MySQLiQueryException($sql, $e->getMessage(), $e->getCode());
        }
    }

    public function borrarReporteAp($idreporteap){
        try {
            $conn = new Conexion();
            $sql = "DELETE FROM reporteap WHERE idreporteap =".$idreporteap;
            $conn->ejecutar($sql);
            $conn = null;
        } catch (mysqli_sql_exception $e) {
            throw new MySQLiQueryException($sql, $e->getMessage(), $e->getCode());
        }
      
    }

    public function actualizarReporteAp(Reporteap $rap){
        try {
            $conn = new Conexion();
            $sql = "UPDATE reporteap SET idreporteap = '".$rap->getIdreporteap()."', '".$rap->getIdestudiante()."', '".$rap->getIdtipo()."', '".$rap->getAnio()."', '".$rap->getNota()."', '".$rap->getObservaciones()."' WHERE idreporteap = ".$rap->getIdreporteap();
            $conn->ejecutar($sql);
            $conn = null;
        } catch (mysqli_sql_exception $e) {
            throw new MySQLiQueryException($sql, $e->getMessage(), $e->getCode());
        }
    }
}

?>