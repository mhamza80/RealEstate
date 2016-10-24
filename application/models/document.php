<?php


	class Document extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
		}
		
		public function get_all()
		{
			$this->db->select('*');
			$query = $this->db->get('documents');
			if($query->num_rows() > 0)
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}
		} 
		
		public function get_by_id($id)
		{
			$this->db->select('*');
			$this->db->where('estate_id',$id);
			$query = $this->db->get('documents');
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
			'estate_id'		=>$this->input->post('estate_id'),
			'file_name'		=>$data['file_name'],
			'file_path'		=>$data['file_path']
			);
			$insert = $this->db->insert('documents',$data);
		}
			
		public function delete($id)
		{
			$this->db->where('id',$id);
			$this->db->delete('documents');
		}
		
		/*
		 * function about photos
		 */
		
		public function add_pic($data)
		{
			$data = array(
			'estate_id'		=>$this->input->post('estate_id'),
			'file_name'		=>$data['file_name'],
			'file_path'		=>$data['file_path']
			);
			$insert = $this->db->insert('pictures',$data);
		}
		
		public function get_by_pic($id)
		{
			$this->db->select('*');
			$this->db->where('estate_id',$id);
			$query = $this->db->get('pictures');
			if($query->num_rows() >  0 )
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}
		}
		
		public function delete_photo($id)
		{
			
			$this->db->where('id',$id);
			$this->db->delete('pictures');
		}
		
		
	}