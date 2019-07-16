<?php
    include_once 'models/usuariomodel.php';
    include_once 'controllers/usuario.php';
    include_once 'views/sesion.php';
    class Main extends Controller{
        function __construct() {
            parent::__construct(); //acceder al constructor de la clase padre
            $this->view->notas = [];
        }

        function render(){
            $this->ranking();
        }

        function ranking(){
            $this->view->notas = $this->model->getNotas();
            $this->view->estudiantes = $this->model->getEstudiantes();
            $this->view->total = $this->model->getTotal();
            $this->view->render("mains/ranking");
        }

        function logOut(){
            //session_destroy();
            $this->view->render('login/index');
        }
    }
?> 