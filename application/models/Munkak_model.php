<?php
class Munkak_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function insert_entry($alldata) {
        $munkadata = array(
            'helyszin' => $alldata['helyszin'],
            'datum' => $alldata['datum'],
            'leiras' => $alldata['leiras'],
            'kocsiid' => $alldata['kocsiid']
        );
        $validInsert = $this->db->insert('munkak', $munkadata);
        $newmunkaid = $this->db->insert_id();
        // foreach ($data['dolgozok'] as $dolgozo) {
            
        // }
        // return 
    }

    public function update_entry($id, $data) {
        $this->db->where('munkaid', $id);
        return $this->db->update('munkak', $data);
    }

    public function delete_entry($id) {
        $this->db->where('munkaid', $id);
        return $this->db->delete('munkak');
    }

    public function getAllmunkak() {
        $this->db->select('munkak.*, kocsik.*, dolgozok.*');
        $this->db->from('munkak, dolgozok, kocsik');
        $this->db->join('kocsik', 'kocsik.kocsiid = munkak.kocsiid', 'left');
        $this->db->join('munkadolgozo', 'munkadolgozo.munkaid = munkak.munkaid', 'left');
        $this->db->join('dolgozok', 'munkadolgozo.dolgozoid = dolgozok.dolgozoid', 'left');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getMunkaById($id) {
        $query = $this->db->get_where('munkak',array('munkaid' => $id));
        return $query->row();
    }

}
?>