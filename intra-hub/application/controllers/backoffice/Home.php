<?php

/**
 * Created by PhpStorm.
 * User: Benjamin
 * Date: 12/03/2016
 * Time: 17:09
 */

class Home extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('EpitechLogin_model', 'Login');
    }

    public function loginIndex($data)
    {
        $this->load->view('templates/backoffice/header', $data);
        $this->load->view('backoffice/Login', $data);
        $this->load->view('templates/backoffice/footer', $data);
    }
    public function index()
    {
        if ($this->session->userdata('id') !== null)
        {
            $this->load->view('templates/backoffice/header');
            $this->load->view('backoffice/Index');
            $this->load->view('templates/backoffice/footer');
        }
        else
        {
            $data = array();
            $data["Status"] = '';
            $data["title"] = "Login";
            $this->loginIndex($data);
        }
    }


    public function authenticate()
    {
        $login = $this->input->post('login');
        $pwd = $this->input->post('pwd');
        $ret = $this->Login->authenticate($login, $pwd);
		if ($ret['status'])
			echo "ok";
		else
			echo "ko";
        //return json_encode($ret["status"]);
    }

	public function signout()
	{
		$this->session->sess_destroy();
		redirect(base_url()."backoffice");
	}
}