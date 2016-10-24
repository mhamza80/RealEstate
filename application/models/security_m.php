<?php

	class Security_m extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
		} 
		
		function get_all()
		{
			$this->db->select('*');
			$query = $this->db->get('keys');
			if($query->num_rows() > 0)
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}
		}
		
		function update($period)
		{
			$data = array(
			'period'	=>$period
			);
			$update = $this->db->where('id',1);
			$update = $this->db->update('keys',$data);
		}
		
	}