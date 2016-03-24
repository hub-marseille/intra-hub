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
			  'password' => $password);
			  //#Warning : faut modifier la structure de la base et checker si l'utilisateur n'est pas supprimé.
			  //'deleted' => false);
		
		$query = $this->db->get_where($this->table, $data);
		$res = $query->row_array();

		return $res;
		//$res = $this->db->query("SELECT * FROM t_users WHERE username = " . array($data["username"] . " AND password = " . $data["password"]));
		//$user = $res->row();
		/*foreach ($res->result_array() as $row)
		{
			$user["username"] = $row['username'];
			$user['id'] = $row['id'];
			$user["password"] = $row['password'];
		}*/
		//return $user;
	}

	public function createUser($login, $password)
	{
		$data = array(
			'username' => $login,
			'password' => $password,
			'user_right' => 0
		);
		$ret =$this->db->insert('t_users', $data);
		return $ret;
	}
}

?>