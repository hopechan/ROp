<?php
    include_once 'models/notas.php';
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
        
        function get($tipo){
            $items = [];
            try {
                $sql = "SELECT n.idnota, CONCAT(e.nombre, ' ', e.apellidos) as Estudiante, m.materia, n.nota
                        FROM nota as n
                        INNER JOIN estudiante as e ON n.idestudiante = e.idestudiante
                        INNER JOIN materia as m ON n.idmateria = m.idmateria
                        WHERE m.idtipo = (SELECT idtipo FROM tipo WHERE tipo = '".$tipo."' )";
                $query = $this->db->conn()->query($sql);
                while ($row = $query->fetch()) {
                    $item = new Notas();
                    $item->idnota = $row['idnota'];
                    $item->idmateria = $row['materia'];
                    $item->idestudiante = $row['Estudiante'];
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