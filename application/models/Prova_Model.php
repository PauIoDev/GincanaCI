<?php

class Prova_Model extends CI_Model {

    public function getAll() {
        $query = $this->db->get('prova');
        return $query->result();
    }

    public function insert($data = array()) {
        $this->db->insert('Prova', $data);
        return $this->db->affected_rows();
    }

}
