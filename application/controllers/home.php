<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}

	// Naptár nézet betöltése
	public function index() {
		$partialviews = [
			'header' => $this->load->view('partials/header_view','', true),
			'menu' => $this->load->view('partials/menu_view','', true),
			'content' => $this->load->view('calendar_view','', true),
			'footer' => $this->load->view('partials/footer_view','', true)
		];
		$this->load->view('public_template_view', $partialviews);
	}
}