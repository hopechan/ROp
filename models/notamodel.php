<?php
    include_once 'models/notas.php';
    class NotaModel extends Model{
        public function __construct() {
            parent::__construct();
        }
        
        function get(){
            $items = [];
            try {
                $sql = "SELECT n.idnota, CONCAT(e.nombre, ' ', e.apellidos) as Estudiante, m.materia, n.nota
                        FROM nota as n
                        INNER JOIN estudiante as e ON n.idestudiante = e.idestudiante
                        INNER JOIN materia as m ON n.idmateria = m.idmateria";
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

        function buscar($filtro){
            $items = [];
            try {
                $sql = "SELECT n.idnota, CONCAT(e.nombre, ' ', e.apellidos) as Estudiante, m.materia, n.nota
                        FROM nota as n
                        INNER JOIN estudiante as e ON n.idestudiante = e.idestudiante
                        INNER JOIN materia as m ON n.idmateria = m.idmateria
                        WHERE m.idtipo = (SELECT idtipo FROM tipo WHERE tipo = '".$filtro."')
                        OR m.materia = '".$filtro."'
                        OR e.anio = '".$filtro."'
                        OR e.seccion = '".$filtro."'
                        OR e.nombre = '".$filtro."'
                        OR e.apellidos = '".$filtro."'";
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

        function nuevo()
        {
            # code...
        }
    }
?>