<?php
    class Main  extends Controller{
        function __construct() {
            parent::__construct(); //acceder al constructor de la clase padre
            $this->view->notas = [];
        }
        function render(){
        $notas = $this->model->getNotas();
        $this->view->notas = $notas;
        $this->view->render("mains/index");
        }

        function ranking(){
            # code...
        }
    }
    
?>