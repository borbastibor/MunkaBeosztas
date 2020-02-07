<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kocsik extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Kocsik_model');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
	}

	// Kocsiklista nézet betöltése
	public function index() {
		$data['kocsik'] = $this->Kocsik_model->getAllKocsik();
		$partialviews = [
			'header' => $this->load->view('partials/header_view','', TRUE),
			'menu' => $this->load->view('partials/menu_view', '', TRUE),
			'content' => $this->load->view('admin/kocsik/kocsik_list_view', $data, TRUE),
			'footer' => $this->load->view('partials/footer_view', '', TRUE)
		];
		$this->load->view('public_template_view', $partialviews);
	}

	// Új kocsi létrehozása
	public function create() {
        if ($this->form_validation->run('kocsik_rules') == FALSE)
    	{
			$data['errors'] = validation_errors();
			$partialviews = [
				'header' => $this->load->view('partials/header_view', '', TRUE),
				'menu' => $this->load->view('partials/menu_view', '', TRUE),
				'content' => $this->load->view('admin/kocsik/kocsik_create_view', $data, TRUE),
				'footer' => $this->load->view('partials/footer_view', '', TRUE)
			];
        	$this->load->view('public_template_view', $partialviews);
    	} else {
        	$this->Kocsik_model->insert_entry($this->input->post('gepkocsi'));
        	redirect('kocsik/index');
    	}
	}

	// Kiválasztott kocsi szerkesztése
	public function edit($id) {
		if ($id == null) {
			redirect('kocsik/index');
		}
		$data['car'] = $this->Kocsik_model->getKocsiById($id);
		$data['errors'] = null;
		$partialviews = [
			'header' => $this->load->view('partials/header_view','', TRUE),
			'menu' => $this->load->view('partials/menu_view', '', TRUE),
			'content' => $this->load->view('admin/kocsik/kocsik_edit_view', $data, TRUE),
			'footer' => $this->load->view('partials/footer_view', '', TRUE)
		];
		$this->load->view('public_template_view', $partialviews);
	}

	// Kiválasztott kocsi mentése szerkesztés után
	public function edit_save() {
		if ($this->form_validation->run('kocsik_rules') == FALSE)
    	{
			$data['car'] = $this->Kocsik_model->getKocsiById($this->input->post('id'));
			$data['errors'] = validation_errors();
			$partialviews = [
				'header' => $this->load->view('partials/header_view','', TRUE),
				'menu' => $this->load->view('partials/menu_view', '', TRUE),
				'content' => $this->load->view('admin/kocsik/kocsik_edit_view', $data, TRUE),
				'footer' => $this->load->view('partials/footer_view', '', TRUE)
			];
        	$this->load->view('public_template_view', $partialviews);
    	} else {
        	$data = array ('gepkocsi' => $this->input->post('gepkocsi'));
			$this->Kocsik_model->update_entry($this->input->post('id'), $data);
        	redirect('kocsik/index');
    	}
	}

	// Kiválasztott kocsi törlésének megerősítése
	public function delete($id) {
		if ($id == null) {
			redirect('kocsik/index');
		}
		$data['car'] = $this->Kocsik_model->getKocsiById($id);
		$partialviews = [
			'header' => $this->load->view('partials/header_view', '', TRUE),
			'menu' => $this->load->view('partials/menu_view', '', TRUE),
			'content' => $this->load->view('admin/kocsik/kocsik_delete_view', $data, TRUE),
			'footer' => $this->load->view('partials/footer_view', '', TRUE)
		];
		$this->load->view('public_template_view', $partialviews);
	}

	// Kiválasztott kocsi törlése
	public function delete_confirm() {
		$this->Kocsik_model->delete_entry($this->input->post('id'));
		redirect('kocsik/index');
	}

}