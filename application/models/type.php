<?php

	class Type extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
		}
		
		public function get_all()
		{
			$this->db->select('*');
			$query = $this->db->get('types');
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
			'type' =>$this->input->post('name')
			);
			$insert = $this->db->insert('types',$data);
		}
		
		public function get_by_id($id)
		{
			$this->db->where('id',$id);
			$query = $this->db->get('types');
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
			'type' =>$this->input->post('name')
			);
			$update = $this->db->where('id',$this->input->post('id'));
			$update = $this->db->update('types',$data);
		}
		
		public function delete($id)
		{
			$this->db->where('id',$id);
			$this->db->delete('types');
		}
		
		public function count($id)
		{
			$this->db->where('type_id',$id);
			return $this->db->count_all_results('sub_types');
		}
		
		public function count_estates($id)
		{
			$this->db->where('estate_type',$id);
			$this->db->where('archived',0);
			return $this->db->count_all_results('rentals');
		}
		
		
	}