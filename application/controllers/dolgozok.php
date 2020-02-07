<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dolgozok extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Dolgozok_model');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
	}

	// Dolgozóklista nézet betöltése
	public function index() {
		$data['dolgozok'] = $this->Dolgozok_model->getAllDolgozok();
		$partialviews = [
			'header' => $this->load->view('partials/header_view','', TRUE),
			'menu' => $this->load->view('partials/menu_view', '', TRUE),
			'content' => $this->load->view('admin/dolgozok/dolgozok_list_view', $data, TRUE),
			'footer' => $this->load->view('partials/footer_view', '', TRUE)
		];
		$this->load->view('public_template_view', $partialviews);
	}

	// Új dolgozó létrehozása
	public function create() {
        if ($this->form_validation->run('dolgozok_rules') == FALSE)
    	{
			$data['errors'] = validation_errors();
			$partialviews = [
				'header' => $this->load->view('partials/header_view', '', TRUE),
				'menu' => $this->load->view('partials/menu_view', '', TRUE),
				'content' => $this->load->view('admin/dolgozok/dolgozok_create_view', $data, TRUE),
				'footer' => $this->load->view('partials/footer_view', '', TRUE)
			];
        	$this->load->view('public_template_view', $partialviews);
    	} else {
        	$this->Dolgozok_model->insert_entry($this->input->post('dolgozonev'));
        	redirect('dolgozok/index');
    	}
	}

	// Kiválasztott dolgozó szerkesztése
	public function edit($id) {
		if ($id == null) {
			redirect('dolgozok/index');
		}
		$data['worker'] = $this->Dolgozok_model->getDolgozoById($id);
		$partialviews = [
			'header' => $this->load->view('partials/header_view','', TRUE),
			'menu' => $this->load->view('partials/menu_view', '', TRUE),
			'content' => $this->load->view('admin/dolgozok/dolgozok_edit_view', $data, TRUE),
			'footer' => $this->load->view('partials/footer_view', '', TRUE)
		];
		$this->load->view('public_template_view', $partialviews);
	}

	// Kiválasztott dolgozó mentése szerkesztés után
	public function edit_save() {
		if ($this->form_validation->run('dolgozok_rules') == FALSE)
    	{
			$data['worker'] = $this->Dolgozok_model->getDolgozoById($this->input->post('id'));
			$data['errors'] = validation_errors();
			$partialviews = [
				'header' => $this->load->view('partials/header_view','', TRUE),
				'menu' => $this->load->view('partials/menu_view', '', TRUE),
				'content' => $this->load->view('admin/dolgozok/dolgozok_edit_view', $data, TRUE),
				'footer' => $this->load->view('partials/footer_view', '', TRUE)
			];
        	$this->load->view('public_template_view', $partialviews);
    	} else {
        	$data = array ('dolgozonev' => $this->input->post('dolgozonev'));
			$this->Dolgozok_model->update_entry($this->input->post('id'), $data);
        	redirect('dolgozok/index');
    	}
	}

	// Kiválasztott dolgozó törlésének megerősítése
	public function delete($id) {
		if ($id == null) {
			redirect('dolgozok/index');
		}
		$data['worker'] = $this->Dolgozok_model->getDolgozoById($id);
		$partialviews = [
			'header' => $this->load->view('partials/header_view', '', TRUE),
			'menu' => $this->load->view('partials/menu_view', '', TRUE),
			'content' => $this->load->view('admin/dolgozok/dolgozok_delete_view', $data, TRUE),
			'footer' => $this->load->view('partials/footer_view', '', TRUE)
		];
		$this->load->view('public_template_view', $partialviews);
	}

	// Kiválasztott dolgozó törlése
	public function delete_confirm() {
		$this->Dolgozok_model->delete_entry($this->input->post('id'));
		redirect('dolgozok/index');
	}

}