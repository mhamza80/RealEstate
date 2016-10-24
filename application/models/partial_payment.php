<?php

	class Partial_payment extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
		}
		
		public function add($date,$recived)
		{
			$data = array(
			'rental_id'			=>$this->input->post('rental_id'),
			'intstallment_id'	=>$this->input->post('id'),
			'amount'			=>$this->input->post('money'),
			'partial_pay'		=>$recived,
			'pay_name'			=>$this->input->post('name'),
			'pay_date'			=>$date,
			'amount'			=>$this->input->post('money'),
			'receiver'			=>$this->input->post('receiver'),
			'reason'			=>$this->input->post('reason'),
			'cheqe_number'		=>$this->input->post('number'),
			'cheqe_date'		=>$this->input->post('cheqe_date'),
			'bank_name'			=>$this->input->post('bank'),
			'bank_branch'		=>$this->input->post('branch'),
			);
			$insert = $this->db->insert('partial_payment',$data);
		}
		
		public function get_by_id($id)
		{
			$this->db->where('rental_id',$id);
			$query = $this->db->get('partial_payment');
			if($query->num_rows() >  0 )
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
			$this->db->where('privilege',1);
			$query = $this->db->get('partial_payment');
			if($query->num_rows() >  0 )
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}
		}
		
		public function get($id)
		{
			$this->db->where('id',$id);
			$query = $this->db->get('partial_payment');
			if($query->num_rows() >  0 )
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}
		}
		
		public function update($id)
		{
			$data  = array(
			'privilege'	=>1,
			'user_id'	=>$this->session->userdata('userId')
			);
			$update = $this->db->where('id',$id);
			$update = $this->db->update('partial_payment',$data);
		}
		
		public function count()
		{
			$this->db->where('privilege',1);
			return $this->db->count_all_results('partial_payment');
		}
		
		public function delete($id)
		{
			$this->db->where('id',$id);
			$this->db->delete('partial_payment');
		}
	}