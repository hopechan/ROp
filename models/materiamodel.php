<?php
include_once 'models/tipos.php';
include_once 'models/materias.php';
class MateriaModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }
    function get(){
        $items = [];
        try {
            $sql2 = "SELECT * FROM materia";
            $query2 = $this->db->conn()->query($sql2);
            $sql = "SELECT m.idmateria,m.idtipo,m.materia,t.tipo
            FROM materia m, tipo t
            WHERE t.idtipo = m.idtipo";
            $query = $this->db->conn()->query($sql);

            while ($row = $query->fetch()) {
                $item = new Materias();
                $item->idmateria = $row['idmateria'];
                $item->idtipo    = $row['idtipo'];
                $item->materia   = $row['materia'];
                $item->tipo  = $row['tipo'];
                
                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e) {
            return [];
        }
    }
    
    function gettipo(){
        $items = [];
        try {
            $query = $this->db->conn()->query("SELECT idtipo,tipo FROM tipo");

            while ($row = $query->fetch()) {
                $item = new Tipos();
                $item->idtipo = $row['idtipo'];
                $item->tipo   = $row['tipo'];

                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e) {
            return [];
        }
    }
    
    function insert($datos){
        try {
            $sql= 'INSERT INTO materia (idtipo, materia) VALUES(:idtipo,:materia)';
            $query = $this->db->conn()->prepare($sql);
            $query->bindParam(':idtipo',$datos['idtipo'], PDO::PARAM_INT);
            $query->bindParam(':materia', $datos['materia'], PDO::PARAM_STR);
            $PDOexe = $query->execute();
        } catch (PDOException $e) {
            return "El insert fallo :'v";
        }
    }
    public function update($item){
        $query = $this->db->conn()->prepare('UPDATE materia SET materia = :materia, idtipo = :idtipo WHERE idmateria = :idmateria');
        try {
            $query->execute([
            'idmateria'=> $item['idmateria'],
            'idtipo'=> $item['idtipo'],
            'materia'=> $item['materia'],
            ]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function delete($id){
        $query = $this->db->conn()->prepare('DELETE FROM materia WHERE idmateria = :idmateria');
        try {
            $query->execute([
            'idmateria'=> $id,
            ]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function getById($id){
        $item = new Materias();

        $query = $this->db->conn()->prepare("SELECT m.idmateria, m.materia, m.idtipo, t.tipo
        FROM materia as m
        INNER JOIN tipo as t ON t.idtipo = m.idtipo
        WHERE m.idmateria = :idmateria");
        try{
            $query->execute(['idmateria' => $id]);

            while($row = $query->fetch()){
                $item->idmateria = $row['idmateria'];
                $item->idtipo    = $row['idtipo'];
                $item->tipo      = $row['tipo'];
                $item->materia   = $row['materia'];

            }
            return $item;
        }catch(PDOException $e){
            return null;
        }
    }
}
