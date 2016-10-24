<?php

	class Sms_m extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
		}
		
		public function get_all()
		{
			$this->db->select('*');
			$query = $this->db->get('sms');
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
			'user_name'		=>$this->input->post('name'),
			'pass'			=>$this->input->post('pass'),
			);
			$insert = $this->db->insert('sms',$data);
		}
		
		public function update()
		{
			$data = array(
			'user_name'		=>$this->input->post('name'),
			'pass'			=>$this->input->post('pass'),
			);
			$update = $this->db->where('id',$this->input->post('id'));
			$upate = $this->db->update('sms',$data);
		}
		
		public function get_by_id($id)
		{
			$this->db->where('id',$id);
			$query = $this->db->get('sms');
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