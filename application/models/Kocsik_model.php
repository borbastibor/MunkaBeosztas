<?php
class Kocsik_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function insert_entry($tipus, $rendszam) {
        $data = array(
            'tipus' => $tipus,
            'rendszam' => $rendszam
        );
        return $this->db->insert('kocsik', $data);
    }

    public function update_entry($id, $data) {
        $this->db->where('kocsiid', $id);
        return $this->db->update('kocsik', $data);
    }

    public function delete_entry($id) {
        $this->db->where('kocsiid', $id);
        return $this->db->delete('kocsik');
    }

    public function getAllKocsik() {
        $query = $this->db->get('kocsik');
        return $query->result_array();
    }

    public function getKocsiById($id) {
        $query = $this->db->get_where('kocsik',array('kocsiid' => $id));
        return $query->row();
    }

}
?>