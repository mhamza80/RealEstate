<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

	class Admin extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			if($this->session->userdata('userId') < 1 )
			{
				redirect(base_url());	
			}
			
		}
		public function log_out()
		{
			$this->session->unset_userdata('userId');
			redirect('welcome/index','refresh');
		}
		
		public function edit($id = 0 )
		{
			$this->lang->load('form_validation','arabic');
			$this->form_validation->set_rules('name','الاسم','trim|required|xss_clean');
			$this->form_validation->set_rules('mobile','رقم الجوال','trim|required|xss_clean');
			$this->form_validation->set_rules('email','البريد الإلكترونى','trim|required|valid_email|xss_clean');
			$this->form_validation->set_rules('log','اسم الدخول','trim|required|xss_clean');
			$this->form_validation->set_rules('pass','كلمة المرور','trim|required|min_length[6]|xss_clean');
			$this->form_validation->set_error_delimiters('<p class="error">');
			if($this->form_validation->run())
			{
				$this->users->update();
				$this->session->set_flashdata('sucess',"تم التحديث بنجاح");
				redirect('admin/user/index');
			}
			if($data['rows'] = $this->users->get_by_id($id))
			{
				$data['title'] = "تعديل بيانات الموظف" . " " . $data['rows'][0]['first_name'];
				$this->load->view('admin/edit_users',$data);
			}
			else
			{
				$this->error();
			}
		}
		
		public function delete($id)
		{
			$this->users->delete($id);
			$this->session->set_flashdata('sucess',"تم الحذف بنجاح");
			redirect('admin/user/index');	
		}
						
		public function partial_voucher()
		{
			if(!empty($_POST['id']))
			{
				$id = $_POST['id'];
				$this->partial_payment->update($id);
			} 
		}
		
		public function installment()
		{
			if(!empty($_POST['id']))
			{
				$id = $_POST['id'];
				$this->installment->privilege($id);
			} 
		}
		
		public function single_vocher()
		{
			if(!empty($_POST['id']))
			{
				$id = $_POST['id'];
				$this->voucher->update($id);
			} 
		}
		/*
		 * عرض السندات التي تم ايقافها من قبل المستخدمين 
		 */ 
		public function vochers()
		{
			$data['partial']		= $this->partial_payment->get_all();
			$data['installment']	= $this->installment->get_privilege();
			$data['single_vocher']	= $this->voucher->get_all();
			$data['title']			= "صلاحيات الطباعة";
			$this->load->view('admin/vouchers',$data);
		}
		
		
	}