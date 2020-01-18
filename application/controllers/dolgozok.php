<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dolgozok extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}

	// Lista nézat betöltése
	public function index() {
		$data = [
			'header' => 'partials/header_view.php',
			'menu' => 'partials/menu_view',
			'content' => 'dolgozok_view',
			'footer' => 'partials/footer_view'
		];
		$this->load->view('page_view', $data);
	}

	// Új dolgozó létrehozása
	public function create() {

	}

	// Kiválasztott dolgozó szerkesztése
	public function edit() {

	}

	// Kiválasztott dolgozó törlése
	public function delete() {

	}

}