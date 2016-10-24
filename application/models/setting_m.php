<?php

	class Setting_m extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
		}
		
		public function get_all()
		{
			$this->db->select('*');
			$this->db->where('type',0);
			$query = $this->db->get('settings');
			if($query->num_rows() > 0 )
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}
		}
		
		public function get_installment()
		{
			$this->db->select('*');
			$this->db->where('type',1);
			$query = $this->db->get('settings');
			if($query->num_rows() > 0 )
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}
		}
		
		public function get_long_contract()
		{
			$this->db->select('*');
			$this->db->where('type',3);
			$query = $this->db->get('settings');
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
			'days'		=>$this->input->post('name'),
			'type'		=>$this->input->post('type'),
			);
			$insert = $this->db->insert('settings',$data);
		}
		
		
		public function add_contracts()
		{
			$data = array(
			'days'		=>$this->input->post('name'),
			'type'		=>$this->input->post('type'),
			);
			$insert = $this->db->insert('settings',$data);
		}
		
		public function update()
		{
			$data = array(
			'days'		=>$this->input->post('name'),
			'type'		=>$this->input->post('type'),
			);
			$update = $this->db->where('id',$this->input->post('id'));
			$upate = $this->db->update('settings',$data);
		}
		
		public function get_by_id($id)
		{
			$this->db->where('id',$id);
			$query = $this->db->get('settings');
			if($query->num_rows() > 0 )
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}
		}
	}