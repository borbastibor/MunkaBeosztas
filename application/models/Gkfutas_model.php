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
        $this->db->select('gf.gk_futas_id,gf.datum,k.gepkocsi');
        $this->db->from('w_gepkocsi_futas gf');
        $this->db->join('k_gepkocsi k', 'gf.gk_id = k.gk_id', 'inner');
        $this->db->order_by('gf.datum');
        $query = $this->db->get();
        $result = $query->result_array();

        foreach ($result as &$result_item) {
            $this->db->select('d.dolgozo_nev');
            $this->db->from('w_gepkocsi_futas gf');
            $this->db->join('w_dolgozo_kikuld dk', 'gf.gk_futas_id = dk.gk_futas_id', 'left');
            $this->db->join('k_dolgozo d', 'dk.dolgozo_id = d.dolgozo_id', 'left');
            $this->db->where('gf.gk_futas_id', $result_item['gk_futas_id']);
            $query = $this->db->get();
            $result_item['dolgozok'] = $query->result_array();
        }

        foreach ($result as &$result_item) {
            $this->db->select('fk.utemezheto, f.feladat_leiras');
            $this->db->from('w_gepkocsi_futas gf');
            $this->db->join('w_feladat_kiad fk', 'gf.gk_futas_id = fk.gk_futas_id', 'left');
            $this->db->join('k_feladat f', 'fk.feladat_id = f.feladat_id', 'left');
            $this->db->where('gf.gk_futas_id', $result_item['gk_futas_id']);
            $query = $this->db->get();
            $result_item['feladatok'] = $query->result_array();
        }

        return $result;
    }

    public function getGkfutasById($id) {
        $this->db->select('gf.gk_futas_id,gf.datum,k.gepkocsi');
        $this->db->from('w_gepkocsi_futas gf');
        $this->db->join('k_gepkocsi k', 'gf.gk_id = k.gk_id', 'inner');
        $this->db->where('gf.gk_futas_id', $id);
        $query = $this->db->get();
        $result = $query->result_array();

        $this->db->select('d.dolgozo_nev');
        $this->db->from('w_gepkocsi_futas gf');
        $this->db->join('w_dolgozo_kikuld dk', 'gf.gk_futas_id = dk.gk_futas_id', 'left');
        $this->db->join('k_dolgozo d', 'dk.dolgozo_id = d.dolgozo_id', 'left');
        $this->db->where('gf.gk_futas_id', $id);
        $query = $this->db->get();
        $result['dolgozok'] = $query->result_array();

        $this->db->select('fk.utemezheto, f.feladat_leiras');
        $this->db->from('w_gepkocsi_futas gf');
        $this->db->join('w_feladat_kiad fk', 'gf.gk_futas_id = fk.gk_futas_id', 'left');
        $this->db->join('k_feladat f', 'fk.feladat_id = f.feladat_id', 'left');
        $this->db->where('gf.gk_futas_id', $id);
        $query = $this->db->get();
        $result['feladatok'] = $query->result_array();

        return $result;
    }

    public function getGkfutasByTimePeriod($sdate) {
        // $startdate = new DateTime($sdate);
	// A date_add() függvényben a $startdate-hez adódik hozzá az időintervallum
	// ezért újonnan kell létrehozni mindig a startdate-t???
        $period_dates = array(
            	'1' => $sdate,
	        '2' => date_add(new DateTime($sdate), new DateInterval('P1D'))->format('Y-m-d'),
	        '3' => date_add(new DateTime($sdate), new DateInterval('P2D'))->format('Y-m-d'),
	        '4' => date_add(new DateTime($sdate), new DateInterval('P3D'))->format('Y-m-d'),
	        '5' => date_add(new DateTime($sdate), new DateInterval('P4D'))->format('Y-m-d'),
	        '6' => date_add(new DateTime($sdate), new DateInterval('P5D'))->format('Y-m-d'),
	        '7' => date_add(new DateTime($sdate), new DateInterval('P6D'))->format('Y-m-d')
        );

        $this->db->select('gf.gk_futas_id,gf.datum,k.gepkocsi');
        $this->db->from('w_gepkocsi_futas gf');
        $this->db->join('k_gepkocsi k', 'gf.gk_id = k.gk_id', 'inner');
        $this->db->where('gf.datum', $period_dates['1']);
        $this->db->or_where('gf.datum', $period_dates['2']);
        $this->db->or_where('gf.datum', $period_dates['3']);
        $this->db->or_where('gf.datum', $period_dates['4']);
        $this->db->or_where('gf.datum', $period_dates['5']);
        $this->db->or_where('gf.datum', $period_dates['6']);
        $this->db->or_where('gf.datum', $period_dates['7']);
        $query = $this->db->get();
        $result = $query->result_array();

        foreach ($result as &$result_item) {
            $this->db->select('d.dolgozo_nev');
            $this->db->from('w_gepkocsi_futas gf');
            $this->db->join('w_dolgozo_kikuld dk', 'gf.gk_futas_id = dk.gk_futas_id', 'left');
            $this->db->join('k_dolgozo d', 'dk.dolgozo_id = d.dolgozo_id', 'left');
            $this->db->where('gf.gk_futas_id', $result_item['gk_futas_id']);
            $query = $this->db->get();
            $result_item['dolgozok'] = $query->result_array();
        }

        foreach ($result as &$result_item) {
            $this->db->select('fk.utemezheto, f.feladat_leiras');
            $this->db->from('w_gepkocsi_futas gf');
            $this->db->join('w_feladat_kiad fk', 'gf.gk_futas_id = fk.gk_futas_id', 'left');
            $this->db->join('k_feladat f', 'fk.feladat_id = f.feladat_id', 'left');
            $this->db->where('gf.gk_futas_id', $result_item['gk_futas_id']);
            $query = $this->db->get();
            $result_item['feladatok'] = $query->result_array();
        }

        return $result;
    }

}
?>
