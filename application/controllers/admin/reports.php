<?php 
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

	class Reports extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			if($this->session->userdata('userId') < 1 )
			{
				redirect(base_url());	
			}
		}
		
		public function income()
		{
			$data['title'] = "اختيار التاريخ";
			$this->load->view('reports/search_dates',$data); 
		}
		
		public function get_income()
		{
			$this->lang->load('form_validation','arabic');
			$this->form_validation->set_rules('from','التاريخ من','trim|required|xss_clean');
			$this->form_validation->set_rules('to','التاريخ إلى','trim|required|xss_clean');
			if($this->form_validation->run() == FALSE)
			{
				$this->income();
			}
			else
			{
				$from = date('Y-m-d',strtotime($this->ger->HijriToGregorian($this->input->post('from'),'YYYY/MM/DD')));
				$to   = date('Y-m-d',strtotime($this->ger->HijriToGregorian($this->input->post('to'),'YYYY/MM/DD')));			
				$data['result'] = $this->report_m->income($from,$to);
				if(is_array($data['result']))
				{
					$data['count']	= $this->report_m->count($from,$to);
					$data['title'] = "تم العثور على ".count($data['result']). " " ." نتائج";					
				}
				if(empty($data['result']))
				{
					$data['title'] = "لا توجد نتائج للبحث";
				}
				$this->load->view('reports/search_results',$data);
			}
		}
		
		public function outgoing()
		{
			$data['title'] = "اختيار التاريخ";
			$this->load->view('reports/search_outgoing',$data); 
		}		
		
		public function get_outgoing()
		{
			$this->lang->load('form_validation','arabic');
			$this->form_validation->set_rules('from','التاريخ من','trim|required|xss_clean');
			$this->form_validation->set_rules('to','التاريخ إلى','trim|required|xss_clean');
			if($this->form_validation->run() == FALSE)
			{
				$this->outgoing();
			}
			else
			{
				$from = date('Y-m-d',strtotime($this->ger->HijriToGregorian($this->input->post('from'),'YYYY/MM/DD')));
				$to   = date('Y-m-d',strtotime($this->ger->HijriToGregorian($this->input->post('to'),'YYYY/MM/DD')));			
				$data['result'] = $this->report_m->outgoing($from,$to);
				if(is_array($data['result']))
				{
					$data['count']	= $this->report_m->count_outgoing($from,$to);
					$data['title'] = "تم العثور على ".count($data['result']). " " ." نتائج";					
				}
				if(empty($data['result']))
				{
					$data['title'] = "لا توجد نتائج للبحث";
				}
				$this->load->view('reports/outgoing_results',$data);
			}
		}
		
		public function estates()
		{
			$data['title'] = "العقارات";
			$data['rows']  = $this->type->get_all();
			$this->load->view('reports/estates',$data);
		}
		
		public function estates_details()
		{
			$data['id']    = $this->input->post('id');
			$data['from']  = date('Y-m-d',strtotime($this->ger->HijriToGregorian($this->input->post('from'),'YYYY/MM/DD')));
			$data['to']    = date('Y-m-d',strtotime($this->ger->HijriToGregorian($this->input->post('to'),'YYYY/MM/DD')));			
			$type          = $this->type->get_by_id($data['id']);
			$data['title'] = $type[0]['type'];
			$data['rows']  = $this->report_m->in_report($data['from'],$data['to'],$data['id']);
			
			$this->load->view('reports/estates_details',$data);
					
		}
		
		public function search($id)
		{
			$data['type'] = $this->type->get_by_id($id);
			$data['title'] = $data['type'][0]['type'];
			$data['rows'] = $this->stypes->sub($id);
			$this->load->view('reports/income',$data);	
		}
	}