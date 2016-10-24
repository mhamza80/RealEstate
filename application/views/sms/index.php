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
			        "sLast":     "الأخير",			  
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
			<div id="dialog-add-sms" title="إضافة">
			<p class="validateTips">جميع الحقول إحبارية.</p>
			<?php echo form_open_multipart('admin/sms/add','id=myform' )?>
			<div class="form">
				<div class="fields">
					<div class="field">
						<div class="label">
							<label for="autocomplete">إسم المستخدم:</label>
						</div>
						<div class="input">
						<input type="text" name="name" id="name">
						</div>
					</div>
					<div class="field">
						<div class="label">
							<label for="autocomplete">كلمة المرور:</label>
						</div>
						<div class="input">
						<input type="text" name="pass" id="pass">
						</div>
					</div>
				</div>
			</div>
			<input type="hidden" id="details" value="">
			<?php echo form_close();?>
		</div>
					<div class="table">
					<?php if(empty($rows)){?>
							<button id="add-sms" class="add-button">إضافة</button> <br/>
							<div id="message-warning" class="message message-warning">
								<div class="image">
									<img src="<?php echo base_url('resources/images/icons/warning.png')?>" alt="Success" height="32" />
								</div>
								<div class="text">
									<span><?php echo "برجاء إضافة اسم المستخدم وكلمة المرور الخاصة بمزود الخدمة"?></span>
								</div>
								<div class="dismiss">
									<a href="#message-warning"></a>
								</div>
								</div>
								<?php }
								if(is_array($rows)){?>
									<div id="tabs">
										<ul>
											<li><a href="#tabs-1">التفاصيل</a></li>
											<li><a href="#tabs-2">الرصيد</a></li>
										</ul>
											<div id="tabs-1">
												<?php foreach ($rows as $key => $value) {
													$i = 0;
												}?>
												<table id="emp" border="2" class="jtable">
									
									      	  <thead><tr><th>رقم </th><th>إسم المستخدم </th><th>كلمة المرور</th><th>العملية</th></tr>
									
									        	<?php foreach ($rows as $key => $list):
									      			$i++;
									
									        	 ?>
									        	 </thead>
									                <tr>
									                	   <td><?php echo $i?></td>
										                   <td><?php echo $list['user_name'];?></td>
										                   <td><?php echo $list['pass'];?></td>
									                  <td class="align-center buttons buttons-small">
														<?php
															echo anchor('admin/sms/edit/'.$list['id'].'/' .$list['id'],'تعديل','id=edit');
														?>
														</td>
									    	            </tr>
									            <?php endforeach;?>
									        </tbody>
										</table>
									</div>
									<div id="tabs-2">
									<?php
									$settings = $this->sms_m->get_all();
									$points = $this->send_sms->getBalance($settings[0]['user_name'],$settings[0]['pass']);
									echo "<h1>عدد النقـــاط المتبقيـــة : $points</h1>";
									echo "<h3>علماً بأن عدد النقـــاط هي عدد الرســائل في الأغلب<BR>"."</h3>";?>
									</div>
							</div>
							<?php }
									
 echo $this->load->view('inculdes/footer')?>	
								