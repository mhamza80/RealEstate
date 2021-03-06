<?php echo $this->load->view('inculdes/header')?>
<title><?php echo $title?></title>
<script type="text/javascript">
jQuery(function(){
$("#delv").datepicker()

});
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
<script type="text/javascript">
$(document).ready(function() {
	$('#wait_1').hide();
	$('#types').change(function(){
	  $('#wait_1').show();
	  $('#result_1').hide();
      $.get("<?php echo base_url('admin/types/get_type')?>", {
		func: "unit",
		type: $('#types').val(),
      }, function(response){
        $('#result_1').fadeOut();
        setTimeout("finishAjax('result_1', '"+escape(response)+"')", 400);
      });
    	return false;
	});
});

function finishAjax(id, response) {
  $('#wait_1').hide();
  $('#'+id).html(unescape(response));
  $('#'+id).fadeIn();
}
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
<?php echo form_open_multipart('admin/estates/create','id="myform"')?>
			<div class="form">
				<div class="fields">
					<div class="field field-first">
					<label for="name">اسم المالك</label>
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
			<label for="age">عنوان المالك</label>
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
			<label for="age">الجوال</label>
			<div class="input">
				<?php $nationality= array(
				'name' =>'mobile',
				"class"=>"csitinput",
				"size"=>25,
				"title"=>"يجب أن يحتوى على أرقام فقط"
				);
			echo form_input($nationality)."<p/>";?>
			</div>
			</div>
			<div class="field">
			<label for="age">إسم العقار</label>
			<div class="input">
				<?php $nationality= array(
				'name' =>'name',
				"class"=>"csitinput",
				"size"=>25,
				"title"=>"يجب أن يحتوى على نص فقط"
				);
			echo form_input($nationality)."<p/>";?>
			</div>
			</div>
			<div class="field">
			<label for="age">المدينة</label>
			<div class="input">
				<?php $class= array();
				if(is_array($cities))
				{
					foreach ($cities as $key => $value) {
						$class[$value['id']] = $value['city'];
					}
				}
			echo form_dropdown('city', $class)."<p/>";?>
			</div>
			</div>
			<div class="field">
			<label for="name">الحى</label>
			<div class="input">
				<?php $name_data= array(
				"name" =>"district",
				"class"=>"csitinput",
				"size"=>25,
				"title"=>"يجب أن يحتوى على نص فقط"
				);
			echo form_input($name_data)."<p/>";?>
			</div>
			</div>
			<div class="field">
			<label for="age">نوع العقار</label>
			<div class="input">
				<?php $class= array();
				if(is_array($types))
				{
					foreach ($types as $key => $value) {
						$class[$value['id']] = $value['type'];
					}
				}
			echo form_dropdown('type', $class,"","id='types'")."<p/>";?>
			</div>
			</div>
			<div class="field">
			<span id="wait_1" style="display: none;">
			    <img alt="Please Wait" src="<?php echo base_url()?>css/cp/images/ajax-loader.gif"/>
			 </span>
			 <span id="result_1" style="display: none;"></span>
			
			</div>
			<div class="field">
			<label for="name">المخطط</label>
			<div class="input">
				<?php $name_data= array(
				"name" =>"schema",
				"class"=>"csitinput",
				"size"=>25,
				"title"=>"يجب أن يحتوى على نص فقط"
				);
			echo form_input($name_data)."<p/>";?>
			</div>
			</div>
			
			<div class="field">
			<label for="name">حالة العقار</label>
			<div class="input">
				<?php $name_data= array(
				"name" =>"status",
				"class"=>"csitinput",
				"size"=>25,
				"title"=>"يجب أن يحتوي على نص فقط"
				);
			echo form_input($name_data)."<p/>";?>
			</div>
			</div>
			<div class="field">
			<label for="name">عمر العقار</label>
			<div class="input">
				<?php $name_data= array(
				"name" =>"age",
				"class"=>"csitinput",
				"size"=>25,
				"title"=>"يجب أن يحتوي على نص فقط"
				);
			echo form_input($name_data)."<p/>";?>
			</div>
			</div>
			<div class="field">
			<label for="name">رقم الصك</label>
			<div class="input">
				<?php $name_data= array(
				"name" =>"saak",
				"class"=>"csitinput",
				"size"=>25,
				"title"=>"يجب أن يحتوي على ارقام فقط"
				);
			echo form_input($name_data)."<p/>";?>
			</div>
			</div>
			<div class="field">
			<label for="name">رقم الوحة</label>
			<div class="input">
				<?php $name_data= array(
				"name" =>"border",
				"id"=>"idissue",
				"class"=>"csitinput",
				"size"=>25,
				"title"=>"يجب أن يحتوي على أرقام فقط"
				);
			echo form_input($name_data)."<p/>";?>
			</div>
			</div>
			<div class="field">
			<label for="age">سعر الحد</label>
			<div class="input">
				<?php $Transmission= array(
				'name' =>'limit',
				"class"=>"csitinput",
				"size"=>25,
				"title"=>"يجب أن يحتوى على ارقام فقط"
				);
			echo form_input($Transmission)."<p/>";?>
			</div>
			</div>
			<div class="field">
			<label for="name">سعر السوم</label>
			<div class="input">
				<?php $name_data= array(
				"name" =>"somme",
				"size"=>25,
				"title"=>"يجب أن يحتوى على ارقام فقط"
				);
			echo form_input($name_data)."<p/>";?>
			</div>
			</div>
			<div class="field">
			<label for="name">سعر المتر مربع</label>
			<div class="input">
				<?php $name_data= array(
				"name" =>"meter",
				"size"=>25,
				"title"=>"يجب أن يحتوى على ارقام فقط"
				);
			echo form_input($name_data)."<p/>";?>
			</div>
			</div>
			<div class="field">
			<label for="name">رقم القطعة</label>
			<div class="input">
				<?php $name_data= array(
				"name" =>"part",
				"class"=>"csitinput",
				"size"=>25,
				"title"=>"يجب أن يحتوي على أرقام فقط"
				);
			echo form_input($name_data)."<p/>";?>
			</div>
			</div>
			<div class="field">
			<label for="name">سعر القطعة</label>
			<div class="input">
				<?php $name_data= array(
				"name" =>"cash",
				"class"=>"csitinput",
				"size"=>25,
				"title"=>"يجب أن يحتوي على أرقام فقط"
				);
			echo form_input($name_data)."<p/>";?>
			</div>
			</div>
			<div class="field">
			<label for="name">رقم البلوك</label>
			<div class="input">
				<?php $name_data= array(
				"name" =>"block",
				"class"=>"csitinput",
				"size"=>25,
				"title"=>"يجب أن يحتوي على أرقام فقط"
				);
			echo form_input($name_data)."<p/>";?>
			</div>
			<div class="field">
			<label for="name">المساحة</label>
			<div class="input">
				<?php $name_data= array(
				"name" =>"area",
				"class"=>"csitinput",
				"size"=>25,
				"title"=>"يجب أن يحتوي على أرقام فقط"
				);
			echo form_input($name_data)."<p/>";?>
			</div>
			</div>
			<div class="field">
			<label for="name">الحد الجنوبي</label>
			<div class="input">
				<?php $name_data= array(
				"name" =>"south",
				"class"=>"csitinput",
				"size"=>25,
				"title"=>"يجب أن يحتوي على أرقام فقط"
				);
			echo form_input($name_data)."<p/>";?>
			</div>
			</div>
			<div class="field">
			<label for="name">الحد الشمالى</label>
			<div class="input">
				<?php $name_data= array(
				"name" =>"north",
				"class"=>"csitinput",
				"size"=>25,
				"title"=>"يجب أن يحتوي على أرقام فقط"
				);
			echo form_input($name_data)."<p/>";?>
			</div>
			</div>
			<div class="field">
			<label for="name">الحد الشرقى</label>
			<div class="input">
				<?php $name_data= array(
				"name" =>"east",
				"class"=>"csitinput",
				"size"=>25,
				"title"=>"يجب أن يحتوي على أرقام فقط"
				);
			echo form_input($name_data)."<p/>";?>
			</div>
			</div>
			<div class="field">
			<label for="name">الحد الغربى</label>
			<div class="input">
				<?php $name_data= array(
				"name" =>"west",
				"class"=>"csitinput",
				"size"=>25,
				"title"=>"يجب أن يحتوي على أرقام فقط"
				);
			echo form_input($name_data)."<p/>";?>
			</div>
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
			<?php echo form_hidden('id',$this->session->userdata('userId'))?>
			<?php echo form_submit('submit','حفظ' , 'id=button-save');?>
			<?php echo form_close(); ?>
			</div>
<?php echo $this->load->view('inculdes/footer');