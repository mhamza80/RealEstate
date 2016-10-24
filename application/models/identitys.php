<?php

	class identitys extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
		}
		
		public function get_all()
		{
			$this->db->select('*');
			$query = $this->db->get('identity');
			if($query->num_rows() > 0 )
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}
		}
		
		public function add()
		{
			$data = array(
			'type'	=>$this->input->post('name')
			);
			$insert = $this->db->insert('identity',$data);
		}
	}