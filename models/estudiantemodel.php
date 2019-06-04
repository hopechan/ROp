<?php
    class EstudianteModel extends Model{
        public function __construct() {
            parent::__construct();
        }

        function insert($datos){
            try {
                $sql = 'INSERT INTO estudiante (nombre, apellidos, fecha_nacimiento, telefono, email, anio, seccion, centroescolar) 
                    VALUES(:nombre,:apellidos, :fecha_nacimiento, :telefono, :email, :anio, :seccion, :centroescolar)';
                $query = $this->db->conn()->prepare($sql);
                $query->bindParam(':nombre',$datos['nombre'], PDO::PARAM_STR);
                $query->bindParam(':apellidos',$datos['apellid'], PDO::PARAM_STR);
                $PDOexe = $query->execute();
            } catch (PDOException $e) {
                return "La consulta fallo :'v";
            }
        }

        function get(){
            $items = [];
            try {
                $query = $this->db->conn()->query("SELECT * FROM estudiante");
                while ($row = $query->fetch()) {
                    $item = new Estudiante();
                    $item->idEstudiante = $row['idestudiante'];
                    $item->nombre = $row['nombre'];
                    $item->apellidos = $row['apellidos'];
                    $item->fechaNacimiento = $row['fecha_nacimiento'];
                    $item->telefono = $row['telefono'];
                    $item->email = $row['email'];
                    $item->direccion = $row['anio'];
                    $item->seccion = $row['seccion'];
                    $item->centroEscolar = $row['centroescolar'];
                    array_push($items, $item);
                }
                return $items;
            } catch (PDOException $e) {
                return "La consulta fallo :'v";
            }
        }
    }
    
?>