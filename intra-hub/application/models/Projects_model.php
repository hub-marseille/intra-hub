<?php

class Projects_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}	

	public function all_projects()
	{
		$data = array(
		      'deleted' => NULL
		);
	
		$query = $this->db->get_where('t_projects', $data);

		$result = array();

		foreach ($query->result() as $row)
			$result[] = $row;
	
		return $result;
	}

	public function projects_by_status($state)
	{
		$query = $this->db->get_where('t_projects', array('id_status' =>  $state));

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
}

?>