<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Team extends CI_Controller {

	public function __construct() {
		parent::__construct();

		$this->load->database();

		$this->load->model('hub_members_model');
	}

	public function index()
	{
		$data['members'] = $this->hub_members_model->get_all();

		$this->load->view('front-office/header.html');
		$this->load->view('front-office/team.php', $data);
		$this->load->view('front-office/footer.html');
	}
}
