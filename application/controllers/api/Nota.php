<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . 'libraries/Format.php';
include_once(APPPATH . 'libraries/REST_Controller.php');
include_once(APPPATH . 'libraries/Format.php');

/**
 *
 * Controller Nota
 *
 * This controller for ...
 *
 * @package   ROp
 * @category  Controller REST
 * @link      https://ROp/api/estudiante
 *
 */

class Nota extends REST_Controller{
    
  public function __construct(){
    parent::__construct();
    $this->load->model('Nota_model');
  }

  public function index_get($id = 0){
    if(!empty($id)){
      $this->response($this->Nota_model->getById($id), REST_Controller::HTTP_OK);
    }else{
      $this->response($this->Nota_model->getAll($id), REST_Controller::HTTP_OK);
    }
  }

  function buscar_get(){
    //Recibe por POST el dato de busqueda que se desea obtener
    $this->response($this->Nota_model->buscar($_POST['filtro']));
  }

  function promedios_get(){
    $this->response($this->Nota_model->promedios($this->Nota_model->getNotasByTipo(1, 2018), 5), REST_Controller::HTTP_OK);
  }

  function actualizar_put()
  {
    /*
    * Recibe por PUT los datos del registro de una nota actualizado
    */
    $data = 
    [
      'idnota' => $this->put('idnota'),
      'idestudiante' => $this->put('idestudiante'),
      'idmateria' => $this->put('idmateria'),
      'nota_p1' => $this->put('nota_p1'),
      'nota_p2' => $this->put('nota_p2'),
      'nota_p3' => $this->put('nota_p3'),
      'nota_p4' => $this->put('nota_p4')
    ];

    $this->Nota_model->updateNota($data);
    $this->response('Nota Actualizada con Exito', REST_Controller::HTTP_OK);
  }

  function borrar_delete($id)
  {
    $this->Nota_model->delete($id);
    $this->response('Nota eliminada con exito', REST_Controller::HTTP_OK);
  }
}