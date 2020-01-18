<?php
class Kocsik_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function insert_entry() {
        $data = array(
            'tipus' => $this->input->post('tipus'),
            'rendszam' => $this->input->post('rendszam')
        );
        return $this->db->insert('kocsik', $data);
    }

    public function update_entry() {

    }

    public function delete_entry() {
        $this->db->where('kocsiid', $this->input->get('id'));
        return $this->db->delete('kocsik');
    }

    public function getAllKocsik() {
        $query = $this->db->get('kocsik');
        return $query->result_array();
    }
}
?>