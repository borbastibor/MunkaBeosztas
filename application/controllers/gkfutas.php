<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gkfutas extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}

	// Gépkocsifutás listanézet betöltése
	public function index() {
		$headerdata['iscalendarview'] = FALSE;
		$menudata['iscalendarview'] = FALSE;
		$menudata['isadmin'] = $this->session->userdata('isAdmin');
		$data['futasok'] = $this->Gkfutas_model->getAllGkfutas();
		$partialviews = [
			'header' => $this->load->view('partials/header_view', $headerdata, TRUE),
			'menu' => $this->load->view('partials/menu_view', $menudata, TRUE),
			'content' => $this->load->view('admin/gkfutasok/gkfutasok_list_view', $data, TRUE),
			'footer' => $this->load->view('partials/footer_view', '', TRUE)
		];
		$this->load->view('public_template_view', $partialviews);
	}

	// Új gépkocsifutás létrehozása
	public function create() {
		if ($this->form_validation->run('gkfutasok_rules') == FALSE)
    	{
			$headerdata['iscalendarview'] = FALSE;
			$menudata['iscalendarview'] = FALSE;
			$menudata['isadmin'] = $this->session->userdata('isAdmin');
			$data['errors'] = validation_errors();
			$cardata = $this->Kocsik_model->getAllKocsik();
			$data['caroptions'] = array();
			foreach ($cardata as $cardata_item) {
				$data['caroptions'] += [$cardata_item['gk_id'] => $cardata_item['gepkocsi']];
			}
			$data['dolgozolist'] = $this->Dolgozok_model->getAllDolgozok();
			$data['feladatlist'] = $this->Munkak_model->getAllMunkak();
			$partialviews = [
				'header' => $this->load->view('partials/header_view', $headerdata, TRUE),
				'menu' => $this->load->view('partials/menu_view', $menudata, TRUE),
				'content' => $this->load->view('admin/gkfutasok/gkfutasok_create_view', $data, TRUE),
				'footer' => $this->load->view('partials/footer_view', '', TRUE)
			];
        	$this->load->view('public_template_view', $partialviews);
    	} else {
			$alldata = array();
			$alldata['datum'] = $this->input->post('datum');
			$alldata['gepkocsi'] = $this->input->post('gepkocsi');
			$alldata['dolgozok'] = $this->input->post('dolgozok');
			//print_r($alldata);
			// //$this->Gkfutas_model->insert_entry($alldata);
        	//redirect('gkfutas/index');
    	}
	}

	// Kiválasztott gépkocsifutás szerkesztése
	public function edit($id) {
		if ($id == null) {
			redirect('gkfutas/index');
		}
		$headerdata['iscalendarview'] = FALSE;
		$menudata['iscalendarview'] = FALSE;
		$menudata['isadmin'] = $this->session->userdata('isAdmin');
		$data['gkfutas'] = $this->Gkfutas_model->getGkfutasById($id);
		$data['errors'] = null;
		$partialviews = [
			'header' => $this->load->view('partials/header_view', $headerdata, TRUE),
			'menu' => $this->load->view('partials/menu_view', $menudata, TRUE),
			'content' => $this->load->view('admin/gkfutasok/gkfutasok_edit_view', $data, TRUE),
			'footer' => $this->load->view('partials/footer_view', '', TRUE)
		];
		$this->load->view('public_template_view', $partialviews);
	}

	// Kiválasztott gépkocsifutás mentése szerkesztés után
	public function edit_save() {
		if ($this->form_validation->run('gkfutasok_rules') == FALSE)
    	{
			$headerdata['iscalendarview'] = FALSE;
			$menudata['iscalendarview'] = FALSE;
			$menudata['isadmin'] = $this->session->userdata('isAdmin');
			$data['gkfutas'] = $this->Gkfutas_model->getGkfutasById($this->input->post('id'));
			$data['errors'] = validation_errors();
			$partialviews = [
				'header' => $this->load->view('partials/header_view', $headerdata, TRUE),
				'menu' => $this->load->view('partials/menu_view', $menudata, TRUE),
				'content' => $this->load->view('admin/gkfutasok/gkfutasok_edit_view', $data, TRUE),
				'footer' => $this->load->view('partials/footer_view', '', TRUE)
			];
        	$this->load->view('public_template_view', $partialviews);
    	} else {
        	$data = array ('feladat' => $this->input->post('feladat'));
			$this->Gkfutas_model->update_entry($this->input->post('id'), $data);
        	redirect('gkfutas/index');
    	}
	}

	// Kiválasztott gépkocsifutás törlésének megerősítése
	public function delete($id) {
		if ($id == null) {
			redirect('gkfutas/index');
		}
		$headerdata['iscalendarview'] = FALSE;
		$menudata['iscalendarview'] = FALSE;
		$menudata['isadmin'] = $this->session->userdata('isAdmin');
		$data['gkfutas'] = $this->Gkfutas_model->getGkfutasById($id);
		$partialviews = [
			'header' => $this->load->view('partials/header_view', $headerdata, TRUE),
			'menu' => $this->load->view('partials/menu_view',$menudata, TRUE),
			'content' => $this->load->view('admin/gkfutasok/gkfutasok_delete_view', $data, TRUE),
			'footer' => $this->load->view('partials/footer_view', '', TRUE)
		];
		$this->load->view('public_template_view', $partialviews);
	}

	// Kiválasztott gépkocsifutás törlése
	public function delete_confirm() {
		$this->Gkfutas_model->delete_entry($this->input->post('id'));
		redirect('gkfutas/index');
	}

}