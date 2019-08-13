<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Modelo Materia_model
 * 
 * @package		ROp
 * @category	Modelo
 * @author    Esperanza Dueñas <da13002@ues.edu.sv>
 *
 */

class Materia_model extends CI_Model {
  public function __construct(){
    parent::__construct();
  }

  function getAll(){
    //obtiene todos los registros de la base de datos y los devuelve
    return $this->db->get('materia')->result();
  }

  function getById($id){
    //devuelve un solo registro basado en el id que recibe
    return $this->db->query("SELECT * FROM materia WHERE idmateria = $id")->row();
  }

  function getMateria(){
    return $this->db->query("SELECT m.idmateria,m.materia,t.tipo FROM tipo as t INNER JOIN materia as m WHERE t.idtipo=m.idtipo")->result();
  }

  function post($data){
    //inserta un nuevo registro a la base de datos
    $this->db->insert('materia', $data);
  }

  function delete($id){
    //borra un registro basado en el ID
    $this->db->where('idmateria', $id);
    $this->db->delete('materia');
  }
}
