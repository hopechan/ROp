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
        $this->view->render("tipo/index");
    }

    public function recargar(){
        $tipos=$this->model->get();
        $data=$this->view->tipos = $tipos;
        //Renderizando la vista
        $this->view->render('tipo/tabla',$data);

    }

    function agregarTipo()
    {
        $tipo = $_POST['tipo'];
        $descripcion = $_POST['descripcion'];
        $this->model->insert(['tipo' => $tipo, 'descripcion' => $descripcion]);
    }
    function verTipo($param = null){
        $idTipo= $param[0];
        $tipo=$this->model->getById($idTipo);
        $this->view->tipo = $tipo;
        $this->view->render('tipo/detalle');
    }
    function editarTipo(){
        $idtipo=$_POST['idtipo'];
        $tipo = $_POST['tipo'];
        $descripcion = $_POST['descripcion'];
        if($this->model->update(['idtipo' => $idtipo,'tipo' => $tipo, 'descripcion' => $descripcion])){
            $tipo = new Tipo();
            $tipo->idtipo = $idtipo;
            $tipo->tipo = $tipo;
            $tipo->descripcion = $descripcion;

            $this->view->tipo = $tipo;
            $this->view->mensaje = "Tipo actualizado correctamente";
        }else{
            $this->view->mensaje = "Tipo no actualizado ";
        }
        header('Location:http://localhost/Rop/tipo');
    }
    function eliminarTipo($param = null){
        $idTipo= $param[0];

        if($this->model->delete($idTipo)){
            $mensaje = "si";
        }else{
            $mensaje = "no";
        }
        echo $mensaje;
    }
}
