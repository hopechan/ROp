<?php
    class EstudianteModel extends Model{
        public function __construct() {
            parent::__construct();
        }

        function insert($datos){
            try {
                //echo "Llegue hasta aqui";
                $sql = 'INSERT INTO estudiante (nombre, apellidos, fecha_nacimiento, telefono, email, direccion, anio, seccion, centro_escolar) 
                    VALUES(:nombre,:apellidos, :fecha_nacimiento, :telefono, :email, :direccion, :anio, :seccion, :centro_escolar)';
                $query = $this->db->conn()->prepare($sql);
                $query->bindParam(':nombre',$datos['nombre'], PDO::PARAM_STR);
                $query->bindParam(':apellidos',$datos['apellidos'], PDO::PARAM_STR);
                $query->bindParam(':fecha_nacimiento', $datos['fecha_nacimiento'], PDO::PARAM_INT);
                $query->bindParam(':telefono',$datos['telefono'], PDO::PARAM_INT);
                $query->bindParam(':email',$datos['email'], PDO::PARAM_STR);
                $query->bindParam(':anio',$datos['anio'], PDO::PARAM_INT);
                $query->bindParam(':direccion',$datos['direccion'], PDO::PARAM_STR);
                $query->bindParam(':seccion',$datos['seccion'], PDO::PARAM_STR);
                $query->bindParam(':centro_escolar',$datos['centro_escolar'], PDO::PARAM_STR);
                $PDOexe=$query->execute();
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