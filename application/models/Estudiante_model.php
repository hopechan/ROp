<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * @package		ROp
 * @category	Model
 * @author    Esperanza Dueñas <da13002@ues.edu.sv>
 *
 */

class Estudiante_model extends CI_Model {

  public function __construct(){
    parent::__construct();
  }

  function getAll(){
    //obtiene todos los registros de la base de datos
    return $this->db->get('estudiante')->result();
  }

  function getById($id){
    //devuelve el registro coincidente con el parametro $id 
    return $this->db->query("SELECT * FROM estudiante WHERE idestudiante = $id")->row();
  }

  function getByYear($year){
    //devuelve el registro coincidente con el parametro $year
    return $this->db->query("SELECT * FROM estudiante WHERE anio = $year")->result();
  }

  function getTotal(){
    #devuelve el total de registros guardados en la db
    $sql = "SELECT COUNT(idestudiante) as total FROM estudiante";
    return $this->db->query($sql)->row();
  }

  function getMaxId(){
    #devuelve el ultimo id ingresado
    $sql = "SELECT MAX(idestudiante) FROM estudiante";
    return $this->db->query($sql)->row();
  }

  function post($data){
    #inserta un nuevo registro a la db
    $this->db->insert('estudiante', $data);
  }

  function delete($id){
    #borra un registro basado en el ID
    $this->db->where('idestudiante', $id);
    $this->db->delete('estudiante');
  }
}