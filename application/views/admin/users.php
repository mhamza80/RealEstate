
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
<div id="dialog-form" title="إضافة موظف جديد">
			<p class="validateTips">جميع الحقول إجبارية.</p>
			<?php echo form_open_multipart('admin/user/create_user','id=myform' )?>
			<div class="form">
				<div class="fields">
					<div class="field field-first">
						<div class="label">
							<label for="input">الإسم الأول:</label>
						</div>
						<div class="input">
							<input type="text" id="name" name="name"  />
						</div>
					</div>
					<div class="field">
						<div class="label">
							<label for="date">الإسم الأخير:</label>
						</div>
						<div class="input">
							<input type="text" id="phone" name="last" />
						</div>
					</div>
					<div class="field">
						<div class="label">
							<label for="date">رقم الجوال:</label>
						</div>
						<div class="input">
							<input type="text" id="phone" name="mobile" />
						</div>
					</div>
					<div class="field">
						<div class="label">
							<label for="input">البريد الإلكترونى:</label>
						</div>
						<div class="input">
							<input type="text" id="email" name="email" />
						</div>
					</div>
					<div class="field">
						<div class="label">
							<label for="input">إسم الدخول:</label>
						</div>
						<div class="input">
							<input type="text" id="log" name="log" />
						</div>
					</div>
					<div class="field">
						<div class="label">
							<label for="input">كلمة السر:</label>
						</div>
						<div class="input">
							<input type="text" id="pass" name="pass" />
						</div>
					</div>
					<div class="field">
						<div class="label">
							<label for="input">صلاحية الموظف:</label>
						</div>
						<div class="input">
							<input type="radio" name="rules" value="2">مستخدم <br/>
							<input type="radio" name="rules" value="1">مدير  <br/>
						</div>
					</div>
				</div>
			</div>
			<?php echo form_close();?>
		</div>
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
<?php if ($this->session->flashdata('error')){?>
		<div id="message-success" class="message message-success">
								<div class="image">
									<img src="<?php echo base_url('resources/images/icons/success.png')?>" alt="Success" height="32" />
								</div>
								<div class="text">

									<span><?php echo $this->session->flashdata('error')?></span>
								</div>
								<div class="dismiss">
									<a href="#message-success"></a>
								</div>
							</div>
							<?php }?>
					<div class="title">
						<h5><?php echo $title;?></h5>
					</div>
					<div class="table">
<?php
	if(is_array($users)):
			if($this->session->userdata('rols') == 1):?>
				<button id="create-user">إضافة موظف جديد</button> <br/><?php endif;$i=0?>
			<table id="emp" border="2" class="jtable">
      		  <thead><tr><th>رقم المستخدم</th><th>اسم المستخدم</th><th>رقم الجوال</th><th>البريد الإلكترونى</th><th>الصلاحية</th><th>تحرير</th></tr>
        		<?php foreach ($users as $key => $list):$i++;?>
        	 </thead>
                <tr>
                	<td><?php echo $i?></td>
	                <td><?php echo $list['first_name'];?></td>
	                <td><?php echo $list['mobile'];?></td>
	                <td><?php echo $list['email'];?></td>
	                <td><?php if($list['privilege'] == 1) {echo "مدير";}else {echo "مستخدم";} ?></td>
                 	<td class="align-center buttons buttons-small">
					<?php
					if($this->session->userdata('rols') == 1):
					echo anchor('admin/admin/delete/'.$list['id'],'حذف',array('id'=>'dialog-confirm-open','class'=>'test'));
					echo " | ";
					echo anchor('admin/admin/edit/'.$list['id'].'/' .$list['id'],'تعديل','id=edit');
					endif;
					?>
					</td>
    	            </tr>
           		 <?php endforeach; ?>
        </tbody>
	</table>
<?php endif;
echo $this->load->view('inculdes/footer');