<?php
    class EstudianteModel extends Model{
        public function __construct() {
            parent::__construct();
        }

        function insert($datos){
            # code...
        }

        function get(){
            $items = [];
            try {
                $query = $this->db->conn()->query("SELECT * FROM estudiante");
                while ($row = $query->fetch()) {
                    $item = new Estudiante();
                }
            } catch (PDOException $e) {
                return [];
            }
        }
    }
    
?>