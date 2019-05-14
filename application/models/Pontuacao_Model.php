<?php

class Pontuacao_Model extends CI_Model {

    const table = 'pontuacao';

    public function getAll() {
        $this->db->select('pontuacao.*,(equipe.nome) as equipe,(prova.nome) as prova,(usuario.email) as usuario');
        $this->db->from(self::table);
        $this->db->join('equipe', 'equipe.id = pontuacao.id_equipe', 'inner');
        $this->db->join('prova', 'prova.id = pontuacao.id_prova', 'inner');
        $this->db->join('usuario', 'usuario.id = pontuacao.id_usuario', 'inner');
        $query = $this->db->get();
        return $query->result();
        $query = $this->db->get(self::table);
        return $query->result();
    }

    public function getRank()
    {
        $this->db->select('pontuacao.*,(equipe.nome) as equipe,sum(pontos) as ranking');
        $this->db->join('equipe', 'equipe.id = pontuacao.id_equipe', 'inner');
        $this->db->order_by('ranking', 'desc');
        $this->db->group_by('equipe');
        $query = $this->db->get('pontuacao');
        return $query->result();
    }

    public function insert($data = array()) {
        $this->db->insert(self::table, $data);
        return $this->db->affected_rows();
    }

    public function getOne($id) {
        $query = $this->db->get_where(self::table, array('id' => $id));
        return $query->row();
    }

    public function update($id, $data = array()) {
        if ($id > 0) {
            $this->db->where('id', $id);
            $this->db->update(self::table, $data);
            return $this->db->affected_rows();
        } else {
            return false;
        }
    }

    public function delete($id) {
        if ($id > 0) {
            $this->db->where('id', $id);
            $this->db->delete(self::table);

            return $this->db->affected_rows();
        } else {
            return false;
        }
    }

}
