<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Modelo Tipo_model
 *
 * 
 * @package		ROp
 * @category	Modelo
 * @author    Esperanza Dueñas <da13002@ues.edu.sv>
 *
 */

class Tipo_model extends CI_Model {

  public function __construct(){
    parent::__construct();
  }

  function getAll(){
    //obtiene todos los registros de la base de datos y los devuelve
    return $this->db->get('tipo')->result();
  }

  function getById($id){
    //devuelve un solo registro basado en el id que recibe
    return $this->db->query("SELECT * FROM tipo WHERE idtipo = $id")->row();
  }

  function post($data){
    //inserta un nuevo registro a la base de datos
    $this->db->insert('tipo', $data);
  }

  function delete($id){
    //borra un registro basado en el ID
    $this->db->where('idtipo', $id);
    $this->db->delete('tipo');
  }
}
