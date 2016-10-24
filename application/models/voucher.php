<?php

	class Voucher extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
		}
		
		public function insert($input)
		{
			$data = array(
			'amount'		=>$input['amount'],
			'pay_name'		=>$input['name'],
			'pay_date'		=>now(),
			'receiver'		=>$input['receiver'],
			'reason'		=>$input['illustration'],			
			);
		  $insert = $this->db->insert('voucher',$data);
		   $insert_id = $this->db->insert_id();
		   $this->db->trans_complete();
		   return  $insert_id;
		}
		
		public function insert2($input)
		{
			$data = array(
			'amount'		=>$input['amount'],
			'pay_name'		=>$input['name'],
			'pay_date'		=>now(),
			'receiver'		=>$input['receiver'],
			'reason'		=>$input['illustration'],
			'cheqe_number'	=>$input['number'],
			'cheqe_date'	=>$input['cheqe_date'],
			'bank_name'		=>$input['bank'],
			'bank_branch'	=>$input['branch']
			);
		  $insert = $this->db->insert('voucher',$data);
		   $insert_id = $this->db->insert_id();
		   $this->db->trans_complete();
		   return  $insert_id;
		}
		
		public function get($id)
		{
			$this->db->where('id',$id);
			$query = $this->db->get('voucher');
			if($query->num_rows()>0)
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
			$update = $this->db->update('voucher',$data);
		}
		
		public function get_all()
		{
			$this->db->where('privilege',1);
			$query = $this->db->get('voucher');
			if($query->num_rows()>0)
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
			return $this->db->count_all_results('voucher');
		}
		
	}