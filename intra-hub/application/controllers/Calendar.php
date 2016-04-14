<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calendar extends CI_Controller {
	public function index()
	{
		$this->load->view('front-office/header.html');
		$this->load->view('front-office/calendar.html');
		$this->load->view('front-office/footer.html');
	}
}
