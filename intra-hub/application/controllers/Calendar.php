<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calendar extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('calendar_model');
	}
	
	public function index()
	{
		$this->load->view('front-office/header.html');
		$this->load->view('front-office/calendar.html');
		$this->load->view('front-office/footer.html');
	}
	
	public function public_events ()
	{
		$result = $this->calendar_model->public_events();

		echo '{
		     "success": true,
		     "events": '.json_encode($result).'
		}';
	}
	
	public function private_events ()
	{
		$current_user = $this->session->userdata('id');
		
		if (is_numeric($current_user) && $current_user > 0) {
		
			$result = $this->calendar_model->private_events($current_user);

			echo '{
				 "success": true,
				 "events": '.json_encode($result).'
			}';
		} else {
			echo 'Redirect';
		}
	}
}
