<?php

class Calendar_model extends CI_Model
{
	protected $table = "t_events";
	
	public function __construct()
	{
		parent::__construct();
	}
	
	public function public_events ()
	{
		
		//Get all events public
		$events = $this->db->where("(deleted IS NULL OR deleted = 0) AND public = 1")
						->get($this->table)
						->result_array();
						
		$public_event_list = "";
		foreach ($events as $value)
		{
			if (strlen($public_event_list) > 0)
			{
				$public_event_list .= " OR ";
			}
			$public_event_list .= "id_event = ".$value['id'];
		}
		
		if (strlen($public_event_list) == 0)
			return array();
		
		//Get all event_user line for this events
		$event_user = $this->db->where($public_event_list)
								->get('t_events_user')
								->result_array();
								
		$event_user_asso = array();
		foreach ($event_user as $value)
		{
			$event_user_asso[$value['id_event']] = $value['id_event'];
		}
				
		$data = array();
		$event_type_list = "";
		foreach ($events as $value)
		{
			//If no line found in t_event_user
			if (!array_key_exists($value['id'], $event_user_asso))
			{
				$data[] = $value;
				if (strlen($event_type_list) > 0)
				{
					$event_type_list .= " OR ";
				}
				$event_type_list .= "id = ".$value['id_event_type'];
			}
		}
		
		//If no events
		if (strlen($event_type_list) == 0)
			return array();
		
		//Get event_type line for this events
		$event_type = $this->db->where($event_type_list)
								->get('t_event_type')
								->result_array();
								
		$event_type_asso = array();
		foreach ($event_type as $value)
		{
			$event_type_asso[$value['id']] = $value;
		}
		
		//Add to existing informations about event_type
		foreach ($data as & $value)
		{
			if (is_null($value['color']))
			{
				$value['color'] = $event_type_asso[$value['id_event_type']]['default_color'];
			}
			$value['type_name'] = $event_type_asso[$value['id_event_type']]['name'];
			$value['type_description'] = $event_type_asso[$value['id_event_type']]['description'];
		}
		
		return ($data);
	}
	
	public function private_events ($current_user)
	{
		
		//Get all events private
		$events = $this->db->where("(deleted IS NULL OR deleted = 0) AND public = 0")
						->get($this->table)
						->result_array();
						
		$private_event_list = "";
		foreach ($events as $value)
		{
			if (strlen($private_event_list) > 0)
			{
				$private_event_list .= " OR ";
			}
			$private_event_list .= "id_event = ".$value['id'];
		}
		
		if (strlen($private_event_list) == 0)
			return array();
		
		//Get all event_user line for this events
		$event_user = $this->db->where($private_event_list)
								->get('t_events_user')
								->result_array();
								
		$event_user_asso = array();
		foreach ($event_user as $value)
		{
			$event_user_asso[$value['id_event']][] = $value['id_user'];
		}
		
		$data = array();
		$event_type_list = "";
		foreach ($events as $value)
		{
			//if event is for all OR for me in particular
			if (!array_key_exists($value['id'], $event_user_asso) || 
					in_array($current_user, $event_user_asso[$value['id']]))
			{
				$data[] = $value;
				if (strlen($event_type_list) > 0)
				{
					$event_type_list .= " OR ";
				}
				$event_type_list .= "id = ".$value['id_event_type'];
			}
		}
		
		//If no events
		if (strlen($event_type_list) == 0)
			return array();
		
		//Get event_type line for this events
		$event_type = $this->db->where($event_type_list)
								->get('t_event_type')
								->result_array();
								
		$event_type_asso = array();
		foreach ($event_type as $value)
		{
			$event_type_asso[$value['id']] = $value;
		}
		
		//Add to existing informations about event_type
		foreach ($data as & $value)
		{
			if (is_null($value['color']))
			{
				$value['color'] = $event_type_asso[$value['id_event_type']]['default_color'];
			}
			$value['type_name'] = $event_type_asso[$value['id_event_type']]['name'];
			$value['type_description'] = $event_type_asso[$value['id_event_type']]['description'];
		}
		
		return ($data);
	}
}

?>