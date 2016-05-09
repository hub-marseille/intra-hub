<?php

class Users extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Users_model', 'usersManager');
    }

    public function index()
    {
        $data['users'] = $this->usersManager->get_users();

        $this->load->view('templates/backoffice/header');
        $this->load->view('backoffice/users', $data);
        $this->load->view('templates/backoffice/footer');
    }
}