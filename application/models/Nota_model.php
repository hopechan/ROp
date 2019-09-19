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

  function getByMateria($anio, $tipo, $materia){
    $sql = "SELECT n.idnota, e.idestudiante, t.tipo, CONCAT(e.nombre, ' ', e.apellidos) as Estudiante, m.materia, n.nota_p1, n.nota_p2, n.nota_p3, n.nota_p4
            FROM nota as n
            INNER JOIN estudiante e on n.idestudiante = e.idestudiante
            INNER JOIN materia m on n.idmateria = m.idmateria
            INNER JOIN tipo t on m.idtipo = t.idtipo
            WHERE e.anio = '".$anio."' AND t.tipo = '".$tipo."' AND m.materia = '".$materia."'
            ORDER BY e.apellidos ASC";
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

  function getIds(){
    /*
    guarda los id de las materias existentes en un array 
    y lo devuleve al metodo generarNotas del EstudianteController
    */
    $this->db->select('idmateria');
    return $this->db->get('materia')->result();
  }

  function generateNotas($id, $materia){
    /*
    *funcion que se ejecuta cuando se ingresa un estudiante, se reciven 
    *dos parametros el id del estudiante recien ingresado y las materias 
    *existentes den la base de datos y con eso inicializa las notas del 
    *estudiante en la base de datos y les asigna el valor 0
    */
        
      for ($i=0; $i < sizeof($materia); $i++) { 
        $sql = "INSERT INTO nota(idnota, idestudiante, idmateria, nota_p1, nota_p2, nota_p3, nota_p4)
                VALUES (null, ".$id['MAX(idestudiante)'].", ".$materia[$i]->idmateria.", 0, 0, 0, 0)";
        $this->db->query($sql);
      }
  }

  function calcularPromedios($notas, $divisor){
    $last = end($notas);
    $id = $last['idestudiante'];
    $suma = 0;
    $datos = [];
    $idest = 0;
    $nombre = '';
    for ($i=1; $i <=$id; $i++) {
        foreach ($notas as $nota ) {
            if ($nota['idestudiante'] == $i) {
                $suma += $nota['promedio'];
                $idest = $nota['idestudiante'];
                $nombre = $nota['estudiante'];
            }
        }
        $dato = ['idestudiante' => $idest,'estudiante' => $nombre,'promedio' => $suma/$divisor];
        $suma = 0;
        array_push($datos, $dato);
    }
    return $datos;
  }

  function rankingFinal($promCCGK, $promCE, $promCerti){
    $lista = array_merge($promCCGK, $promCE, $promCerti);
    $last = end($lista);
    $id = $last['idestudiante'];
    $suma = 0;
    $ranking = [];
    $idest = 0;
    $nombre = '';
    for ($i=1; $i <= $id; $i++) {
      foreach ($lista as $l ) {
        if ($l['idestudiante'] == $i) {
          $suma += $l['promedio'];
          $idest = $l['idestudiante'];
          $nombre = $l['estudiante'];
        }
      }
      $pos = ['idestudiante' => $idest,'estudiante' => $nombre,'promedio' => round($suma/3, 1)];
      $suma = 0;
      array_push($ranking, $pos);
    }
    return $ranking;
  }

  function limpiarArray($data){
    return array_filter($data, function($dato){
      return ($dato['idestudiante'] != 0 && $dato['promedio'] != 0);
    });
  }

  function updateNota($data)
  {
    //recibe un array de Nota controller y actualiza el registro de una nota en la db
    $this->db->where('idnota', $data['idnota']);
    $this->db->update('nota', $data);
  }
}
