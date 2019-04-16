<?php

class Prova_Model extends CI_Model {

    public function getAll() {
        $query = $this->db->get('prova');
        return $query->result();
    }

}
