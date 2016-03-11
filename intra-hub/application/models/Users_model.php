<?php

class Users_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	}

	public function signin($login, $password)
	{
		$data = array(
		      'username' => $login,
		      'password' => $password
		      );

		$query = $this->db->get_where('t_users', $data);

		$result = array();

		foreach ($query->result_array() as $row)
			$result[] = $row;

		return $result;
	}
}

?>