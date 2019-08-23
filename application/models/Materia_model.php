<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Materia_model extends CI_Model {

  public function __construct(){
    parent::__construct();
  }

  function getAll(){
    //obtiene todos los registros de la base de datos y los devuelve
    return $this->db->get('materia')->result();
  }
  function getall2(){
    $sql = "SELECT m.idmateria,m.idtipo,m.materia,t.tipo FROM materia m, tipo t WHERE t.idtipo = m.idtipo";
            return $this->db->query($sql)->result();
  }

  function getById($id){
    //devuelve un solo registro basado en el id que recibe
    return $this->db->query("SELECT * FROM materia WHERE idmateria = $id")->row();
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

  function update($data){
    //actualiza un registro basado en el ID
    $this->db->where('idmateria', $data['idmateria']);
    $this->db->update('materia', $data);
  }
}
