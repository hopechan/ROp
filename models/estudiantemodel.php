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
            $result = $PDOexe = $query->execute();
            return true;
        } catch (PDOException $e) {
            return "La consulta fallo :v";
        }
    }

    function get(){
        try {
            $query = $this->db->conn()->query("SELECT * FROM estudiante");
            $items =[];
            
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

    function getEstudiantes()
    {
        $items = [];
        try {
            $sql = "SELECT idestudiante,nombre,apellidos,anio FROM estudiante";
            $query = $this->db->conn()->query($sql);
            while ($row = $query->fetch()) {
                $item = new Estudiante();

                $item->idestudiante = $row['idestudiante'];
                $item->nombre = $row['nombre'];
                $item->apellidos = $row['apellidos'];
                $item->anio = $row['anio'];

                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e) {
            return [];
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

    function getNotasByTipoEstudiante($tipo, $idestudiante){
        $items = [];
        try {
            $sql = "SELECT CONCAT(e.nombre, ' ', e.apellidos) as estudiante,n.nota_p1,n.nota_p2,n.nota_p3,n.nota_p4,m.materia, ((n.nota_p1 + n.nota_p2 + n.nota_p3 + n.nota_p4)/4) as promedio 
            FROM nota as n
            INNER JOIN estudiante as e ON e.idestudiante = n.idestudiante
            INNER JOIN materia as m ON m.idmateria = n.idmateria
            WHERE m.idtipo = '".$tipo."' AND e.idestudiante='".$idestudiante."'
            ORDER BY n.idestudiante";
            $query = $this->db->conn()->query($sql);
            while ($row = $query->fetch()) {
                $item = new Estudiantes();
                $item->estudiante = $row['estudiante']; //estudiante
                $item->materia = $row['materia']; //materia
                $item->periodo_1 = $row['nota_p1']; //nota p1
                $item->periodo_2 = $row['nota_p2']; //nota p2
                $item->periodo_3 = $row['nota_p3']; //nota p3
                $item->periodo_4 = $row['nota_p4']; //nota p4
                $item->promedio = $row['promedio']; //promedio
                array_push($items, $item);
            }
            return $items;
        } catch(PDOException $e){
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

    function year($year)
    {
        try {
            $query = $this->db->conn()->query("SELECT * FROM estudiante WHERE anio=".$year);
            $items =[];
            
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

}

