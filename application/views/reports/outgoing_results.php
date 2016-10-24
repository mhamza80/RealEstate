<?php echo $this->load->view('inculdes/header')?>
<script  src="<?php echo base_url()?>js/jquery.printElement.min.js" type="text/javascript"></script>
<script type="text/javascript">
jQuery(function($) {
	$('a.print').click(function(){
		$("#emp").printElement(
	            {
	            overrideElementCSS:[
			'<?php echo base_url('css/cp/income.css')?>']
	            });
	});
});
</script>
<script type="text/javascript">
$(document).ready(function() {
	$('#emp').dataTable( {
		 "sPaginationType": "full_numbers",
			"bStateSave": true,
			"bProcessing": true,
			"bJQueryUI": true,
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
									 'mColumns':[0,1,2,3,4],
									"sButtonText": "تصدير إكسل"
								}
							]
			},
			"bLengthChange": false,
	                            "bFilter": true,
	                            "bSort":false,
	                            "bInfo": true,
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
	});
});
		</script>
<title><?php echo $title;?></title>
<div class="box">
	<div class="title">
						<h5><?php echo $title;?> </h5>
					</div>
<?php if(empty($rows)){?>
		<div id="message-warning" class="message message-warning">
								<div class="image">
									<img src="<?php echo base_url('resources/images/icons/warning.png')?>" alt="warning" height="32" />
								</div>
								<div class="text">
									<span><?php echo "لا توجد نتائج للبحث حسب التاريخ المدخل"?></span>
								</div>
								<div class="dismiss">
									<a href="#message-warning"></a>
								</div>
							</div>
							<?php }?>
				
			<div class="table">
								<?php if(is_array($result)){$i = 0;?>
								<table id="emp" border="2" class="jtable">
					       			 <thead><tr><th>رقم</th><th>المبلغ</th><th>التاريخ</th><th>الإيضاح</th></tr>
					        		<?php foreach ($result as $key => $list):
					      				$i++;
					        			 ?>
					        		 </thead>
					                <tr>
					               		 <td><?php echo $i?></td>
						                 <td><?php echo number_format(round($list['amount']),0,'.',",")." " ."ريال";?></td>
						                 <td><?php echo $this->ger->GregorianToHijri($list['date'],'YYYY-MM-DD');?></td>
						                 <td><?php echo $list['Illustration'];?></td>						            			           
					    	         </tr>
					          		  <?php endforeach; ?>
					            		<tfoot>
    										 <TR> <td colspan="6"> مجموع المصروفات: <?php echo number_format(round($count->amount),0,'.',",")." " ."ريال";?></td></tr>
										</tfoot>
								</table>
							<?php }				
echo $this->load->view('inculdes/footer');	