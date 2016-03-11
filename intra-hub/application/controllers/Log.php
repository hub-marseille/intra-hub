<?php

class Log extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('log_model');
	}

	public function index()
	{
		echo 'Log index';
	}

	public function in()
	{
		$login = $this->input->post('login');
		$password = $this->input->post('password');
		
		$result = $this->log_model->in($login, $password);

		if (count($result) > 0)
		   {
			$data = array(
			      'id' => $result[0]->id,
			      'username' => $result[0]->username,
			      'user_right' => $result[0]->user_right
			);

			$this->session->set_userdata($data);
		   
			echo '{
			     success: true,
			     errormsg: "OK"
			}';
		   }
		else
		{
			echo '{
			     success: false,
			     errormsg: "Bad login or password"
			}';
		}
	}

	public function out()
	{
		$data = array(
		      'id' => '',
		      'username' => '',
		      'user_right' => ''
		 );

		 $this->session->sess_destroy();

		 echo '{
		      success: true,
		      errormsg: "OK"
		 }';
	}

}

?>