<?php
    include_once 'models/notas.php';
    include_once 'models/materias.php';
    include_once 'models/estudiantes.php';
    include_once 'models/tipos.php';
    class NotaModel extends Model{
        public function __construct() {
            parent::__construct();
        }

        function get(){
            $items = [];
            try {
                $sql = "SELECT n.idnota, CONCAT(e.nombre, ' ', e.apellidos) as Estudiante, CONCAT(m.materia,'-', t.tipo) as materia, n.nota_p1, n.nota_p2, n.nota_p3, n.nota_p4
                FROM nota as n
                INNER JOIN estudiante as e ON n.idestudiante = e.idestudiante
                INNER JOIN materia as m ON n.idmateria = m.idmateria
                INNER JOIN tipo as t on t.idtipo=m.idtipo";
                $query = $this->db->conn()->query($sql); 
                while ($row = $query->fetch()) {
                    $item = new Notas();
                    $item->idnota = $row['idnota'];
                    $item->idmateria = $row['materia'];
                    $item->idestudiante = $row['Estudiante'];
                    $item->nota_p1 = $row['nota_p1'];
                    $item->nota_p2 = $row['nota_p2'];
                    $item->nota_p3 = $row['nota_p3'];
                    $item->nota_p4 = $row['nota_p4'];
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
                $sql = "SELECT m.idmateria,m.materia,t.tipo FROM tipo as t INNER JOIN materia as m WHERE t.idtipo=m.idtipo";
                $query = $this->db->conn()->query($sql);
                while ($row = $query->fetch()) {
                    $item = new Materias();
                    $item->idmateria = $row['idmateria'];
                    $item->materia   = $row['materia'];
                    $item->tipo   = $row['tipo'];
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
                $sql = "SELECT n.idnota, CONCAT(e.nombre, ' ', e.apellidos) as Estudiante, m.materia, n.nota_p1, n.nota_p2, n.nota_p3, n.nota_p4
                        FROM nota as n
                        INNER JOIN estudiante as e ON n.idestudiante = e.idestudiante
                        INNER JOIN materia as m ON n.idmateria = m.idmateria
                        WHERE m.idtipo = (SELECT idtipo FROM tipo WHERE tipo = '".$filtro."')
                        OR m.materia LIKE '%".$filtro."%'
                        OR e.anio LIKE '%".$filtro."%'
                        OR e.seccion LIKE '%".$filtro."%'
                        OR e.nombre LIKE '%".$filtro."%'
                        OR e.apellidos LIKE '%".$filtro."%'";
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
                $sql= 'INSERT INTO nota (idestudiante, idmateria, nota_p1, nota_p2, nota_p3, nota_p4) VALUES (:idestudiante, :idmateria, :nota_p1, :nota_p2, :nota_p3, :nota_p4)';
                $query = $this->db->conn()->prepare($sql);
                $query->bindParam(':idestudiante',$datos['idestudiante'], PDO::PARAM_INT);
                $query->bindParam(':idmateria',$datos['idmateria'], PDO::PARAM_INT);
                $query->bindParam(':nota_p1',$datos['nota_p1'], PDO::PARAM_INT);
                $query->bindParam(':nota_p2',$datos['nota_p2'], PDO::PARAM_INT);
                $query->bindParam(':nota_p3',$datos['nota_p3'], PDO::PARAM_INT);
                $query->bindParam(':nota_p4',$datos['nota_p4'], PDO::PARAM_INT);
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
            $query = $this->db->conn()->prepare("SELECT n.idnota, n.idestudiante,e.nombre,e.apellidos,n.idmateria, n.nota_p1, n.nota_p2, n.nota_p3, n.nota_p4, m.materia,m.idmateria
            FROM NOTA AS n
            INNER JOIN estudiante as e ON e.idestudiante = n.idestudiante
            INNER JOIN materia as m ON m.idmateria = n.idmateria
            WHERE n.idnota = :idnota");
            try{
                $query->execute(['idnota' => $id]);
                while($row = $query->fetch()){
                    $item->idnota = $row['idnota'];
                    $item->idestudiante = $row['idestudiante'];
                    $item->nota_p1 = $row['nota_p1'];
                    $item->nota_p2 = $row['nota_p2'];
                    $item->nota_p3 = $row['nota_p3'];
                    $item->nota_p4 = $row['nota_p4'];
                    $item->nombre = $row['nombre']; 
                    $item->apellidos = $row['apellidos'];  
                    $item->idmateria = $row['idmateria'];
                    $item->materia = $row['materia'];
                }
                return $item;
            }catch(PDOException $e){
                return null;
            }
        }

        public function update($item){
            $query = $this->db->conn()->prepare('UPDATE nota SET idestudiante = :idestudiante, idmateria = :idmateria, nota_p1 = :nota_p1, nota_p2 = :nota_p2, nota_p3 = :nota_p3, nota_p4 = :nota_p4 WHERE idnota = :idnota');
            try {
                $query->execute([
                'idnota'=> $item['idnota'],
                'idestudiante'=> $item['idestudiante'],
                'idmateria'=> $item['idmateria'],
                'nota_p1'=> $item['nota_p1'],
                'nota_p2'=> $item['nota_p2'],
                'nota_p3'=> $item['nota_p3'],
                'nota_p4'=> $item['nota_p4']
                ]);
                return true;
            } catch (PDOException $e) {
                return false;
            }
        }

        function getNotasByTipo($tipo){
            $items = [];
            try {
                $sql = "SELECT e.idestudiante, n.idnota,CONCAT(e.nombre, ' ', e.apellidos) as estudiante,m.materia, ((n.nota_p1 + n.nota_p2 + n.nota_p3 + n.nota_p4)/4) as promedio 
                        FROM nota as n
                        INNER JOIN estudiante as e ON e.idestudiante = n.idestudiante
                        INNER JOIN materia as m ON m.idmateria = n.idmateria
                        WHERE m.idtipo = '".$tipo."'
                        ORDER BY n.idestudiante";
                $query = $this->db->conn()->query($sql);
                while ($row = $query->fetch()) {
                    $item = new Notas();
                    $item->idnota = $row['idnota']; //idnota
                    $item->idestudiante = $row['idestudiante']; //idestudiante
                    $item->idmateria = $row['materia']; //materia
                    $item->nota_p1 = $row['estudiante']; //estudiante
                    $item->nota_p2 = $row['promedio']; //promedio
                    array_push($items, $item);
                }
                /*
                while ($row = $query->fetch()) {
                    $item = new Nota();

                    $item = ['idestudiante' => $row['idestudiante'], 
                            'idnota' => $row['idnota'], 
                            'estudiante'=> $row['estudiante'],
                            'materia' => $row['materia'],
                            'promedio' => $row['promedio']];
                    array_push($items, $item);
                }
                */
                return $items;
            } catch(PDOException $e){
                return [];
            }
        }

        function promedios($notas, $divisor){
            $last = end($notas);
            $id = $last->idestudiante;
            $suma = 0;
            $datos = [];
            $idest = 0;
            $nombre = '';
            for ($i=1; $i <=$id; $i++) {
                foreach ($notas as $nota ) {
                    if ($nota->idestudiante == $i) {
                        $suma += $nota->nota_p2;
                        $idest = $nota->idestudiante;
                        $nombre = $nota->nota_p1;
                    }
                }
                $dato = ['idestudiante' => $idest,'estudiante' => $nombre,'promedio' => $suma/$divisor];
                $suma = 0;
                array_push($datos, $dato);
            }
            
            return $datos;
        }

        function listaFinal($notasCCGK, $notasCE){
            $lista = array_merge($notasCCGK, $notasCE);
            //echo "<script> console.log(".var_dump($notasCE).")</script>";
            $last = end($lista);
            $id = $last['idestudiante'];
            $suma = 0;
            $ranking = [];
            $idest = 0;
            $nombre = '';
            for ($i=1; $i < $id; $i++) {
                foreach ($lista as $l ) {
                    if ($l['idestudiante'] == $i) {
                        $suma += $l['promedio'];
                        $idest = $l['idestudiante'];
                        $nombre = $l['estudiante'];
                    }
                }
                $pos = ['idestudiante' => $idest,'estudiante' => $nombre,'promedio' => round($suma/3, 1)];
                $suma = 0;
                array_push($ranking, $pos);
            }
            return $ranking;
        }
        
        function getNotasByTipoEstudiante($tipo, $idestudiante){
            $items = [];
            try {
                $sql = "SELECT e.idestudiante, n.idnota,CONCAT(e.nombre, ' ', e.apellidos) as estudiante,m.materia, ((n.nota_p1 + n.nota_p2 + n.nota_p3 + n.nota_p4)/4) as promedio 
                        FROM nota as n
                        INNER JOIN estudiante as e ON e.idestudiante = n.idestudiante
                        INNER JOIN materia as m ON m.idmateria = n.idmateria
                        WHERE m.idtipo = '".$tipo."' AND '".$idestudiante."'
                        ORDER BY n.idestudiante";
                $query = $this->db->conn()->query($sql);
                while ($row = $query->fetch()) {
                    $item = new Notas();
                    $item->idnota = $row['idnota']; //idnota
                    $item->idestudiante = $row['idestudiante']; //idestudiante
                    $item->idmateria = $row['materia']; //materia
                    $item->nota_p1 = $row['estudiante']; //estudiante
                    $item->nota_p2 = $row['promedio']; //promedio
                    array_push($items, $item);
                }
                return $items;
            } catch(PDOException $e){
                return [];
            }
        }
    }
?>
