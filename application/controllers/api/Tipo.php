<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . 'libraries/Format.php';
include_once(APPPATH . 'libraries/REST_Controller.php');
include_once(APPPATH . 'libraries/Format.php');

class Tipo extends REST_Controller
{
  //constructor
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Tipo_model');
  }

  //funcion para obtener los datos
  public function index_get($id = 0)
  {
    if (!empty($id)) {
      $data = $this->Tipo_model->getById($id);
    } else {
      $data = $this->Tipo_model->getAll();
    }
    if ($data == true) {
      $this->response($data, REST_Controller::HTTP_OK);
    } else {
      $this->response("Resultado no encontrado", REST_Controller::HTTP_NOT_FOUND);
    }
  }

  //funcion para agregar datos
  function index_post()
  {
    $data = [
      'tipo' => $this->post('tipo'),
      'descripcion' => $this->post('descripcion')
    ];
    $this->Tipo_model->post($data); //metodo que ingresa datos en el modelo
    $this->response(['Tipo Ingresado', Rest_Controller::HTTP_OK]); //se devuelve un mensaje y el estado ok de la peticion
  }

  //funcion para borrar un registro
  function index_delete($id)
  {
    if (!empty($id)==true) {
      if ($this->Tipo_model->delete($id) === true) {
        $this->response(['Tipo eliminado', REST_Controller::HTTP_OK]);
      }
    }else{
      $this->response(['Tipo no encontrado'], REST_Controller::HTTP_NOT_FOUND);
    }
  }

  //funcion para editar datos
  function index_put()
  {
    $data = [
      'idtipo' => $this->put('idtipo'),
      'tipo' => $this->put('tipo'),
      'descripcion' => $this->put('descripcion')
    ];
    $this->Tipo_model->update($data); //metodo que ingresa datos en el modelo
    $this->response(['Tipo actualizado', Rest_Controller::HTTP_OK]); //se devuelve un mensaje y el estado ok de la peticion
  }
}
