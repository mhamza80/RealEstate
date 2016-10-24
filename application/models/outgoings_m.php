<?php

	class Outgoings_m extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
		}
		
		public function get_all()
		{
			$this->db->select('*');
			$query = $this->db->get('outgoings');
			if($query->num_rows() > 0 )
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
			$this->db->where('id',$id);
			$query = $this->db->get('outgoings');
			if($query->num_rows() >  0 )
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}
		}
		
		
		public function add($date)
		{
			$data = array(
			'illustration'		=>$this->input->post('Illustration'),
			'amount'			=>$this->input->post('amount'),
			'date'				=>$date
			);
			$insert = $this->db->insert('outgoings',$data);
		}
		
		public function add_from_print($date)
		{
			$data = array(
			'illustration'		=>$this->input->post('illustration'),
			'amount'			=>$this->input->post('amount'),
			'date'				=>$date,
			'from'				=>$this->input->post('name'),
			'receiver'			=>$this->input->post('receiver'),		
			);
			  $insert = $this->db->insert('outgoings',$data);
		 	  $insert_id = $this->db->insert_id();
		  	  $this->db->trans_complete();
		      return  $insert_id;
		}
		
		public function add_from_print2($date)
		{
			$data = array(
			'illustration'		=>$this->input->post('illustration'),
			'amount'			=>$this->input->post('amount'),
			'date'				=>$date,
			'from'				=>$this->input->post('name'),
			'receiver'			=>$this->input->post('receiver'),
			'cheqe_number'		=>$this->input->post('number'),
			'cheqe_date'		=>$this->input->post('cheqe_date'),
			'bank_name'			=>$this->input->post('bank'),
			'bank_branch'		=>$this->input->post('branch')
			);
			  $insert = $this->db->insert('outgoings',$data);
		 	  $insert_id = $this->db->insert_id();
		  	  $this->db->trans_complete();
		      return  $insert_id;
		}
		
		
		public function update()
		{
			$data = array(
			'illustration'		=>$this->input->post('Illustration'),
			'amount'			=>$this->input->post('amount'),
			'date'				=>$this->input->post('date')
			);
			$update = $this->db->where('id',$this->input->post('id'));
			$update = $this->db->update('outgoings',$data);
		}
		
		public function count()
		{
			$this->db->select_sum('amount');
			$query = $this->db->get('outgoings');
			if($query->num_rows() >  0 )
			{
				return $query->row();
			}
			else
			{
				return FALSE;
			}
		}
		
		
		public function delete($id)
		{
			$this->db->where('id',$id);
			$this->db->delete('outgoings');
		}
	} 