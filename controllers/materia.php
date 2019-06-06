<?php
class Materia extends Controller
{
    function __construct()
    {
        parent::__construct(); //acceder al constructor de la clase padre
        $this->view->materias = [];
    }
    function render()
    {
        $materias = $this->model->get();
        $materias = $this->model->gettipo();
        $this->view->materias = $materias;
        $this->view->render("materia/index");
    }

    // function agregarMateria()
    // {
    //     $tipo = $_POST['materia'];
    //     $descripcion = $_POST['descripcion'];
    //     $this->model->insert(['tipo' => $tipo, 'descripcion' => $descripcion]);
    //     header('Location:http://localhost/Rop/materia');
    // }
    // function vertipo($param = null){
    //     $idTipo= $param[0];
    //     $tipo=$this->model->getById($idTipo);
    //     $this->view->tipo = $tipo;
    //     $this->view->render('materia/detalle');
    // }
    // function editarTipo(){
    //     $idtipo=$_POST['idtipo'];
    //     $tipo = $_POST['tipo'];
    //     $descripcion = $_POST['descripcion'];
    //     if($this->model->update(['idtipo' => $idtipo,'tipo' => $tipo, 'descripcion' => $descripcion])){
    //         $tipo = new Tipo();
    //         $tipo->idtipo = $idtipo;
    //         $tipo->tipo = $tipo;
    //         $tipo->descripcion = $descripcion;

    //         $this->view->tipo = $tipo;
    //         $this->view->mensaje = "Alumno actualizado correctamente";
    //     }else{
    //         $this->view->mensaje = "Alumno no actualizado ";
    //     }
    //     header('Location:http://localhost/Rop/tipo');
    // }
    // function eliminarTipo($param = null){
    //     $idTipo= $param[0];

    //     if($this->model->delete($idTipo)){
    //         $this->view->mensaje = "Alumno eliminado correctamente";
    //     }else{
    //         $this->view->mensaje = "Alumno no eliminado ";
    //     }
    //     header('Location:http://localhost/Rop/tipo');
    // }
}
