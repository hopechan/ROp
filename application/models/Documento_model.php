<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Modelo Documento_model
 * 
 * @package		ROp
 * @category	Model
 * @author    Esperanza Dueñas <da13002@ues.edu.sv>
 *
 */

class Documento_model extends CI_Model {
  public function __construct(){
    parent::__construct();
  }

  function getAll(){
    return $this->db->get('documentos')->result();
  }

  function getByIdEstudiante($id){
    //devuelve todos los documentos de un solo estudiante
    return $this->db->query("SELECT * FROM documento WHERE idestudiante = $id")->result();
  }

  function getById($id){
    //devuelve un registro que coincida con el id que reciba
    return $this->db->query("SELECT * FROM documento WHERE iddocumento = $id")->row();
  }

  function post($data){
    //inserta un nuevo registro a la db
    $this->db->insert('documento', $data);
  }

  function delete($id){
    //borra un registro basado en el ID
    $this->db->where('iddocumento', $id);
    $this->db->delete('documento');
  }
}