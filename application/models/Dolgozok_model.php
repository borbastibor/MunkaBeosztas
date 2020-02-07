<?php
class Dolgozok_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function insert_entry($dolgozonev) {
        return $this->db->insert('k_dolgozo', array('dolgozo_nev' => $dolgozonev));
    }

    public function update_entry($id, $data) {
        $this->db->where('dolgozo_id', $id);
        return $this->db->update('k_dolgozo', $data);
    }

    public function delete_entry($id) {
        $this->db->where('dolgozo_id', $id);
        return $this->db->delete('k_dolgozo');
    }

    public function getAllDolgozok() {
        $query = $this->db->get('k_dolgozo');
        return $query->result_array();
    }

    public function getDolgozoById($id) {
        $query = $this->db->get_where('k_dolgozo',array('dolgozo_id' => $id));
        return $query->row();
    }

}
?>