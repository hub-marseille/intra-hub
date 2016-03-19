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
        $this->load->model('EpitechLogin_model', 'Login');
        $ret = $this->Login->authenticate($login, $pwd);

        $response = $login . ', ' . $pwd . ": You're not logged!";

        if ($ret == true)
        {
            $response = "Logged In!";
            $this->index();
        }
        else
        {
            $response .= " ErrorCode : " . $ret;
            $data = array();
            $data["Status"] = $response;
            $this->loginIndex($data);
        }
        return json_encode($response);
    }

    public function add_project()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        //$current_user = $this->session->userdata('id');
        $current_user = 1;

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('name', 'name', 'is_unique[t_projects.name]');

        if ($this->form_validation->run() === FALSE) {
            echo "a unique name is required";
        }
        else {
            if (is_numeric($current_user) && $current_user > 0) {
                $data = array(
                    'name' => $this->input->post('name'),
                    'main_picture' => $this->input->post('main_picture'),
                    'description' => $this->input->post('description'),
                    'short_description' => $this->input->post('short_description'),
                    'id_status' => 1,
                    //'id_owner' => $this->input->post('current_user')
                );
                $this->load->model('Projects_model', 'projects');
                $this->projects->add_project($data);
            }
            else {
                //redirect
                echo 'You must be logged in to do this';
            }
        }
    }
}