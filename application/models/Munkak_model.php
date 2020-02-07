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
            'kocsiid' => $alldata['kocsi'],
            'utemezes' => $alldata['utemezes']
        );
        $this->db->insert('munkak', $munkadata);
        $newmunkaid = $this->db->insert_id();
        foreach ($alldata['dolgozok'] as $dolgozo_item) {
            $this->db->insert('munkadolgozo', array(
                'munkaid' => $newmunkaid,
                'dolgozoid' => $dolgozo_item
            ));
        }
    }

    public function update_entry($id, $data) {
        $this->db->where('munkaid', $id);
        return $this->db->update('munkak', $data);
    }

    public function delete_entry($id) {
        $this->db->where('munkaid', $id);
        // Csacade törlés a munkadolgozo táblában
        return $this->db->delete('munkak');
    }

    public function getAllmunkak() {
        $this->db->select('m.munkaid, m.helyszin, m.leiras, m.datum, m.utemezes, k.kocsiid, k.tipus, k.rendszam, d.dolgozoid, d.csaladnev, d.keresztnev');
        $this->db->from('munkak m');
        $this->db->join('munkadolgozo md', 'm.munkaid = md.munkaid', 'left');
        $this->db->join('dolgozok d', 'md.dolgozoid = d.dolgozoid', 'left');
        $this->db->join('kocsik k', 'm.kocsiid = k.kocsiid', 'inner');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getMunkakByTimePeriod($sdate) {
        $startdate = new DateTime($sdate);
        $period_dates = array(
	        '1' => $sdate,
	        '2' => DateTime::add($startdate, new DateInterval('P1D'))->format('Y-m-d'),
	        '3' => DateTime::add($startdate, new DateInterval('P2D'))->format('Y-m-d'),
	        '4' => DateTime::add($startdate, new DateInterval('P3D'))->format('Y-m-d'),
	        '5' => DateTime::add($startdate, new DateInterval('P4D'))->format('Y-m-d'),
	        '6' => DateTime::add($startdate, new DateInterval('P5D'))->format('Y-m-d'),
	        '7' => DateTime::add($startdate, new DateInterval('P6D'))->format('Y-m-d')
        );
        $this->db->select('m.munkaid, m.helyszin, m.leiras, m.datum, m.utemezes, k.kocsiid, k.tipus, k.rendszam, d.dolgozoid, d.csaladnev, d.keresztnev');
        $this->db->from('munkak m');
        $this->db->join('munkadolgozo md', 'm.munkaid = md.munkaid', 'left');
        $this->db->join('dolgozok d', 'md.dolgozoid = d.dolgozoid', 'left');
        $this->db->join('kocsik k', 'm.kocsiid = k.kocsiid', 'inner');
        $this->db->where('m.datum LIKE '.$period_dates['1'].' OR m.datum LIKE '.$period_dates['2'].' OR m.datum LIKE '.$period_date['3'].' OR m.datum LIKE '.$period_dates['4'].' OR m.datum LIKE '.$period_dates['5'].' OR m.datum LIKE '.$period_dates['6'].' OR m.datum LIKE '.$period_dates['7']);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getMunkaById($id) {
        $query = $this->db->get_where('munkak',array('munkaid' => $id));
        return $query->row();
    }

}
?>