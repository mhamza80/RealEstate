<?php

	class Cheque extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			session_start();
			$this->config->load('files');
			$this->_path = FCPATH . $this->config->item('files_folder');
			if($this->session->userdata('userId') < 1 )
			{
				redirect(base_url());	
			}
		}
		
		public function index()
		{
			$data['title'] = "الشيكات";
			$data['rows'] = $this->cheque_m->get_all();
			$this->load->view('cheque/index',$data);
		}
		
		public function create ()
		{
			$this->lang->load('form_validation','arabic');
			$this->form_validation->set_rules('to','لأمر','trim|required|xss_clean');
			$this->form_validation->set_rules('amount','المبلغ','trim|required|numeric|xss_clean');
			if($this->form_validation->run())
			{
				$data = $this->input->post();
				$id = $this->cheque_m->insert($data);
				redirect('admin/cheque/printer/'.$id);
			}
			$data['title'] = "معلومات الشيك";
			$this->load->view('cheque/form',$data);
		}
		
		public function printer($id)
		{
			$data['title'] = "طباعة شيك"; 
			$data['rows']  = $this->cheque_m->get($id);
			$this->load->view('cheque/print',$data);
			
		}
		
		public function upload($id)
		{
			$data['cheque_id'] = $id;
 			$this->load->view('cheque/upload_form',$data);
		}
		
		public function add_upload()
		{
			$this->lang->load('upload','arabic');
			$config['upload_path'] = $this->_path;
	        $config['allowed_types'] = 'jpg|jpeg||pdf';
	        $this->load->library('upload', $config);
	        $this->upload->initialize($config);
			if(!$this->upload->do_upload('upload'))
			{	
				$data['error'] = $this->upload->display_errors();
				$this->load->view('cheque/upload_form', $data);
			}
 			elseif($file = $this->upload->data('photo'))
			{
				 $files['file_name'] = $file['file_name'];
				 $files['file_path'] = $file['file_path'];	
				 $id = $this->input->post('id');
				 $this->cheque_m->attachment($file,$id);
				 $data['sucess'] ='تم رفع الملف بنجاح';
				 $this->load->view('cheque/upload_form', $data);
			}
		}
		
		public function display()
		{
			$id = $this->input->post('id');
			$data['rows']  = $this->cheque_m->get($id);
			$this->load->view('cheque/view',$data);
		}
		
		public function delete($id)
		{
			$file = $this->cheque_m->get($id);
			$delete = PUBPATH.'files/'.$file[0]['cheque_name'];
    		@unlink($delete);
    		$this->cheque_m->delete($id);
    		$this->session->set_flashdata('sucess','تم الحذف بنجاح');
    		redirect('admin/cheque/index','refresh');
    	
    		
		}
		
	}