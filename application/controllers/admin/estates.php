<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

	class estates extends CI_Controller
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
			$data['title'] = "العقارات";
			$data['rows']  = $this->type->get_all();
			$this->load->view('estates/index',$data);
		}
		
		public function directory($id)
		{
			$data['title'] = "العقارات";
			$data['rows'] = $this->estate->get_estate($id);
			$this->load->view('estates/directory',$data);
		}
		
		public function error()
		{
			$this->load->view('error');
		}
		
		public function add()
		{
			$data['title'] = "إضافة عقار جديد";
			$data['cities'] = $this->city->get_all();
			$data['types'] = $this->type->get_all();
			$this->load->view('estates/add',$data);
		}
		
		public function create()
		{
			$this->lang->load('form_validation','arabic');
			$this->form_validation->set_rules('owner','اسم المالك','trim|required|xss_clean');
			$this->form_validation->set_rules('address','عنوان المالك','trim|required|xss_clean');
			$this->form_validation->set_rules('phone','الهاتف','trim|required|numeric|xss_clean');
			$this->form_validation->set_rules('district','الحى','trim|required|xss_clean');
			if($this->form_validation->run())
			{
				$this->stypes->status();
				$this->estate->add();
				$this->session->set_flashdata('sucess','تم إضافة العقار بنجاح');
				redirect('admin/estates/index','refresh');
			}
			else
			{
				$this->add();
			}
			
		}
		
		public function edit($id = 0)
		{
			$this->lang->load('form_validation','arabic');
			$this->form_validation->set_rules('owner','اسم المالك','trim|required|xss_clean');
			$this->form_validation->set_rules('address','عنوان المالك','trim|required|xss_clean');
			$this->form_validation->set_rules('phone','الهاتف','trim|required|numeric|xss_clean');
			$this->form_validation->set_rules('district','الحى','trim|required|xss_clean');
			if($this->form_validation->run())
			{
				$this->estate->update();
				$this->stypes->status();
				$this->session->set_flashdata('sucess','تم تعديل بيانات العقار بنجاح');
				redirect('admin/estates/index','refresh');
			}
			if($data['get'] = $this->estate->get_by_id($id))
			{
				$data['cities'] 	= $this->city->get_all();
				$data['subtype'] 	= $this->stypes->get_by_id($data['get'][0]['sub_type_id']);
				$data['types']		= $this->type->get_all();
				$data['title']		= "تعديل بيانات العقار"; 
				$this->load->view('estates/edit',$data);
			}
			else
			{
				$this->error();
			}
		}
		
		public function details($id)
		{
			$data['rows'] = $this->estate->get_by_id($id);
			$data['pictures'] = $this->document->get_by_pic($id);
			$data['units'] = $this->stypes->get_by_type($data['rows'][0]['estate_type']);
			$data['title'] = "تفاصيل العقار "." " .$data['rows'][0]['estate_name'];
			$this->load->view('estates/details',$data);
		}
		
		public function add_documents()
		{
			$data['title'] = "رفع ملفات";
			$this->load->view('estates/documents',$data);
		}
		
		public function add_photo()
		{
			$data['title'] = "رفع صور";
			$this->load->view('estates/photos',$data);
		}
		
		public function delete($id)
		{
			$pictures  = $this->document->get_by_pic($id);
			$documents = $this->document->get_by_id($id);
			if(is_array($pictures))
			{
				 $delete = PUBPATH.'resources/assets/img/articles/'.$pictures[0]['file_name'];
		    	 unlink($delete);
		    	 $success_th = PUBPATH.'resources/assets/img/articles/thumbnails/'.$pictures[0]['file_name'];
		      	 unlink($success_th);
		      	 $this->document->delete_photo($id);
			}
			if(is_array($documents))
			{
				 $delete = PUBPATH.'resources/assets/img/articles/'.$documents[0]['file_name'];
		    	 unlink($delete);
		    	 $success_th = PUBPATH.'resources/assets/img/articles/thumbnails/'.$documents[0]['file_name'];
		      	 unlink($success_th);
		      	 $this->document->delete($id);
			}
			$stype = $this->estate->get_by_id($id);
			$this->stypes->up_status($stype[0]['sub_type_id']);
			$this->estate->delete($id);
			redirect('admin/estates/index','refresh');
		}
		
	}