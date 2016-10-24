<?php echo $this->load->view('inculdes/header')?>
<script type="text/javascript">
function readOnlyCheckBox() {
   return false;
}
</script>
<title><?php echo $title?></title>
<div class="box">
<?php if (validation_errors()){?>
		<div id="message-error" class="message message-error">
								<div class="image">
									<img src="<?php echo base_url('resources/images/icons/error.png')?>" alt="Success" height="32" />
								</div>
								<div class="text">

									<span><?php echo validation_errors();?></span>
								</div>
								<div class="dismiss">
									<a href="#message-error"></a>
								</div>
							</div>
							<?php }?>
					<div class="title">
						<h5><?php echo $title;?></h5>
					</div>				
					<div class="table">	
<?php echo form_open_multipart('admin/sms/go', 'class="form_inputs"'); ?>
	<div class="form">
				<div class="fields">
					<div class="field field-first">
		<label for="name">لغة الرسالة</label>
		<div class="input">
			<?php 
				$options = array(
                  'ar'  => 'العربية',
                  'en'    => 'الإنجليزية' 
                );
			echo form_dropdown('lang', $options);?>
			</div>
		<div class="field">
			<label for="name">من</label>
			<div class="input">
				<?php $name_data= array(
				"name" =>"from",
				"value"=>'Modernqasr',
				"id"=>"from",
				"size"=>25,
				'readonly'=>'readonly'
				);
			echo form_input($name_data)."<p/>";?>
			</div>
		</div>
		<div class="field">
			<label for="name">إلى</label>
			<div class="input">
				<?php $name_data= array(
				"name" =>"to",
				"value"=>$to[0]['t_phone'],
				"id"=>"from",
				"size"=>25,
				);
			echo form_input($name_data)."<p/>";?>
			</div>
		</div>
	</div>
	<div class="field">
			<label for="name">الرسالة</label>
			<div class="input">
				<?php $name_data= array(
				"name" =>"msg",
				"id"=>"msg",
				"size"=>25,
				);
			echo form_textarea($name_data)."<p/>";?>
			</div>
			  </div>
			  </div>
			  </div>
<?php echo form_submit('submit','إرسال'  , 'id=button-save')?>
<?php echo form_close(); ?>
<?php echo $this->load->view('inculdes/footer')?>
