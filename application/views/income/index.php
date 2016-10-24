<?php echo $this->load->view('inculdes/header')?>
<script type="text/javascript">
jQuery(function($) {
$("#date").datepicker({ dateFormat: 'yy-mm-dd' });
});
</script>
<script type="text/javascript">
$(document).ready(function() {
	$('#wait_1').hide();
	$('#type').change(function(){
	  $('#wait_1').show();
	  $('#result_1').hide();
      $.get("<?php echo base_url('admin/income/cheque')?>", {
		func: "unit",
		type: $('#type').val(),
      }, function(response){
        $('#result_1').fadeOut();
        $('#hide').hide();
        setTimeout("finishAjax('result_1', '"+escape(response)+"')", 400);
      });
    	return false;
	});
});

function finishAjax(id, response) {
  $('#wait_1').hide();
  $('#'+id).html(unescape(response));
  $('#'+id).fadeIn();
}
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
				<div id="dialog-add-income" title="إضافة ٌإيردات  جديدة">
					<p class="validateTips">جميع الحقول إحبارية.</p>
					<?php echo form_open_multipart('admin/income/add','id=income' )?>
					<div class="form">
						<div class="fields">
							<div class="field">
								<div class="label">
									<label for="autocomplete">القسم:</label>
								</div>
								<div class="input">
									<input type="text" name="department" id="department">
								</div>
						</div>
						<div class="field">
							<div class="label">
								<label for="autocomplete"> طريقة الدفع :</label>
							</div>
							<div class="input">
							<select name="action" id="type">
								<option value="cash" class="unlocked">نقدا</option>
								<option value="cheque" class="folder-open">شيك</option>
							</select>
						</div>
					</div>
					<div class="field" id="hide">
								<div class="label">
									<label for="autocomplete">المبلغ:</label>
								</div>
								<div class="input">
									<input type="text" name="amount" id="amount">
								</div>
						</div>
					<div class="field">
						<span id="wait_1" style="display: none;">
			    			<img alt="Please Wait" src="<?php echo base_url()?>css/cp/images/ajax-loader.gif"/>
						 </span>
						 <span id="result_1" style="display: none;"></span>
					</div>
						<div class="field">
								<div class="label">
									<label for="autocomplete">التاريخ:</label>
								</div>
								<div class="input">
									<input type="text" name="date" id="date">
								</div>
						</div>
						<div class="field">
								<div class="label">
									<label for="autocomplete">الإيضاح:</label>
								</div>
								<div class="input">
									<textarea rows="4" cols="50" name="Illustration" id="name"></textarea>
								</div>
						</div>
					</div>
				</div>
				<?php echo form_close();?>
			</div>
<?php if(empty($rows)){?>
		<button id="add-income">إضافة</button> <br/>
		<div id="message-warning" class="message message-warning">
								<div class="image">
									<img src="<?php echo base_url('resources/images/icons/warning.png')?>" alt="warning" height="32" />
								</div>
								<div class="text">
									<span><?php echo "لا يوجد إرادات"?></span>
								</div>
								<div class="dismiss">
									<a href="#message-warning"></a>
								</div>
							</div>
							<?php }
								if(is_array($rows)){$i = 0;
									echo '<button id="add-income">إضافة</button> <br/>';?>
									<table id="emp">
					       				 <thead><tr><th>رقم</th><th>القسم</th><th>رقم الشيك</th><th>المبلغ</th><th>التاريخ</th><th>الإيضاح</th><th>مرفقات</th><th>الإجراءات</th></tr></thead>
					       				 <tbody>
					        				<?php foreach ($rows as $key => $list):$i++; ?>
					               		 <tr>
						               		 <td><?php echo $i?></td>
							                 <td><?php echo $list['department'];?></td>
							                 <td><?php if(empty($list['cheque_num'])){echo"نقدى";}else{echo $list['cheque_num'];};?></td>
							                 <td><?php if(empty($list['amount'])){echo"شيك";}else{echo number_format(round($list['amount']),0,'.',",")." " ."ريال";}?></td>
							                 <td><?php echo $this->ger->GregorianToHijri($list['date'],'YYYY-MM-DD')?></td>
							                 <td><?php echo $list['Illustration'];?></td>
							                 <td>
							              	 <?php if(!empty($list['file_name'])){?>
						              		 <a target="_blank" href="<?php echo base_url()."files/".$list['file_name']?>" onclick="open(this.href, this.target, 'width=600, height=450, top=200, left=250'); return false;">عرض</a>
						               		 <?php }else{echo "لا يوجد";} ?>
						               		 
						               		 </td>
						                     <td class="align-center buttons buttons-small">
											 <?php
											 if($this->session->userdata('rols')==1):
												echo anchor('admin/income/delete/'.$list['id'],'حذف',array('id'=>'dialog-confirm-open','class'=>'test'));
												echo "|";
												endif;											
												if(empty($list['rental_id'])):
													echo anchor('admin/income/edit/'.$list['id'].'/' .$list['id'],'تعديل','id=edit');													
												endif;?>
												|
												<a href="<?php echo base_url('admin/income/upload/'.$rows[0]['id'])."?placeValuesBeforeTB_=savedValues&TB_iframe=true&height=300&width=500&modal=true"?>" class="thickbox">إضافة مرفقات </a>
												</td>
					    	        		 </tr>
					          				  <?php endforeach;?>
					          			</tbody>
					            		<tfoot>
    										 <TR> <td colspan="8"> مجموع الإيردات: <?php echo number_format(round($count->amount),0,'.',",")." " ."ريال";?></td></tr>
										</tfoot>
									</table>
							<?php }				
echo $this->load->view('inculdes/footer');	