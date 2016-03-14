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

		echo '{
		     "success": true,
		     "projects": '.json_encode($result).'
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
	public function add_project()
	{
		$current_user = $this->session->userdata('id');

		if (is_numeric($current_user) && $current_user > 0) {

			$data = array(
		      	      'name' => $this->input->post('name'),
		      	      'main_picture' => $this->input->post('main_picture'),
		      	      'description' => $this->input->post('description'),
		      	      'short_description' => $this->input->post('short_description'),
		      	      'id_status' => 1,
			      'id_owner' => $current_user
			);

			$this->projects_model->add_project($data);

			echo '{
			     success: true,
		      	     errormsg: "OK"
			}';

		} else {
		  //redirect
		  echo 'Redirect';
		}
	}

	/* Delete a project from DB (just set deleted = true) */
	public function delete_project()
	{
		$current_user = $this->session->userdata('id');

		if (is_numeric($current_user) && $current_user > 0) {

			$id = $this->input->post('id');

			$this->projects_model->delete_project($id);

			echo '{
			     success: true,
		      	     errormsg: "OK"
			}';

		} else {
		  //redirect
		  echo 'Redirect';
		}
	}

	/* Update a project from DB */
	public function update_project()
	{
		$current_user = $this->session->userdata('id');

		if (is_numeric($current_user) && $current_user > 0) {

		   	$data = array();

			$name = $this->input->post('name');
			$main_picture = $this->input->post('main_picture');
			$description = $this->input->post('description');
		      	$short_description = $this->input->post('short_description');
			$id_status = $this->input->post('id_status');

			if ($name != '' && $name != NULL)
			   $data['name'] = $name;
			if ($main_picture != '' && $main_picture != NULL)
			   $data['main_picture'] = $main_picture;
			if ($description != '' && $description != NULL)
			   $data['description'] = $description;
			if ($short_description != '' && $short_description != NULL)
			   $data['short_description'] = $short_description;
			if ($id_status != '' && $id_status != NULL)
			   $data['id_status'] = $id_status;

			if (count($data) == 0)
			   die('{
			   	success: true,
				errormsg: "OK"
			   }');

			$id = $this->input->post('id');

			$this->projects_model->update_project($data, $id);

			echo '{
			     success: true,
		      	     errormsg: "OK"
			}';

		} else {
		  //redirect
		  echo 'Redirect';
		}
	}

	public function next_status()
	{
		$current_user = $this->session->userdata('id');

		if (is_numeric($current_user) && $current_user > 0) {

		   $id = $this->input->post('id');
		   $this->project_model->next_status($id);

		} else {
		  //redirect
		  echo 'Redirect';
		}

	}
}

?>
