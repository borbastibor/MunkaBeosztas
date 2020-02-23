<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}

	// Naptár nézet betöltése
	public function index() {
		if ($this->session->userdata('startdate') == null) {
			$this->session->set_userdata('startdate', date('Y-m-d'));
		}
		$menudata['iscalendarview'] = TRUE;
		$menudata['isadmin'] = $this->session->userdata('isAdmin');
		$data['futasok'] = $this->Gkfutas_model->getGkfutasByTimePeriod($this->session->userdata('startdate'));
		$data['sdate'] = $this->session->userdata('startdate');
		$partialviews = [
			'header' => $this->load->view('partials/header_view', '', TRUE),
			'menu' => $this->load->view('partials/menu_view', $menudata, TRUE),
			'content' => $this->load->view('calendar_view', $data, TRUE),
			'footer' => $this->load->view('partials/footer_view', '', TRUE)
		];
		$this->load->view('public_template_view', $partialviews);
	}

	// Nézet eltolása egy nappal vissza
	public function shiftOneDayBack() {
		$sdate = new DateTime($this->session->userdata('startdate'));
		$this->session->set_userdata('startdate', date_sub($sdate, new DateInterval('P1D'))->format('Y-m-d'));
		redirect('home/index');
	}

	// Nézet eltolása egy nappal előre
	public function shiftOneDayFwd() {
		$sdate = new DateTime($this->session->userdata('startdate'));
		$this->session->set_userdata('startdate', date_add($sdate, new DateInterval('P1D'))->format('Y-m-d'));
		redirect('home/index');
	}

	// Nézet eltolása egy héttel vissza
	public function shiftOneWeekBack() {
		$sdate = new DateTime($this->session->userdata('startdate'));
		$this->session->set_userdata('startdate', date_sub($sdate, new DateInterval('P7D'))->format('Y-m-d'));
		redirect('home/index');
	}

	// Nézet eltolása egy héttel előre
	public function shiftOneWeekFwd() {
		$sdate = new DateTime($this->session->userdata('startdate'));
		$this->session->set_userdata('startdate', date_add($sdate, new DateInterval('P7D'))->format('Y-m-d'));
		redirect('home/index');
	}

	public function resetToCurrentDay() {
		$this->session->set_userdata('startdate', date('Y-m-d'));
		redirect('home/index');
	}
}
