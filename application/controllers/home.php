<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __constructor() {
		parent::__constructor();
	}

	// this is the home page
	public function index() {
		$data = [
			'header' => base_url().'/application/views/partials/header_view.php',
			'menu' => base_url().'/application/views/partials/menu_view.php',
			'content' => base_url().'/application/views/munkak_view.php',
			'footer' => base_url().'/application/views/partials/footer_view.php'
		];
		$this->load->view('page_view');
	}

}