<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Munkak extends CI_Controller {

	public function __constructor() {
		parent::__constructor();
	}

	// Lista nézat betöltése
	public function index() {
		$data = [
			'header' => 'partials/header_view.php',
			'menu' => 'partials/menu_view',
			'content' => 'kocsik_view',
			'footer' => 'partials/footer_view'
		];
		$this->load->view('page_view', $data);
	}

	// Új kocsi létrehozása
	public function create() {

	}

	// Kiválasztott kocsi szerkesztése
	public function edit() {

	}

	// Kiválasztott kocsi törlése
	public function delete() {

	}

}