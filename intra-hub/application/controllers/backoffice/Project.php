<?php
/**
 * Created by PhpStorm.
 * User: otto
 * Date: 3/19/2016
 * Time: 6:22 PM
 */

class Project extends CI_Controller
{
    public function index()
    {
        $this->load->view('backoffice/Project.html');
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
                $this->load->view('templates/backoffice/header', $data);
                $this->load->view('backoffice/notloggedin.html');
                $this->load->view('templates/backoffice/footer', $data);
            }
        }
    }
}