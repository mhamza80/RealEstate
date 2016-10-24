<?php echo $this->load->view('inculdes/header')?>
<script type="text/javascript">
jQuery(function(){
$('#date').calendarsPicker({calendar: $.calendars.instance('islamic')});
});
</script>
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
			        "sLast":     "الأخير"
			    }

				}
			    } );
			} );
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
				<div id="dialog-add-income" title="إضافة مصروفات  جديدة">
					<p class="validateTips">جميع الحقول إحبارية.</p>
					<?php echo form_open_multipart('admin/outgoings/add','id=income' )?>
					<div class="form">
						<div class="fields">
							<div class="field">
								<div class="label">
									<label for="autocomplete">المبلغ:</label>
								</div>
								<div class="input">
									<input type="text" name="amount" id="amount">
								</div>
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
					<input type="hidden" id="details" value="">
				<?php echo form_close();?>
			</div>
<?php if(empty($rows)){?>
		<button id="add-income">إضافة</button> <br/>
			<div id="message-warning" class="message message-warning">
								<div class="image">
									<img src="<?php echo base_url('resources/images/icons/warning.png')?>" alt="warning" height="32" />
								</div>
								<div class="text">
									<span><?php echo "لا يوجد مصروفات"?></span>
								</div>
								<div class="dismiss">
									<a href="#message-warning"></a>
								</div>
							</div>
							<?php }
								if(is_array($rows)){$i = 0;
									echo '<button id="add-income">إضافة</button> <br/>';?>
									<table id="emp" border="2" class="jtable">
					       				 <thead><tr><th>رقم</th><th>المبلغ</th><th>التاريخ</th><th>الإيضاح</th><th>الإجراءات</th></tr>
					        				  <?php foreach ($rows as $key => $list):$i++;?>
					        			 </thead>
					               		 <tr>
						               		 <td><?php echo $i?></td>
							                 <td><?php echo number_format(round($list['amount']),0,'.',",")." " ."ريال";?></td>
							                 <td><?php echo $this->ger->GregorianToHijri($list['date'],'DD-MM-YYYY')?></td>
							                 <td><?php echo $list['Illustration'];?></td>
						                     <td class="align-center buttons buttons-small">
												<?php
												if($this->session->userdata('rols')==1):
													echo anchor('admin/outgoings/delete/'.$list['id'],'حذف',array('id'=>'dialog-confirm-open','class'=>'test'));
												endif;											
												if(empty($list['rental_id'])):
													echo " | ";
													echo anchor('admin/outgoings/edit/'.$list['id'].'/' .$list['id'],'تعديل','id=edit');
												endif;
												?>
												</td>
					    	        	 </tr>
					           				 <?php endforeach; ?>
					            	<tfoot>
    									<TR> <td colspan="6"> مجموع المصروفات: <?php echo number_format(round($count->amount),0,'.',",")." " ."ريال";?></td></tr>
									</tfoot>
								</table>
							<?php }				
echo $this->load->view('inculdes/footer');	