<?php
    class Main  extends Controller{
        function __construct() {
            parent::__construct(); //acceder al constructor de la clase padre
            $this->view->notas = [];
        }
        function render(){
        $notas = $this->model->getNotas();
        $estudiantes = $this->model->getEstudiantes();
        $total = $this->model->getTotal();
        $this->view->notas = $notas;
        $this->view->estudiantes = $estudiantes;
        $this->view->total = $total;
        $this->view->render("mains/index");
        }

        function ranking10porciento(){
        }
    }
?>