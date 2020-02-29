<?php
class Kocsik_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function insert_entry($gepkocsi) {
        return $this->db->insert('k_gepkocsi', array('gepkocsi' => $gepkocsi));
    }

    public function update_entry($id, $data) {
        $this->db->where('gk_id', $id);
        return $this->db->update('k_gepkocsi', $data);
    }

    public function delete_entry($id) {
        $this->db->where('gk_id', $id);
        return $this->db->delete('k_gepkocsi');
    }

    public function getAllKocsik() {
        $query = $this->db->get('k_gepkocsi');
        return $query->result_array();
    }

    public function getKocsiById($id) {
        $query = $this->db->get_where('k_gepkocsi',array('gk_id' => $id));
        return $query->row();
    }

    public function getKocsiIdByTypeAndLicense($type) {
        $query = $this->db->get_where('k_gepkocsi',array('gepkocsi' => $type));
        return $query->row();
    }

}
?>