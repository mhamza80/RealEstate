<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

	class Income extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->config->load('files');
			$this->_path = FCPATH . $this->config->item('files_folder');
			if($this->session->userdata('userId') < 1 )
			{
				redirect(base_url());	
			}
		}
		
		public function index()
		{
			$data['title']  = "الإيردات";
			$data['rows']	= $this->income_m->get_all();
			$data['count']	= $this->income_m->count();
			$this->load->view('income/index',$data);
		}
		
		public function add()
		{
			if($this->input->post('action') == "cheque")
			{
				$this->income_m->add2();
				$this->session->set_flashdata('sucess','تم بنجاح');
			}
			if($this->input->post('action') == "cash")
			{
				$this->income_m->add();
				$this->session->set_flashdata('sucess','تم بنجاح');
			}
			
		}
		
		public function edit($id = 0)
		{
			$this->lang->load('form_validation','arabic');
			$this->form_validation->set_rules('amount','المبلغ','trim|required|xss_clean');
			if($this->form_validation->run())
			{
				$this->income_m->update();
				$this->session->set_flashdata('sucess','تم تعديل بيانات العقار بنجاح');
				redirect('admin/income/index','refresh');
			}
			if($data['get'] = $this->income_m->get_by_id($id))
			{
				$data['title']		= "تعديل بيانات إيراد"; 
				$this->load->view('income/edit',$data);
			}
			else
			{
				$this->error();
			}
		}
		
		public function delete($id)
		{
			$data = $this->income_m->get_by_id($id);
			if(!empty($data[0]['file_name']))
			{
				$delete = PUBPATH.'files/'.$data[0]['file_name'];
    	 		unlink($delete);
    	 		$this->income_m->delete($id);
    	 		$this->session->set_flashdata('sucess','تم الحذف بنجاح');
				redirect('admin/income/index','refresh');
			}
			else 
			{
				$this->income_m->delete($id);
				$this->session->set_flashdata('sucess','تم الحذف بنجاح');
				redirect('admin/income/index','refresh');
			}
		}
		
		public function confirm()
		{
			$params = array();
		    $this->load->library('Arabic', $params);
		    $this->arabic->load('Date');
		    $this->arabic->setMode(1);		 
			$data['rows']  = $this->income_m->unconfirmed();
			$data['title'] = "تأكيد الإدخال";
			$this->load->view('income/confirm',$data);
		}
		
		public function confirmed()
		{
		 	$data = $_POST['checked'];
 			if(is_array($data))
 			 {
 				 foreach ($data as $value=>$list) {
 				 	$this->income_m->upate_status($list);
 				 }
 			 }
		}
		
		public function upload($id)
		{
			$data['trans_id'] = $id;
 			$this->load->view('income/upload_form',$data);
		}
		
		public function add_upload()
		{
			$this->lang->load('upload','arabic');
			$config['upload_path'] = $this->_path;
	        $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf';
	        $this->load->library('upload', $config);
	        $this->upload->initialize($config);
			if(!$this->upload->do_upload('upload'))
			{	
				$data['error'] = $this->upload->display_errors();
				$this->load->view('income/upload_form', $data);
			}
 			elseif($file = $this->upload->data('photo'))
			{
				 $files['file_name'] = $file['file_name'];
				 $files['file_path'] = $file['file_path'];	
				 $files['file_type'] = $file['file_type'];
				 $this->income_m->attachment($file);
				 $data['sucess'] ='تم رفع الملف بنجاح';
				 $this->load->view('income/upload_form', $data);
			}
		}
		
		public function cheque()
		{
			 $type = $_GET['type'];
			 if($type == "cheque")
			 {
				$this->load->view('income/cheque');
			 }
		 	if($type == "cash")
			 {
				$this->load->view('income/cash');
			 }
		}
	}