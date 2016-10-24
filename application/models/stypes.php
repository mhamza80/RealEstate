<?php

	class Stypes extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
		}
		
		public function get_by_type($id)
		{
			$this->db->select('*');
			$this->db->where('status',0);
			$this->db->where('type_id',$id);
			$query = $this->db->get('sub_types');
			if($query->num_rows() >  0 )
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}
		}
		
		public function sub($id)
		{
			$this->db->select('*');
			$this->db->where('type_id',$id);
			$this->db->where('status',1);
			$query = $this->db->get('sub_types');
			if($query->num_rows() >  0 )
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}
		}
		
		public function get($id,$from,$to)
		{
			$query = $this->db->query(
			"
			SELECT *
			FROM `sub_types`
			WHERE `date`
			BETWEEN '$from'
			AND '$to'
			AND `status`=1
			AND `type_id` = $id
			"
			);
			if($query->num_rows() > 0 )
			{
				return $query->result_array();
			}
			else
			{
				return false;
			}
		}
		
		public function sub2($id)
		{
			$this->db->select('*');
			$this->db->where('type_id',$id);
			$query = $this->db->get('sub_types');
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
			'type_id'	=>$this->input->post('type_id'),
			'name' 		=>$this->input->post('name')
			);
			$insert = $this->db->insert('sub_types',$data);
		}
		
		public function get_by_id($id)
		{
			$this->db->where('id',$id);
			$query = $this->db->get('sub_types');
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
			'name' =>$this->input->post('name')
			);
			$update = $this->db->where('id',$this->input->post('id'));
			$update = $this->db->update('sub_types',$data);
		}
		
		public function status()
		{
			$data = array(
			'status' =>1
			);
			$update = $this->db->where('id',$this->input->post('sub_type'));
			$update = $this->db->update('sub_types',$data);
		}
		
		public function up_status($id)
		{
			$data = array(
			'status' =>0
			);
			$update = $this->db->where('id',$id);
			$update = $this->db->update('sub_types',$data);
		}
		
		
		public function add_date($id)
		{
			$data = array(
			'date' =>date('Y-m-d',now()),
			);
			$update = $this->db->where('id',$id);
			$update = $this->db->update('sub_types',$data);
		}
		
		public function delete_date($id)
		{
			$data = array(
			'date' =>NULL,
			);
			$update = $this->db->where('id',$id);
			$update = $this->db->update('sub_types',$data);
		}
		
		public function delete($id)
		{
			$this->db->where('id',$id);
			$this->db->delete('sub_types');
		}
		
	}