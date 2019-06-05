<?php
class Nota extends Controller{
    function __construct(){
        parent::__construct(); //acceder al constructor de la clase padre
        $this->view->notas = [];
    }

    function render(){
        $notas = $this->model->get();
        $this->view->notas = $notas;
        $this->view->render("notas/index");
    }

    function agregarNota(){
        $idMateria = $_POST['idMateria'];
        $idEstudiante = $_POST['idEstudiante'];
        $nota = $_POST['nota'];
        $this->model->insert(['idMateria'=> $idMateria,'idEstudiante'=>$idEstudiante, 'nota'=>$nota]);
        $this->render();
    }
}
?>