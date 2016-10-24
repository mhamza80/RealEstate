<?php

	class Date_m extends CI_Model
	{
		public function __construct()
		{
			parent::__construct();
		}
		
		public function get()
		{
			$this->db->select('*');
			$query = $this->db->get('date');
			if($query->num_rows() > 0)
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}
		}
		
		public function hijri()
		{
			$data  = array(
			'type'=>0
			);
			$this->db->update('date',$data);
		}
		
		public function ger()
		{
			$data  = array(
			'type'=>1
			);
			$this->db->update('date',$data);
		}
		
	}