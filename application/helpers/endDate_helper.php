<?php

	 function endDate($estate_id)
	 {
		 $CI2 = get_instance();
		 $CI2->load->model('rental');
		 $hjiri =& get_instance();
		 $hjiri->load->library('ger');
		 $tenant = $CI2->rental->get_by_id($estate_id);
		 if(is_array($tenant))
		 {
		 	foreach ($tenant as $key => $value) {
			 	if(!empty($value['start_contarct']) & !empty($value['end_contarct']))
				{
					$start_date		  = date('Y-m-d',$value['start_contarct']);
					$end_date		  = date('Y-m-d',$value['end_contarct']);
									   $hjiri->ger->GregorianToHijri($start_date,'YYYY-MM-DD');
					echo	   		  $hjiri->ger->GregorianToHijri($end_date,'YYYY-MM-DD');
				}
				else
				{
						$value['start_contract_ger'];
					echo	 $value['end_contract_ger'];
				}
		 	}
		 }		 		 		
	 }
		
		
	