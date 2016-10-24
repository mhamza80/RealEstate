<?php

	class Contract_m extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
		}
		
		function get_all()
		{
			$this->db->select('*');
			$this->db->where('archived',0);
			$this->db->order_by('id','DESC');
			$query = $this->db->get('contract');
			if($query->num_rows() > 0 )
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}
		}
		
		function get_archived()
		{
			$this->db->select('*');
			$this->db->where('archived',1);
			$this->db->order_by('id','DESC');
			$query = $this->db->get('contract');
			if($query->num_rows() > 0 )
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}
		}
		
		 
		function add($start,$end,$rem,$pay,$renatl)
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
			'purpose'			=>$this->input->post('purpose'),
			'rental'			=>$renatl,
			'info'				=>$this->input->post('info'),
			'delay'				=>$this->input->post('delay'),
			'action_date'		=>now()
			);
			$insert = $this->db->insert('contract',$data);
		}
		
		public function update($id)
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
			'location'			=>$this->input->post('location'),
			'street'			=>$this->input->post('street'),
			'purpose'			=>$this->input->post('purpose'),
			'duration'			=>$this->input->post('duration'),
			'delay'				=>$this->input->post('delay'),
			'action_date'		=>now()
			);
			$update = $this->db->where('rental',$id);
			$update = $this->db->update('contract',$data);
		}
		
		
		public function update_account($start,$end,$rem,$pay,$id)
		{
			$data = array(
			'start_contarct'	=>$start,
			'end_contarct'		=>$end,			
			'rent_price'		=>$this->input->post('rent'),
			'annual_rent'		=>$this->input->post('rent_year'),
			'pay_submitted'		=>$pay,
			'remaining'			=>$rem,
			'water'				=>$this->input->post('water'),
			'condition'			=>$this->input->post('condition'),
			'info'				=>$this->input->post('info'),
			'action_date'		=>now()
			);
			$update = $this->db->where('rental',$id);
			$update = $this->db->update('contract',$data);
		}
		
		public function archive($id)
		{
			$data = array(
			'archived'				=>1,			
			);
			$update = $this->db->where('rental',$id);
			$update = $this->db->update('contract',$data);
		}
		
		function get_by_id($id)
		{
			$this->db->where('id',$id);
			$query = $this->db->get('contract');
			if($query->num_rows() > 0 )
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
			$this->db->delete('contract');
		}
		
		public function delete_by_rental($id)
		{
			$this->db->where('rental',$id);
			$this->db->delete('contract');
		}
		
		
	}