<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Modelo Usuario_model
 * 
 * @package		ROp
 * @category	Model
 * @author      Esperanza Dueñas <da13002@ues.edu.sv>
 *
 */

class Usuario_model extends CI_Model {
    public function __construct(){
        parent::__construct();
    }

    function getAll(){
        return $this->db->get('usuarios')->result();
    }

    function getById($id){
        return $this->db->get_where('usuarios', ['idusuario' => $id])->row_array();
    }

    function post($data){
        //inserta un nuevo registro a la db
        $this->db->insert('usuarios', $data);
    }

    function delete($id){
        //borra un registro basado en el ID
        $this->db->where('idusuario', $id);
        $this->db->delete('usuario');
    }
}