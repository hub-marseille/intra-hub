<?php

/**
 * Created by PhpStorm.
 * User: Benjamin
 * Date: 12/03/2016
 * Time: 17:09
 */

class backOfficeHome extends CI_Controller {

    public function loginIndex()
    {
        $ret = $this->load->view('backoffice/backofficelogin.html');
        // return json_encode($ret);

    }
    public function index()
    {
        $ret = $this->load->view('backoffice/backofficehome.html');
    }

    public function authenticate()
    {
        if (($login = $this->input->post('login')) == false);
            $response = "failed";
        if (($pwd = $this->input->post('pwd')) == false)
            $response = "failed";
        $this->load->model('EpitechLogin_model', 'Login');
        $ret = $this->Login->authenticate($login, $pwd);

        $response = "You're not logged!";

        if ($ret == true)
        {
            $response = "Logged In!";
            $this->index();
        }
        else
        {
            $this->loginIndex();
        }
        return json_encode($response);
    }
}