<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

	class Sms extends CI_Controller
	{
		function __construct()
		{
			parent:: __construct();
			if($this->session->userdata('userId') < 1 )
			{
				redirect(base_url());	
			}
			APPPATH.'libraries/Unifonic/Autoload.php';
			$this->load->library('Unifonic/API/client');
		}
		
		public function index()
		{
			$data['rows'] = $this->sms_m->get_all();
			$data['title'] = "ضبط مزود خدة الرسائل";
			$this->load->view('sms/index',$data);
		}
		
		public function add()
		{
			$this->sms_m->add();
			$this->session->set_flashdata('sucess','تم بنجاح');
		}
		
		public function error()
		{
			$this->load->view('error');
		}
		
		public function edit($id = 0 )
		{
			$this->lang->load('form_validation','arabic');
			$this->form_validation->set_rules('name','إسم المستخدم','trim|required|xss_clean');
			$this->form_validation->set_rules('pass','كلمة المرور','trim|required|xss_clean');
			if($this->form_validation->run())
			{
				$this->sms_m->update();
				$this->session->set_flashdata('sucess','تم التحديث بنجاح');
				redirect('admin/sms/index');
			}
			if($data['rows'] = $this->sms_m->get_by_id($id))
			{
				$data['title'] = "تعديل";
				$this->load->view('sms/edit',$data);
			}
			else
			{
				$this->error();
			}
		}
		
		public function send()
		{
			$data['title'] = "إرسال رسالة نصية";
			$data['number'] = $this->uri->segment(4);
			$data['to'] = $this->rental->get_by_id($this->uri->segment(5));
			$this->load->view('sms/send',$data);
		}
		
		public function go()
		{
			$this->lang->load('form_validation','Arabic');
	        $this->form_validation->set_rules('from','من','trim|required|xss_clean');
	        $this->form_validation->set_rules('msg','الرسالة','trim|required|xss_clean');
	        if($this->form_validation->run() == false)
	        {
	        	$this->send();
	        }
	        else
	        {	        	
	        	$this->message->send($this->input->post('to'),$this->input->post('msg'));
				$this->session->set_flashdata('sucess','تم إرسال الرسائل بنجاح ');
				redirect('admin/sms/index');
			}				
	     }				       
	}