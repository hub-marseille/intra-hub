<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Projectsload extends CI_Controller {
	public function index()
	{
		$this->load->view('front-office/header.html');
		$this->load->view('front-office/index.html');
		$this->load->view('front-office/footer.html');
	}
}
