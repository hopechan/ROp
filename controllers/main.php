<?php
    include_once 'models/usuariomodel.php';
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

        function iniciarSesion(){
            $this->view->render('mains/login');
        }

        function logIn(){
            $u = new UsuarioModel();
            $user = $u->getByEmail($_POST['txtEmail']);
            $render = ($u->verificar($_POST['txtPassword'], $user)) ? $this->render() : $this->iniciarSesion();
            //echo "<script>console.log('".$u->verificar($user, $user->password)."')</script>";
        }
    }
?>