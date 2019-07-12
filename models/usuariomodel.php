<?php
include_once 'usuarios.php';
class UsuarioModel extends Model {
    public function __construct(){
        parent::__construct();
    }

    function logIn(){
        
    }

    function logOut(){
        
    }

    function listarUsuarios(){
        
    }

    function nuevoUsuario($user){
        try {
            $sql = $this->db->conn()->prepare("INSERT INTO usuarios(nombre, apellido, rol, email, password) VALUES(:nombre, :apellido, :rol, :email, :password)");
            $sql->execute(['nombre' => $user['nombre'], 'apellido' => $user['apellido'], 'rol' => $user['rol'], 'email' => $user['email'], 'password' =>$user['password']]);
            echo "<script>console.log('Se guardo el usuario')</script>";
        } catch (PDOException $e) {
            return "La consulta fallo";
        }
    }

    function borrarUsuario(){
        
    }

    function editarUsuario(){
        
    }
}

?>