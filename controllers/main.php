<?php
    include_once 'controllers/usuario.php';
    class Main extends Controller{
        function __construct() {
            parent::__construct(); //acceder al constructor de la clase padre
            $this->view->notas = [];
        }

        function render(){
            $this->ranking();
            $this->view->render("mains/ranking");
        }

        function ranking(){
            $this->view->notas = $this->model->getNotas();;
            $this->view->estudiantes = $this->model->getEstudiantes();
            $this->view->total = $this->model->getTotal();
        }

        function logIn(){
            //$this->view->render("mains/login");
            $u = new UsuarioModel();
            $user = $u->getByEmail($_POST['txtEmail']);
            echo "<script>console.log('".$u->verificar($user, $user->password)."')</script>";
            $this->principal();
        }
    }
?>