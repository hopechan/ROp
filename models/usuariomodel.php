<?php
include_once 'models/usuarios.php';
class UsuarioModel extends Model {
    public function __construct(){
        parent::__construct();
    }

    function getByEmail($email){
        $u = new Usuarios();
        try {
            $sql = $this->db->conn()->prepare("SELECT idusuario, nombre, apellido, rol, email, password FROM usuarios WHERE email = :email");
            $sql->execute(['email' => $email]);
            while ($row = $sql->fetch()) {
                $u->idusuario = $row['idusuario'];
                $u->nombre = $row['nombre'];
                $u->apellido = $row['apellido'];
                $u->rol = $row['rol'];
                $u->email = $row['email'];
                $u->password = $row['password'];
            }
            return $u;
        } catch (PDOException $e) {
            echo "<script>console.log('".$e."')</script>";
            return "La consulta fallo";
        }
    }

    function verificar($passwordIngresado, $hash){
        $login = (password_verify($passwordIngresado, $hash)) ? true : false;
        return $login;
    }

    function iniciarSesion($user){
        session_start();
        $_SESSION['estado'] = 'activo';
        $_SESSION['id'] = $user->idusuario;
        $_SESSION['nombre_completo'] = $user->nombre.' '.$user->apellido;
        $_SESSION['rol'] = $user->rol;
        $_SESSION['email'] = $user->email;
    }

    function listarUsuarios(){
    }

    function nuevoUsuario($user){
        try {
            $sql = $this->db->conn()->prepare("INSERT INTO usuarios(nombre, apellido, rol, email, password) VALUES(:nombre, :apellido, :rol, :email, :password)");
            $sql->execute(['nombre' => $user['nombre'], 'apellido' => $user['apellido'], 'rol' => $user['rol'], 'email' => $user['email'], 'password' =>$user['password']]);
            echo "<script>console.log('Se guardo el usuario')</script>";
        } catch (PDOException $e) {
            echo "<script>console.log('".$e."')</script>";
            return "La consulta fallo";
        }
    }

    function borrarUsuario(){
    }

    function editarUsuario(){
    }
}

?>