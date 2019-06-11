<?php
include_once 'estudiantes.php';
class EstudianteModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    function insert($datos)
    {
        try {
            //echo "Llegue hasta aqui";
            $sql = 'INSERT INTO estudiante (nombre, apellidos, fecha_nacimiento, telefono, email, direccion, anio, seccion, centro_escolar) 
                    VALUES(:nombre,:apellidos, :fecha_nacimiento, :telefono, :email, :direccion, :anio, :seccion, :centro_escolar)';
            $query = $this->db->conn()->prepare($sql);
            $query->bindParam(':nombre', $datos['nombre'], PDO::PARAM_STR);
            $query->bindParam(':apellidos', $datos['apellidos'], PDO::PARAM_STR);
            $query->bindParam(':fecha_nacimiento', $datos['fecha_nacimiento'], PDO::PARAM_INT);
            $query->bindParam(':telefono', $datos['telefono'], PDO::PARAM_INT);
            $query->bindParam(':email', $datos['email'], PDO::PARAM_STR);
            $query->bindParam(':anio', $datos['anio'], PDO::PARAM_INT);
            $query->bindParam(':direccion', $datos['direccion'], PDO::PARAM_STR);
            $query->bindParam(':seccion', $datos['seccion'], PDO::PARAM_STR);
            $query->bindParam(':centro_escolar', $datos['centro_escolar'], PDO::PARAM_STR);
            $PDOexe = $query->execute();
        } catch (PDOException $e) {
            return "La consulta fallo :v";
        }
    }

    function get(){
        $items = [];
        try {
            $query = $this->db->conn()->query("SELECT * FROM estudiante");
            while ($row = $query->fetch()) {
                $item = new Estudiante();
                $item->idestudiante = $row['idestudiante'];
                $item->nombre=$row['nombre'];
                $item->apellidos=$row['apellidos'];
                $item->fecha_nacimiento=$row['fecha_nacimiento'];
                $item->telefono=$row['telefono'];
                $item->email=$row['email'];
                $item->direccion=$row['direccion'];
                $item->anio=$row['anio'];
                $item->seccion=$row['seccion'];
                $item->centro_escolar=$row['centro_escolar'];
                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e) {
            return "La consulta fallo :v";
        }
    }

    function eliminar($id)
    {
      $query=$this->db->conn()->prepare('DELETE FROM estudiante WHERE idestudiante=:idestudiante');
      try {
          $query->execute(['idestudiante'=>$id]);
          return true;
      } catch (PDOException $e) {
          return "Error al tratar de eliminar el registro";
      }
    }

    public function getById($id)
    {
        $item=new Estudiantes();
        $sql="SELECT idestudiante, nombre, apellidos, fecha_nacimiento, telefono, email, direccion, anio, seccion, centro_escolar FROM estudiante WHERE idestudiante=:idestudiante";
        $query=$this->db->conn()->prepare($sql);

        try {
            $query->execute(['idestudiante'=>$id]);
            while ($row = $query->fetch()) {
                $item->idestudiante     =$row['idestudiante'];
                $item->nombre           =$row['nombre'];
                $item->apellidos        =$row['apellidos'];
                $item->fecha_nacimiento =$row['fecha_nacimiento'];
                $item->telefono         =$row['telefono'];
                $item->email            =$row['email'];
                $item->direccion        =$row['direccion'];
                $item->anio             =$row['anio'];
                $item->seccion          =$row['seccion'];
                $item->centro_escolar   =$row['centro_escolar'];
            }
            return $item;
        } catch (PDOException $e) {
            return [];
        }
    }
}

       