<?php
class Tipo extends Controller
{
    function __construct()
    {
        parent::__construct(); //acceder al constructor de la clase padre
        $this->view->tipos = [];
    }
    function render()
    {
        $tipos = $this->model->get();
        $this->view->tipos = $tipos;
        $this->view->render("tipo/index");
    }

    function agregarTipo()
    {
        $tipo = $_POST['tipo'];
        $descripcion = $_POST['descripcion'];
        $this->model->insert(['tipo' => $tipo, 'descripcion' => $descripcion]);
        header('Location:http://localhost/Rop/tipo');
    }
    function editarTipo($param = null){
        $idTipo= $param[0];
        $tipo=$this->model->getById($idTipo);

        $this->view->tipo = $tipo;
        $this->view->render('tipo/detalle');
    }
    function eliminarTipo($param = null){
        echo"nada aun";
    }
}
