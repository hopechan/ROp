<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . 'libraries/Format.php';
include_once(APPPATH . 'libraries/REST_Controller.php');
include_once(APPPATH . 'libraries/Format.php');

class Tipo extends REST_Controller
{
    
  public function __construct(){
    parent::__construct();
    $this->load->model('Tipo_model');
  }

  public function index_get($id = 0){
    if(!empty($id)){
        $data = $this->Tipo_model->getById($id);
    }else{
        $data = $this->Tipo_model->getAll();
    }
    $this->response($data, REST_Controller::HTTP_OK);
  }

  function index_post(){
    /**
     * se crea un array y dentro del valor de cada clave se coloca
     * la funcion $this->post('parametro')
     * eje:
     * {
     *  nombre : 'juan',
     *  apellidos: 'perez'
     * }
     */
    $data = [
        'tipo' => $this->post('tipo'),
        'descripcion' => $this->post('descripcion')
      ];
    //metodo que ingresa datos en el modelo
    $this->Tipo_model->post($data);
    //se devuelve un mensaje y el estado ok de la peticion
    $this->response(['Tipo Ingresado', Rest_Controller::HTTP_OK]);
  }
  function index_delete($id){
    $this->Tipo_model->delete($id);
    $this->response(['Tipo eliminado', REST_Controller::HTTP_BAD_REQUEST]);
  }

}