<?php echo $this->load->view('inculdes/header');?>
<title><?php echo $title;?></title>
	
<div class="box">

					<div class="title">
						<h5><?php echo $title;?> </h5>
					</div>

			<div class="table">
				<?php echo form_open_multipart('admin/admin/edit','id=myform' )?>
			<div class="form">
				<div class="fields">
					<div class="field field-first">
						<div class="label">
							<label for="input">إسم الأول:</label>
						</div>
						<div class="input">
							<input type="text" value="<?php echo $rows[0]['first_name'] ?>" id="name" name="name"  />
						</div>
					</div>
					<div class="field">
						<div class="label">
							<label for="date">الإسم الأخير:</label>
						</div>
						<div class="input">
							<input type="text" value="<?php echo $rows[0]['last_name'] ?>" id="phone" name="last" />
						</div>
					</div>
					<div class="field">
						<div class="label">
							<label for="date">رقم الجوال:</label>
						</div>
						<div class="input">
							<input type="text" value="<?php echo $rows[0]['mobile'] ?>" id="phone" name="mobile" />
						</div>
					</div>
					<div class="field">
						<div class="label">
							<label for="input">البريد الإلكترونى:</label>
						</div>
						<div class="input">
							<input type="text" value="<?php echo $rows[0]['email'] ?>" id="email" name="email" />
						</div>
					</div>
					<div class="field">
						<div class="label">
							<label for="input">إسم الدخول:</label>
						</div>
						<div class="input">
							<input type="text" value="<?php echo $rows[0]['user_name'] ?>" id="log" name="log" />
						</div>
					</div>
					<div class="field">
						<div class="label">
							<label for="input">كلمة السر:</label>
						</div>
						<div class="input">
							<input type="text" value="<?php echo $rows[0]['pass'] ?>" id="pass" name="pass" />
						</div>
					</div>
					<?php if($this->session->userdata('rols') == 1):?>
					<div class="field">
						<div class="label">
							<label for="input">صلاحية الموظف:</label>
						</div>
						<div class="input">
							<input type="radio" name="rules" value="0">موظف <br/>
							<input type="radio" name="rules" value="1">مدير  <br/>
						</div>
					</div>
					<?php endif;?>
				</div>
				<br>
			<?php echo form_submit('submit','تحديث','class=addicon')?>
			<?php echo form_hidden('id',$rows[0]['id'])?>
			<?php echo form_close()?>
			</div>
			<?php echo $this->load->view('inculdes/footer');

