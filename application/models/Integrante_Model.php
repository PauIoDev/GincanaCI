<?php

class Integrante_Model extends CI_Model {

    const table = 'integrante';

    public function getAll() {
 
        $this->db->select('integrante.*,(equipe.nome) as time');

        $this->db->from(self::table);

 
        $this->db->join('equipe', 'equipe.id = integrante.id_equipe', 'inner');
        //nome da tabela no banco de dados    
        $query = $this->db->get();
        //result já nos retorna em formato de array
        return $query->result();
        $query = $this->db->get(self::table);
        return $query->result();
    }

    public function insert($data = array()) {
        $this->db->insert(self::table, $data);
        return $this->db->affected_rows();
    }

    public function getOne($id) {
        $query = $this->db->get_where(self::table, array('id'=>$id));
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
