<?php
    include_once 'models/notas.php';
    class MainModel extends Model{
        public function __construct() {
            parent::__construct();
        }
        
        public function get(){
            $items = [];
            try {
                $query = $this->db->conn()->query("SELECT estudiante.nombre, estudiante.apellidos, nota.nota
                FROM estudiante, nota");
    
                // while ($row = $query->fetch()) {
                //     $item = new Main();
                //     $item->nombre      = $row['nombre'];
                //     $item->apellidos       = $row['apellidos'];
                //     $item->nota = $row['nota'];
    
                //     array_push($items, $item);
                // }
                return $items;
            } catch (PDOException $e) {
                return [];
            }
        }
    }
?>