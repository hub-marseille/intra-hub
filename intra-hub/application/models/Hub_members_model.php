<?php

class Hub_members_model extends CI_Model
{
	protected $table = 't_hub_members';

	public function __construct() {
		$this->load->database();
	}

	public function get_all()
	{
		$res = $this->db->select($this->table.'.*, t_users.username, t_users.facebook, t_users.gplus, t_users.twitter, t_users.linkedin, t_pictures.name as img, t_pictures.alt, t_pictures.description')
			->join('t_users', $this->table.'.id_user = t_users.id', 'left')
			->join('t_pictures', 't_pictures.id = t_users.id_picture', 'left')
			->get_where($this->table, array($this->table.'.deleted' => 0, 't_users.deleted' => 0))
			->result_array();

		return $res;
	}
}