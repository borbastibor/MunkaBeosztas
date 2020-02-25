<?php
class Munkak_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function insert_entry($feladat) {
        return $this->db->insert('k_feladat', $feladat);
    }

    public function update_entry($id, $data) {
        $this->db->where('feladat_id', $id);
        return $this->db->update('k_feladat', $data);
    }

    public function delete_entry($id) {
        $this->db->where('feladat_id', $id);
        return $this->db->delete('k_feladat');
    }

    public function getAllMunkak() {
        $query = $this->db->get('k_feladat');
        return $query->result_array();
    }

    public function getMunkaById($id) {
        $query = $this->db->get_where('k_feladat',array('feladat_id' => $id));
        return $query->row();
    }

}
?>