<?php

	class Archive_m extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
		}
		
		public function get_all()
		{
			$this->db->select('*');
			$this->db->where('archived',1);
			$query = $this->db->get('rentals');
			if($query->num_rows() > 0)
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}
		}
		
		public function update($date,$id)
		{
			$data = array(
			'archived'		=>1,
			'archived_date'	=>$date
			);
			$update = $this->db->where('id',$id);
			$update = $this->db->update('rentals',$data);
		}
		
	}