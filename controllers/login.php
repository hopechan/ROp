<?php
    include_once 'controllers/main.php';
    include_once 'controllers/usuario.php';
    include_once 'models/usuariomodel.php';
    class Login extends Controller{
        function __construct() {
            parent::__construct();
            $this->view->render("login/index");
        }

        function render(){
            $this->view->render("login/index");
        }

        function entrar(){
            $m = new Main();
            $u = new UsuarioModel();
            $user = $u->getByEmail($_POST['txtEmail']);
            if ($u->verificar($_POST['txtPassword'], $user->password)) {
                $u->iniciarSesion($user);
                $m->ranking();
            } else {
                $this->render();
            }
            //$render = ($u->verificar($_POST['txtPassword'], $user->password)) ? $m->ranking() : $this->view->render('mains/ranking'); 
        }
    }
?>