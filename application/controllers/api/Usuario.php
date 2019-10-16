<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . 'libraries/Format.php';
include_once(APPPATH . 'libraries/REST_Controller.php');
include_once(APPPATH . 'libraries/Format.php');

/**
 *
 * Controller Estudiante
 * Para metodos personalizados concatenar _get, _post, _put, _delete
 *
 * @package   ROp
 * @category  Controller REST
 * @author    Esperanza Dueñas <da13002@ues.edu.sv>
 * @link      https://ROp/api/usuario
 *
 */

class Usuario extends REST_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('Usuario_model');
    }

    //metodos para controlar los datos
    private function obtenerRegistro($id){return $this->Usuario_model->getById($id);}
    private function obtenerRegistros(){return $this->Usuario_model->getAll();}

    private function cifrarPassword($password){return password_hash($password, PASSWORD_DEFAULT);}
    private function crearRegistro(){
        $data = [
            'nombre' => $this->post('nombre'),
            'apellido' => $this->post('apellido'),
            'rol' => $this->post('rol'),
            'email' => $this->post('email'),
            'password' => $this->cifrarPassword($this->post('password'))
        ];
        $this->Usuario_model->post($data);
    }

    private function verificarPassword($password, $hash){return (password_verify($password, $hash)) ?  true: false;}
    private function verificarUsuario($email, $password){
        $dataDB = $this->db->get_where("usuarios", ['email'=>$email])->row_array();
        if ($this->verificarPassword($password, $dataDB['password']) == true && $email == $dataDB['email']) {
            return parent::HTTP_OK;
        }else{
            return parent::HTTP_NOT_FOUND;
        }
    }

    private function cabeceraAutenticacion(){
        //devuelve (si existe) el token sino su return sera false
        $headers = $this->input->request_headers();
        $token = $headers['Authorization'];
        return $token;
    }

    private function sinToken(){
        //esta funcion se ejecutara siempre que no exista un token
        $status = parent::HTTP_UNAUTHORIZED;
        $response = ['status' => $status, 'msg' => 'Acceso no autorizado'];
        $this->response($response, $status);
    }

    /*metodos para acceder a la api*/

    public function index_get($id = null){
        $respuesta = (empty($id)) ? $this->obtenerRegistros() : $this->obtenerRegistro($id);
        $this->response($respuesta, REST_Controller::HTTP_OK);
    }

    //index_post sirve para logearse y crear el token
    public function index_post(){
        $estado = $this->verificarUsuario($this->post('email'), $this->post('password'));
        $token = $this->cabeceraAutenticacion();
        if ($estado == parent::HTTP_OK) {
            //$this->response("Bienvenido", parent::HTTP_OK);
            try {
                //se verifica que el token sea valido
                $auth = AUTHORIZATION::validateToken($token);
                //si no es valido devolver la respuesta que no tiene autorizacion
                if ($auth === false) {
                    $this->sinToken();
                }else{
                    //se uso un operador ternario para que el codigo sea mas limpio
                    //si se recibe un parametro se devulve el registro que coincida 
                    //sino devuelve todos los registros de la db
                    $respuesta = (!empty($id)) ? $this->obtenerUnRegistro($id):$this->obtenerTodosLosRegistros();
                    $this->response($respuesta, REST_Controller::HTTP_OK);
                }
            }catch (Exception $e) {
                $this->sinToken();
            }
        } else {
            $this->response("El email o la contraseña son incorrectos", parent::HTTP_OK);
        }
    }

    //registro_post sirve para crear un nuevo usuario
    public function registro_post(){
        $this->crearRegistro();
        $this->response("Registro creado", REST_Controller::HTTP_CREATED);
    }
}
