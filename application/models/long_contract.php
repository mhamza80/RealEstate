<?php

	class Long_contract extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
		}
		
		public function get_all()
		{
			$this->db->select('*');
			$query = $this->db->get('long_contract');
			if($query->num_rows() > 0)
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}
		}
		
		public function update_estate($id)
		{
			$data = array(
			'status'	=>1
			);
			$this->db->where('id',$id);
			$this->db->update('long_contract',$data);
		}
		
		public function get_all_empty()
		{
			$this->db->select('*');
			$this->db->where('status',0);
			$query = $this->db->get('long_contract');
			if($query->num_rows() > 0)
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}
		}
		
		public function get()
		{
			$this->db->select('*');
			$query = $this->db->get('long_con_detilas');
			if($query->num_rows() > 0)
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}
		}
		
		public function get_details($id)
		{
			$this->db->where('id',$id);
			$query = $this->db->get('long_con_detilas');
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
			$this->db->where('id',$id);
			$query = $this->db->get('long_contract');
			if($query->num_rows() > 0)
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}
		}
			
		public function get_sub_estate($id)
		{
			$this->db->select('*');
			$this->db->where('id',$id);
			$query = $this->db->get('long_con_detilas');
			if($query->num_rows() > 0)
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
			'owner'				=>$this->input->post('owner'),
			'owner_address'		=>$this->input->post('address'),
			'owner_phone'		=>$this->input->post('owner_phone'),
			'owner_identity'	=>$this->input->post('owner_id'),
			't_name'			=>$this->input->post('rental'),
			'identity'			=>$this->input->post('identity'),
			't_address'			=>$this->input->post('address'),
			't_phone'			=>$this->input->post('phone'),
			'nationality'		=>$this->input->post('nationality'),
			'id_plcae'			=>$this->input->post('issue'),
			'id_issue'			=>$this->input->post('id_issue'),
			'contract_type'		=>$this->input->post('contract'),
			'estate_id'			=>$this->input->post('estate_type'),
			'location'			=>$this->input->post('location'),
			'street'			=>$this->input->post('street'),
			'duration'			=>$this->input->post('duration'),
			'condition'			=>$this->input->post('condition'),
			'recipient'			=>$this->input->post('recipient'),
			'purpose'			=>$this->input->post('purpose'),
			'info'				=>$this->input->post('info'),
			'date'				=>date('Y-m-d',now()),
			'delay'				=>$this->input->post('delay')
			);
			$insert = $this->db->insert('long_con_detilas',$data);
		}
		
		public function add_gregorian($start,$end,$rem,$pay)
		{
		
			$data = array(
			'owner'				=>$this->input->post('owner'),
			'owner_address'		=>$this->input->post('address'),
			'owner_phone'		=>$this->input->post('owner_phone'),
			'owner_identity'	=>$this->input->post('owner_id'),
			't_name'			=>$this->input->post('rental'),
			'identity'			=>$this->input->post('identity'),
			't_address'			=>$this->input->post('address'),
			't_phone'			=>$this->input->post('phone'),
			'nationality'		=>$this->input->post('nationality'),
			'id_plcae'			=>$this->input->post('issue'),
			'id_issue'			=>$this->input->post('id_issue'),
			'contract_type'		=>$this->input->post('contract'),
			'estate_id'			=>$this->input->post('estate_type'),
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
			'recipient'			=>$this->input->post('recipient'),
			'free_period'		=>$this->input->post('free'),
			'years'				=>$this->input->post('years'),
			'purpose'			=>$this->input->post('purpose'),
			'info'				=>$this->input->post('info'),
			'date'				=>date('Y-m-d',now())
			);
			$insert = $this->db->insert('long_con_detilas',$data);
		}
		
		public function insert()
		{
			$data = array(
			'name'	=>$this->input->post('name')
			);
			$insert = $this->db->insert('long_contract',$data);
		}
		
	}