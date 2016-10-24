<?php echo $this->load->view('inculdes/header')?>
<title><?php echo $title?></title>
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
<script type="text/javascript">
jQuery(function($) {
	$( "#tabs" ).tabs();
});
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
			<div id="dialog-add-days" title="إضافة">
				<p class="validateTips">جميع الحقول إحبارية.</p>
				<?php echo form_open_multipart('admin/settings/add','id=myform' )?>
			<div class="form">
				<div class="fields">
					<div class="field">
						<div class="label">
							<label for="autocomplete">عدد الإيام:</label>
						</div>
						<div class="input">
						<input type="text" name="name" id="name">
						</div>
					</div>
				</div>
			</div>
			<input type="hidden" id="details" name="type"  value="1">
			<?php echo form_close();?>
		</div>
					<div class="table">
					<?php if(empty($rows)){?>
							<button id="add-days" class="add-button">إضافة</button> <br/>
							<div id="message-warning" class="message message-warning">
								<div class="image">
									<img src="<?php echo base_url('resources/images/icons/warning.png')?>" alt="Success" height="32" />
								</div>
								<div class="text">
									<span><?php echo "برجاء تحديد عدد الإيام لفحص الاقساط"?></span>
								</div>
								<div class="dismiss">
									<a href="#message-warning"></a>
								</div>
								</div>
								<?php }
									if(is_array($rows)){$i = 0;?>
									<table id="emp" border="2" class="jtable">
					        			<thead><tr><th>رقم </th><th>عدد الإيام</th><?php if($this->session->userdata('rols')==1):?><th>الإجراءات</th><?php endif;?></tr>
					        				<?php foreach ($rows as $key => $list):$i++;?>
					        			 </thead>
					                	<tr>
					                	   <td><?php echo $i?></td>
						                   <td><?php echo $list['days'];?></td>
						                   <?php if($this->session->userdata('rols') == 1):?>
					                 	   <td class="align-center buttons buttons-small">
											<?php
											echo anchor('admin/settings/edit_installment/'.$list['id'].'/' .$list['id'],'تعديل','id=edit');
											?>
											</td>
											<?php endif;?>
					    	            </tr>
					            	<?php endforeach;?>
								</table>
							<?php }				
echo $this->load->view('inculdes/footer');	