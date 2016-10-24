<?php

	class Users extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
		}
		
		public function log_in()
		{
			$this->db->where('user_name',$this->input->post('name'));
			$this->db->where('pass',$this->input->post('pass'));
			$query = $this->db->get('users');
			if($query->num_rows() > 0 )
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}
		}
		
		public function get_all()
		{
			$this->db->select('*');
			$query = $this->db->get('users');
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
			'first_name'	=>$this->input->post('name'),
			'last_name'		=>$this->input->post('last'),
			'user_name'		=>$this->input->post('log'),
			'email'			=>$this->input->post('email'),
			'pass'			=>$this->input->post('pass'),
			'mobile'		=>$this->input->post('mobile'),
			'privilege'		=>$this->input->post('rules')
			);
			$insert = $this->db->insert('users',$data);
		}

		public function update()
		{
			$data = array(
			'first_name'			=>$this->input->post('name'),
			'last_name'				=>$this->input->post('last'),
			'user_name'				=>$this->input->post('log'),
			'email'					=>$this->input->post('email'),
			'pass'					=>$this->input->post('pass'),
			'mobile'				=>$this->input->post('mobile'),
			'privilege'				=>$this->input->post('rules')
			);
			$update = $this->db->where('id',$this->input->post('id'));
			$update = $this->db->update('users',$data);
		}

		public function delete($id)
		{
			$this->db->where('id',$id);
			$this->db->delete('users');
		}

		public function get_by_id($id)
		{
			$this->db->select('*');
			$this->db->where('id',$id);
			$query = $this->db->get('users');
			if($query->num_rows() > 0 )
			{
				return $query->result_array();
			}
			else
			{
				 return false;
			}
		}
		
		 public function email_name($name)
		{
		  $this->db->where('user_name', $name);
		  $query = $this->db->get('users');
		  if( $query->num_rows() > 0 ){ return TRUE; } else { return FALSE; }
		}
	}