<?php

class Projects_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}	

	public function all_projects()
	{
		$res = $this->db->where(array('deleted' => NULL))
				->or_where(array('deleted' => false))
				->get('t_projects')
				->result_array();

	
		return $res;
	}

	public function projects_by_status($state)
	{
		$res = $this->db->where(array('id_status' =>  $state, 'deleted' => NULL))
		       	 	->or_where(array('id_status' =>  $state, 'deleted' => false))
		       	 	->get('t_projects')
				->result_array();

		return $res;
	}

	public function projects_by_id($projects_id)
	{
		$res = $this->db->where(array('id' => $projects_id))
		       	 	->get('t_projects')
				->result_array();

		return $res;
	}

	public function important_projects()
	{
		$res = $this->db->where(array('important' => true))
		       		->get('t_projects')
				->result_array();
		return $res;
	}

	public function add_project()
	{
		$data = array(
			'name' => $this->input->post('name'),
			'main_picture' => $this->input->post('main_picture'),
			'description' => $this->input->post('description'),
			'short_description' => $this->input->post('short_description'),
			'id_status' => 1,
			//'id_owner' => $this->session->userdata('id')
			'id_owner' => 1
		);
		return $this->db->insert('t_projects', $data);
		/*try {
		    $this->db->insert('t_projects', $data);
		} catch (Exception $e) {*/
	}

	public function delete_project($id)
	{
		try {
		    $this->db->where('id', $id);
		    $this->db->update('t_projects', array('deleted' => true));
		} catch (Exception $e) {
		
		}
	}

	public function update_project($id)
	{
		$data = array(
			'name' => $this->input->post('name'),
			'main_picture' => $this->input->post('main_picture'),
			'description' => $this->input->post('description'),
			'short_description' => $this->input->post('short_description'),
			'id_status' => 1,
			//'id_owner' => $this->session->userdata('id')
			'id_owner' => 1
		);
		$this->db->where('id', $id);
		$this->db->update('t_projects', $data);
		/*try {
		    $this->db->where('id', $id);
		    $this->db->update('t_projects', $data);
		} catch (Exception $e) {
		
		}*/
	}

	public function next_status($id)
	{
		try {
		    //$this->db->where('id', $id);
		    //$this->db->set('t_projects', $data);
		} catch (Exception $e) {
		
		}	
	}
}

?>