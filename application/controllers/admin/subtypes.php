<?php 
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

	class Subtypes extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			if($this->session->userdata('userId') < 1 )
			{
				redirect(base_url());	
			}
		}
		
		public function add($id)
		{
			$type = $this->type->get_by_id($id);
			$data['title'] = $type[0]['type'];
			$data['rows'] = $this->stypes->sub2($id);
			$this->load->view('subtype/add',$data);
		}
		
		public function create()
		{
			$this->stypes->add();
			$this->session->set_flashdata('sucess','تم الإضافة بنجاح');
		}
		public function error()
		{
			$this->load->view('error');
		}
		
		public function edit($id = 0)
		{
			$this->lang->load('form_validation','arabic');
			$this->form_validation->set_rules('name','الوحدة','trim|required|xss_clean');
			if($this->form_validation->run())
			{
				$this->stypes->update();
				$this->session->set_flashdata('sucess','تم التحديث بنجاح');
				redirect('admin/subtypes/add/'.$this->input->post('type_id'));
				
			}
			if($data['get'] = $this->stypes->get_by_id($id))
			{
				$data['title'] = "تحرير إسم الوحدة";
				$this->load->view('subtype/edit',$data);
			}
			else 
			{
				$this->error();
			}
		}
		
		public function delete($id)
		{
			$type_id = $this->uri->segment(5);
			$this->stypes->delete($id);
			$this->session->set_flashdata('sucess','تم الحذف بنجاح');
			redirect('admin/subtypes/add/'.$type_id);
			
		}
	}