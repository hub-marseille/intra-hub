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
        /*$this->load->view('templates/backoffice/header');
        $this->load->view('backoffice/Projects');
        $this->load->view('templates/backoffice/footer');*/
    }

    public function add()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'Project name', 'required|is_unique[t_projects.name]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/backoffice/header');
            $this->load->view('backoffice/Addproject');
            $this->load->view('templates/backoffice/footer');
        }
        else {
            $this->load->model('Projects_model', 'project');
            $this->project->add_project();
            redirect('backoffice/projects');
        }
    }

    public function edit($projectid)
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        $data = $this->projects->projects_by_id($projectid);

        $this->form_validation->set_rules('name', 'Project name', 'required|is_unique[t_projects.name]');

        if ($data != NULL) {
            $this->load->view('templates/backoffice/header');
            $this->load->view('backoffice/Editproject', $data[0]);
            $this->load->view('templates/backoffice/footer');
            if ($this->form_validation->run() == FALSE) {
            }
            else{
                $this->projects->update_project($projectid);
                redirect('backoffice/projects/'.$projectid);
            }
        } else {
            echo "no project with this id";
        }
    }

    public function viewall()
    {
        $data['projects'] = $this->projects->all_projects();
        $this->load->view('templates/backoffice/header');
        $this->load->view('backoffice/Viewallprojects', $data);
        $this->load->view('templates/backoffice/footer');
    }

    public function view($id)
    {
        $data = $this->projects->projects_by_id($id);
        if ($data != NULL) {
            $this->load->view('templates/backoffice/header');
            $this->load->view('backoffice/Viewproject', $data[0]);
            $this->load->view('templates/backoffice/footer');
        }
        else {
            redirect('backoffice/projects');
        }
    }

    public function delete($id)
    {
        $this->projects->delete_project($id);
        redirect('backoffice/projects');
    }
}