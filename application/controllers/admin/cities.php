<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

	class Cities extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			if($this->session->userdata('userId') < 1 )
			{
				redirect(base_url());	
			}
		}
		
		public function index()
		{
			$data['title'] = "المدن";
			$data['rows'] = $this->city->get_all();
			$this->load->view('cities/index',$data);
		}
		
		public function add()
		{
			$this->city->add();
		}
		
		public function edit($id = 0)
		{
			$this->lang->load('form_validation','arabic');
			$this->form_validation->set_rules('name','المدينة','trim|required|xss_clean');
			if($this->form_validation->run())
			{
				$this->city->update();
				$this->session->set_flashdata('sucess','تم التحديث بنجاح');
				redirect('admin/cities/index');
				
			}
			if($data['get'] = $this->city->get_by_id($id))
			{
				$data['title'] = "تحرير إسم المدينة";
				$this->load->view('cities/edit',$data);
			}
			else 
			{
				$this->error();
			}
		}
		
		public function delete($id)
		{
			$this->city->delete($id);
			$this->session->set_flashdata('sucess','تم الحذف بنجاح');
			redirect('admin/cities/index');
			
		}
	}