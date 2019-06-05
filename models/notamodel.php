<?php
    class NotaModel extends Model{
        public function __construct() {
            parent::__construct();
        }

        function insert($datos){
            try {
                $sql= 'INSERT INTO tipo (idMateria, idEstudiante, nota) VALUES(:idMateria,:idEstudiante,:nota)';
                $query = $this->db->conn()->prepare($sql);
                $query->bindParam(':idMateria',$datos['idMateria'], PDO::PARAM_STR);
                $query->bindParam(':idEstudiante',$datos['idEstudiante'], PDO::PARAM_STR);
                $query->bindParam(':nota', $datos['nota'], PDO::PARAM_STR);
                $PDOexe = $query->execute();
            } catch (PDOException $e) {
                return "El insert fallo :'v";
            }
        }
        
        function get(){
            $items = [];
            try {
                $query = $this->db->conn()->query("SELECT * FROM Nota");
                while ($row = $query->fetch()) {
                    $item = new Nota();
                    $item->idNota = $row['idNota'];
                    $item->idMateria = $row['idMateria'];
                    $item->idEstudiante = $row['idEstudiante'];
                    $item->nota = $row['nota'];
                    array_push($items, $item);
                }
                return $items;
            } catch(PDOException $e){
                return [];
            }
        }
    }
?>