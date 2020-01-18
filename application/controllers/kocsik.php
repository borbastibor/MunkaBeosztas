<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kocsik extends CI_Controller {

	public function __constructor() {
		parent::__constructor();
	}

	// Lista nézat betöltése
	public function index() {
		$data = [
			'header' => 'partials/header_view.php',
			'menu' => 'partials/menu_view',
			'content' => 'kocsik_list_view',
			'footer' => 'partials/footer_view'
		];
		$this->load->view('public_template_view', $data);
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