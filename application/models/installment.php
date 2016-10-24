<?php

	class Installment extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
		}
		
		
		public function get_all()
		{
			$this->db->select('*');
			$query = $this->db->get('installment');
			if($query->num_rows() > 0)
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}
		}
		
		public function check()
		{
			$this->db->select('*');
			$this->db->where('status',0);
			$this->db->where('archived',0);
			$query = $this->db->get('installment');
			if($query->num_rows() > 0)
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}
		}
		
		
		public function add($id,$amount,$date)
		{
			$data = array(
			'rental_id'	=>$id,
			'amount' =>$amount,
			'date'	=>$date
			);
			$insert = $this->db->insert('installment',$data);
		}
		
		public function create_add($id,$start,$amount)
		{			
			$data = array(
			'rental_id'	=>$id,
			'amount' =>$amount,
			'date'	=>$start
			);
			$insert = $this->db->insert('installment',$data);
		  	$insert_id = $this->db->insert_id();
		    $this->db->trans_complete();
		    return  $insert_id;
		}
		
		public function create_gregorian($id,$start,$amount)
		{			
			$data = array(
			'rental_id'		=>$id,
			'amount' 		=>$amount,
			'date'			=>$start,
			);
			$insert = $this->db->insert('installment',$data);
		  	$insert_id = $this->db->insert_id();
		    $this->db->trans_complete();
		    return  $insert_id;
		}
		
		public function update($i,$id,$amount,$date)
		{
			$data = array(
			'rental_id'	=>$id,
			'amount' =>$amount,
			'date'	=>$date
			);
			$update = $this->db->where('id',$i);
			$update = $this->db->update('installment',$data);
		}
		
		public function archive($id)
		{
			$data = array(
			'archived'	=>1,	
			);
			$update = $this->db->where('rental_id',$id);
			$update = $this->db->update('installment',$data);
		}
		
		public function get_by_id($id)
		{
			$this->db->where('rental_id',$id);
			$query = $this->db->get('installment');
			if($query->num_rows() >  0 )
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}
		}
		
		public function delete($id)
		{
			$this->db->where('rental_id',$id);
			$this->db->delete('installment');
		}
		
		public function delete_installment($id)
		{
			$this->db->where('id',$id);
			$this->db->delete('installment');
		}
		
		public function get($id)
		{
			$this->db->where('id',$id);
			$query = $this->db->get('installment');
			if($query->num_rows() >  0 )
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}
		}
		
		
		public function paid($date)
		{
			$data = array(
			'status'			=>1,
			'pay_name'			=>$this->input->post('name'),
			'pay_date'			=>$date,
			'receiver'			=>$this->input->post('receiver'),
			'reason'			=>$this->input->post('reason'),
			'cheqe_number'		=>$this->input->post('number'),
			'cheqe_date'		=>$this->input->post('cheqe_date'),
			'bank_name'			=>$this->input->post('bank'),
			'bank_branch'		=>$this->input->post('branch'),
			);
			$update = $this->db->where('id',$this->input->post('id'));
			$update = $this->db->update('installment',$data);
		}
		
		public function recived($date,$recived)
		{
			$data = array(
			'status'			=>0,
			'pay_name'			=>$this->input->post('name'),
			'pay_date'			=>$date,
			'amount'			=>$recived,
			'receiver'			=>$this->input->post('receiver'),
			'reason'			=>$this->input->post('reason'),
			'cheqe_number'		=>$this->input->post('number'),
			'cheqe_date'		=>$this->input->post('cheqe_date'),
			'bank_name'			=>$this->input->post('bank'),
			'bank_branch'		=>$this->input->post('branch'),
			);
			$update = $this->db->where('id',$this->input->post('id'));
			$update = $this->db->update('installment',$data);
		}
		
		public function get_paid($id)
		{
			$this->db->select_sum('amount');
			$this->db->where('status',1);
			$this->db->where('rental_id',$id);
			$query = $this->db->get('installment');
			if($query->num_rows() >  0 )
			{
				return $query->row();
			}
			else
			{
				return FALSE;
			}
		}
		
		public function remaining($id)
		{
			$this->db->select_sum('amount');
			$this->db->where('status',0);
			$this->db->where('rental_id',$id);
			$query = $this->db->get('installment');
			if($query->num_rows() >  0 )
			{
				return $query->row();
			}
			else
			{
				return FALSE;
			}
		}
		
		public function privilege($id)
		{
			
			$data  = array(
			'privilege'	=>1,
			'user_id'	=>$this->session->userdata('userId')
			);
			$update = $this->db->where('id',$id);
			$update = $this->db->update('installment',$data);
		}
		
		public function get_privilege()
		{
			$this->db->where('privilege',1);
			$query = $this->db->get('installment');
			if($query->num_rows() >  0 )
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}
		}
		
		public function count()
		{
			$this->db->where('privilege',1);
			return $this->db->count_all_results('installment');
		}

	}