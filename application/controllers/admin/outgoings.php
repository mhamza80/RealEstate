<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

	class Outgoings extends CI_Controller
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
			$data['title']  = "المصروفات";
			$data['rows']	= $this->outgoings_m->get_all();
			$data['count']	= $this->outgoings_m->count();
			$this->load->view('outgoings/index',$data);
		}
		
		public function add()
		{
			echo $date = $this->ger->HijriToGregorian($this->input->post('date'),'YYYY/MM/DD');
			$this->outgoings_m->add($date);
			$this->session->set_flashdata('sucess','تم بنجاح');
		}
		
		public function error()
		{
			$this->load->view('error');
		}
		
		public function edit($id = 0)
		{
			$this->lang->load('form_validation','arabic');
			$this->form_validation->set_rules('amount','المبلغ','trim|required|xss_clean');
			if($this->form_validation->run())
			{
				$this->outgoings_m->update();
				$this->session->set_flashdata('sucess','تم التعديل بنجاح');
				redirect('admin/outgoings/index','refresh');
			}
			if($data['get'] = $this->outgoings_m->get_by_id($id))
			{
				$data['title']		= "تعديل بيانات المصروفات"; 
				$this->load->view('outgoings/edit',$data);
			}
			else
			{
				$this->error();
			}
		}
		
		public function delete($id)
		{
			$this->outgoings_m->delete($id);
			$this->session->set_flashdata('sucess','تم الحذف بنجاح');
			redirect('admin/outgoings/index','refresh');
		}
	}