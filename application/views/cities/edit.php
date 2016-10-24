<?php echo $this->load->view('inculdes/header');?>
<title><?php echo $title;?></title>
<div class="box">

					<div class="title">

					<h5><?php echo $title;?> </h5>
					</div>

					<div class="table">
						<?php echo form_open_multipart('admin/cities/edit','id=myform' )?>
			<div class="form">
				<div class="fields">
					<div class="field field-first">
						<div class="label">
							<label for="input">المدينة:</label>
						</div>
						<div class="input">
							<input type="text" value="<?php echo $get[0]['city'] ?>" id="name" name="name"  />
						</div>
					</div>
					
				</div>
				<br>
			<?php echo form_submit('submit','تحديث','class=addicon')?>
			<?php echo form_hidden('id',$get[0]['id'])?>
			<?php echo form_close()?>
			</div>
			<?php echo $this->load->view('inculdes/footer');

