<?php echo $this->load->view('inculdes/header')?>
<script type="text/javascript">
				jQuery(function($) {
				$('#emp').dataTable({
				 "sPaginationType": "full_numbers",
					"bStateSave": true,
					"bProcessing": true,
					"bJQueryUI": true,
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
			        "sLast":     "الأخير",			  
			    }
				}
				
			    } );
			} );
		</script>
<style>
.qty {
    width: 40px;
    height: 25px;
    text-align: center;
}
.qtyplus { width:25px; height:25px;}
.qtyminus { width:25px; height:25px;}
</style>
<style>
.qua {
    width: 40px;
    height: 25px;
    text-align: center;
}
#qtyplus { width:25px; height:25px;}
#qtyminus { width:25px; height:25px;}
</style>
<script type="text/javascript">

jQuery(function($) {
	$( "#tabs" ).tabs();
});
</script>
<style media="print">
body { font-family: Verdana; text-decoration:underline; font-color:red; }
</style>

<title><?php echo $title;?></title>

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
					
				<p id="back"><?php echo anchor('admin/rentals/index','العودة لصفحة الإيجارات');?></p>
				<div id="tabs">
					<ul>
						<li><a href="#tabs-1">سندات قسم الطباعة</a></li>
						<li><a href="#tabs-2">سندات الاقساط</a></li>
						<li><a href="#tabs-3">سندات التسديد الجزئي</a></li>
					</ul>
	<div id="tabs-1">
		<?php if(is_array($single_vocher)):$i=0; ?>
			 <table id="emp" border="2" class="jtable">
       	 		<thead><tr><th>#</th><th>المبلغ</th><th>إسم الموظف</th><th>حالة الطباعة</th><th>الإجراء</th></tr></thead>
				 <?php foreach($single_vocher as $key => $value):	 $i++;
				 	$name = $this->users->get_by_id($value['user_id']);?>
				 	<tr>
	                	<td><?php echo $i?></td>
	                	<td><?php echo number_format(round($value['amount']),0,'.',",")." " ."ريال"?></td>
	                	<td><?php echo $name[0]['first_name'];?></td>
	                	<td><?php if($value['privilege'] == 1){echo "معطله";}else{"مسموح";};?></td>
		                <td><input type="checkbox" name="ch[]" id="recive" value="<?php echo $value['id']?>"></td>
    	            </tr>			 
       			<?php endforeach; ?>
			</table>
			<?php endif;?>
		</div>
	<div id="tabs-2">
		<?php if(is_array($installment)):$i=0; ?>
			 <table id="emp" border="2" class="jtable">
       	 		<thead><tr><th>#</th><th>المبلغ</th><th>إسم الموظف</th><th>حالة الطباعة</th><th>الإجراء</th></tr></thead>
				 <?php foreach($installment as $key => $value):	 $i++;
				 	$name = $this->users->get_by_id($value['user_id']);?>
				 	<tr>
	                	<td><?php echo $i?></td>
	                	<td><?php echo number_format(round($value['amount']),0,'.',",")." " ."ريال"?></td>
	                	<td><?php echo $name[0]['first_name'];?></td>
	                	<td><?php if($value['privilege'] == 1){echo "معطله";}else{"مسموح";};?></td>
		                <td><input type="checkbox" name="ch[]" id="recive" value="<?php echo $value['id']?>"></td>
    	            </tr>			 
       			<?php endforeach; ?>
			</table>
			<?php endif;?>
		</div>
	<div id="tabs-3">
		<?php if(is_array($partial)):$i=0; ?>
			 <table id="emp" border="2" class="jtable">
       	 		<thead><tr><th>#</th><th>المبلغ</th><th>إسم الموظف</th><th>حالة الطباعة</th><th>الإجراء</th></tr></thead>
				 <?php foreach($partial as $key => $value):	 $i++;
				 	$name = $this->users->get_by_id($value['user_id']);?>
				 	<tr>
	                	<td><?php echo $i?></td>
	                	<td><?php echo number_format(round($value['amount']),0,'.',",")." " ."ريال"?></td>
	                	<td><?php echo $name[0]['first_name'];?></td>
	                	<td><?php if($value['privilege'] == 1){echo "معطله";}else{"مسموح";};?></td>
		                 <td><input type="checkbox" name="ch[]" id="recive" value="<?php echo $value['id']?>"></td>
    	            </tr>			 
       			<?php endforeach; ?>
			</table>
			<?php endif;?>
	</div>	
</div>
 <?php echo $this->load->view('inculdes/footer');