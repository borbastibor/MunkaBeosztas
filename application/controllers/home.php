<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __constructor() {
		parent::__constructor();
	}

	// Lista nézet betöltése
	public function index() {
		$partialviews = [
			'header' => $this->load->view('partials/header_view.php', true),
			'menu' => $this->load->view('partials/menu_view', true),
			'content' => $this->load->view('munkak_list_view', $data, true),
			'footer' => 'partials/footer_view'
		];
		$this->load->view('public_template_view', $partialviews);
	}

}