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
    return $this->db->query("SELECT n.idnota, n.idestudiante,e.nombre,e.apellidos,n.idmateria, n.nota_p1, n.nota_p2, n.nota_p3, n.nota_p4, m.materia,m.idmateria
            FROM NOTA AS n
            INNER JOIN estudiante as e ON e.idestudiante = n.idestudiante
            INNER JOIN materia as m ON m.idmateria = n.idmateria
            WHERE n.idnota = $id")->row();
  }

  function buscar($filtro){
    $sql = "SELECT n.idnota, CONCAT(e.nombre, ' ', e.apellidos) as Estudiante, m.materia, n.nota_p1, n.nota_p2, n.nota_p3, n.nota_p4
              FROM nota as n
              INNER JOIN estudiante as e ON n.idestudiante = e.idestudiante
              INNER JOIN materia as m ON n.idmateria = m.idmateria
              WHERE m.idtipo = (SELECT idtipo FROM tipo WHERE tipo = '".$filtro."')
              OR m.materia LIKE '%".$filtro."%'
              OR e.anio LIKE '%".$filtro."%'
              OR e.seccion LIKE '%".$filtro."%'
              OR e.nombre LIKE '%".$filtro."%'
              OR e.apellidos LIKE '%".$filtro."%'";
    return $this->db->query($sql)->result();
  }

  function getNotasByTipo($tipo, $class){
    $sql = "SELECT e.idestudiante, n.idnota,CONCAT(e.nombre, ' ', e.apellidos) as estudiante,m.materia, ((n.nota_p1 + n.nota_p2 + n.nota_p3 + n.nota_p4)/4) as promedio 
            FROM nota as n
            INNER JOIN estudiante as e ON e.idestudiante = n.idestudiante
            INNER JOIN materia as m ON m.idmateria = n.idmateria
            WHERE m.idtipo = '".$tipo."' AND e.anio = '".$class."'
            ORDER BY n.idestudiante";
    return $this->db->query($sql)->result();
  }

  function getNotasByTipoEstudiante($tipo, $estudiante){
    $sql = "SELECT e.idestudiante, n.idnota,CONCAT(e.nombre, ' ', e.apellidos) as estudiante,m.materia, ((n.nota_p1 + n.nota_p2 + n.nota_p3 + n.nota_p4)/4) as promedio 
          FROM nota as n
          INNER JOIN estudiante as e ON e.idestudiante = n.idestudiante
          INNER JOIN materia as m ON m.idmateria = n.idmateria
          WHERE m.idtipo = '".$tipo."' AND '".$idestudiante."'
          ORDER BY n.idestudiante";
    return $this->db->query($sql)->result();
  }

  function obtenerAnio($anio){
    $anioActual = date('Y');
    return $anioActual - $anio;
  }

  function post($data){
    //inserta un nuevo registro a la base de datos
    $this->db->insert('nota', $data);
  }

  function delete($id){
    //borra un registro basado en el ID
    $this->db->where('idnota', $id);
    $this->db->delete('nota');
  }
}
