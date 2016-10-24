<?php

	class Long_documents extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
		}
		
		public function get_by_id($id)
		{
			$this->db->select('*');
			$this->db->where('rental_id',$id);
			$query = $this->db->get('long_doucments');
			if($query->num_rows() >  0 )
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}
		}

		public function add($data)
		{
			$data = array(
			'rental_id'		=>$this->input->post('rental_id'),
			'file_name'		=>$data['file_name'],
			'file_path'		=>$data['file_path']
			);
			$insert = $this->db->insert('long_doucments',$data);
		}		
	}