<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

	class Dashboard extends CI_Controller
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
			$data['title']			 = "مرحبا بكم في برنامج إدارة العقارات";
			$data['installment'] 	 = $this->installment->check();
			$data['long_contracts']  = $this->long_calc->check();
			$data['rent']		 	 = $this->rental->get_all();
			$data['rent_alert']		 = 	$this->setting_m->get_all();	
			$data['alert']		 	 = $this->setting_m->get_installment();	
			$data['contracts']		 = $this->setting_m->get_long_contract();	
			$this->load->view('admin/dashboard',$data);
		}
	}