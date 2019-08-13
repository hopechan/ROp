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

  public function index_get(){
    if(!empty($id)){
      $this->response($this->Nota_model->getById($id), REST_Controller::HTTP_OK);
    }else{
      $this->response($this->Nota_model->getAll($id), REST_Controller::HTTP_OK);
    }
  }

  function buscar(){
    //Recibe por POST el dato de busqueda que se desea obtener
    $this->response($this->Nota_model->buscar($_POST['filtro']));
  }

}


/* End of file Nota.php */
/* Location: ./application/controllers/Nota.php */