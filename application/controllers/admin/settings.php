<?php 
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

	class Settings extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			if($this->session->userdata('userId') < 1 )
			{
				redirect(base_url());	
			}
		}
		
		public function days()
		{
			$data['title']    = "ضبط فحص الإيجارات";
			$data['rows'] = $this->setting_m->get_all();
			$this->load->view('settings/days',$data);  
		}
		
		
		
		public function long_contracts()
		{
			$data['title']    = "ضبط فحص العقود الطويلة";
			$data['rows'] = $this->setting_m->get_long_contract();
			$this->load->view('settings/contracts',$data);  
		}
		
		public function installment()
		{
			$data['title']    = "ضبط فحص الأقساط";
			$data['rows'] = $this->setting_m->get_installment();
			$this->load->view('settings/installment',$data);  
		} 
		
		
		public function add()
		{
			$this->setting_m->add();
			$this->session->set_flashdata('sucess','تم بنجاح');
		}
		
		
		
		
		public function add_contracts()
		{
			$this->setting_m->add_contracts();
			$this->session->set_flashdata('sucess','تم بنجاح');
		}
		public function error()
		{
			$this->load->view('error');
		}
		
		public function edit($id = 0 )
		{
			$this->lang->load('form_validation','arabic');
			$this->form_validation->set_rules('name','عدد الإيام','trim|required|integer|xss_clean');
			if($this->form_validation->run())
			{
				$this->setting_m->update();
				$this->session->set_flashdata('sucess','تم التحديث بنجاح');
				redirect('admin/settings/days');
			}
			if($data['rows'] = $this->setting_m->get_by_id($id))
			{
				$data['title'] = "تعديل";
				$this->load->view('settings/edit',$data);
			}
			else
			{
				$this->error();
			}
		}
		
		public function edit_installment($id = 0 )
		{
			$this->lang->load('form_validation','arabic');
			$this->form_validation->set_rules('name','عدد الإيام','trim|required|integer|xss_clean');
			if($this->form_validation->run())
			{
				$this->setting_m->update();
				$this->session->set_flashdata('sucess','تم التحديث بنجاح');
				redirect('admin/settings/installment');
			}
			if($data['rows'] = $this->setting_m->get_by_id($id))
			{
				$data['title'] = "تعديل";
				$this->load->view('settings/edit_intsallment',$data);
			}
			else
			{
				$this->error();
			}
		}
		
		
		public function edit_long($id = 0 )
		{
			$this->lang->load('form_validation','arabic');
			$this->form_validation->set_rules('name','عدد الإيام','trim|required|integer|xss_clean');
			if($this->form_validation->run())
			{
				$this->setting_m->update();
				$this->session->set_flashdata('sucess','تم التحديث بنجاح');
				redirect('admin/settings/installment');
			}
			if($data['rows'] = $this->setting_m->get_by_id($id))
			{
				$data['title'] = "تعديل";
				$this->load->view('settings/edit_long',$data);
			}
			else
			{
				$this->error();
			}
		}
		
	}