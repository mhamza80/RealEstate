<?php

	class City extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
		}
		
		public function get_all()
		{
			$this->db->select('*');
			$query = $this->db->get('cities');
			if($query->num_rows() >  0 )
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
			'city' =>$this->input->post('name')
			);
			$insert = $this->db->insert('cities',$data);
		}
		
		public function get_by_id($id)
		{
			$this->db->where('id',$id);
			$query = $this->db->get('cities');
			if($query->num_rows() >  0 )
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}
		}
		
		public function update()
		{
			$data = array(
			'city' =>$this->input->post('name')
			);
			$update = $this->db->where('id',$this->input->post('id'));
			$update = $this->db->update('cities',$data);
		}
		
		public function delete($id)
		{
			$this->db->where('id',$id);
			$this->db->delete('cities');
		}
		
		
		
	}