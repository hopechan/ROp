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
 * @link      https://ROp/api/estudiante
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
    //metodos para acceder a la api
    public function index_get($id = null){
        $respuesta = (empty($id)) ? $this->obtenerRegistros() : $this->obtenerRegistro($id);
        $this->response($respuesta, REST_Controller::HTTP_OK);
    }

    public function index_post(){}
    public function index_delete(){}
    public function index_put(){}
}
