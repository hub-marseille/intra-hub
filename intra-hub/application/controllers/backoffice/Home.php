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
        $this->load->model('EpitechLogin_model', 'login');
        $this->load->model('Projects_model', 'project');
    }

    public function loginIndex($data)
    {
        $this->load->view('templates/backoffice/header', $data);
        $this->load->view('backoffice/Login', $data);
        $this->load->view('templates/backoffice/footer', $data);
    }

    public function HomeIndex()
    {
        $x = 0;
        $projects = $this->project->all_projects();
        $data['oldProj'] = '<ul>';
        foreach ($projects as $proj)
        {
            $data['oldProj'] .= '<li id="' . $proj['id'] . '">' . $proj['name'] . '</li>';
        }
        $data['oldProj'] .= '</ul>';
        $this->load->view('templates/backoffice/header');
        $this->load->view('backoffice/Index', $data);
        $this->load->view('templates/backoffice/footer');
    }

    public function index()
    {
        if ($this->session->userdata('id') !== null)
        {
            $this->HomeIndex();
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
        $ret = $this->login->authenticate($login, $pwd);
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