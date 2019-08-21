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

  function promedios_get($tipo = 0, $class = 0){
    $notas = json_decode(json_encode($this->Nota_model->getNotasByTipo($tipo, $class)), true);
    $final = $this->Nota_model->limpiarArray($this->Nota_model->calcularPromedios($notas, 5));
    $this->response($final, REST_Controller::HTTP_OK);
  }

  //url del metodo http://localhost/ROp/api/Nota/notasPorTipo/tipo/class
  //metodo funcionando al 100% real no fake
  function notasPorTipo_get($tipo = 0, $class = 0){
    $this->response($this->Nota_model->getNotasByTipo($tipo, $class));
  }
}