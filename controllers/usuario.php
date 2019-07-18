<?php
class Usuario extends Controller{
    function __construct(){
        parent::__construct();
    }

    function render(){
        $usuarios = $this->model->get();
        $this->view->usuarios = $usuarios;
        $this->view->render("usuarios/index");
    }

    function agregarUsuario(){
        $hash = password_hash($_POST['txtContra1'], PASSWORD_DEFAULT);
        $rol = ($_POST['rTipo'] == 'A') ? 'A': 'I';
        $this->model->nuevoUsuario(['nombre'=> $_POST['txtNombre'],'apellido'=>$_POST['txtApellido'],'rol' => $rol,'email'=>$_POST['txtEmail'], 'password'=>$hash]);
        $this->view->render("usuarios/index");
    }
}

?>