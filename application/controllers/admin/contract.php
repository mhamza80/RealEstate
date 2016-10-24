<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

	class Contract extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			if($this->session->userdata('userId') < 1 )
			{
				redirect(base_url());	
			}
		}
		
		function index()
		{
			$data['title'] = "طباعة عقد إيجار";
			$data['rows']  = $this->contract_m->get_all();
			$data['archive']  = $this->contract_m->get_archived();
			$this->load->view('print/index',$data);
		}
		
		function details($id)
		{
			$data['rows'] 	= $this->contract_m->get_by_id($id);
			$data['estate']	= $this->estate->get_by_id($data['rows'][0]['estate_id']);
			$this->load->view('print/details',$data);
		}
		
		public function delete($id)
		{
			$this->contract_m->delete($id);
			$this->session->set_flashdata('sucess','تم الحذف بنجاح');
			redirect('admin/contract/index');
		}
		
		public function voucher()
		{
			$data['title'] = "طباعة سند صرف";
			$this->load->view('print/voucher',$data);
		}
		
		public function add_voucher()
		{
			$this->lang->load('form_validation','arabic');
			$this->form_validation->set_rules('amount','المبلغ','trim|required|numeric|xss_clean');
			$this->form_validation->set_rules('name','إستلمنا من','trim|required|xss_clean');
			$this->form_validation->set_rules('receiver','المستلم','trim|required|xss_clean');
			$this->form_validation->set_rules('illustration','وذلك مقابل','trim|required|xss_clean');
			if ($this->form_validation->run())
			{
				$input = $this->input->post();
				if($this->input->post('action') == "cash")
				{
					if($id = $this->voucher->insert($input))
					{
						$date = date('"Y-m-d',now());
						$this->income_m->add_from_print($date);
						$this->session->set_flashdata('success', 'تم الحفظ بنجاح');
						redirect('admin/contract/save/'.$id);
					}				
				}
				if($this->input->post('action') == "cheque")
				{
					$input = $this->input->post();
					if($id = $this->voucher->insert2($input))
					{
						$date = date('"Y-m-d',now());
						$this->income_m->add_from_print2($date);
						$this->session->set_flashdata('success', 'تم الحفظ بنجاح');
						redirect('admin/contract/save/'.$id);
					}							
				}
			}
			else 
			{
				$this->voucher();
			}
		
		}
		
		public function save($id)
		{
			$params = array();
		    $this->load->library('Arabic', $params);
		    $this->arabic->load('Date');
		    $this->arabic->setMode(1);
		    $data['number']= $this->numbers->get_number();
			$data['rows'] = $this->voucher->get($id);
			$fix = $this->arabic->dateCorrection($data['rows'][0]['pay_date']);
			$hdate = $this->arabic->date('Y-m-d ', $data['rows'][0]['pay_date'],$fix);
			$data['hdate'] = $hdate;
			$data['rem']   = $this->installment->remaining($id);
			$data['title'] = "طباعة";
			$this->load->view('print/print_voucher',$data);
		}
		
		public function cashing()
		{
			$data['title'] = "طباعة أمر صرف";
			$this->load->view('print/cashing',$data);
		}
		
		public function add_cashing()
		{
			$this->lang->load('form_validation','arabic');
			$this->form_validation->set_rules('amount','المبلغ','trim|required|numeric|xss_clean');
			$this->form_validation->set_rules('name','من','trim|required|xss_clean');
			$this->form_validation->set_rules('receiver','المستلم','trim|required|xss_clean');
			$this->form_validation->set_rules('illustration','وذلك مقابل','trim|required|xss_clean');
			if ($this->form_validation->run())
			{
				if($this->input->post('action') == "cash")
				{
					$date = date('Y-m-d',now());
					$input = $this->input->post();
					if($id = $this->outgoings_m->add_from_print($date))
					{				
						$this->session->set_flashdata('success', 'تم الحفظ بنجاح');
						redirect('admin/contract/save_outgoing/'.$id);				
					}	
				}
				if($this->input->post('action') == "cheque")
				{
					$date = date('Y-m-d',now());
					$input = $this->input->post();
					if($id = $this->outgoings_m->add_from_print2($date))
					{				
						$this->session->set_flashdata('success', 'تم الحفظ بنجاح');
						redirect('admin/contract/save_outgoing/'.$id);				
					}	
				}						
			}
			else 
			{
				$this->voucher();
			}
			
		}
		
		public function save_outgoing($id)
		{
			$data['rows'] = $this->outgoings_m->get_by_id($id);
			$data['title'] = "طباعة";
			$this->load->view('print/print_cashing',$data);
		}
	}