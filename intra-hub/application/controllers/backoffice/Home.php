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
        $this->load->library('session');
    }

    public function loginIndex($data)
    {
        $this->load->view('templates/backoffice/header', $data);
        $this->load->view('backoffice/Login', $data);
        $this->load->view('templates/backoffice/footer', $data);
    }
    public function index()
    {
        if ($this->Login->validateOnCookie() == true)
        {
            $this->load->view('templates/backoffice/header');
            $this->load->view('backoffice/Index');
            $this->load->view('templates/backoffice/footer');
        }
        else
        {
            $this->authenticate();
        }
    }

    public function authenticate()
    {
       /* if (($session = $this->session->all_userdata()) == null || $session["logged"] != true)
        {*/
            $response = '';
            $login = $this->input->post('login');
            $pwd = $this->input->post('pwd');
            $ret = $this->Login->authenticate($login, $pwd);
            if ($ret["status"] == true)
            {
                $this->index();
            }
            else
            {
                $data = array();
                $data["Status"] = $ret["msg"];
                $data["title"] = "Login";
                $this->loginIndex($data);
            }
       /* }
        else
        {
            $this->index();
        }*/
    }
}