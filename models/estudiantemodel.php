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
        $registrosxpagina = 5;
        $pagina = 1; 
        $empezar_desde = ($pagina - 1)*$registrosxpagina;
        try {
            $sql = "SELECT * FROM estudiante";
            $query2 = $this->db->conn()->query($sql);
            $query = $this->db->conn()->query("SELECT * FROM estudiante LIMIT  $empezar_desde,$registrosxpagina");
            $top_row = $query2->rowCount();
            $pages = ceil($top_row/$registrosxpagina);
            
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
            $paginacion= ['numero'=>$pages, 'registros'=>$items];

            return $paginacion;
            $query->closeCursor();
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

    function actualizar($item)
    {
        $sql="UPDATE estudiante SET nombre=:nombre, apellidos=:apellidos, fecha_nacimiento=:fecha_nacimiento, telefono=:telfono, email=:email, direccion=:direccion, anio=:anio, seccion=:seccion, centro_escolar=:centro_escolar  WHERE idestudiante=:idestudiante";
        $query = $this->db->conn()->prepare($sql);
        try {
            $query->execute(['idestudiante'=>$item['idestudiante'], 'nombre'=>$item['nombre'], 'apellidos'=>$item['apellidos'], 'fecha_nacimiento'=>$item['fecha_nacimiento'], 'telfono'=>$item['telefono'], 'email'=>$item['email'], 'direccion'=>$item['direccion'], 'anio'=>$item['anio'], 'seccion'=>$item['seccion'], 'centro_escolar'=>$item['centro_escolar']]);
            return true;
        } catch (PDOException $e) {
            return "Fallo al actualizar el registro";
        }
    }
    
    function getTotal(){
        $total = [];
        try {
            $query = $this->db->conn()->query("SELECT COUNT(idestudiante) as total FROM estudiante");
            while ($row = $query->fetch()) {
                $total->total = $row['total'];
            }
            return $total;
        } catch (PDOException $e) {
            return "La consulta fallo :v";
        }
    }
}