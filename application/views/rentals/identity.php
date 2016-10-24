<?php echo $this->load->view('inculdes/header')?>
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
			<div id="dialog-add-identity" title="إضافة هوية  جديدة">
			<p class="validateTips">جميع الحقول إحبارية.</p>
			<?php echo form_open_multipart('admin/identity/add','id=identity' )?>
			<div class="form">
				<div class="fields">
					<div class="field">
						<div class="label">
							<label for="autocomplete">الهوية:</label>
						</div>
						<div class="input">
						<input type="text" name="name" id="name">
						</div>
					</div>
				</div>
			</div>
			<input type="hidden" id="details" value="">
			<?php echo form_close();?>
		</div>
<?php if(empty($rows)){?>
		<button id="add-identity">إضافة</button> <br/>
		<div id="message-warning" class="message message-warning">
								<div class="image">
									<img src="<?php echo base_url('resources/images/icons/warning.png')?>" alt="warning" height="32" />
								</div>
								<div class="text">

									<span><?php echo "لا توجد اي هوية مضافة"?></span>
								</div>
								<div class="dismiss">
									<a href="#message-warning"></a>
								</div>
							</div>
							<?php }
							if(is_array($rows)){
									echo '<button id="add-identity">إضافة</button> <br/>';
									foreach ($rows as $key => $value) {
										$i = 0;
									}?>
								<table id="emp" border="2" class="jtable">
					
					        <thead><tr><th>رقم </th><th>نوع الهوية</th><th>الإجراءات</th></tr>
					
					        	<?php foreach ($rows as $key => $list):
					      			$i++;
					
					        	 ?>
					        	 </thead>
					                <tr>
					                	   <td><?php echo $i?></td>
						                   <td><?php echo $list['type'];?></td>
					                  <td class="align-center buttons buttons-small">
										<?php
										echo anchor('admin/cities/delete/'.$list['id'],'حذف',array('id'=>'dialog-confirm-open','class'=>'test'));
										echo " | ";
										echo anchor('admin/cities/edit/'.$list['id'].'/' .$list['id'],'تعديل','id=edit');
										?>
					    	            </tr>
					            <?php endforeach; ?>
					        </tbody>
						</table>
							<?php }				
echo $this->load->view('inculdes/footer');	