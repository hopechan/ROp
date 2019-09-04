<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . 'libraries/Format.php';
include_once(APPPATH . 'libraries/REST_Controller.php');
include_once(APPPATH . 'libraries/Format.php');

class Materia extends REST_Controller
{
  //constructor
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Materia_model');
  }

  //funcion para obtener los datos
  public function index_get($id = 0)
  {
    if (!empty($id)) {
      $data = $this->Materia_model->getById($id);
    } else {
      $data = $this->Materia_model->getAll2();
    }
    $this->response($data, REST_Controller::HTTP_OK);
  }

  //funcion para agregar datos
  function index_post()
  {
    $data = [
      'materia' => $this->post('materia'),
      'idtipo' => $this->post('idtipo')
    ];
    $this->Materia_model->post($data); //metodo que ingresa datos en el modelo
    $this->response(['Materia Ingresada', Rest_Controller::HTTP_OK]); //se devuelve un mensaje y el estado ok de la peticion
  }

  //funcion para borrar un registro
  function index_delete($id)
  {
    
    if($this->Materia_model->delete($id)){
      $this->response('Materia eliminada');
    }else{
      $this->response('Materia no eliminada');
    }
    
  }

  //funcion para editar datos
  function index_put()
  {
    $data = [
      'idmateria' => $this->put('idmateria'),
      'idtipo' => $this->put('idtipo'),
      'materia' => $this->put('materia')
      
    ];
    $this->Materia_model->update($data); //metodo que ingresa datos en el modelo
    $this->response(['Materia actualizado', Rest_Controller::HTTP_OK]); //se devuelve un mensaje y el estado ok de la peticion
  }
}
