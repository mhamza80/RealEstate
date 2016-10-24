<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

	class Identity extends CI_Controller
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
			$data['title'] = "الهوية";
			$data['rows'] = $this->identitys->get_all();
			$this->load->view('rentals/identity',$data);
		}
		
		public function add()
		{
			$this->identitys->add();
			$this->session->set_flashdata('sucess','تم الإضافة بنجاح');
			
			
		}
	}