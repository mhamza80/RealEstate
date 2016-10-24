<?php echo $this->load->view('inculdes/header')?>
<script  src="<?php echo base_url()?>resources/scripts/table.js" type="text/javascript"></script>
<title><?php echo $title;?></title>
<script type="text/javascript">
$(document).ready(function() {
	$('#emp').dataTable( {
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
    
		},
		"fnFooterCallback": function ( nRow, aaData, iStart, iEnd, aiDisplay ) {
			var iTotalMarket = 0;
			for ( var i=0 ; i<aaData.length ; i++ )
			{
				iTotalMarket += aaData[i][2]*1;
			}
			var iPageMarket = 0;
			for ( var i=iStart ; i<iEnd ; i++ )
			{
				iPageMarket += aaData[ aiDisplay[i] ][6]*1;
			}
			var nCells = nRow.getElementsByTagName('th');
            nCells[0].innerHTML = parseInt(iPageMarket)+ " " + " ريال"  + " " + 'مجموع الإيرادات';
		}
	} );
} );
		</script>
<div class="box">
<?php if ($this->session->flashdata('sucess')){?>
		<div id="message-success" class="message message-success">
								<div class="image">
									<img src="<?php echo base_url('resources/images/icons/success.png')?>" alt="Success" height="32" />
								</div>
								<div class="text">
									<span><?php echo $this->session->flashdata('sucess')?></span>
								</div>
								<div class="dismiss">
									<a href="#message-success"></a>
								</div>
							</div>
							<?php }?>
					<div class="title">

					<h5><?php echo $title;?> </h5>
					</div>
					<div class="table">
<?php if(empty($rows)){?>
		<div id="message-warning" class="message message-warning">
								<div class="image">
									<img src="<?php echo base_url('resources/images/icons/warning.png')?>" alt="warning" height="32" />
								</div>
								<div class="text">

									<span><?php echo "لا يوجد نتائج حسب التاريخ المدخل"?></span>
								</div>
								<div class="dismiss">
									<a href="#message-warning"></a>
								</div>
							</div>
							<?php }
				if(is_array($rows)){$i = 0;$m=0?>
						<table id="emp" border="0" class="jtable">
					        <thead><tr><th>رقم </th><th>العقار</th><th>المستأجر</th><th>الإيجار السنوي</th><th>بداية العقد</th><th>نهاية العقد</th><th>المستلم</th><th>المتبقي</th><th>مدة البحث</th><th>حالة الوحدة</th></tr></thead>	
					        <tbody>	
								<?php 	foreach ($rows as $key => $value) {$i++;				
											$rental = $this->rental->get_by_id($value['rental_id']);
											$estate = $this->estate->get_by_id($rental[0]['estate_id']);
											$units  = $this->stypes->get_by_id($rows[0]['id']);
											$rem 	= $this->rental->remaining($rental[0]['id']); 
											$unit	= $this->stypes->get_by_id($estate[0]['sub_type_id']);
											$income = $this->income_m->units($rental[0]['id'],$from,$to);?>								
					                <tr>
					                	 <td><?php echo $i?></td>
						                 <td><?php echo $estate[0]['estate_name'];?></td>
						                 <td><?php echo $rental[0]['t_name'];?></td>
						                 <td><?php echo number_format($rental[0]['annual_rent'],0,'.',",")." ريال";?></td>
						                 <td><?php echo $this->ger->GregorianToHijri(date('Y-m-d',$rental[0]['start_contarct']),'YYYY-MM-DD')?></td>
						                 <td><?php echo $this->ger->GregorianToHijri(date('Y-m-d',$rental[0]['end_contarct']),'YYYY-MM-DD')?></td>
					                  	 <td><?php echo $income->amount;?></td>
					                  	 <td><?php echo number_format($rem[0]['amount'],0,'.',",")." ريال";?></td>
					                  	 <td><?php echo timespan(strtotime($from),strtotime($to))?></td>
					                  	 <td><?php if($unit[0]['status'] == 1){ echo "غير شاغرة";} else{echo "شاغرة";}?></td>
					    	       </tr>
					            	<?php } ?>
					            	</tbody>
					            	<tfoot>
						            	<tr>
						            		<th colspan="10"></th>
						            	</tr>
								   </tfoot>
							</table>
							<?php }											
echo $this->load->view('inculdes/footer');	