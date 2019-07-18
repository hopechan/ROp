<?php
    include_once 'controllers/main.php';
    include_once 'controllers/usuario.php';
    include_once 'models/usuariomodel.php';
    class Login extends Controller{
        function __construct() {
            parent::__construct();
        }

        function render(){
            header('Location:http://localhost/Rop/login.php');
        }

        function entrar(){
            //echo "<script>alert('Holi :v')</script>";
            $u = new UsuarioModel();
            $user = $u->getByEmail($_POST['txtEmail']);
            if ($u->verificar($_POST['txtPassword'], $user->password)) {
                $u->iniciarSesion($user);
                header('Location:http://localhost/Rop/');
            } else {
                $this->render();
            }
        }

        function salir(){
            session_destroy();
            header('Location:http://localhost/Rop/login.php');
        }
    }
?>