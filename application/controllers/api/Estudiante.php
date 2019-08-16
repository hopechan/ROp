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

class Estudiante extends REST_Controller
{
    
  public function __construct(){
    parent::__construct();
    $this->load->model('Estudiante_model');
  }

  public function index_get($id = 0){
    if(!empty($id)){
        $data = $this->Estudiante_model->getById($id);
    }else{
        $data = $this->Estudiante_model->getAll();
    }
    $this->response($data, REST_Controller::HTTP_OK);
  }

  function getByYear_get($year){
    $data = $this->Estudiante_model->getByYear($year);
    $this->response($data, REST_Controller::HTTP_OK);
  }

  function getTotal_get(){
    $this->response($this->Estudiante_model->getTotal());
  }

  function getMaxId_get(){
    $this->response($this->Estudiante_model->getMaxId());
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
        'nombre' => $this->post('nombre'),
        'apellidos' => $this->post('apellidos')
      ];
    //metodo que ingresa datos en el modelo
    $this->Estudiante_model->post($data);
    //se devuelve un mensaje y el estado ok de la peticion
    $this->response(['Estudiante Ingresado', Rest_Controller::HTTP_OK]);
  }

}


/* End of file Estudiante.php */
/* Location: ./application/controllers/Estudiante.php */