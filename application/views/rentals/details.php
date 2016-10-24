<?php echo $this->load->view('inculdes/header')?>
<link href="<?php echo base_url();?>css/cp/jquery.fancybox.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>css/cp/style.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>css/cp/thickbox.css" rel="stylesheet" type="text/css">
<script  src="<?php echo base_url()?>js/jquery.fancybox.js" type="text/javascript"></script>
<script  src="<?php echo base_url()?>js/jquery.accordion.js" type="text/javascript"></script>
<script  src="<?php echo base_url()?>js/jquery.easing.1.3.js" type="text/javascript"></script>
<script  src="<?php echo base_url()?>js/jquery.printElement.min.js" type="text/javascript"></script>
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
<script type="text/javascript">
jQuery(function($) {
	$(".various").fancybox({
		type: 'ajax',
		'maxWidth'	: 730,
		'maxHeight'	: 600,
		'autoSize'	: true
	});
		});
</script>
<script type="text/javascript">
jQuery(function($) {
	$(".post_images").fancybox({
		'maxWidth'	: 730,
		'maxHeight'	: 600,
		'autoSize'	: true
	});
		});
</script>
<script type="text/javascript">
jQuery(function($) {
	$('a.media').click(function(){
	$('a.media').media({width:300, height:200});
		});
});
</script>
<script type="text/javascript">
jQuery(function($) {
	$('a.print').click(function(){
		$("#print").printElement(
	            {
	            overrideElementCSS:[
			'<?php echo base_url('css/cp/print.css')?>']
	            });
	});
});
</script>
<script type="text/javascript">
 jQuery(document).ready(function(){
	    // This button will increment the value
	    $('#qtyplus').click(function(e){
	        // Stop acting like a button
	        e.preventDefault();
	        // Get the field name
	        fieldName = $(this).attr('field');
	        // Get its current value
	        var currentVal = parseInt($('input[name='+fieldName+']').val());
	        // If is not undefined
	        if (!isNaN(currentVal)) {
	            // Increment
	            $('input[name='+fieldName+']').val(currentVal + 1);
	        } else {
	            // Otherwise put a 0 there
	            $('input[name='+fieldName+']').val(0);
	        }
	    });
	    // This button will decrement the value till 0
	    $("#qtyminus").click(function(e) {
	        // Stop acting like a button
	        e.preventDefault();
	        // Get the field name
	        fieldName = $(this).attr('field');
	        // Get its current value
	        var currentVal = parseInt($('input[name='+fieldName+']').val());
	        // If it isn't undefined or its greater than 0
	        if (!isNaN(currentVal) && currentVal > 0) {
	            // Decrement one
	            $('input[name='+fieldName+']').val(currentVal - 1);
	        } else {
	            // Otherwise put a 0 there
	            $('input[name='+fieldName+']').val(0);
	        }
	    });
	});

</script>
 <script type="text/javascript">
 jQuery(document).ready(function(){
	    // This button will increment the value
	    $('.qtyplus').click(function(e){
	        // Stop acting like a button
	        e.preventDefault();
	        // Get the field name
	        fieldName = $(this).attr('field');
	        // Get its current value
	        var currentVal = parseInt($('input[name='+fieldName+']').val());
	        // If is not undefined
	        if (!isNaN(currentVal)) {
	            // Increment
	            $('input[name='+fieldName+']').val(currentVal + 1);
	        } else {
	            // Otherwise put a 0 there
	            $('input[name='+fieldName+']').val(0);
	        }
	    });
	    // This button will decrement the value till 0
	    $(".qtyminus").click(function(e) {
	        // Stop acting like a button
	        e.preventDefault();
	        // Get the field name
	        fieldName = $(this).attr('field');
	        // Get its current value
	        var currentVal = parseInt($('input[name='+fieldName+']').val());
	        // If it isn't undefined or its greater than 0
	        if (!isNaN(currentVal) && currentVal > 0) {
	            // Decrement one
	            $('input[name='+fieldName+']').val(currentVal - 1);
	        } else {
	            // Otherwise put a 0 there
	            $('input[name='+fieldName+']').val(0);
	        }
	    });
	});
</script>

<script type="text/javascript">
$(document).ready(function() { 
    // bind form using ajaxForm 
    $('#myform').ajaxForm({ 
        // target identifies the element(s) to update with the server response 
        target: '#htmlExampleTarget', 
 
        // success identifies the function to invoke when the server response 
        // has been received; here we apply a fade-in effect to the new content 
        success: function() {
        	alert('تم حساب الاقساط بنجاح ');
        	window.setTimeout(function(){location.reload()},500); 
            $('#htmlExampleTarget').fadeIn('slow'); 
        } 
    }); 
});
</script>

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
						<li><a href="#tabs-1">التفاصيل</a></li>
						<li><a href="#tabs-2">المستندات</a></li>
						<li><a href="#tabs-3">الإقساط</a></li>
						<li><a href="#tabs-4">تسديد جزئي</a></li>
					</ul>
	<div id="tabs-1">
		<div id="printt" style="display:none">
				</div>
			<a class="print" href='#'><img alt="" src="<?php  echo base_url('resources/images/icons/printer.png')?>" title="transaction">
				
				</a>

	<div id="print">
	<div id="worker-info" style="direction:rtl; ">
	<?php $estate = $this->estate->get_by_id($rows[0]['estate_id'])?>
	<ul>
	<li><strong>المؤجر :</strong> <?php echo $rows[0]['owner'];?></li>
	<li><strong>المستأجر :</strong> <?php echo $rows[0]['t_name'];?></li>
	<li><strong>العنوان :</strong> <?php echo $rows[0]['t_address'];?></li>
	<li><strong>الجوال:</strong> <?php echo $rows[0]['t_phone'];?></li>
	<li><strong>الجنسية :</strong> <?php echo $rows[0]['nationality'];?></li>
	<li><strong>رقم الهوية:</strong> <?php echo $rows[0]['Identity'];?></li>
	<li><strong>مصدرها :</strong> <?php echo $rows[0]['id_plcae'];?></li>
	<li><strong>تاريخها :</strong> <?php echo  $rows[0]['id_issue'];?></li>
	<li><strong> العقار:</strong> <?php echo $estate[0]['estate_name'];?></li>
	<li><strong>نوع العقد المؤجر :</strong> <?php echo $rows[0]['contract_type'];?></li>
	<li><strong>الموقع :</strong> <?php echo $rows[0]['location'];?></li>
	<li><strong>الشارع :</strong> <?php echo $rows[0]['street'];?></li>
	<li><strong>مدة العقد :</strong> <?php echo $rows[0]['duration'];?></li>
 	<li><strong>بداية العقد :</strong> <?php echo $start?></li>
	<li><strong>نهاية العقد :</strong> <?php echo $end;?></li>
	<li><strong>سعر الإيجار :</strong><?php echo  number_format($rows[0]['rent_price'],0,'.',",")." ريال"; ?></li>
	<li><strong>الإيجار السنوى :</strong> <?php echo number_format($rows[0]['annual_rent'],0,'.',",")." ريال";?></li>
	<li><strong>مقدم الإيجار :</strong> <?php echo number_format($rows[0]['pay_submitted'],0,'.',",")." ريال";;?></li>
	<li><strong>المتبقى :</strong> <?php echo number_format($rows[0]['remaining'],0,'.',",")." ريال";;?></li>
	<li><strong>شروط الدفع :</strong> <?php echo $rows[0]['condition'];?></li>
	<li><strong>تكلفة المياه :</strong> <?php echo number_format($rows[0]['water'],0,'.',",")." ريال";?></li>
	<li><strong>المستفيد :</strong> <?php if($rows[0]['recipient'] == 0){echo "أفراد";}else{echo "شركات";}?></li>
	<li><strong>الغرض من السكن :</strong> <?php echo $rows[0]['purpose'];?></li>
	<li><strong>معلومات إضافية :</strong> <?php echo $rows[0]['info'];?></li>
	</ul>
	</div>
	</div>
	 <?php echo anchor('admin/archive/add/'.$rows[0]['id'],'إلي الأرشيف',array('id'=>'dialog-confirm-open','class'=>'archive'));?>
	</div>
	<div id="tabs-2">
	<?php 
	$documents = $this->rental->get_document($rows[0]['id']);
	if(empty($documents)):
		echo anchor('admin/rentals/add_documents/'.$rows[0]['id'],'إضافة مستند جديد',"id=addicon2");?>
	<div id="message-warning" class="message message-warning">
								<div class="image">
									<img src="<?php echo base_url('resources/images/icons/warning.png')?>" alt="Success" height="32" />
								</div>
								<div class="text">
									<span><?php echo "لا توجد اي مستندات خاصة بهذه المعاملة"?></span>
								</div>
								<div class="dismiss">
									<a href="#message-warning"></a>
								</div>
							</div>
							<?php endif;
							
			if(is_array($documents))
			{   $i = 0;
				echo anchor('admin/rentals/add_documents/'.$rows[0]['id'],'إضافة مستند جديد',"id=addicon2");?>			
			<table id="emp" border="2" class="jtable">
       	 		<thead><tr><th>رقم </th><th>عنوان المستند</th><th>تاريخ الإضافة</th><th>تحرير</th></tr>
        		<?php foreach ($documents as $key => $list):
	      			$i++;
	      			$cut_date = explode(" ", $documents[0]['added_date'])
        		 ?>
        	 	</thead>
                <tr>
                	<td><?php echo $i?></td>
	                <td><?php echo $list['file_name'];?></td>
	                <td><?php echo $cut_date[0];?></td>
                    <td>
						<?php
						echo anchor('admin/upload/delete_document/'.$list['file_name'].'/'.$list['id'].'/'.$this->uri->segment(4),'حذف',array('id'=>'dialog-confirm-open','class'=>'test'));
						echo " | ";?>
						<a target="_blank" href="<?php echo base_url()."resources/assets/img/articles/".$list['file_name']?>" onclick="open(this.href, this.target, 'width=600, height=450, top=200, left=250'); return false;">عرض</a>
					</td>
    	           </tr>
            <?php endforeach; ?>
		</table>
	<?php }?>
	</div>
	<div id="dialog-add-pay" title="إضافة">
			<p class="validateTips">جميع الحقول إحبارية.</p>
			<?php echo form_open_multipart('admin/rentals/vouchers','id=vo' )?>
			<div class="form">
				<div class="fields">
					<div class="field">
						<div class="label">
							<label for="autocomplete">المبلغ:</label>
						</div>
						<div class="input">
							<input type="text" name="amount" id="amount" value="<?php ?>">
						</div>
					</div>
					<div class="field">
						<div class="label">
							<label for="autocomplete"> الإسم:</label>
						</div>
						<div class="input">
							<input type="text" name="name" id="name">
						</div>
					</div>
					<div class="field">
						<div class="label">
							<label for="autocomplete"> أمين الصندوق:</label>
						</div>
						<div class="input">
							<input type="text" name="ammen" id="ammen">
						</div>
					</div>
					<div class="field">
						<div class="label">
							<label for="autocomplete"> إسم المستلم:</label>
						</div>
						<div class="input">
							<input type="text" name="receiver" id="reciver">
						</div>
					</div>
						<div class="field">
						<div class="label">
							<label for="autocomplete"> وذلك مقابل:</label>
						</div>
						<div class="input">
							<textarea rows="4" cols="50" name="reason" id = "reason">
							</textarea>
						</div>
					</div>
				</div>
			</div>
			<?php echo form_hidden('rental_id',$this->uri->segment(4))?>
			<?php echo form_close();?>
		</div>
	<div id="tabs-3">
		<?php echo form_open_multipart('admin/rentals/calculation','id="myform"')?>
		<div class="field">
				<label for="name">عدد الاقساط</label>
				<input type="button" value='-' id="qtyminus" field="qua"/>
			    <input type="text" name='qua' value='0' class="qua" />
			    <input type='button' value='+' id="qtyplus" field='qua' />
			</div>
			<div class="field">
				<label for="name">عدد الأشهر</label>
				<input type="button" value='-' class="qtyminus" field="quantity"/>	
			    <input type="text" name='quantity' value='0' class="qty" />
			    <input type='button' value='+' class="qtyplus" field='quantity' />
			</div>
			<?php echo form_hidden("id",$rows[0]['id']);?>
			<?php echo form_submit('submit','احسب' , 'id=button-save');?>
			<?php echo form_close()?>
			<div id="htmlExampleTarget">
			<?php if(is_array($premium)):$i=0; ?>
			 <table id="emp" border="2" class="jtable">
       	 		<thead><tr><th>قسط</th><th>المبلغ</th><th>تاريخ الإستحقاق</th><th>الحالة</th><th>إجراء</th></tr>
				 <?php foreach($premium as $key => $value):
				 		$rental = $this->rental->get_by_id($value['rental_id']);
				 		 $i++;?>
					</thead>
				 	<tr>
                	<td><?php echo $i?></td>
                	<td><?php echo number_format(round($value['amount']),0,'.',",")." " ."ريال"?></td>                	
	                <td><?php if(empty($rental[0]['start_contarct'])){echo date('d/m/Y',strtotime($value['date']));} if(!empty($rental[0]['start_contarct'])){echo $this->ger->GregorianToHijri($value['date'],'YYYY-MM-DD');}?></td>
	                <td><?php if($value['status'] == 0 ){echo anchor('admin/rentals/pay/'.$value['id'],'تسديد','id=button-save');}else{echo anchor('admin/rentals/get_voucher/'.$value['id'],'تم السداد بسند رقم'." ".$value['id']);}?></td>
	                <?php if($this->session->userdata('rols') ==1 ):?>
	               		<td><?php echo anchor('admin/rentals/delete_installment/'.$value['id'].'/'.$value['rental_id'],'حذف',array('id'=>'dialog-confirm-open','class'=>'test'));?></td>
	                <?php endif;?>
    	            </tr>			 
       			<?php endforeach; ?>
			</table>
			<?php endif;?>
		</div>
	</div>
	<div id="tabs-4">
		<?php if(is_array($partial)):$i=0; ?>
			 <table id="emp2" border="2" class="jtable">
       	 		<thead><tr><th>قسط</th><th> كامل المبلغ المستحق</th><th>المبلغ المستلم</th><th>المبلغ المتبقي</th><th>تاريخ الإستحقاق</th><th>الحالة</th><th>إجراء</th></tr>
				 <?php foreach($partial as $key => $value):	 $i++;
				 	$date = $this->installment->get($value['intstallment_id']);
				 	$rem = $value['amount']- $value['partial_pay'];
				 	$rental = $this->rental->get_by_id($value['rental_id']);?>
					</thead>
				 	<tr>
	                	<td><?php echo $i?></td>
	                	<td><?php echo number_format(round($value['amount']),0,'.',",")." " ."ريال"?></td>
	                	<td><?php echo number_format(round($value['partial_pay']),0,'.',",")." " ."ريال"?></td>
	                	<td><?php echo number_format(round($rem),0,'.',",")." " ."ريال"?></td>
	                	<td><?php if(!empty($rental[0]['start_contarct'])) {$fix = $this->hijri->dateCorrection(strtotime($date[0]['date']));
		                 echo $this->hijri->date('Y-m-d',strtotime($date[0]['date']),$fix);}else{echo $date[0]['date'];}?></td>
		                <td><?php if($value['status'] == 0 ){echo anchor('admin/rentals/pay/'.$value['id'],'تسديد','id=button-save');}else{echo anchor('admin/rentals/get_partial/'.$value['id'],'تم السداد ');}?></td>
		                <?php if($this->session->userdata('rols') ==1 ):?>
		                	<td><?php echo anchor('admin/rentals/delete_partial/'.$value['id'],'حذف',array('id'=>'dialog-confirm-open','class'=>'test'));?></td>
		               <?php endif;?>
    	            </tr>			 
       			<?php endforeach; ?>
			</table>
			<?php endif;?>
	</div>		
</div>	
 <?php echo $this->load->view('inculdes/footer');