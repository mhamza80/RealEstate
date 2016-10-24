<?php

	class estate extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
		}
		
		public function get_all()
		{
			$this->db->select('*');
			$this->db->order_by('id','desc');
			$query = $this->db->get('estates');
			if($query->num_rows() >  0 )
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
			$this->db->where('status',0);
			$query = $this->db->get('estates');
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
			'owner'			=>$this->input->post('owner'),
			'address'		=>$this->input->post('address'),
			'phone'			=>$this->input->post('phone'),
			'mobile'		=>$this->input->post('mobile'),
			'estate_name'	=>$this->input->post('name'),
			'city_id'		=>$this->input->post('city'),
			'district'		=>$this->input->post('district'),
			'schema'		=>$this->input->post('schema'),
			'estate_status'	=>$this->input->post('status'),
			'estate_age'	=>$this->input->post('age'),
			'estate_type'	=>$this->input->post('type'),
			'sub_type_id'	=>$this->input->post('sub_type'),
			'price_limit'	=>$this->input->post('limit'),
			'price_somme'	=>$this->input->post('somme'),
			'price_meter'	=>$this->input->post('meter'),
			'instrument_num'=>$this->input->post('saak'),
			'board_num'		=>$this->input->post('border'),
			'part_numer'	=>$this->input->post('part'),
			'part_price'	=>$this->input->post('cash'),
			'block_number'	=>$this->input->post('block'),
			'area'			=>$this->input->post('area'),
			'border_south'	=>$this->input->post('south'),
			'border_north'	=>$this->input->post('north'),
			'border_east'	=>$this->input->post('east'),
			'border_west'	=>$this->input->post('west'),
			'info'			=>$this->input->post('info'),			
			);
			$insert = $this->db->insert('estates',$data);
		}
		
		public function update()
		{
			$data = array(
			'owner'			=>$this->input->post('owner'),
			'address'		=>$this->input->post('address'),
			'phone'			=>$this->input->post('phone'),
			'mobile'		=>$this->input->post('mobile'),
			'estate_name'	=>$this->input->post('name'),
			'city_id'		=>$this->input->post('city'),
			'district'		=>$this->input->post('district'),
			'schema'		=>$this->input->post('schema'),
			'estate_status'	=>$this->input->post('status'),
			'estate_age'	=>$this->input->post('age'),
			'estate_type'	=>$this->input->post('estate'),
			'sub_type_id'	=>$this->input->post('type'),
			'price_limit'	=>$this->input->post('limit'),
			'price_somme'	=>$this->input->post('somme'),
			'price_meter'	=>$this->input->post('meter'),
			'instrument_num'=>$this->input->post('saak'),
			'board_num'		=>$this->input->post('border'),
			'part_numer'	=>$this->input->post('part'),
			'part_price'	=>$this->input->post('cash'),
			'block_number'	=>$this->input->post('block'),
			'area'			=>$this->input->post('area'),
			'border_south'	=>$this->input->post('south'),
			'border_north'	=>$this->input->post('north'),
			'border_east'	=>$this->input->post('east'),
			'border_west'	=>$this->input->post('west'),
			'info'			=>$this->input->post('info'),			
			);
			$update = $this->db->where('id',$this->input->post('estate_id'));
			$update = $this->db->update('estates',$data);
		}
		
		public function get_by_id($id)
		{
			$this->db->where('id',$id);
			$query = $this->db->get('estates');
			if($query->num_rows() >  0 )
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}
		}
		
		
		public function get_by_sub($id)
		{
			$this->db->where('sub_type_id',$id);
			$query = $this->db->get('estates');
			if($query->num_rows() >  0 )
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}
		}
		
		public function get_estate($id)
		{
			$this->db->where('estate_type',$id);
			$query = $this->db->get('estates');
			if($query->num_rows() >  0 )
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}
		}
		
		public function get_by_rent($id)
		{
			$this->db->where('stype_id',$id);
			$query = $this->db->get('rentals');
			if($query->num_rows() >  0 )
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}
		}
		
		public function get_unit($id)
		{
			$this->db->where('sub_type_id',$id);
			$query = $this->db->get('estates');
			if($query->num_rows() >  0 )
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}
		}
		
		
		
		public function update_status()
		{
			$data = array(
			'status'=>1,
			'date'=>date('Y-m-d',now()),
			);
			$update = $this->db->where('id',$this->input->post('estate_type'));
			$update = $this->db->update('estates',$data);
			
		}
		
		public function update_status2($id)
		{
			$data = array(
			'status'=>0,
			'date'=>NULL,
			);
			$update = $this->db->where('id',$id);
			$update = $this->db->update('estates',$data);
			
		}
		
		public function delete($id)
		{
			$this->db->where('id',$id);
			$this->db->delete('estates');
		}
		
		public function count()
		{
			return $this->db->count_all('estates');
		}
		
		public function get_subtype($id,$from,$to)
		{
			$query = $this->db->query(
			"
				SELECT *
				FROM `estates`
				WHERE `date`
				BETWEEN '$from'
				AND '$to'
				AND `estate_type` = $id
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
		
		public function get_type($id)
		{
			$this->db->where('id',$id);
			$query = $this->db->get('types');
			if($query->num_rows() >  0 )
			{
				return $query->result_array();
			}
			else
			{
				return FALSE;
			}
		}
	}