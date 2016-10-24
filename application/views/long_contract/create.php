<?php echo $this->load->view('inculdes/header')?>
<title><?php echo $title?></title>
<script type="text/javascript">
jQuery(function(){
$('#delv').calendarsPicker({calendar: $.calendars.instance('islamic')});
});
</script>
<script type="text/javascript">
jQuery(function(){
$("#start").calendarsPicker({calendar: $.calendars.instance('islamic')});
});
</script>
<script type="text/javascript">
jQuery(function(){
$("#end").calendarsPicker({calendar: $.calendars.instance('islamic')});
});
</script>
<script type="text/javascript">
$(document).ready(function() {
$("#ger").datepicker();
});
</script>
<script type="text/javascript">
$(document).ready(function() {
$("#gere").datepicker();
});
</script>
<script type="text/javascript">
$(document).ready(function() {
	$('#wait_1').hide();
	$('#type').change(function(){
	  $('#wait_2').show();
	  $('#result_2').hide();
      $.get("<?php echo base_url('admin/rentals/date_type')?>", {
		func: "unit",
		type: $('#type').val(),
      }, function(response){
    	  location.reload();
      });
    	
	});
});

function finishAjax(id, response) {
  $('#wait_1').hide();
  $('#'+id).html(unescape(response));
  $('#'+id).fadeIn();
}
</script>

<script type="text/javascript">
jQuery(function(){
	 $("#myform :input").tooltip({
		 
	      // place tooltip on the right edge
	      position: "center right",
	 
	      // a little tweaking of the position
	      offset: [-2, 10],
	 
	      // use the built-in fadeIn/fadeOut effect
	      effect: "fade",
	 
	      // custom opacity setting
	      opacity: 0.7
	
	      });
});
</script>

<div class="box">
					<div class="title">
						<h5><?php echo $title;?> </h5>
					</div>
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
	<div class="table">
		<?php echo form_open_multipart('admin/contracts/create','id="myform"')?>
			<div class="form">
				<div class="fields">
					<div class="field field-first">
						<label for="name">المالك</label>
						<div class="input">
							<?php $name_data= array(
							"name" =>"owner",
							"class"=>"csitinput",
							"size"=>25,
							"title"=>"يجب أن يحتوي على نص فقط"
							);
						echo form_input($name_data)."<p/>";?>
					</div>
					</div>
				<div class="field">
				<label for="age"> عنوان المالك</label>
				<div class="input">
					<?php $nationality= array(
					'name' =>'address',
					"class"=>"csitinput",
					"size"=>25,
					"title"=>"يجب أن يحتوى على نص فقط"
					);
				echo form_input($nationality)."<p/>";?>
				</div>
			</div>
			<div class="field">
				<label for="age"> جوال المالك</label>
				<div class="input">
					<?php $nationality= array(
					'name' =>'owner_phone',
					"class"=>"csitinput",
					"size"=>25,
					"title"=>"يجب أن يحتوى على نص فقط"
					);
				echo form_input($nationality)."<p/>";?>
				</div>
			</div>
				<div class="field">
				<label for="age"> هوية المالك</label>
				<div class="input">
					<?php $nationality= array(
					'name' =>'owner_id',
					"class"=>"csitinput",
					"size"=>25,
					"title"=>"يجب أن يحتوى على نص فقط"
					);
				echo form_input($nationality)."<p/>";?>
				</div>
			</div>
			<div class="field">
				<label for="age"> المستأجر</label>
				<div class="input">
					<?php $nationality= array(
					'name' =>'rental',
					"class"=>"csitinput",
					"size"=>25,
					"title"=>"يجب أن يحتوى على نص فقط"
					);
				echo form_input($nationality)."<p/>";?>
				</div>
			</div>
			<div class="field">
				<label for="age">العنوان</label>
				<div class="input">
				<?php $nationality= array(
				'name' =>'address',
				"class"=>"csitinput",
				"size"=>25,
				"title"=>"يجب أن يحتوى على نص فقط"
				);
			echo form_input($nationality)."<p/>";?>
			</div>
			</div>
			<div class="field">
			<label for="age">الهاتف</label>
			<div class="input">
				<?php $nationality= array(
				'name' =>'phone',
				"class"=>"csitinput",
				"size"=>25,
				"title"=>"يجب أن يحتوى على أرقام فقط"
				);
			echo form_input($nationality)."<p/>";?>
			</div>
			</div>
			<div class="field">
			<label for="age">الجنسية</label>
			<div class="input">
				<?php $nationality= array(
				'name' =>'nationality',
				"size"=>25,
				"title"=>"يجب أن يحتوى على نص فقط"
				);
			echo form_input($nationality)."<p/>";?>
			</div>
			</div>
			<div class="field">
			<label for="age">رقم الهوية / الإقامة</label>
			<div class="input">
				<?php $nationality= array(
				'name' =>'identity',
				"size"=>25,
				"title"=>"يجب أن يحتوى على نص فقط"
				);
			echo form_input($nationality)."<p/>";?>
			</div>
			</div>
			<div class="field">
			<label for="age">مصدرها</label>
			<div class="input">
				<?php $nationality= array(
				'name' =>'issue',
				"class"=>"csitinput",
				"size"=>25,
				"title"=>"يجب أن يحتوى على نص فقط"
				);
			echo form_input($nationality)."<p/>";?>
			</div>
			</div>
			<div class="field">
			<label for="name">تاريخها</label>
			<div class="input">
				<?php $name_data= array(
				"name" =>"id_issue",
				"id"=>"delv",
				"size"=>25,
				);
			echo form_input($name_data)."<p/>";?>
			</div>
			</div>
			<div class="field">
			<label for="age"> العقار</label>
			<div class="input">
				<?php 
				$class= array();
				if(is_array($estates))
				{
					foreach ($estates as $key => $value) {
						$class[$value['id']] = $value['name'];
						//$es_type = $this->type->get_by_id($value['estate_type']);												
					}
				}
				if(empty($estates))
				{
					$class[] = "لا توجد عقارات غير مؤجرة";
				}
			echo form_dropdown('estate_type', $class,"","id='types'")."<p/>";?>
			</div>
			</div>
			<div class="field">
			<label for="name">نوع العقد المؤجر</label>
			<div class="input">
				<?php $name_data= array(
				"name" =>"contract",
				"class"=>"csitinput",
				"size"=>25,
				);
			echo form_input($name_data)."<p/>";?>
			</div>
			</div>
			
			<div class="field">
			<label for="name">الموقع</label>
			<div class="input">
				<?php $name_data= array(
				"name" =>"location",
				"class"=>"csitinput",
				"size"=>25,
				"title"=>"يجب أن يحتوي على نص فقط"
				);
			echo form_input($name_data)."<p/>";?>
			</div>
			</div>
			<div class="field">
			<label for="name">الشارع</label>
			<div class="input">
				<?php $name_data= array(
				"name" =>"street",
				"class"=>"csitinput",
				"size"=>25,
				"title"=>"يجب أن يحتوي على نص فقط"
				);
			echo form_input($name_data)."<p/>";?>
			</div>
			</div>
			<div class="field">
			<label for="name">مدة العقد</label>
			<div class="input">
				<?php $name_data= array(
				"name" =>"duration",
				"class"=>"csitinput",
				"size"=>25,
				"title"=>"يجب أن يحتوي على ارقام فقط"
				);
			echo form_input($name_data)."<p/>";?>
			</div>
			</div>						
			<div class="field">
			<label for="name">شروط الدفع</label>
			<div class="input">
				<?php $name_data= array(
				"name" =>"condition",
				"size"=>25,
				"title"=>"يجب أن يحتوى على ارقام فقط"
				);
			echo form_input($name_data)."<p/>";?>			
			</div>
			</div>
		
			<div class="field">
			<label for="name">غرامة التأخير</label>
			<div class="input">
				<?php $name_data= array(
				"name" =>"delay",
				"size"=>25,
				"title"=>"يجب أن يحتوى على ارقام فقط"
				);
			echo form_input($name_data)."<p/>";?>			
			</div>
			</div>				
			<div class="field">
			<label for="age">المستفيد</label>
			<div class="input">
				<?php $class= array(
				'0'=>"أفراد",
				'1'=>"شركات"
				);			
			echo form_dropdown('recipient', $class)."<p/>";?>
			</div>
			</div>
			<div class="field">
			<label for="name">الغرض من السكن</label>
			<div class="input">
				<?php $name_data= array(
				"name" =>"purpose",
				"class"=>"csitinput",
				"size"=>25,
				"title"=>"يجب أن يحتوي على أرقام فقط"
				);
			echo form_input($name_data)."<p/>";?>
			</div>
			</div>		
			<div class="field">
			<label for="name">معلومات إضافة</label>
			<div class="input">
				<?php $name_data= array(
				"name" =>"info",
				"class"=>"csitinput",
				"row"=>25,
				);
			echo form_textarea($name_data)."<p/>";?>
			</div>
			</div>
			</div>
			<?php echo form_hidden('user_id',$this->session->userdata('userId'))?>			
			<?php echo form_submit('submit','حفظ' , 'id=button-save');?>
			<?php echo form_close(); ?>
			</div>
<?php echo $this->load->view('inculdes/footer');