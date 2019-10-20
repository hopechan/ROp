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

  /**
   * La url se forma de la siguiente forma
   * http://localhost/ROp/api/nota/notasPorMateria/año/tipo/materia
   */
  function notasPorMateria_get($anio = 0, $tipo = 0, $materia = ""){
    if (!empty($tipo) && !empty($materia)) {
      $this->response($this->Nota_model->getByMateria($anio, $tipo, $materia), REST_Controller::HTTP_OK);
    } else {
      $this->response('Datos no encontrados', REST_Controller::HTTP_NOT_FOUND);
    }
  }

  function index_put($id = 0){
    /*
    * Recibe por PUT los datos del registro de una nota actualizado
    */
    $data = [
      'idmateria' => $this->put('idmateria'),
      'nota_p1' => $this->put('nota_p1'),
      'nota_p2' => $this->put('nota_p2'),
      'nota_p3' => $this->put('nota_p3'),
      'nota_p4' => $this->put('nota_p4')
    ];
    //var_dump($data);
    $this->Nota_model->updateNota($id, $data);
    $this->response("Notas actualizadas", REST_Controller::HTTP_OK);
  }

  function borrar_delete($id)
  {
    $this->Nota_model->delete($id);
    $this->response('Nota eliminada con exito', REST_Controller::HTTP_OK);
  }
  
  function ranking_get($class = 0){
    $finalCCGK = $this->Nota_model->calcularPromedios(json_decode(json_encode($this->Nota_model->getNotasByTipo(1, $class)), true), 5);
    $finalCE = $this->Nota_model->calcularPromedios(json_decode(json_encode($this->Nota_model->getNotasByTipo(2, $class)), true), 4);
    $finalCerti = $this->Nota_model->calcularPromedios(json_decode(json_encode($this->Nota_model->getNotasByTipo(3, $class)), true), 5);
    $listaFinal = $this->Nota_model->rankingFinal($finalCCGK, $finalCE, $finalCerti);
    $this->response($listaFinal, REST_Controller::HTTP_OK);
  }

  //url del metodo http://localhost/ROp/api/Nota/notasPorTipo/tipo/class
  //metodo funcionando al 100% real no fake
  function notasPorTipo_get($tipo = 0, $class = 0){
    $this->response($this->Nota_model->getNotasByTipo($tipo, $class));
  }
}