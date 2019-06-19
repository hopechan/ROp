<?php
include_once 'models/mains.php';
class MainModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }
    function getNotas()
    {
        $items = [];
        try {
            $sql = "SELECT * FROM nota";
            $query = $this->db->conn()->query($sql);
            while ($row = $query->fetch()) {
                $item = new Mains();
                $item->idnota = $row['idnota'];
                $item->idestudiante    = $row['idestudiante'];
                $item->idmateria   = $row['idmateria'];
                $item->nota_p1      = $row['nota_p1'];
                $item->nota_p2      = $row['nota_p2'];
                $item->nota_p3      = $row['nota_p3'];
                $item->nota_p4      = $row['nota_p4'];

                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e) {
            return [];
        }
    }
    function getEstudiantes()
    {
        $items = [];
        try {
            $sql = "SELECT idestudiante,nombre,apellidos FROM estudiante";
            $query = $this->db->conn()->query($sql);
            while ($row = $query->fetch()) {
                $item = new Mains();

                $item->idestudiante = $row['idestudiante'];
                $item->nombre = $row['nombre'];
                $item->apellidos = $row['apellidos'];

                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e) {
            return [];
        }
    }

    function getTotal()
    {
        try {
            $item = new Mains();
            $sql = "SELECT count(idestudiante) AS idestudiante FROM estudiante ";
            $query = $this->db->conn()->query($sql);
            while ($row = $query->fetch()) {
                $item->idestudiante  = $row['idestudiante'];
            }
            return $item;
        } catch (PDOException $e) {
            return [];
        }
    }
}
