<?php
class TipoModel extends Model{
    public function __construct(){ 
        parent::__construct();
    }

    public function insert($datos){
        $sql= 'INSERT INTO tipo (tipo, descripcion) VALUES(:tipo,:descripcion)';
        $query = $this->db->conn()->prepare($sql);
        $query->bindParam(':tipo',$datos['tipo'], PDO::PARAM_STR);
        $query->bindParam(':descripcion',$datos['descripcion'], PDO::PARAM_STR);
        $PDOexe = $query->execute();
    
    }
}
?>