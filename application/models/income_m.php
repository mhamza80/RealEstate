<?php

	class Income_m extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
		}
		
		public function get_all()
		{
			$this->db->select('*');
			$this->db->where('status',1);
			$this->db->order_by('id','DESC');
			$query = $this->db->get('income');
			if($query->num_rows() > 0 )
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}
		}
		
		public function unconfirmed()
		{
			$this->db->select('*');
			$this->db->where('status',0);
			$query = $this->db->get('income');
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
			$query = $this->db->get('income');
			if($query->num_rows() >  0 )
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}
		}
		
		public function get_rental($id)
		{
			$this->db->where('rental_id',$id);
			$query = $this->db->get('income');
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
			'department'		=>$this->input->post('department'),
			'illustration'		=>$this->input->post('Illustration'),
			'amount'			=>$this->input->post('amount'),
			'date'				=>$this->input->post('date'),
			);
			$insert = $this->db->insert('income',$data);
		}
		
		public function add2()
		{
			$data = array(
			'department'		=>$this->input->post('department'),
			'illustration'		=>$this->input->post('Illustration'),
			'cheque_num'		=>$this->input->post('cheque'),
			'date'				=>$this->input->post('date'),
			);
			$insert = $this->db->insert('income',$data);
		}
		
		public function add_from_print($date)
		{
			$data = array(
			'amount'			=>$this->input->post('amount'),
			'department'		=>"قسم الطباعة",
			'illustration'		=>$this->input->post('illustration'),
			'date'				=>$date,
			);
			$insert = $this->db->insert('income',$data);
		}
		
		public function add_from_print2($date)
		{
			$data = array(
			'amount'			=>$this->input->post('amount'),
			'department'		=>"قسم الطباعة",
			'illustration'		=>$this->input->post('illustration'),
			'date'				=>$date,
			'cheque_num'		=>$this->input->post('number'),
			'date'				=>$date,
			);
			$insert = $this->db->insert('income',$data);
		}
		
		public function update()
		{
			$data = array(
			'department'		=>$this->input->post('department'),
			'illustration'		=>$this->input->post('Illustration'),
			'amount'			=>$this->input->post('amount'),
			'date'				=>$this->input->post('date')
			);
			$update = $this->db->where('id',$this->input->post('id'));
			$update = $this->db->update('income',$data);
		}
		
		public function count()
		{
			$this->db->select_sum('amount');
			$this->db->where('status',1);
			$query = $this->db->get('income');
			if($query->num_rows() >  0 )
			{
				return $query->row();
			}
			else
			{
				return FALSE;
			}
		}
		
		public function add_voucher($date,$var,$unit)
		{
			$long	  = $this->input->post('long'); 
			if($long == TRUE)
			{
				$long = $this->input->post('rental_id');
			}
			else
			{
				$long = NULL;
			}
			$data = array(
			'department'		=>"الأقساط",
			'rental_id'			=>$this->input->post('rental_id'),
			'unit_id'			=>$unit,
			'long_contract_id'	=>$long,
			'Illustration'		=>$var,
			'amount'			=>$this->input->post('money'),
			'date'				=>$date
			);
			$insert = $this->db->insert('income',$data);
		}
		
		public function partial_payment($date,$var,$unit,$money)
		{
			$long	  = $this->input->post('long'); 
			if($long == TRUE)
			{
				$long = $this->input->post('rental_id');
			}
			else
			{
				$long = NULL;
			}
			$data = array(
			'department'		=>"الأقساط",
			'rental_id'			=>$this->input->post('rental_id'),
			'unit_id'			=>$unit,
			'Illustration'		=>$var,
			'long_contract_id'	=>$long,
			'amount'			=>$money,
			'date'				=>$date
			);
			$insert = $this->db->insert('income',$data);
		}
		
		
		
		public function delete($id)
		{
			$this->db->where('id',$id);
			$this->db->delete('income');
		}
		
		public function confirm()
		{
			$this->db->where('status',0);
			return $this->db->count_all_results('income');
		}
		
		public function upate_status($id)
		{
			$data = array(
			'status'	=>1
			);
			$update = $this->db->where('id',$id);
			$update = $this->db->update('income',$data);
		}
		
		public function units($id,$from,$to)
		{
			$query = $this->db->query("SELECT SUM(`receipt`) AS amount FROM (`reports`) WHERE `date` BETWEEN '$from'
			AND '$to' and `rental_id` =$id ");
			if($query->num_rows() >  0 )
			{
				return $query->row();
			}
			else
			{
				return FALSE;
			}
		}
		
		public function attachment($file)
		{
			$data = array(
			'file_name'		=>$file['file_name'],
			'file_path'		=>$file['file_path']
			);
			$update = $this->db->where('id',$this->input->post('id'));
			$update = $this->db->update('income',$data);
		}
	} 