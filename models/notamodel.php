<?php
    include_once 'models/notas.php';
    include_once 'models/materias.php';
    include_once 'models/estudiantes.php';
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

        function getMateria(){
            $items = [];
            try {
                $sql = "SELECT idmateria,materia FROM materia";
                $query = $this->db->conn()->query($sql);
                while ($row = $query->fetch()) {
                    $item = new Materias();
                    $item->idmateria = $row['idmateria'];
                    $item->materia   = $row['materia'];
                    
                    array_push($items, $item);
                }
                return $items;
            } catch (PDOException $e) {
                return [];
            }
        }

        function getEstudiante(){
            $items = [];
            try {
                $query = $this->db->conn()->query("SELECT e.idestudiante,CONCAT(e.nombre, ' ', e.apellidos) as Estudiante FROM estudiante as e");
                while ($row = $query->fetch()) {
                    $item = new Estudiantes();
                    $item->idEstudiante = $row['idestudiante'];
                    $item->Estudiantes = $row['Estudiante'];
                    array_push($items, $item);
                }
                return $items;
            } catch (PDOException $e) {
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

        function insert($datos){
            try {
                $sql= 'INSERT INTO nota (idestudiante, idmateria, nota) VALUES (:idestudiante, :idmateria, :nota)';
                $query = $this->db->conn()->prepare($sql);
                $query->bindParam(':idestudiante',$datos['idestudiante'], PDO::PARAM_INT);
                $query->bindParam(':idmateria',$datos['idmateria'], PDO::PARAM_INT);
                $query->bindParam(':nota',$datos['nota'], PDO::PARAM_STR);
                $PDOexe = $query->execute();
            } catch (PDOException $e) {
                return [];
            }
        }
        public function delete($id){
            $query = $this->db->conn()->prepare('DELETE FROM nota WHERE idnota = :idnota');
            try {
                $query->execute([
                'idnota'=> $id,
                ]);
                return true;
            } catch (PDOException $e) {
                return false;
            }
        }
        public function getById($id){
            $item = new Notas();
    
            $query = $this->db->conn()->prepare("SELECT idnota, nota FROM nota WHERE idnota = :idnota");
            try{
                $query->execute(['idnota' => $id]);
                while($row = $query->fetch()){
                    $item->idnota = $row['idnota'];
                    $item->nota = $row['nota'];    
                }
                return $item;
            }catch(PDOException $e){
                return null;
            }
        }

        public function update($item){
            $query = $this->db->conn()->prepare('UPDATE nota SET idestudiante = :idestudiante, idmateria = :idmateria, nota = :nota WHERE idnota = :idnota');
            try {
                $query->execute([
                'idnota'=> $item['idnota'],
                'idestudiante'=> $item['idestudiante'],
                'idmateria'=> $item['idmateria'],
                'nota'=> $item['nota'],
                ]);
                return true;
            } catch (PDOException $e) {
                return false;
            }
        }
    }
?>