<?php

class Equipe_Model extends CI_Model {

    public function getAll() {
        $query = $this->db->get('equipe');
        return $query->result();
    }
    
    //public function insert($data=) {
        
    //}
}