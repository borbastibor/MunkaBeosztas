<?php
class Kocsik_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function insert_entry() {

    }

    public function update_entry() {

    }

    public function delete_entry($id) {
        
    }

    public function getAllKocsik() {
        $query = $this->db->get('kocsik');
        return $query->result_array();
    }
}
?>