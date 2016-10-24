<?php

	class Long_calc extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
		}
		
		
		public function months($start,$end)
		{
			$data = array(
			'rental_id'		=>$this->input->post('id'),
			'date_start'	=>$start,
			'date_end'		=>$end		
			);
			$this->db->insert('long_con_period',$data);
		}
		
		public function get_months($id)
		{
			$this->db->where('rental_id',$id);
			$query = $this->db->get('long_con_period');
			if($query->num_rows() >  0 )
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}
		}
		
		public function amount($id)
		{
			$this->db->select('SUM(amount) as money ');
			$this->db->where('rental_id',$id);
			$query = $this->db->get('long_installment');
			if($query->num_rows() > 0)
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}
		}
		
		public function installment($amount,$date,$type)
		{
			$data = array(
			'rental_id'	=>$this->input->post('id'),
			'amount' =>$amount,
			'date'	=>$date,
			'date_type'=>$type
			);
			$insert = $this->db->insert('long_installment',$data);
		}
		
		public function get_installment($id)
		{
			$this->db->where('rental_id',$id);
			$query = $this->db->get('long_installment');
			if($query->num_rows() >  0 )
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
			$query = $this->db->get('long_installment');
			if($query->num_rows() > 0)
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
			$update = $this->db->update('long_installment',$data);
		}
		
		
		public function get($id)
		{
			$this->db->where('id',$id);
			$query = $this->db->get('long_installment');
			if($query->num_rows() >  0 )
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}
		}
		
		public function get_paid($id)
		{
			$this->db->select_sum('amount');
			$this->db->where('status',1);
			$this->db->where('rental_id',$id);
			$query = $this->db->get('long_installment');
			if($query->num_rows() >  0 )
			{
				return $query->row();
			}
			else
			{
				return FALSE;
			}
		}
		
		public function get_type($id)
		{
			$this->db->where('rental_id',$id);
			$query = $this->db->get('long_installment');
			if($query->num_rows() >  0 )
			{
				return $query->result_array();
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
			$query = $this->db->get('long_installment');
			if($query->num_rows() >  0 )
			{
				return $query->row();
			}
			else
			{
				return FALSE;
			}
		}
		
		public function partial($id)
		{
			$this->db->where('rental_id',$id);
			$query = $this->db->get('long_partial_payment');
			if($query->num_rows() >  0 )
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}
		}
		
		
		public function get_partial($id)
		{
			$this->db->where('id',$id);
			$query = $this->db->get('long_partial_payment');
			if($query->num_rows() >  0 )
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}
		}
		public function delete_installment($id)
		{
			$this->db->where('id',$id);
			$this->db->delete('long_installment');
		}
		
		public function partial_payment($date,$recived)
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
			$insert = $this->db->insert('long_partial_payment',$data);
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
			$update = $this->db->update('long_installment',$data);
		}
		
		public function delete_partial($id)
		{
			$this->db->where('id',$id);
			$this->db->delete('long_partial_payment');
		}
		
		public function delete($id)
		{
			$this->db->where('id',$id);
			$this->db->delete('long_contract');
		}
	}
			