<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

	class User extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			session_start();
			if($this->session->userdata('userId') < 1 )
			{
				redirect(base_url());	
			}
		}
		
		public function index()
		{
			$data['title'] = "المستخدمين";
			$data['users'] = $this->users->get_all();
			$this->load->view('admin/users',$data);
		}
		
		public function create_user()
		{
			$this->users->add();
			$this->session->set_flashdata('sucess','تم بنجاح');
			
		}
	}