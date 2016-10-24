<?php 
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

	class Rentals extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->library('hijri',1); 
			if($this->session->userdata('userId') < 1 )
			{
				redirect(base_url());	
			}
		}
		
		public function index() 
		{
			$data['rows']  = $this->type->get_all();
			$data['title'] = "الإيجارات";
			$this->load->view('rentals/estates',$data);		
		}

		public function add()
		{
			$data['title']   = "إضافة مستأجر جديد";
			$data['cities']  = $this->city->get_all();
			$data['estates'] = $this->estate->get();
			$data['date']	 = $this->date_m->get();
			$this->load->view('rentals/add',$data);
		}
		
		public function directory($id)
		{
			if(id)
			{
				$title  	  = $this->type->get_by_id($id);	
				$data['rows'] = $this->rental->get_by_estate_type($id);
				$data['title']= "المستأجرين بعقار" .$title[0]['type'];
			}
			$this->load->view('rentals/rentals',$data);
		}
		
		public function create()
		{
			$this->lang->load('form_validation','arabic');
			$this->form_validation->set_rules('owner','المؤجر','trim|required|xss_clean');
			if($this->form_validation->run())
			{
				$params = array();
				$this->load->library('Arabic', $params);
			    $this->arabic->load('Mktime');
				$rem 	= explode("-", $this->input->post('residual'));
				$date 	= $this->input->post('data');
				$type  = $this->estate->get_by_id($this->input->post('estate_type'));
				if(is_array($rem))
				{
					$rem = explode("-", $this->input->post('residual'));
					if(isset($_POST['checkwater']))
					{
						$water = $this->input->post('water');
						$total = 0;
					}
					else
					{
						$water = $this->input->post('water')/2;
						$total = $water;
					}
				}
				else
				{
					$rem = array('0'=>'0','0'=>'0');
				}
				$pay = $this->input->post('pay');				
				if(!empty($pay))
				{
					if($date == 0)
					{
						$start = explode("/", $this->input->post('start'));
						$fix1  = $this->arabic->mktimeCorrection($start[1], $start[0]); 
						$time1 = $this->arabic->mktime(0,0,0,$start[1],$start[2],$start[0], $fix1);
						$end   = explode("/", $this->input->post('end'));
						$fix2  = $this->arabic->mktimeCorrection($end[1], $end[0]); 
						$time2 = $this->arabic->mktime(0,0,0,$end[1],$end[2],$end[0],$fix2);
						$this->rental->add($time1,$time2,$rem[1]+$total,$this->input->post('pay')+$water,$type[0]['estate_type']);
						$id    = $this->db->insert_id();
						$this->estate->update_status();
						$sub    = $this->stypes->add_date($type[0]['sub_type_id']);
						$this->contract_m->add($this->input->post('start'),$this->input->post('end'),$rem[1]+$total,$this->input->post('pay')+$water,$id);
						$redirect  = $this->installment->create_add($id,date('Y-m-d',$time1),$this->input->post('pay')+$water);
						redirect('admin/rentals/pay/'.$redirect);
					}
					if($date == 1)
					{
						$time1 = $this->input->post('start');
						$time2 = $this->input->post('end');
						$this->rental->add_gregorian($time1,$time2,$rem[1]+$total,$this->input->post('pay')+$water,$type[0]['estate_type']);
						$id    = $this->db->insert_id();
						$stype = $this->rental->get_by_id($id);
						$this->estate->update_status();
						$sub    = $this->stypes->add_date($type[0]['sub_type_id']);
						//$report = $this->report_m->add($id,$this->input->post('pay')+$water,$stype[0]['estate_type']);
						$this->contract_m->add($this->input->post('start'),$this->input->post('end'),$rem[1]+$total,$this->input->post('pay')+$water,$id);
						$redirect  = $this->installment->create_gregorian($id,$time1,$this->input->post('pay')+$water);
						redirect('admin/rentals/pay/'.$redirect);
					}
				}
				if(empty($pay))
				{
					if($this->input->post('data') == 0)
					{
						$start = explode("/", $this->input->post('start'));
						$fix1 = $this->arabic->mktimeCorrection($start[1], $start[0]); 
						$time1 = $this->arabic->mktime(0,0,0,$start[1],$start[2],$start[0], $fix1);
						$end   = explode("/", $this->input->post('end'));
						$fix2 = $this->arabic->mktimeCorrection($end[1], $end[0]); 
						$time2 = $this->arabic->mktime(0,0,0,$end[1],$end[2],$end[0], $fix2);
						$this->rental->add($time1,$time2,$rem[1],$this->input->post('pay'),$type[0]['estate_type']);												
					}
					if($this->input->post('data') == 1)
					{
						$time1 = $this->input->post('start');
						$time2 = $this->input->post('end');
						$this->rental->add_gregorian($time1,$time2,$rem[1]+$total,$this->input->post('pay')+$water,$type[0]['estate_type']);
					}
					$id    = $this->db->insert_id();
					$stype = $this->rental->get_by_id($id);
					$this->estate->update_status();
					$this->contract_m->add($this->input->post('start'),$this->input->post('end'),$rem[1],$this->input->post('pay'),$id);
					$sub    = $this->stypes->add_date($type[0]['sub_type_id']);
					$report = $this->report_m->add($id,$this->input->post('pay')+$water,$stype[0]['estate_type']);
					$this->session->set_flashdata('sucess','تم الإضافة بنجاح');
					$this->estate->update_status();
					redirect('admin/rentals/directory/'.$stype[0]['estate_type'],'refresh');					
				}
			}
			else
			{
				$this->add();
			}
		}
		
		public function edit($id = 0)
		{
			$this->lang->load('form_validation','arabic');
			$this->form_validation->set_rules('owner','المؤجر','trim|xss_clean');
			if($this->form_validation->run())
			{
				$params = array();
				$this->load->library('Arabic', $params);
			    $this->arabic->load('Mktime');
				$rem = explode("-", $this->input->post('residual'));
				$pay = $this->input->post('pay');
				if(isset($_POST['checkwater']))
				{
					$water = $this->input->post('water');
					$total = 0;
				}
				else
				{
					$water = $this->input->post('water')/2;
					$total = $water;
				}
				$type 	=   $this->input->post('type');
				$d 		= 	$this->input->post('cont'); 
				if($type == "account")
				{
					if($d == "1")
					{
						$id     = $this->input->post('id');
						$rental = $this->rental->get_by_id($id);
						if(!empty($rental[0]['start_contarct']))
						{
							$start  = explode("/", $this->input->post('start'));
							$fix1   = $this->arabic->mktimeCorrection($start[1], $start[0]); 
							$time1  = $this->arabic->mktime(0,0,0,$start[1],$start[2],$start[0], $fix1);
							$end    = explode("/", $this->input->post('end'));
							$fix2   = $this->arabic->mktimeCorrection($end[1], $end[0]); 
							$time2  = $this->arabic->mktime(0,0,0,$end[1],$end[2],$end[0], $fix2);
							$this->rental->update_not_pay($time1,$time2,@$rem[1]+$total);							
						}
						if(empty($rental[0]['start_contarct']))
						{
							$time1 = $this->input->post('start');
							$time2 = $this->input->post('end');
							$this->rental->update_with_gregorian($time1,$time2,@$rem[1]+$total);
						}
						$this->estate->update_status();
						$this->contract_m->update_account($this->input->post('start'),$this->input->post('end'),@$rem[1]+$total,$this->input->post('pay')+$water,$this->input->post('id'));
						if(!empty($pay))
						{
							if(empty($rental[0]['start_contarct']))
							{
								$this->rental->update_account_ger($time1,$time2,@$rem[1]+$total,$this->input->post('pay')+$water);
								$redirect  = $this->installment->create_gregorian($id,$this->input->post('start'),$this->input->post('pay')+$water);
							}
							if(!empty($rental[0]['start_contarct']))
							{
								$this->rental->update_account($time1,$time2,@$rem[1]+$total,$this->input->post('pay')+$water);
								$redirect  = $this->installment->create_add($id,date('Y-m-d',$time1),$this->input->post('pay')+$water);
							}
						
							redirect('admin/rentals/pay/'.$redirect);
						}
						else
						$this->session->set_flashdata('sucess','تم تعديل بيانات المستأجر بنجاح');
						redirect('admin/rentals/edit/'.$this->input->post('id'),'refresh');	
						
					}
						
					else
					{
						$start = explode("/", $this->input->post('start'));
						$fix1 = $this->arabic->mktimeCorrection($start[1], $start[0]); 
						$time1 = $this->arabic->mktime(0,0,0,$start[1],$start[2],$start[0], $fix1);
						$end   = explode("/", $this->input->post('end'));
						$fix2 = $this->arabic->mktimeCorrection($end[1], $end[0]); 
						$time2 = $this->arabic->mktime(0,0,0,$end[1],$end[2],$end[0], $fix2);
						$this->rental->update_not_pay($time1,$time2,@$rem[1]+$total);	
						$id = $this->input->post('id');
						$this->rental->update_account($time1,$time2,@$rem[1]+$total,$this->input->post('pay')+$water);
						$this->contract_m->update_account($this->input->post('start'),$this->input->post('end'),@$rem[1]+$total,$this->input->post('pay')+$water,$this->input->post('id'));
						$this->session->set_flashdata('sucess','تم تعديل بيانات المستأجر بنجاح');
						redirect('admin/rentals/edit/'.$this->input->post('id'),'refresh');					
					}		
					
				}
				if($type == 'personal')
				{															
					$type  = $this->estate->get_by_id($this->input->post('estate_type'));
					$this->rental->update($type[0]['estate_type']);
					$this->contract_m->update($this->input->post('id'));
					$this->session->set_flashdata('sucess','تم تعديل بيانات المستأجر بنجاح');
					redirect('admin/rentals/edit/'.$this->input->post('id'),'refresh');
				}				
			}
			if($data['get'] = $this->rental->get_by_id($id))
			{
				$estate				= $this->estate->get_by_id($data['get'][0]['estate_id']);
				$data['cities'] 	= $this->city->get_all();
				$data['estates']	= $this->stypes->sub2($estate[0]['estate_type']);
				if(!empty($data['get'][0]['start_contarct']))
				{
					$data['start']	= $this->ger->GregorianToHijri(date('Y-m-d',$data['get'][0]['start_contarct']),'YYYY-MM-DD');
					$data['end']	= $this->ger->GregorianToHijri(date('Y-m-d',$data['get'][0]['end_contarct']),'YYYY-MM-DD');
					$data['value']	= 0;
				}
				if(empty($data['get'][0]['start_contarct']))
				{
					$data['start']	= $data['get'][0]['start_contract_ger'];
					$data['end']	= $data['get'][0]['end_contract_ger'];
					$data['value']	= 1;
				}
				$data['title']		= "تعديل بيانات العقار"; 			
				$this->load->view('rentals/edit',$data);
			}
			else
			{
				$this->error();
			}
		}
		
		public function delete($id)
		{
			$delete_id = $this->rental->get_by_id($id);
			$this->estate->update_status2($delete_id[0]['estate_id']);
			$estate = $this->estate->get_by_id($delete_id[0]['estate_id']);
			$sub    = $this->stypes->delete_date($estate[0]['sub_type_id']);
			$file 	= $this->rental->get_document($delete_id[0]['id']);
			if(is_array($file))
			{
				foreach ($file as $key => $value)
				{
					$success= PUBPATH.'resources/assets/img/articles/'.$value['file_name'];
	      			@unlink($success); 
				}
			}
			$this->contract_m->delete_by_rental($id);
			$this->rental->delete($id);
			$this->session->set_flashdata('sucess','تم الحذف بنجاح');
			redirect('admin/rentals/directory/'.$delete_id[0]['estate_type'],'refresh');
		}
		
		public function details($id)
		{
			$params = array();
			$this->load->library('Arabic', $params);
		    $this->arabic->load('Mktime');
			$data['rows']     = $this->rental->get_by_id($id);			
			if(!empty($data['rows'][0]['start_contarct']) & !empty($data['rows'][0]['end_contarct']))
			{
				$start_date		  = date('Y-m-d',$data['rows'][0]['start_contarct']);
				$end_date		  = date('Y-m-d',$data['rows'][0]['end_contarct']);
				$data['start']	  = $this->ger->GregorianToHijri($start_date,'YYYY-MM-DD');
				$data['end']	  = $this->ger->GregorianToHijri($end_date,'YYYY-MM-DD');
			}
			else
			{
				$data['start']	  = $data['rows'][0]['start_contract_ger'];
				$data['end']	  = $data['rows'][0]['end_contract_ger'];
			}
			$data['pictures'] = $this->document->get_by_pic($id);
			$data['premium']  = $this->installment->get_by_id($id);
			$data['partial']  = $this->partial_payment->get_by_id($id);
			$data['title']    = "تفاصيل المستأجر "." " .$data['rows'][0]['t_name'];
			$this->load->view('rentals/details',$data);
		}
		
		public function add_documents()
		{
			$data['title'] = "رفع ملفات";
			$this->load->view('rentals/documents',$data);
		}
		
		public function month($month,$date,$contract_type)
		{		
			if(!empty($contract_type))
			{
				$start_date		  = $date;
				$tt				  = explode("-",$this->ger->GregorianToHijri($start_date,'YYYY-MM-DD'));
				$effectiveDate 	  = date('Y-m-d', $this->arabic->mktime(0,0,0,$tt[1]+$month,$tt[0],$tt[2]));
			}
			if(empty($contract_type))
			{
				$effectiveDate = date('Y-m-d', strtotime("+{$month} months",strtotime($date)));
			}
			return	$effectiveDate;			
		}
		
		public function pay_submitted($date)
		{		
			$start_date		  = $date;
			$tt				  = explode("-",$this->ger->GregorianToHijri($start_date,'YYYY-MM-DD'));
			$effectiveDate 	  = date('Y-m-d', $this->arabic->mktime(0,0,0,$tt[1],$tt[0],$tt[2]));			
			return $effectiveDate;
		}
		
		public function first_loop($month,$date,$contract_type)
		{
			if(!empty($contract_type))
			{
				$start_date		  = $date;
				$tt				  = explode("-",$this->ger->GregorianToHijri($start_date,'YYYY-MM-DD'));
				$effectiveDate 	  = date('Y-m-d', $this->arabic->mktime(0,0,0,$tt[1]+$month,$tt[0],$tt[2]));
			}
			if(empty($contract_type))
			{
				$effectiveDate = date('Y-m-d',strtotime($date));
			}
			return	$effectiveDate;	
		}
		
		public function calculation()
		{
			 $params = array();
			 $this->load->library('Arabic', $params);
		     $this->arabic->load('Mktime');
			 $tenant = $this->input->post('id');
			 $query	 = $this->rental->get_by_id($tenant);
			 $premium= $this->input->post('qua');
			 $month  = $this->input->post('quantity');
			 $amount = array();
			 if(!empty($query[0]['remaining']))
			 {
			 	$amount = $query[0]['remaining'];
			 }
			 else
			 {
				$amount = $query[0]['rent_price'];
			 }
			 if($query[0]['pay_submitted'] == 0)
			 {
			 	if(!empty($query[0]['start_contarct']))	
			 	{
					 $start_date    = date('Y-m-d',$query[0]['start_contarct']);
					 $tt 			= explode("-",$this->ger->GregorianToHijri($start_date,'YYYY-MM-DD'));
				 	 $period  	    = date('Y-m-d',  $this->arabic->mktime(0,0,0,$tt[1],$tt[0],$tt[2]));			 	
				  	 $amount 		= $query[0]['rent_price']+$query[0]['water'];
			 	}
			 	else
			 	{
			 		$period  = $query[0]['start_contract_ger'];
			 	}
			 }
			 else
			 {
			 	if(!empty($query[0]['start_contarct']))	
			 	{
				 	 $start_date	 = date('Y-m-d',$query[0]['start_contarct']);
					 $tt 			 = explode("-",$this->ger->GregorianToHijri($start_date,'YYYY-MM-DD'));
				 	 $period 		 = date('Y-m-d',  $this->arabic->mktime(0,0,0,$tt[1],$tt[0],$tt[2]));
			 	}
			 	else
			 	{
			 		$period  = $query[0]['start_contract_ger'];
			 	}
			 }
			 $find      = $this->installment->get_by_id($tenant);
			 for($x=1;$x<=$premium;$x++)
			 {
			 	$total = $amount/$premium;
			 	if($query[0]['pay_submitted'] == 0 & $x == 1)
			 	{
			 		if(!empty($query[0]['start_contarct']))
					$period = $this->pay_submitted($period);
					$this->installment->add($tenant,$total,$period);
			 	}
			 	elseif($x == 1)
			 	{
					 $period = $this->first_loop($month,$period,$query[0]['start_contarct']);
					 $this->installment->add($tenant,$total,$period);
			 	}			 	
			 	else 
			 	{
					 $period = $this->month($month,$period,$query[0]['start_contarct']);
					 $this->installment->add($tenant,$total,$period);
			 	}
			 }
		}

		public function pay()
		{
			$id = $this->uri->segment(4);
			$data['rows']  = $this->installment->get($id);
			$data['rental']= $this->rental->get_by_id($data['rows'][0]['rental_id']);
			$data['title'] = "سند قبض";
			$this->load->view('rentals/pay',$data);
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
					$unit     = $this->rental->get_by_id($this->input->post('rental_id'));
					$estate   = $this->estate->get_by_id($unit[0]['estate_id']);
					$sub_unit = $this->stypes->get_by_id($estate[0]['sub_type_id']);
					$var = "تحصيل قسط من" ." ".$sub_unit[0]['name'];
					$this->income_m->partial_payment(date("Y-m-d",$date),$var,$sub_unit[0]['id'],$recived);
					$this->installment->recived($date,$total);
					$this->report_m->add($this->input->post('rental_id'),$recived,$unit[0]['estate_type']);								
					$this->numbers->increment();
					$this->partial_payment->add($date,$recived);
					$this->session->set_flashdata('sucess','تم التسديد بنجاح');
					redirect('admin/rentals/details/'.$this->input->post('rental_id'));
				}
				else 
				{				
					$date     = now();
					$unit     = $this->rental->get_by_id($this->input->post('rental_id'));
					$estate   = $this->estate->get_by_id($unit[0]['estate_id']);
					$sub_unit = $this->stypes->get_by_id($estate[0]['sub_type_id']);
					$var = "تحصيل قسط من" ." ".$sub_unit[0]['name'];
					$this->income_m->add_voucher(date("Y-m-d",$date),$var,$sub_unit[0]['id']);
					$this->installment->paid($date);
					$this->numbers->increment();
					$this->report_m->add($this->input->post('rental_id'),$this->input->post('amount'),$unit[0]['estate_type']);	
					$this->session->set_flashdata('sucess','تم التسديد بنجاح');
					redirect('admin/rentals/details/'.$this->input->post('rental_id'));
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
			$data['rows']  = $this->installment->get($id);
			$fix = $this->arabic->dateCorrection($data['rows'][0]['pay_date']);
			$hdate = $this->arabic->date('Y-m-d ', $data['rows'][0]['pay_date'],$fix);
			$data['number']= $this->numbers->get_number();
			$data['sum']   = $this->installment->get_paid($data['rows'][0]['rental_id']);
			$data['rem']   = $this->installment->remaining($data['rows'][0]['rental_id']);
			$data['hdate'] = $hdate;
			$data['title'] = "سند رقم"." ".$data['rows'][0]['id'];
			$this->load->view('rentals/voucher',$data);
		}
		
		public function get_partial($id)
		{
			$params = array();
			$this->load->library('Arabic', $params);
		    $this->arabic->load('Date');
		    $this->arabic->setMode(1);
			$data['rows']  = $this->partial_payment->get($id);
			$fix = $this->arabic->dateCorrection($data['rows'][0]['pay_date']);
			$hdate = $this->arabic->date('Y-m-d ', $data['rows'][0]['pay_date'],$fix);
			$data['hdate'] = $hdate;
			$data['number']= $this->numbers->get_number();
			$data['rem']   = $data['rows'][0]['amount']-  $data['rows'][0]['partial_pay'];
			$data['title'] = "سند رقم"." ".$data['rows'][0]['id'];
			$this->load->view('rentals/partial_voucher',$data);
		}
		
		public function get_name($id)
		{
			
		}
		
		public function cheque()
		{
			$data = $_GET['type'];
			if($data == "cheque")
			{
				$this->load->view('rentals/cheque');
			}
			if($data == "cash")
			{
				
			}
		}
		
		public function date_type()
		{
			$data = $_GET['type'];
			if($data == "hijri")
			{
				$this->date_m->hijri();
			}
			if($data == "ger")
			{
				$this->date_m->ger();
			}
		}
		
		public function delete_installment($id)
		{
			$this->installment->delete_installment($id);
			$this->session->set_flashdata('sucess','تم الحذف بنجاح');
			redirect('admin/rentals/details/'.$this->uri->segment(5).'/'.$this->uri->segment(5),'refresh');
		}
		
		public function delete_partial($id)
		{
			$this->installment->delete_installment($id);
			$this->session->set_flashdata('sucess','تم الحذف بنجاح');
			redirect('admin/rentals/details/'.$this->uri->segment(5).'/'.$this->uri->segment(5),'refresh');
		}
	}