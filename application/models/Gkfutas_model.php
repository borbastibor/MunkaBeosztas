<?php
class Gkfutas_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function insert_entry($alldata) {
        //return $this->db->insert('k_dolgozo', array('dolgozo_nev' => $dolgozonev));
    }

    public function update_entry($id, $alldata) {
        //$this->db->where('gk_futas_id', $id);
        //return $this->db->update('k_dolgozo', $data);
    }

    public function delete_entry($id) {
        //$this->db->where('dolgozo_id', $id);
        //return $this->db->delete('k_dolgozo');
    }

    public function getAllGkfutas() {
        $this->db->select('gf.gk_futas_id, gf.datum, k.gepkocsi, d.dolgozo_nev, fk.utemezheto, f.feladat_leiras');
        $this->db->from('w_gepkocsi_futas gf');
        $this->db->join('w_dolgozo_kikuld dk', 'gf.gk_futas_id = dk.gk_futas_id', 'left');
        $this->db->join('k_dolgozo d', 'dk.dolgozo_id = d.dolgozo_id', 'left');
        $this->db->join('w_feladat_kiad fk', 'gf.gk_futas_id = fk.gk_futas_id', 'left');
        $this->db->join('k_feladat f', 'fk.feladat_id = f.feladat_id', 'left');
        $this->db->join('k_gepkocsi k', 'gf.gk_id = k.gk_id', 'inner');
        $this->db->distinct();
        //$this->db->group_by('gf.gk_futas_id');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getGkfutasById($id) {
        //$query = $this->db->get_where('k_dolgozo',array('dolgozo_id' => $id));
        //return $query->row();
    }

    public function getGkfutasByTimePeriod($sdate) {
        
    }

}
?>