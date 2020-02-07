<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Munkak extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Munkak_model');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
	}

	// Munkák listanézet betöltése
	public function index() {
		$data['munkak'] = $this->Munkak_model->getAllMunkak();
		$partialviews = [
			'header' => $this->load->view('partials/header_view','', TRUE),
			'menu' => $this->load->view('partials/menu_view', '', TRUE),
			'content' => $this->load->view('admin/munkak/munkak_list_view', $data, TRUE),
			'footer' => $this->load->view('partials/footer_view', '', TRUE)
		];
		$this->load->view('public_template_view', $partialviews);
	}

	// Új munka létrehozása
	public function create() {
        if ($this->form_validation->run('munkak_rules') == FALSE)
    	{
			$data['errors'] = validation_errors();
			$partialviews = [
				'header' => $this->load->view('partials/header_view', '', TRUE),
				'menu' => $this->load->view('partials/menu_view', '', TRUE),
				'content' => $this->load->view('admin/munkak/munkak_create_view', $data, TRUE),
				'footer' => $this->load->view('partials/footer_view', '', TRUE)
			];
        	$this->load->view('public_template_view', $partialviews);
    	} else {
			$this->Munkak_model->insert_entry($this->input->post('feladat'));
        	redirect('munkak/index');
    	}
	}

	// Kiválasztott munka szerkesztése
	public function edit($id) {
		if ($id == null) {
			redirect('munkak/index');
		}
		$data['munka'] = $this->Munkak_model->getMunkaById($id);
		$partialviews = [
			'header' => $this->load->view('partials/header_view','', TRUE),
			'menu' => $this->load->view('partials/menu_view', '', TRUE),
			'content' => $this->load->view('admin/munkak/munkak_edit_view', $data, TRUE),
			'footer' => $this->load->view('partials/footer_view', '', TRUE)
		];
		$this->load->view('public_template_view', $partialviews);
	}

	// Kiválasztott munka mentése szerkesztés után
	public function edit_save() {
		if ($this->form_validation->run('kocsik_rules') == FALSE)
    	{
			$data['munka'] = $this->Kocsik_model->getMunkaById($this->input->post('id'));
			$data['errors'] = validation_errors();
			$partialviews = [
				'header' => $this->load->view('partials/header_view','', TRUE),
				'menu' => $this->load->view('partials/menu_view', '', TRUE),
				'content' => $this->load->view('admin/munkak/munkak_edit_view', $data, TRUE),
				'footer' => $this->load->view('partials/footer_view', '', TRUE)
			];
        	$this->load->view('public_template_view', $partialviews);
    	} else {
        	$data = array ('feladat' => $this->input->post('feladat'));
			$this->Munkak_model->update_entry($this->input->post('id'), $data);
        	redirect('munkak/index');
    	}
	}

	// Kiválasztott munka törlésének megerősítése
	public function delete($id) {
		if ($id == null) {
			redirect('munkak/index');
		}
		$data['munka'] = $this->Munkak_model->getMunkaById($id);
		$partialviews = [
			'header' => $this->load->view('partials/header_view', '', TRUE),
			'menu' => $this->load->view('partials/menu_view', '', TRUE),
			'content' => $this->load->view('admin/munkak/munkak_delete_view', $data, TRUE),
			'footer' => $this->load->view('partials/footer_view', '', TRUE)
		];
		$this->load->view('public_template_view', $partialviews);
	}

	// Kiválasztott munka törlése
	public function delete_confirm() {
		$this->Munkak_model->delete_entry($this->input->post('id'));
		redirect('munkak/index');
	}

}