<?php
/**
 * Created by PhpStorm.
 * User: otto
 * Date: 3/19/2016
 * Time: 6:22 PM
 */

class Project extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Projects_model', 'projects');
    }

    public function index()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'Project name', 'required|is_unique[t_projects.name]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/backoffice/header');
            $this->load->view('backoffice/Project');
            $this->load->view('templates/backoffice/footer');
        }
        else {
            $this->load->model('Projects_model', 'projects');
            $this->projects->add_project();
        }
    }
}