<script type="text/javascript">
jQuery(function($) {
$('#empp').dataTable({
 "sPaginationType": "full_numbers",
	"bStateSave": true,
	"bProcessing": true,
	"bJQueryUI": true,
	"bLengthChange": true,
                        "bFilter": true,
                        "bSort":false,
                        "bInfo": true,
                        "sDom": '<"H"Tfr>t<"F"ip>',
            			"oTableTools": {
            				"sSwfPath": "http://localhost/estate/resources/scripts/copy_csv_xls_pdf.swf",							
            				"aButtons": [
            								{
            									"sExtends": "copy",
            									"sButtonText": "نسخ"
            								},								
            								{
            									"sExtends": "print",
            									'mColumns':[0,1,2,3,4],
            									"sButtonText": "طباعة"
            								},
            								{
            									"sExtends": "xls",
            									 'mColumns':[1,2,3],
            									"sButtonText": "تصدير إكسل"
            								}
            							]
            			},
	 "oLanguage": {
	"sProcessing":   "جاري التحميل...",
"sLengthMenu":   "أظهر مُدخلات _MENU_",
"sZeroRecords":  "لم يُعثر على أية سجلات",
"sInfo":         "إظهار _START_ إلى _END_ من أصل _TOTAL_ مُدخل",
"sInfoEmpty":    "يعرض 0 إلى 0 من أصل 0 سجلّ",
"sInfoFiltered": "(منتقاة من مجموع _MAX_ مُدخل)",
"sInfoPostFix":  "",
"sSearch":       "ابحث:",
"oPaginate": {
    "sFirst":    "الأول",
    "sPrevious": "السابق",
    "sNext":     "التالي",
    "sLast":     "الأخير"
	}
}
} );
} );
</script>
<script type="text/javascript">
jQuery(function($) {
$('#long').dataTable({
 "sPaginationType": "full_numbers",
	"bStateSave": true,
	"bProcessing": true,
	"bJQueryUI": true,
	"bLengthChange": true,
                        "bFilter": true,
                        "bSort":false,
                        "bInfo": true,
                        "sDom": '<"H"Tfr>t<"F"ip>',
            			"oTableTools": {
            				"sSwfPath": "http://localhost/estate/resources/scripts/copy_csv_xls_pdf.swf",							
            				"aButtons": [
            								{
            									"sExtends": "copy",
            									"sButtonText": "نسخ"
            								},								
            								{
            									"sExtends": "print",
            									'mColumns':[0,1,2,3,4],
            									"sButtonText": "طباعة"
            								},
            								{
            									"sExtends": "xls",
            									 'mColumns':[1,2,3],
            									"sButtonText": "تصدير إكسل"
            								}
            							]
            			},
	 "oLanguage": {
	"sProcessing":   "جاري التحميل...",
"sLengthMenu":   "أظهر مُدخلات _MENU_",
"sZeroRecords":  "لم يُعثر على أية سجلات",
"sInfo":         "إظهار _START_ إلى _END_ من أصل _TOTAL_ مُدخل",
"sInfoEmpty":    "يعرض 0 إلى 0 من أصل 0 سجلّ",
"sInfoFiltered": "(منتقاة من مجموع _MAX_ مُدخل)",
"sInfoPostFix":  "",
"sSearch":       "ابحث:",
"oPaginate": {
    "sFirst":    "الأول",
    "sPrevious": "السابق",
    "sNext":     "التالي",
    "sLast":     "الأخير"
	}
}
} );
} );
</script>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	function rent($var,$period)
	{
		$i=0;
		$tmpl = array ('table_open'=>'<table  id="empp">');
		$CI =& get_instance();
		$CI->load->library('table');
		$hjiri =& get_instance();
		$hjiri->load->library('ger');
		$CI->table->set_heading('رقم', 'العقار','إسم المستأجر','قيمة الإيجار', 'تاريخ إنتهاء العقد','هاتف المستأجر','التفاصيل','تجديد العقد','حالة التأخير');
		foreach ($var as $key => $value):$i++;
			$CI2 = get_instance();
			$CI2->load->model('rental');
			$tenant = $CI2->rental->get_by_id($value['id']);
			$ess = get_instance();
			$ess->load->model('estate');
			$estatee = $ess->estate->get_by_id($tenant[0]['estate_id']);
			$typee   = $ess->estate->get_type($estatee[0]['estate_type']);
			$compare = strtotime("+".$period.'days');
			$late	 = strtotime("-".'30'.'days');
			if(!empty($value['end_contarct']))
			{
				$timestamp = $value['end_contarct'];
				$end = $hjiri->ger->GregorianToHijri(date('Y-m-d',$value['end_contarct']),'YYYY-MM-DD');				
			}
			if(empty($value['end_contarct']))
			{
				$timestamp = strtotime($value['end_contract_ger']);
				$end       = date('Y-m-d',strtotime($value['end_contract_ger']));
			}		
			if($late > $timestamp )
				$color = "<img src=".base_url()."resources/images/icons/alarm-bell.-red.png>";
				else
					$color = "<img src=".base_url()."resources/images/icons/alarm-bell.png>";
			if($compare > $timestamp)
			{		
							
				$CI->table->add_row($estatee[0]['estate_name'],$typee[0]['type'],$value['t_name'],number_format($value['annual_rent']),$end,anchor('admin/sms/send/'.$value['t_phone'].'/'.$value['id'],$value['t_phone']),anchor('admin/rentals/details/'.$value['id'].'/' .$value['id'],'عرض'),anchor('admin/rentals/edit/'.$value['id'],'تعديل','id=edit'),$color);
				
			}
		endforeach;	
		$CI->table->set_template($tmpl);
		echo $CI->table->generate();		
	}
	
	
	
	function installment($installment,$alert)
	{
		$i=0;
		$tmpl = array ('table_open'=>'<table  id="eme">');
		$CI =& get_instance();
		$CI->load->library('table');
		$hijri =& get_instance();
		$hijri->load->library('hijri',1);
		$CI->table->set_heading('رقم','العقار','إسم المستأجر','قيمة الإيجار', 'تاريخ الإستحقاق', 'الملبغ المستحق','هاتف المستأجر','التفاصيل','حالة التأخير');
		foreach ($installment as $key => $value):$i++;
			$CI2 = get_instance();
			$CI2->load->model('rental');
			$tenant = $CI2->rental->get_by_id($value['rental_id']);
			$es = get_instance();
			$es->load->model('estate');
			$estate = $es->estate->get_by_id($tenant[0]['estate_id']);
			$type   = $es->estate->get_type($estate[0]['estate_type']);
			$timestamp = strtotime($value['date']);
			$compare = strtotime("+".$alert.'days');
			$late	 = strtotime("-".'30'.'days');
			if(!empty($tenant[0]['start_contarct']))
			{
				$end = $hijri->hijri->date("Y-m-d",strtotime($value['date']));
			}
			if(empty($tenant[0]['start_contarct']))
			{
				$end = date("Y-m-d",strtotime($value['date']));
			}
			if($late > $timestamp )
				$color = "<img src=".base_url()."resources/images/icons/alarm-bell.-red.png>";
				else
					$color = "<img src=".base_url()."resources/images/icons/alarm-bell.png>";
			if($compare > $timestamp)
			{
				$CI->table->add_row($estate[0]['estate_name'],$type[0]['type'], $tenant[0]['t_name'],number_format($tenant[0]['annual_rent']),$end,number_format($value['amount']),anchor('admin/sms/send/'.$tenant[0]['t_phone'].'/'.$tenant[0]['id'],$tenant[0]['t_phone']),anchor('admin/rentals/details/'.$tenant[0]['id'].'/' .$tenant[0]['id'],'عرض'),$color);
			}
		endforeach;
			$CI->table->set_template($tmpl);
			echo $CI->table->generate();							
	}
	
	
	
	
	
	
	
	
	
	
	
	
	function long_contarcts($installment,$alert)
	{
		$i=0;
		$tmpl = array ('table_open'=>'<table  id="long">');
		$CI3 =& get_instance();
		$CI3->load->library('table');
		$hijri =& get_instance();
		$num = 0;
		$hijri->load->library('hijri',1);
		$CI3->table->set_heading('#','العقار','تاريخ الإستحقاق','قيمة القسط','التفاصيل');
		foreach ($installment as $key => $value):$num++;
			$CI4 = get_instance();
			$CI4->load->model('long_contract');
			$tenant = $CI4->long_contract->get_sub_estate($value['rental_id']);
			$esss = get_instance();
			$timestamp = $value['date'];
			$compare = strtotime("+".$alert.'days');
			if(!empty($tenant[0]['start_contarct']))
			{
				$end = $hijri->hijri->date("Y-m-d",strtotime($value['date']));
			}
			if(empty($tenant[0]['start_contarct']))
			{
				$end = date("Y-m-d",strtotime($value['date']));
			}
			if($compare > $timestamp)
			{
				$CI3->table->add_row($num,$tenant[0]['t_name'],number_format($value['amount']),date("Y-m-d",$value['date']),anchor('admin/contracts/details/'.$tenant[0]['id'].'/' .$tenant[0]['id'],'عرض'));
			}
		endforeach;
			$CI3->table->set_template($tmpl);
			echo $CI3->table->generate();							
	}