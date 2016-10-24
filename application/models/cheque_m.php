<?php

	class Cheque_m extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
		}
		
		public function get_all()
		{
			$this->db->select('*');
			$query = $this->db->get('cheque');
			if($query->num_rows() > 0)
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}
		}
		
		public function insert($input)
		{
			$data = array(
			'name'		=>$input['to'],
			'city'		=>$input['city'],
			'amount'	=>$input['amount'],
			'about'		=>$input['about'],
			'date'		=>now()
			);
			$insert = $this->db->insert('cheque',$data);
			return $this->db->insert_id();
		}
		
		public function get($id)
		{
			$this->db->where('id',$id);
			$query = $this->db->get('cheque');
			if($query->num_rows()>0)
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}
		}
		
		public function attachment($data,$id)
		{
			$data = array(
			'cheque_name'	=>$data['file_name'],
			'cheque_path'	=>$data['file_path']
			);
			$update = $this->db->where('id',$id);
			$update = $this->db->update('cheque',$data);	
		}
		
		public function delete($id)
		{
			$this->db->where('id',$id);
			$this->db->delete('cheque');	
		}
		
	}