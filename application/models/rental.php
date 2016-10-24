<?php

	class Rental extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
		}
		
		public function get_all()
		{
			$this->db->select('*');
			$this->db->where('archived',0);
			$this->db->order_by('id','desc');
			$query = $this->db->get('rentals');
			if($query->num_rows() > 0)
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}
		}
		
		public function add($start,$end,$rem,$pay,$estate_type)
		{
		
			$data = array(
			'owner'				=>$this->input->post('owner'),
			't_name'			=>$this->input->post('rental'),
			'identity'			=>$this->input->post('identity'),
			't_address'			=>$this->input->post('address'),
			't_phone'			=>$this->input->post('phone'),
			'nationality'		=>$this->input->post('nationality'),
			'id_plcae'			=>$this->input->post('issue'),
			'id_issue'			=>$this->input->post('id_issue'),
			'contract_type'		=>$this->input->post('contract'),
			'estate_id'			=>$this->input->post('estate_type'),
			'estate_type'		=>$estate_type,
			'location'			=>$this->input->post('location'),
			'street'			=>$this->input->post('street'),
			'duration'			=>$this->input->post('duration'),
			'start_contarct'	=>$start,
			'end_contarct'		=>$end,
			'rent_price'		=>$this->input->post('rent'),
			'annual_rent'		=>$this->input->post('rent_year'),
			'pay_submitted'		=>$pay,
			'remaining'			=>$rem,
			'condition'			=>$this->input->post('condition'),
			'water'				=>$this->input->post('water'),
			'recipient'			=>$this->input->post('recipient'),
			'south'				=>$this->input->post('south'),
			'north'				=>$this->input->post('north'),
			'purpose'			=>$this->input->post('purpose'),
			'info'				=>$this->input->post('info'),
			'date'				=>date('Y-m-d',now()),
			'delay'				=>$this->input->post('delay')
			);
			$insert = $this->db->insert('rentals',$data);
		}
		
		public function add_gregorian($start,$end,$rem,$pay,$estate_type)
		{
		
			$data = array(
			'owner'				=>$this->input->post('owner'),
			't_name'			=>$this->input->post('rental'),
			'identity'			=>$this->input->post('identity'),
			't_address'			=>$this->input->post('address'),
			't_phone'			=>$this->input->post('phone'),
			'nationality'		=>$this->input->post('nationality'),
			'id_plcae'			=>$this->input->post('issue'),
			'id_issue'			=>$this->input->post('id_issue'),
			'contract_type'		=>$this->input->post('contract'),
			'estate_id'			=>$this->input->post('estate_type'),
			'estate_type'		=>$estate_type,
			'location'			=>$this->input->post('location'),
			'street'			=>$this->input->post('street'),
			'duration'			=>$this->input->post('duration'),
			'start_contract_ger'=>$start,
			'end_contract_ger'	=>$end,
			'start_contarct'	=>"",
			'end_contarct'		=>"",	
			'rent_price'		=>$this->input->post('rent'),
			'annual_rent'		=>$this->input->post('rent_year'),
			'pay_submitted'		=>$pay,
			'remaining'			=>$rem,
			'condition'			=>$this->input->post('condition'),
			'water'				=>$this->input->post('water'),
			'recipient'			=>$this->input->post('recipient'),
			'south'				=>$this->input->post('south'),
			'north'				=>$this->input->post('north'),
			'purpose'			=>$this->input->post('purpose'),
			'info'				=>$this->input->post('info'),
			'date'				=>date('Y-m-d',now())
			);
			$insert = $this->db->insert('rentals',$data);
		}
		
		
		
		public function update($type)
		{
			$data = array(
			'owner'				=>$this->input->post('owner'),
			't_name'			=>$this->input->post('rental'),
			'identity'			=>$this->input->post('identity'),
			't_address'			=>$this->input->post('address'),
			't_phone'			=>$this->input->post('phone'),
			'nationality'		=>$this->input->post('nationality'),
			'id_plcae'			=>$this->input->post('issue'),
			'id_issue'			=>$this->input->post('id_issue'),
			'contract_type'		=>$this->input->post('contract'),
			'estate_id'			=>$this->input->post('estate_type'),
			'estate_type'		=>$type,
			'location'			=>$this->input->post('location'),
			'street'			=>$this->input->post('street'),
			'purpose'			=>$this->input->post('purpose'),
			'duration'			=>$this->input->post('duration'),
			'delay'				=>$this->input->post('delay'),
			'date'				=>date('Y-m-d',now())	
			);
			$update = $this->db->where('id',$this->input->post('id'));
			$update = $this->db->update('rentals',$data);
		}
		
		public function update_account($start,$end,$rem,$pay)
		{
			$data = array(
			'start_contarct'	=>$start,
			'end_contarct'		=>$end,		
			'rent_price'		=>$this->input->post('rent'),
			'annual_rent'		=>$this->input->post('rent_year'),
			'pay_submitted'		=>$pay,
			'remaining'			=>@$rem,
			'water'				=>$this->input->post('water'),
			'condition'			=>$this->input->post('condition'),
			'south'				=>$this->input->post('south'),
			'north'				=>$this->input->post('north'),			
			'info'				=>$this->input->post('info'),
			'date'				=>date('Y-m-d',now())
			);
			$update = $this->db->where('id',$this->input->post('id'));
			$update = $this->db->update('rentals',$data);
		}
		
		
		public function update_account_ger($start,$end,$rem,$pay)
		{
			$data = array(
			'start_contract_ger'=>$start,
			'end_contract_ger'	=>$end,
			'rent_price'		=>$this->input->post('rent'),
			'annual_rent'		=>$this->input->post('rent_year'),
			'pay_submitted'		=>$pay,
			'remaining'			=>@$rem,
			'water'				=>$this->input->post('water'),
			'condition'			=>$this->input->post('condition'),
			'south'				=>$this->input->post('south'),
			'north'				=>$this->input->post('north'),			
			'info'				=>$this->input->post('info'),
			'date'				=>date('Y-m-d',now())
			);
			$update = $this->db->where('id',$this->input->post('id'));
			$update = $this->db->update('rentals',$data);
		}
		
		public function update_not_pay($start,$end,$rem)
		{
			$data = array(
			'start_contarct'	=>$start,
			'end_contarct'		=>$end,		
			'rent_price'		=>$this->input->post('rent'),
			'annual_rent'		=>$this->input->post('rent_year'),
			'remaining'			=>@$rem,
			'pay_submitted'		=>0,
			'water'				=>$this->input->post('water'),
			'condition'			=>$this->input->post('condition'),
			'south'				=>$this->input->post('south'),
			'north'				=>$this->input->post('north'),			
			'info'				=>$this->input->post('info'),
			'date'				=>date('Y-m-d',now())
			);
			$update = $this->db->where('id',$this->input->post('id'));
			$update = $this->db->update('rentals',$data);
		}
		
		
		public function update_with_gregorian($start,$end,$rem)
		{
			$data = array(
			'start_contract_ger'=>$start,
			'end_contract_ger'	=>$end,
			'rent_price'		=>$this->input->post('rent'),
			'annual_rent'		=>$this->input->post('rent_year'),
			'remaining'			=>@$rem,
			'pay_submitted'		=>0,
			'start_contarct'	=>"",
			'end_contarct'		=>"",
			'water'				=>$this->input->post('water'),
			'condition'			=>$this->input->post('condition'),
			'south'				=>$this->input->post('south'),
			'north'				=>$this->input->post('north'),			
			'info'				=>$this->input->post('info'),
			'date'				=>date('Y-m-d',now())
			);
			$update = $this->db->where('id',$this->input->post('id'));
			$update = $this->db->update('rentals',$data);
		}
		
		public function get_by_id($id)
		{
			$this->db->where('id',$id);
			$query = $this->db->get('rentals');
			if($query->num_rows() > 0)
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
			$this->db->where('id',$id);
			$this->db->delete('rentals');
		}
		
		public function get_by_estate($id)
		{
			$this->db->where('estate_id',$id);
			$this->db->where('archived',0);
			$query = $this->db->get('rentals');
			if($query->num_rows() > 0)
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}
		}
		
		public function get_by_estate_type($id)
		{
			$this->db->where('estate_type',$id);
			$this->db->where('archived',0);
			$this->db->order_by('id','desc');
			$query = $this->db->get('rentals');
			if($query->num_rows() > 0)
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}
		}
		
		public function get_estate($id,$from,$to)
		{
			$query = $this->db->query(
			"
			SELECT *
			FROM `rentals`
			WHERE `date`
			BETWEEN '$from'
			AND '$to'
			AND `estate_id` = $id			
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
		
		public function document($data)
		{
			$data = array(
			'rental_id'		=>$this->input->post('rental_id'),
			'file_name'		=>$data['file_name'],
			'file_path'		=>$data['file_path']
			);
			$insert = $this->db->insert('rent_doucments',$data);
		}
		
		public function get_document($id)
		{
			$this->db->where('rental_id',$id);
			$query = $this->db->get('rent_doucments');
			if($query->num_rows() > 0)
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}
		}
		
		public function remaining($rental_id)
		{
			$this->db->select_sum('amount');
   			$this->db->where('rental_id', $rental_id);
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
		
		public function count()
		{
			return $this->db->count_all('rentals');
		}
	}