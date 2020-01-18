<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kocsik extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Kocsik_model');
	}

	// Lista nézat betöltése
	public function index() {
		$data['kocsik'] = $this->Kocsik_model->getAllKocsik();
		$partialviews = [
			'header' => $this->load->view('partials/header_view.php','', true),
			'menu' => $this->load->view('partials/menu_view', '', true),
			'content' => $this->load->view('admin/kocsik/kocsik_list_view', $data, true),
			'footer' => $this->load->view('partials/footer_view', '', true)
		];
		$this->load->view('public_template_view', $partialviews);
	}

	// Új kocsi létrehozása
	public function create() {
		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['kocsik'] = $this->Kocsik_model->getAllKocsik();
		$partialviews = [
			'header' => $this->load->view('partials/header_view.php','', true),
			'menu' => $this->load->view('partials/menu_view', '', true),
			'content' => $this->load->view('admin/kocsik/kocsik_create_view', $data, true),
			'footer' => $this->load->view('partials/footer_view', '', true)
		];

		$this->form_validation->set_rules('tipus', 'Típus', 'required');
    	$this->form_validation->set_rules('rendszam', 'Rendszám', 'required');

		if ($this->form_validation->run() === FALSE)
    	{
        	$this->load->view('public_template_view', $partialviews);
    	} else {
        	$this->Kocsik_model->insert_entry();
        	redirect('kocsik/index');
    	}
	}

	// Kiválasztott kocsi szerkesztése
	public function edit() {
		
	}

	// Kiválasztott kocsi törlésének megerősítése
	public function delete($id) {
		$this->load->helper('form');
		if ($id == null) {
			redirect('kocsik/index');
		}
		$data['car'] = $this->Kocsik_model->getKocsiById($id);
		$partialviews = [
			'header' => $this->load->view('partials/header_view.php','', true),
			'menu' => $this->load->view('partials/menu_view', '', true),
			'content' => $this->load->view('admin/kocsik/kocsik_delete_view', $data, true),
			'footer' => $this->load->view('partials/footer_view', '', true)
		];
		$this->load->view('public_template_view', $partialviews);
	}

	// Kiválasztott kocsi törlése
	public function delete_confirm() {
		$this->Kocsik_model->delete_entry(intval($this->input->post('id')));
		redirect('kocsik/index');
	}
}