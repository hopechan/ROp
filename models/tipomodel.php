<?php
class TipoModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insert($datos)
    {
        $sql = 'INSERT INTO tipo (tipo, descripcion) VALUES(:tipo,:descripcion)';
        $query = $this->db->conn()->prepare($sql);
        $query->bindParam(':tipo', $datos['tipo'], PDO::PARAM_STR);
        $query->bindParam(':descripcion', $datos['descripcion'], PDO::PARAM_STR);
        $PDOexe = $query->execute();
    }
    public function get()
    {
        $items = [];
        try {
            $query = $this->db->conn()->query("SELECT * FROM tipo");

            while ($row = $query->fetch()) {
                $item = new Tipo();
                $item->idtipo      = $row['idtipo'];
                $item->tipo        = $row['tipo'];
                $item->descripcion = $row['descripcion'];

                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e) {
            return [];
        }
    }
}
