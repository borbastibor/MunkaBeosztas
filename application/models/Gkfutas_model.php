<?php
// TODO ismétlődő kódrészletek függvénybe szervezése
class Gkfutas_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // Új rekord beszúrása
    public function insert_entry($alldata) {
        $this->db->insert('w_gepkocsi_futas', array(
            'datum' => $alldata['datum'],
            'gk_id' => $alldata['gk_id']
        ));
        $newgkfutasid = $this->db->insert_id();
        foreach ($alldata['dolgozok'] as $dolgozo_item) {
            $this->db->insert('w_dolgozo_kikuld', array(
                'gk_futas_id' => $newgkfutasid,
                'dolgozo_id' => $dolgozo_item
            ));
        }
        foreach ($alldata['feladatok'] as $feladat_item) {
            $utemezes = in_array($feladat_item, $alldata['utemezesek']) ? '1' : '0';
            $this->db->insert('w_feladat_kiad', array(
                'gk_futas_id' => $newgkfutasid,
                'feladat_id' => $feladat_item,
                'utemezheto' => $utemezes
            ));
        }
        return;
    }

    // Meglévő rekord módosítása
    public function update_entry($id, $alldata) {
        // Gkfutas rekord frissítése
        // TODO Model használata az adatvisszanyeréshez
        $query = $this->db->get_where('k_gepkocsi',array('gk_id' => $alldata['gepkocsi']));
        $kocsi = $query->row();
        print_r($kocsi);
        $gkfutas_record = array(
            'datum' => $alldata['datum'],
            'gk_id' => $kocsi->gk_id
        );
        $this->db->where('gk_futas_id', $id);
        $this->db->update('w_gepkocsi_futas', $gkfutas_record);
        // Kapcsolodó dolgozók törlése és újralétrehozása
        $this->db->where('gk_futas_id', $id);
        $this->db->delete('w_dolgozo_kikuld');
        foreach ($alldata['dolgozok'] as $dolgozo) {
            $ujdolgozo_kapcsolat = array(
                'gk_futas_id' => $id,
                'dolgozo_id' => $dolgozo
            );
            $this->db->insert('w_dolgozo_kikuld', $ujdolgozo_kapcsolat);
        }
        // Kapcsolodó feladatok törlése és újralétrehozása
        $this->db->where('gk_futas_id', $id);
        $this->db->delete('w_feladat_kiad');
        foreach ($alldata['feladatok'] as $feladat) {
            $isUtemezheto = in_array($feladat, $alldata['utemezesek']) ? TRUE : FALSE;
            $ujfeladat_kapcsolat = array(
                'gk_futas_id' => $id,
                'feladat_id' => $feladat,
                'utemezheto' => $isUtemezheto
            );
            $this->db->insert('w_feladat_kiad', $ujfeladat_kapcsolat);
        }
    }

    // Rekord törlése
    public function delete_entry($id) {
        $this->db->where('gk_futas_id', $id);
        $this->db->delete('w_feladat_kiad');

        $this->db->where('gk_futas_id', $id);
        $this->db->delete('w_gepkocsi_futas');
    }

    // Összes gkfutas rekord lekérése
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

    // Gkfutas rekord lekérése id alapján
    public function getGkfutasById($id) {
        $this->db->select('gf.gk_futas_id,gf.datum,k.gk_id, k.gepkocsi');
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

        $this->db->select('f.feladat_id, f.feladat_leiras');
        $this->db->from('w_gepkocsi_futas gf');
        $this->db->join('w_feladat_kiad fk', 'gf.gk_futas_id = fk.gk_futas_id', 'left');
        $this->db->join('k_feladat f', 'fk.feladat_id = f.feladat_id', 'left');
        $this->db->where('gf.gk_futas_id', $id);
        $query = $this->db->get();
        $result['feladatok'] = $query->result_array();

        return $result;
    }

    // Függvény az ütemezések lekérésére adott gk_futas_id-hoz
    public function getUtemezesekByGkfutasId($id) {
        $this->db->select('fk.gk_futas_id, fk.feladat_id, fk.utemezheto');
        $this->db->from('w_feladat_kiad fk');
        $this->db->where('fk.gk_futas_id', $id);
        $query = $this->db->get();
        $result = $query->result_array();

        return $result;
    }

    // Függvény a gkfutas adatok lekérése egy adott kezdődátum + 6 napra
    public function getGkfutasByTimePeriod($sdate) {
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
