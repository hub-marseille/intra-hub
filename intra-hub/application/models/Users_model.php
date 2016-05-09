<?php

// User rights :
//0 = none,
//1=Basic,
//10=admin,
//42=superadmin

class Users_model extends CI_Model
{
    protected $table = 't_users';

	public function __construct()
	{
		parent::__construct();

	}

	public function signin($login, $password)
	{
		$data = array(
		      'username' => $login,
			  'password' => sha1(htmlentities($password)));
			  //#Warning : faut modifier la structure de la base et checker si l'utilisateur n'est pas supprimé.
			  //'deleted' => false);
		
		$query = $this->db->get_where($this->table, $data);
		$res = $query->row_array();

		return $res;
	}

	public function createUser($login, $password)
	{
		$data = array(
			'username' => $login,
			'password' => sha1(htmlentities($password)),
			'user_right' => 0
		);
		$ret =$this->db->insert('t_users', $data);
		if ($res = true)
			return $this->signin($login, $password);
		else
			return $ret;
	}

	public function get_users()
	{
		$query = $this->db->get_where($this->table);

		return $query->result_array();
	}
}

?>