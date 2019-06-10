<?php
include_once 'models/tipos.php';
class TipoModel extends Model{
    public function __construct(){
        parent::__construct();
    }

    public function insert($datos){
        $sql = 'INSERT INTO tipo (tipo, descripcion) VALUES(:tipo,:descripcion)';
        $query = $this->db->conn()->prepare($sql);
        $query->bindParam(':tipo', $datos['tipo'], PDO::PARAM_STR);
        $query->bindParam(':descripcion', $datos['descripcion'], PDO::PARAM_STR);
        $PDOexe = $query->execute();
    }

    public function update($item){
        $query = $this->db->conn()->prepare('UPDATE tipo SET tipo = :tipo, descripcion= :descripcion WHERE idtipo = :idtipo');
        try {
            $query->execute([
            'idtipo'=> $item['idtipo'],
            'tipo'=> $item['tipo'],
            'descripcion'=> $item['descripcion'],
            ]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function delete($id){
        $query = $this->db->conn()->prepare('DELETE FROM Tipo WHERE idtipo = :idtipo');
        try {
            $query->execute([
            'idtipo'=> $id,
            ]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function get(){
        $items = [];
        try {
            $query = $this->db->conn()->query("SELECT * FROM tipo");

            while ($row = $query->fetch()) {
                $item = new Tipos();
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
    
    public function getById($id){
        $item = new Tipos();

        $query = $this->db->conn()->prepare("SELECT idtipo, tipo, descripcion FROM tipo WHERE idtipo = :idtipo");
        try{
            $query->execute(['idtipo' => $id]);

            while($row = $query->fetch()){
                $item->idtipo      = $row['idtipo'];
                $item->tipo        = $row['tipo'];
                $item->descripcion = $row['descripcion'];
            }
            return $item;
        }catch(PDOException $e){
            return null;
        }
    }

}
