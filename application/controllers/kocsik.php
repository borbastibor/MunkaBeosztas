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
		$data = [
			'header' => 'partials/header_view.php',
			'menu' => 'partials/menu_view',
			'content' => 'kocsik_create_view',
			'footer' => 'partials/footer_view'
		];
		$this->load->view('public_template_view', $data);
	}

	// Kiválasztott kocsi szerkesztése
	public function edit() {
		$data = [
			'header' => 'partials/header_view.php',
			'menu' => 'partials/menu_view',
			'content' => 'kocsik_edit_view',
			'footer' => 'partials/footer_view'
		];
		$this->load->view('public_template_view', $data);
	}

	// Kiválasztott kocsi törlése
	public function delete() {
		$data = [
			'header' => 'partials/header_view.php',
			'menu' => 'partials/menu_view',
			'content' => 'kocsik_delete_view',
			'footer' => 'partials/footer_view'
		];
		$this->load->view('public_template_view', $data);
	}

}