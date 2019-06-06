<?php
include_once 'models/materias.php';
include_once 'models/tipos.php';
class MateriaModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }
    function get()
    {
        $items = [];
        try {
            $sql = "SELECT * FROM materia";
            $query = $this->db->conn()->query($sql);
            while ($row = $query->fetch()) {
                $item = new Materias();
                $item->idmateria = $row['idmateria'];
                $item->idtipo = $row['idtipo'];
                $item->materia = $row['materia'];
                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e) {
            return [];
        }
    }
    public function gettipo()
    {
        $items = [];
        try {
            $query = $this->db->conn()->query("SELECT idtipo,tipo FROM tipo");

            while ($row = $query->fetch()) {
                $item = new Tipos();
                $item->idtipo      = $row['idtipo'];
                $item->tipo        = $row['tipo'];
                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e) {
            return [];
        }
    }
}
