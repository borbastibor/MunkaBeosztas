<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __constructor() {
		parent::__constructor();
	}

	// Lista nézet betöltése
	public function index() {
		$data = [
			'header' => 'partials/header_view.php',
			'menu' => 'partials/menu_view',
			'content' => 'munkak_list_view',
			'footer' => 'partials/footer_view'
		];
		$this->load->view('page_view', $data);
	}

	// Új munka létrehozása
	public function create() {
		$data = [
			'header' => 'partials/header_view.php',
			'menu' => 'partials/menu_view',
			'content' => 'admin/munkak/munkak_create_view',
			'footer' => 'partials/footer_view'
		];
		$this->load->view('page_view', $data);
	}

	// Kiválasztott munka szerkesztése
	public function edit() {

	}

	// Kiválasztott munka törlése
	public function delete() {

	}

	// Aktuális felhasználó validálása
	public function checkUser() {

	}

}