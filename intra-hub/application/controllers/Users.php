<?php

class Users extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('users_model');
		$this->load->library('encrypt');
	}

	public function index()
	{
		echo 'Log index';
	}

	public function signin()
	{
		$login = $this->input->post('login');
		$password = sha1($this->input->post('password'));

		$result = $this->users_model->signin($login, $password);

		if (count($result) > 0)
		   {
			$data = array(
			      'id' => $result[0]['id'],
			      'username' => $result[0]['username'],
			      'user_right' => $result[0]['user_right']
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

	public function signout()
	{
		 $this->session->sess_destroy();

		 echo '{
		      success: true,
		      errormsg: "OK"
		 }';
	}

}

?>