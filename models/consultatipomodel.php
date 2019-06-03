<?php

include_once 'models/tipo.php';
class ConsultaTipoModel extends Model{
    public function __construct(){ 
        parent::__construct();
    }

    public function get(){
        $items=[];
        try{
            $query =$this->conn()->query("SELECT idTipo, tipo, descripcion FROM tipo");

            while($row = $query->fetch()){
                $item = new Tipo();
                $item->idtipo      = $row['idtipo'];
                $item->tipo        = $row['tipo'];
                $item->descripcion = $row['descripcion'];

                array_push($items, $item);
                        }
                        return $items;
        }catch(PDOException $e){
            return [];
        }
    
    }
}
?>