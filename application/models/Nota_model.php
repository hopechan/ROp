<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Modelo Nota_model
 *
 * @package		ROp
 * @category	Modelo
 * @author    da13002@ues.edu.sv
 *
 */

class Nota_model extends CI_Model {

  public function __construct(){
    parent::__construct();
  }

  function getAll(){
    //obtiene todos los registros de la base de datos y los devuelve
    return $this->db->get('nota')->result();
  }

  function getById($id){
    //devuelve un solo registro basado en el id que recibe
    return $this->db->query("SELECT * FROM materia WHERE idmateria = $id")->row();
  }

  function buscar($filtro){
    $sub_consulta = $this->db->select('idtipo')->from('tipo')->like('tipo', $filtro);
    $this->db->select("n.idnota", "CONCAT('e.nombre, ' ', e.apellidos') as Estudiante", "m.materia", "n.nota_p1", "n.nota_p2", "n.nota_p3", "n.nota_p4")
              ->from('nota as n')
              ->join('estudiante as e', 'e.idestudiante = n.idestudiante', 'inner')
              ->join('materia as m', 'm.idmateria = n.idmateria', 'inner')
              ->where('m.idtipo', $sub_consulta, false)
              ->or_like('m.materia', $filtro)
              ->or_like('e.anio', $filtro)
              ->or_like('e.seccion', $filtro)
              ->or_like('e.apellido', $filtro)
              ->or_like('e.nombre', $filtro)
            ->result();
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
