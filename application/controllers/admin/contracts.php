<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

	class Contracts extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
		}
		
		public function index()
		{
			$data['title']	= "العقود الطويلة";
			$data['rows'] 	= $this->long_contract->get_all();
			$this->load->view('long_contract/index',$data);
			
		}
		
		public function add()
		{
			$this->long_contract->insert();
			$this->session->set_flashdata('sucess','تم بنجاح');
		}
		
		public function get()
		{
			$data['title']	= "العقود الطويلة";
			$data['rows'] 	= $this->long_contract->get();
			$this->load->view('long_contract/get',$data);
		}
		
		public function create()
		{
			$data['title']		= "العقود الطويلة";
			$data['estates'] 	= $this->long_contract->get_all_empty();
			$this->lang->load('form_validation','arabic');
			$this->form_validation->set_rules('owner','المؤجر','trim|required|xss_clean');
			if($this->form_validation->run())
			{				
				$this->long_contract->add();				
				$id    = $this->db->insert_id();
				$this->long_contract->update_estate($this->input->post('estate_type'));
				redirect('admin/contracts/calculation/'.$id);
			}	
			$this->load->view('long_contract/create',$data);
		}
		
		public function calculation()
		{
			$id 		   = $this->uri->segment(4);
			$esate		   = $this->long_contract->get_sub_estate($id);
			$MainEsate     = $this->long_contract->get_by_id($esate[0]['estate_id']);
			$data['title'] = "حساب الاقساط للعقار" ." " . $MainEsate[0]['name'];
			if($_POST):
			$this->lang->load('form_validation','arabic');
			$this->form_validation->set_rules('from[]','السنة من','trim|required|xss_clean');
			$this->form_validation->set_rules('to[]','السنة إلى','trim|required|xss_clean');
			$this->form_validation->set_rules('amount[]','المبلغ','trim|required|xss_clean');
			if($this->form_validation->run())
			{	
				$params = array();
				$this->load->library('Arabic', $params);
				$this->arabic->load('Mktime');
				
				$from 			= $_POST['from'];
				$to   			= $_POST['to'];
				$amount			= $_POST['amount'];
				$installment	= $_POST['installment'];
				$date			= $_POST['date'];
				$total 			= "";
				foreach ($from as $key => $value) {					
					if($date[$key] == 1)
					{
						    $start = explode("/", $value);
							$fix1  = $this->arabic->mktimeCorrection($start[1], $start[0]); 
							$time1 = $this->arabic->mktime(0,0,0,$start[1],$start[2],$start[0], $fix1);
							
							$end   = explode("/", $to[$key]);
							$fix2  = $this->arabic->mktimeCorrection($end[1], $end[0]); 
							$time2 = $this->arabic->mktime(0,0,0,$end[1],$end[2],$end[0],$fix2);						
					 		if($installment[$key] == 2)
					 		{
					 			$time_difference = $time1 - $time2;			
					 			$seconds_per_year = 60*60*24*365;
								$years = round($time_difference / $seconds_per_year);
								$cut   = explode("-", $years);
								if($cut[1] <> 1)
								{
						 			for ($i =1; $i <= $cut[1] * 2; $i++) {
						 				if($i == 1)
						 				{
						 					$num = null;
						 				}
						 				elseif ($i > 1)
						 				{
						 					$num = 6 * $i - 6;
						 				}
						 				$pay =  $this->arabic->mktime(0,0,0,$start[1]+$num,$start[2],$start[0]);
						 				$total = $amount[$key] / 2;
						 				$this->long_calc->installment($total,$pay,0);
						 			}
								}
 					 		}
					 		elseif($installment[$key] == 1)
					 		{
					 			
					 			$time_difference = $time1 - $time2;			
					 			$seconds_per_year = 60*60*24*365;
								$years = round($time_difference / $seconds_per_year);
								$cut   = explode("-", $years);				
								if($cut[1] <> 1)
								{
									for ($j=1; $j<=$cut[1];$j++)
									{
										$start = explode("/", $value);
										$fix1  = $this->arabic->mktimeCorrection($start[1], $start[0]); 
										$time1 = $this->arabic->mktime(0,0,0,$start[1],$start[2],$start[0]+$j,$fix1);
										$total = $amount[$key];
										$pay   = $time1;
										$this->long_calc->installment($total,$pay,0);
										$this->long_calc->months($time1,$time2);	 
									}
								}
					 		}
						}
					else 
					{
						$date1 = strtotime($value);
						$date2 = strtotime($to[$key]);
						if($installment[$key] == 2)
						{
							$total = $amount[$key] / 2;
							$time_difference = $date1 - $date2;	
							$seconds_per_year = 60*60*24*365;
							$years = round($time_difference / $seconds_per_year);
							$cut   = explode("-", $years);				
							if($cut[1] <> 1)
							{
								$time_difference = $date1 - $date2;			
								for ($j=1; $j<=$cut[1];$j++)
								{
									 $add_date =  strtotime("+".$j."year",$date1);
									 $this->long_calc->installment($total,$add_date,1);
								}
							}
							$pay = strtotime("+ 6 month",$date1);
							for ($j = 1; $j < 2; $j++) {
								if($j == 1)
								{
									$this->long_calc->installment($total,$date1,1);
								}
								$this->long_calc->installment($total,$pay,1);
							}							 		
						}
						if($installment[$key] == 1)
						{
							$total = $amount[$key];			
							$time_difference = $date1 - $date2;	
							$seconds_per_year = 60*60*24*365;
							$years = round($time_difference / $seconds_per_year);
							$cut   = explode("-", $years);				
							if($cut[1] <> 1)
							{
								$time_difference = $date1 - $date2;			
								for ($j=0; $j<=$cut[1];$j++)
								{
									 $add_date =  strtotime("+".$j."year",$date1);									 				
									 $this->long_calc->installment($total,$add_date,1);
								}
							}	
													
							else 
							{
								$this->long_calc->installment($total,$date2,1);		
							}
						}
					}
				}
				
				$redirect = $this->input->post('id');
				$this->session->set_flashdata('sucess','تم بنجاح');
				redirect('admin/contracts/details/'.$redirect);
			}
			endif;
			$this->load->view('long_contract/calculation',$data);
		}
		
		public function details($id)
		{
			
			$data['rows']     = $this->long_contract->get_sub_estate($id);				
			$data['documents']= $this->long_documents->get_by_id($id);
			$data['amount']	  = $this->long_calc->amount($id);
			$data['premium']  = $this->long_calc->get_installment($id);
			$data['partial']  = $this->long_calc->partial($id);
			$data['months']	  = $this->long_calc->get_months($id);
			$data['title']    = "تفاصيل المستأجر "." " .$data['rows'][0]['t_name'];
			$this->load->view('long_contract/details',$data);
		}
		
		public function add_documents()
		{
			$data['title'] = "رفع ملفات";
			$this->load->view('long_contract/documents',$data);
		}
		
		public function pay()
		{
			$id = $this->uri->segment(4);
			$data['rows']  = $this->long_calc->get($id);
			$data['rental']= $this->long_contract->get_details($data['rows'][0]['rental_id']);
			$data['title'] = "سند قبض";
			$this->load->view('long_contract/pay',$data);
		}
		
		public function delete_installment($id)
		{
			$this->long_calc->delete_installment($id);
			$this->session->set_flashdata('sucess','تم الحذف بنجاح');
			redirect('admin/contracts/details/'.$this->uri->segment(5).'/'.$this->uri->segment(5),'refresh');
		}
		
		public function vouchers()
		{
			$this->lang->load('form_validation','arabic');
			$this->form_validation->set_rules('name','إستلمنا من','trim|required|xss_clean');
			$this->form_validation->set_rules('receiver','المستلم','trim|required|xss_clean');
			$this->form_validation->set_rules('reason','وذلك مقابل','trim|required|xss_clean');
			if($this->form_validation->run())
			{
				$recived = $this->input->post('recived');
				if(!empty($recived))
				{
					$amount   = $this->input->post('amount');
					$total    = $amount - $recived ;
					$date     = now();
					$unit     = $this->long_contract->get_by_id($this->input->post('rental_id'));
					$estate   = $this->long_contract->get_sub_estate($unit[0]['estate_id']);
					$var = "تحصيل قسط من" ." ".$unit[0]['name'];
					$this->income_m->partial_payment(date("Y-m-d",$date),$var,$unit[0]['id'],$recived);
					$this->long_calc->recived($date,$total);
					//$this->report_m->add($this->input->post('rental_id'),$recived,$unit[0]['estate_type']);								
					$this->numbers->increment();
					$this->long_calc->partial_payment($date,$recived);
					$this->session->set_flashdata('sucess','تم التسديد بنجاح');
					redirect('admin/contracts/details/'.$this->input->post('rental_id'));
				}
				else 
				{				
					$date     = now();
					$unit     = $this->long_contract->get_by_id($this->input->post('rental_id'));
					$estate   = $this->long_contract->get_sub_estate($unit[0]['estate_id']);
					$var      = "تحصيل قسط من" ." ".$unit[0]['name'];
					$this->income_m->add_voucher(date("Y-m-d",$date),$var,$estate[0]['id']);
					$this->long_calc->paid($date);
					$this->numbers->increment();
					//$this->report_m->add($this->input->post('rental_id'),$this->input->post('amount'),$unit[0]['estate_type']);	
					$this->session->set_flashdata('sucess','تم التسديد بنجاح');
					redirect('admin/contracts/details/'.$this->input->post('rental_id'));
				}
			}
			else
			{
				$this->pay();
			}
		}
		
		public function get_voucher($id)
		{
			$params = array();
		    $this->load->library('Arabic', $params);
		    $this->arabic->load('Date');
		    $this->arabic->setMode(1);
			$data['rows']  = $this->long_calc->get($id);
			$fix = $this->arabic->dateCorrection($data['rows'][0]['pay_date']);
			$hdate = $this->arabic->date('Y-m-d ', $data['rows'][0]['pay_date'],$fix);
			$data['number']= $this->numbers->get_number();
			$data['sum']   = $this->long_calc->get_paid($data['rows'][0]['rental_id']);
			$data['rem']   = $this->long_calc->remaining($data['rows'][0]['rental_id']);
			$data['hdate'] = $hdate;
			$data['title'] = "سند رقم"." ".$data['rows'][0]['id'];
			$this->load->view('long_contract/voucher',$data);
		}
		
		public function get_partial($id)
		{
			$params = array();
			$this->load->library('Arabic', $params);
		    $this->arabic->load('Date');
		    $this->arabic->setMode(1);
			$data['rows']  = $this->long_calc->get_partial($id);
			$fix = $this->arabic->dateCorrection($data['rows'][0]['pay_date']);
			$hdate = $this->arabic->date('Y-m-d ', $data['rows'][0]['pay_date'],$fix);
			$data['hdate'] = $hdate;
			$data['number']= $this->numbers->get_number();
			$data['rem']   = $data['rows'][0]['amount']-  $data['rows'][0]['partial_pay'];
			$data['title'] = "سند رقم"." ".$data['rows'][0]['id'];
			$this->load->view('long_contract/partial_voucher',$data);
		}
		
		public function delete_partial($id)
		{
			$this->long_calc->delete_partial($id);
			$this->session->set_flashdata('sucess','تم الحذف بنجاح');
			redirect('admin/contracts/details/'.$this->uri->segment(5).'/'.$this->uri->segment(5),'refresh');
		}
		
		public function delete($id)
		{
			$this->long_calc->delete($id);
			$this->session->set_flashdata('sucess','تم الحذف بنجاح');
			redirect('admin/contracts/get','refresh');
			
		}
	}