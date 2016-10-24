<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

	class Types extends CI_Controller
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
			$data['title'] = "أنواع العقارات";
			$data['rows']  = $this->type->get_all();
			$this->load->view('types/index',$data);
		}
		
		public function add()
		{
			$this->type->add();
		}
		
		public function edit($id = 0)
		{
			$this->lang->load('form_validation','arabic');
			$this->form_validation->set_rules('name','نوع العقار','trim|required|xss_clean');
			if($this->form_validation->run())
			{
				$this->type->update();
				$this->session->set_flashdata('sucess','تم التحديث بنجاح');
				redirect('admin/types/index');
				
			}
			if($data['get'] = $this->type->get_by_id($id))
			{
				$data['title'] = "تحرير نوع العقار";
				$this->load->view('types/edit',$data);
			}
			else 
			{
				$this->error();
			}
		}
		
		public function get_type()
		{
			 $id =  $_GET['type'];
			 $data['rows'] = $this->stypes->get_by_type($id);
			 $data['type'] = $this->type->get_by_id($id);
			 $this->load->view('types/types',$data);
		}
		
		public function delete($id)
		{
			$this->type->delete($id);
			$this->session->set_flashdata('sucess','تم الحذف بنجاح');
			redirect('admin/types/index');
			
		}
		
		public function report($id)
		{
			$data['estate'] = $this->type->get_by_id($id);
			$data['title']  = "تقرير الدخل للعقار" ." " .$data['estate'][0]['type'];
			$data['units']  = $this->stypes->get_by_type($id);
			$this->load->view('types/report',$data);
		}
	}