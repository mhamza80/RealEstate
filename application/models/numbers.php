<?php

	class Numbers extends CI_Model
	{
		public function __construct()
		{
			parent::__construct();
		}
		
		public function increment()
		{
			$this->db->set('number', 'number+1', FALSE);
			$this->db->update('number');
		}
		
		public function get_number()
		{
			$this->db->select('number');
			$query = $this->db->get('number');
			if($query->num_rows() > 0)
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}
		}
	}