<?php echo $this->load->view('inculdes/header')?>
<title><?php echo $title;?></title>
<script type="text/javascript">
jQuery(document).ready(function($) {
	$("#to").calendarsPicker({calendar: $.calendars.instance('islamic')});
});
</script>

<script type="text/javascript">
jQuery(document).ready(function($) {
	$("#from").calendarsPicker({calendar: $.calendars.instance('islamic')});
});
</script>
<div class="box">
				<div class="title">
					<h5><?php echo $title;?> </h5>
					</div>
<?php if (validation_errors()){?>
		<div id="message-error" class="message message-error">
								<div class="image">
									<img src="<?php echo base_url('resources/images/icons/error.png')?>" alt="error" height="32" />
								</div>
								<div class="text">
									<span><?php echo validation_errors()?></span>
								</div>
								<div class="dismiss">
									<a href="#message-error"></a>
								</div>
							</div>
							<?php }?>
					<div class="table">	
					<h2>البحث عن دخل العقار <?php echo $title?></h2>
<?php echo form_open_multipart('admin/reports/estates_details')?>
			<div class="form">
				<div class="fields">
					<div class="field field-first">
						<label for="name">التاريخ من</label>
							<div class="input">
								<?php $name_data= array(
								"name" =>"from",
								"id"=>"from",
								"size"=>25,
								);
								echo form_input($name_data)."<p/>";?>
							</div>
						</div>
					<div class="field">
						<label for="name">التاريخ إلى</label>
							<div class="input">
								<?php $name_data= array(
										"name" =>"to",
										"id"=>"to",
										"size"=>25,
										);
								echo form_input($name_data)."<p/>";?>
							</div>
						</div>
						<?php echo form_hidden('id',$type[0]['id'])?>
						<?php echo form_submit('submit','بحث','id=button-save');?>
						<?php echo form_close();?>
					</div>
				</div>
<?php echo $this->load->view('inculdes/footer');