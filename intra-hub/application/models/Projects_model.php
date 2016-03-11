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
		$query = $this->db->get_where('t_projects', array('id_status' =>  $state, 'deleted' => NULL));

		$result = array();

		foreach ($query->result() as $row)
			$result[] = $row;

		return $result;
	}

	public function projects_by_id($projects_id)
	{
		$query = $this->db->get_where('t_projects', array('id' => $projects_id));

		$result = array();

		foreach ($query->result() as $row)
			$result[] = $row;

		return $result;
	}

	public function add_project($data)
	{
		try {
		    $this->db->insert('t_projects', $data);
		} catch (Exception $e) {
		
		}
	}

	public function delete_project($id)
	{
		try {
		    $this->db->where('id', $id);
		    $this->db->update('t_projects', array('deleted' => true));
		} catch (Exception $e) {
		
		}
	}

	public function update_project($data, $id)
	{
		try {
		    $this->db->where('id', $id);
		    $this->db->update('t_projects', $data);
		} catch (Exception $e) {
		
		}
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