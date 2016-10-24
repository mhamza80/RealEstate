<?php

	class Report_m extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
		}
		
	 	public function income($from,$to)
		{
			$query = $this->db->query(
			"
			SELECT *
			FROM `income`
			WHERE `date`
			BETWEEN '$from'
			AND '$to'
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
		
		public function outgoing($from,$to)
		{
			$query = $this->db->query(
			"
			SELECT *
			FROM `outgoings`
			WHERE `date`
			BETWEEN '$from'
			AND '$to'
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
		
		public function count($from,$to)
		{
			$query = $this->db->query("SELECT SUM(`amount`) AS amount FROM (`income`) WHERE `date` BETWEEN '$from'
			AND '$to'");
			if($query->num_rows() >  0 )
			{
				return $query->row();
			}
			else
			{
				return FALSE;
			}
		}
			
		public function count_outgoing($from,$to)
		{
			$query = $this->db->query("SELECT SUM(`amount`) AS amount FROM (`outgoings`) WHERE `date` BETWEEN '$from'
			AND '$to'");
			if($query->num_rows() >  0 )
			{
				return $query->row();
			}
			else
			{
				return FALSE;
			}
		}
		
		public function add($id,$input,$type)
		{
			$data = array(
			'rental_id'		=>$id,
			'receipt'		=>$input,
			'estate_type'	=>$type,
			'date'			=>date('Y-m-d',now()),
			);
			$insert = $this->db->insert('reports',$data);
		}
		
		
		public function in_report($from,$to,$type_id)
		{
			$query = $this->db->query(
			"
			SELECT * 
			FROM `reports`
			WHERE `date`
			BETWEEN '$from'
			AND '$to'
			AND `estate_type` = $type_id
			GROUP BY rental_id
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
		
	}