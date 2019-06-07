<?php
class Nota extends Controller{
    function __construct(){
        parent::__construct(); //acceder al constructor de la clase padre
        $this->view->notas = [];
    }

    function render(){
        //mando diferentes variables del mismo metodo para separar
        $notasCE = $this->model->get();
        $this->view->notasCE = $notasCE;
        $this->view->render("notas/index");
    }

    function agregarNota(){
        $idMateria = $_POST['idMateria'];
        $idEstudiante = $_POST['idEstudiante'];
        $nota = $_POST['nota'];
        $this->model->insert(['idMateria'=> $idMateria,'idEstudiante'=>$idEstudiante, 'nota'=>$nota]);
        $this->render();
    }

    function filtrar(){
        $filtro = $_POST['filtro'];
        $resultado = $this->model->buscar($filtro);
        return json_encode($resultado);
    }
}
?>