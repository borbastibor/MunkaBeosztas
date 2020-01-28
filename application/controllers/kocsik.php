<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kocsik extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Kocsik_model');
	}

	// Kocsiklista nézet betöltése
	public function index() {
		$data['kocsik'] = $this->Kocsik_model->getAllKocsik();
		$partialviews = [
			'header' => $this->load->view('partials/header_view.php','', TRUE),
			'menu' => $this->load->view('partials/menu_view', '', TRUE),
			'content' => $this->load->view('admin/kocsik/kocsik_list_view', $data, TRUE),
			'footer' => $this->load->view('partials/footer_view', '', TRUE)
		];
		$this->load->view('public_template_view', $partialviews);
	}

	// Új kocsi létrehozása
	public function create() {
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');

		$partialviews = [
			'header' => $this->load->view('partials/header_view.php', '', TRUE),
			'menu' => $this->load->view('partials/menu_view', '', TRUE),
			'content' => $this->load->view('admin/kocsik/kocsik_create_view', '', TRUE),
			'footer' => $this->load->view('partials/footer_view', '', TRUE)
		];

        if ($this->form_validation->run('kocsik_rules') == FALSE)
    	{
        	$this->load->view('public_template_view', $partialviews);
    	} else {
        	$this->Kocsik_model->insert_entry($this->input->post('tipus'), $this->input->post('rendszam'));
        	redirect('kocsik/index');
    	}
	}

	// Kiválasztott kocsi szerkesztése
	public function edit($id) {
		$this->load->helper(array('form', 'url'));
		if ($id == null) {
			redirect('kocsik/index');
		}
		$data['car'] = $this->Kocsik_model->getKocsiById($id);
		$partialviews = [
			'header' => $this->load->view('partials/header_view.php','', TRUE),
			'menu' => $this->load->view('partials/menu_view', '', TRUE),
			'content' => $this->load->view('admin/kocsik/kocsik_edit_view', $data, TRUE),
			'footer' => $this->load->view('partials/footer_view', '', TRUE)
		];
		$this->load->view('public_template_view', $partialviews);
	}

	// Kiválasztott kocsi mentése szerkesztés után
	public function edit_save() {
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');

		$data['car'] = $this->Kocsik_model->getKocsiById($this->input->post('id'));
		$partialviews = [
			'header' => $this->load->view('partials/header_view.php','', TRUE),
			'menu' => $this->load->view('partials/menu_view', '', TRUE),
			'content' => $this->load->view('admin/kocsik/kocsik_edit_view', $data, TRUE),
			'footer' => $this->load->view('partials/footer_view', '', TRUE)
		];

		if ($this->form_validation->run('kocsik_rules') == FALSE)
    	{
        	$this->load->view('public_template_view', $partialviews);
    	} else {
        	$data = array (
				'tipus' => $this->input->post('tipus'),
				'rendszam' => $this->input->post('rendszam')
			);
			$this->Kocsik_model->update_entry($this->input->post('id'), $data);
        	redirect('kocsik/index');
    	}
	}

	// Kiválasztott kocsi törlésének megerősítése
	public function delete($id) {
		$this->load->helper(array('form', 'url'));
		if ($id == null) {
			redirect('kocsik/index');
		}
		$data['car'] = $this->Kocsik_model->getKocsiById($id);
		$partialviews = [
			'header' => $this->load->view('partials/header_view.php', '', TRUE),
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