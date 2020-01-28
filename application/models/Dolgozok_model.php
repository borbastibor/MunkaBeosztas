<?php
class Dolgozok_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function insert_entry($csaladnev, $keresztnev) {
        $data = array(
            'csaladnev' => $csaladnev,
            'keresztnev' => $keresztnev
        );
        return $this->db->insert('dolgozok', $data);
    }

    public function update_entry($id, $data) {
        $this->db->where('dolgozoid', $id);
        return $this->db->update('dolgozok', $data);
    }

    public function delete_entry($id) {
        $this->db->where('dolgozoid', $id);
        return $this->db->delete('dolgozok');
    }

    public function getAllDolgozok() {
        $query = $this->db->get('dolgozok');
        return $query->result_array();
    }

    public function getDolgozoById($id) {
        $query = $this->db->get_where('dolgozok',array('dolgozoid' => $id));
        return $query->row();
    }

}
?>