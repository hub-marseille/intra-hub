<?php

class Log_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('encrypt');
	}

	public function in($login, $password)
	{
		$data = array(
		      'username' => $login,
		      'password' => $this->encrypt->sha1($password)
		      );
		      
		$query = $this->db->get_where('t_users', $data);

		$result = array();

		foreach ($query->result() as $row)
			$result[] = $row;

		return $result;
	}

}

?>