<?php

class Projects extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('projects_model');
	}

	public function index()
	{
		echo 'Front Controller Index';
	}

	/* Return all projects non deleted */
	public function all_projects()
	{
		$result = $this->projects_model->all_projects();

		print_r($this->session->userdata('id'));

		echo '{
		     success: true,
		     projects: '.json_encode($result).'
		}';
	}

	/* Return projects matching with status */
	public function projects_by_status($state_id)
	{
		$result = $this->projects_model->projects_by_status($state_id);

		echo '{
		     success: true,
		     projects: '.json_encode($result).'
		}';
	}

	/* Return projects matching with an project id */
	public function projects_by_id($projects_id)
	{
		$result = $this->projects_model->projects_by_id($projects_id);

		echo '{
		     success: true,
		     project: '.json_encode($result).'
		}';
	}

	/* Add a project to the DB */
	public function add_projects()
	{
	
	}
}

?>
