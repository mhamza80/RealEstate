<?php

	class Archive extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			session_start();
			if($this->session->userdata('userId') < 1 )
			{
				redirect(base_url());	
			}
		}
		
		public function index()
		{
			$data['title'] = "الأرشيف";
			$data['rows']  = $this->archive_m->get_all();
			$this->load->view('archive/index',$data);
		}
		
		public function add($id)
		{
			$estate = $this->rental->get_by_id($id);
			$date = now();
			$this->estate->update_status2($estate[0]['estate_id']);
			$this->archive_m->update($date,$id);
			$this->contract_m->archive($id);
			$this->installment->archive($id);
			$this->session->set_flashdata('sucess','تم بنجاح'); 
			redirect('admin/archive/index','refresh');
		}
	}