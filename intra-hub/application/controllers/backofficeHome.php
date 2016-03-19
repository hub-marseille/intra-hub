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
        $this->load->view('backoffice/backofficelogin.html', $data);
    }
    public function index()
    {
        $this->load->view('backoffice/backofficehome.html');
    }

    public function authenticate()
    {
        $response = '';
        if (($login = $this->input->post('login')) == false || (($pwd = $this->input->post('pwd')) == false))
            $response .= "Credentials incomplete";
        if  ($login != null && $pwd != null)
        {
            $this->load->model('EpitechLogin_model', 'Login');
            $ret = $this->Login->authenticate($login, $pwd);
            if ($ret["status"] == true)
             {
                 $this->index();
             }
            else
            {
                $response = "Login failed: " . $ret["msg"];
            }
        }
        $data = array();
        $data["Status"] = $response;
        $this->loginIndex($data);
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