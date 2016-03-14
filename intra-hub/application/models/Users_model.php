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

		$res = $this->db->where($data)
				->get('t_users')
				->result_array();

		return $res;
	}
}

?>