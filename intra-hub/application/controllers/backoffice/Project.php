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
        $this->load->model('Projects_model', 'projectManager');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['projects'] = $this->projectManager->all_projects();
        $this->load->view('templates/backoffice/header');
        $this->load->view('backoffice/Viewallprojects', $data);
        $this->load->view('templates/backoffice/footer');
    }

    public function add()
    {
        $this->form_validation->set_rules('name', 'Project name', 'required|is_unique[t_projects.name]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/backoffice/header');
            $this->load->view('backoffice/Addproject');
            $this->load->view('templates/backoffice/footer');
        }
        else {
            $this->load->model('Projects_model', 'project');
            $this->project->add_project();
            redirect(base_url().'backoffice/projects');
        }
    }

    public function edit($projectid)
    {
        $data = $this->projectManager->projects_by_id($projectid);

        $this->form_validation->set_rules('name', 'Project name', 'required|is_unique[t_projects.name]');

        if ($data != NULL) {
            $this->load->view('templates/backoffice/header');
            $this->load->view('backoffice/Editproject', $data[0]);
            $this->load->view('templates/backoffice/footer');
            if ($this->form_validation->run() == FALSE) {
            }
            else{
                $this->projectManager->update_project($projectid);
            }
        } else {
            echo "no project with this id";
        }
    }

    public function view($id)
    {
        $data = $this->projectManager->projects_by_id($id);
        if ($data != NULL) {
            $this->load->view('templates/backoffice/header');
            $this->load->view('backoffice/Viewproject', $data[0]);
            $this->load->view('templates/backoffice/footer');
        }
        else {
            redirect(base_url().'backoffice/projects');
        }
    }

    public function delete($id)
    {
        $this->projectManager->delete_project($id);
        redirect(base_url().'backoffice/projects');
    }

    public function viewproject()
    {
        $id = $this->input->post("id");
        $data = $this->projectManager->projects_by_id($id);
        //$data["html_response"] = '<div class="row">' . $data[0]['description'] . '</div>';
        echo json_encode($data[0]);
    }
}