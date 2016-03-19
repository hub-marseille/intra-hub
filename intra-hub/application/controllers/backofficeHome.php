<?php

/**
 * Created by PhpStorm.
 * User: Benjamin
 * Date: 12/03/2016
 * Time: 17:09
 */

class backOfficeHome extends CI_Controller {

    public function loginIndex($data)
    {
        $ret = $this->load->view('backoffice/backofficelogin.html', $data);
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
        if  ($login != null && $pwd != null)
        {
            $this->load->model('EpitechLogin_model', 'Login');
            $ret = $this->Login->authenticate($login, $pwd);
            $response = $login . ', ' . $pwd . ": You're not logged!";

            /* if ($ret == true)
             {
                 $response = "Logged In!";
                 $this->index();
             }
             else
             {*/
            $response .= " ErrorCode : " . $ret . ' - ';

        }
            $data = array();
            $data["Status"] = $response;
            $this->loginIndex($data);
        //}
       // return json_encode($response);
    }
}