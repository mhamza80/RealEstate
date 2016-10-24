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
  $("div#test").hide();
  $('#'+id).html(unescape(response));
  $('#'+id).fadeIn();
}
</script>
<script type="text/javascript">
$(document).ready(function() {
$("#gere").datepicker();
});
</script>
<script type="text/javascript">
$(document).ready(function() {
$("#ger").datepicker();
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
	<?php }
	 if ($this->session->flashdata('sucess')){?>
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
	<div class="table">
		<div id="tabs">
		<ul>
			<li><a href="#tabs-1">البيانات الشخصية</a></li>
			<li><a href="#tabs-2">بيانات الحساب</a></li>						
		</ul>
		<div id="tabs-1">
			<?php echo form_open_multipart('admin/rentals/edit','id="myform"')?>
					<div class="form">
						<div class="fields">
							<div class="field field-first">
								<label for="name">المؤجر</label>
								<div class="input">
								<?php $name_data= array(
								"name" =>"owner",
								"class"=>"csitinput",
								"value"=>$get[0]['owner'],
								"size"=>25,
								"title"=>"يجب أن يحتوي على نص فقط"
								);
							echo form_input($name_data)."<p/>";?>
							</div>
							</div>
					<div class="field">
						<label for="age"> المستأجر</label>
						<div class="input">
							<?php $nationality= array(
							'name' =>'rental',
							"class"=>"csitinput",
							"value"=>$get[0]['t_name'],
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
						"value"=>$get[0]['t_address'],
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
						"value"=>$get[0]['t_phone'],
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
						"class"=>"csitinput",
						"value"=>$get[0]['nationality'],
						"size"=>25,
						"title"=>"يجب أن يحتوى على أرقام فقط"
						);
					echo form_input($nationality)."<p/>";?>
					</div>
					</div>
					<div class="field">
					<label for="age">رقم الهوية / الإقامة</label>
					<div class="input">
						<?php $nationality= array(
						'name' =>'identity',
						"class"=>"csitinput",
						"value"=>$get[0]['Identity'],
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
						"value"=>$get[0]['id_plcae'],
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
						"value"=>$get[0]['id_issue'],
						"size"=>25,
						"title"=>"يجب أن يحتوى على نص فقط"
						);
					echo form_input($name_data)."<p/>";?>
					</div>
					</div>
					<div class="field">
					<label for="age">العقار</label>
					<div class="input">
						<?php $class= array();
						if(is_array($estates))
						{
							foreach ($estates as $key => $value) {
								$gett = $this->estate->get_by_sub($value['id']);
								$class[$gett[0]['id']] = $gett[0]['estate_name'];
							}
						}
					echo form_dropdown('estate_type', $class,$get[0]['estate_id'],"id='types'")."<p/>";?>
					</div>
					</div>
					<div class="field">
					<label for="name">نوع العقد المؤجر</label>
					<div class="input">
						<?php $name_data= array(
						"name" =>"contract",
						"value"=>$get[0]['contract_type'],
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
						"value"=>$get[0]['location'],
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
						"value"=>$get[0]['street'],
						"size"=>25,
						"title"=>"يجب أن يحتوي على نص فقط"
						);
					echo form_input($name_data)."<p/>";?>
					</div>
					</div>
					<div class="field">
					<label for="name">الغرض من السكن</label>
					<div class="input">
						<?php $name_data= array(
						"name" =>"purpose",
						"class"=>"csitinput",
						"value" =>$get[0]['purpose'],
						"size"=>25,
						"title"=>"يجب أن يحتوي على نص فقط"
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
					<label for="name">مدة العقد</label>
					<div class="input">
						<?php $name_data= array(
						"name" =>"duration",
						"class"=>"csitinput",
						"value"=>$get[0]['duration'],
						"size"=>25,
						"title"=>"يجب أن يحتوي على ارقام فقط"
						);
					echo form_input($name_data)."<p/>";?>
					</div>
					</div>
			</div>
			<?php echo form_hidden('id',$get[0]['id'])?>
			<?php echo form_hidden('type','personal')?>
			<?php echo form_submit('submit','حفظ' , 'id=button-save');?>
			</div>
			<?php echo form_close(); ?>
			</div>
			<div id="tabs-2">
				<?php echo form_open_multipart('admin/rentals/edit','id="myform"')?>
					<div class="form">
						<div class="fields">
						<div class="field">
						<label for="name">بداية العقد</label>
						<div class="input">
							<?php 
							if(!empty($get[0]['start_contarct'])):
								$id = "start";
							endif;
							if(empty($get[0]['start_contarct'])):
								$id = "ger";
							endif;
							$name_data= array(							
							"name" =>"start",
							"id"=>$id,
							"value"=>$start,
							"size"=>25,
							);
						echo form_input($name_data)."<p/>";?>
						</div>
						</div>
					<div class="field">
					<label for="age">نهاية العقد</label>
					<div class="input">
						<?php
							if(!empty($get[0]['start_contarct'])):
								$id = "end";
							endif;
							if(empty($get[0]['start_contarct'])):
								$id = "gere";
							endif;
						 $Transmission= array(
						'name' =>'end',
						'id'   =>$id,	
						"value"=>$end,
						"size"=>25,
						);
					echo form_input($Transmission)."<p/>";?>
					</div>
				</div>
					<div class="field">
					<label for="name">سعر الإيجار</label>
					<div class="input">
					<input type="text" onkeydown="document.getElementById('year').value =this.value;" onkeyup="document.getElementById('year').value = this.value;" name="rent" value="<?php echo $get[0]['rent_price']?>" id="this_textbox" title="يجب أن يحتوى على أرقام فقط"/>	
					</div>
					</div>
					<div class="field">
					<label for="name">الإيجار السنوى</label>
					<div class="input">
						<?php $name_data= array(
						"name"  =>"rent_year",
						"id"	=>"year",
						"value" =>$get[0]['annual_rent'],
						"size"  =>25,
						"readonly" =>"readonly"
						);
					echo form_input($name_data)."<p/>";?>
					</div>
					</div>
					<div class="field">
					<label for="name">مقدم الإيجار</label>
					<div class="input">
					<input type="text"  onkeydown="document.getElementById('rem').value =this.value - document.getElementById('year').value;" onkeyup="document.getElementById('rem').value = this.value - document.getElementById('year').value;"  value="<?php echo $get[0]['pay_submitted']?>" name="pay" id="this_textbox" title="يجب أن يحتوى على أرقام فقط"/>	
					</div>
					</div>
					<div class="field">
					<label for="name">المتبقى</label>
					<div class="input">
						<?php $name_data= array(
						"name" =>"residual",
						"id"=>"rem",
						"value" =>$get[0]['remaining'],
						"readonly" =>"readonly",
						"size"=>25,
						);
					echo form_input($name_data)."<p/>";?>
					</div>
					</div>
					<div class="field">
					<label for="name">شروط الدفع</label>
					<div class="input">
						<?php $name_data= array(
						"name" =>"condition",
						"value" =>$get[0]['condition'],
						"size"=>25,
						"title"=>"يجب أن يحتوى على ارقام فقط"
						);
					echo form_input($name_data)."<p/>";?>
					</div>
					</div>
					<div class="field">
					<label for="name">تكلفة المياه</label>
					<div class="input">
						<?php $name_data= array(
						"name" =>"water",
						"value" =>$get[0]['water'],
						"size"=>25,
						"title"=>"يجب أن يحتوي على أرقام فقط"
						);
					echo form_input($name_data)."<p/>";?>
					</div>
					</div>
					<div class="field">
					<label for="name">مدفوع كامل</label>
					<div class="input">
					<input type="checkbox" id="checkbox" name="checkwater" value="all" />
					</div>
					</div>
					<div class="field">
					<label for="age">حالة البيان</label>
					<div class="input">
						<?php $class= array(
						'0'=>"تحديث بيانات",
						'1'=>"عقد جديد"
						);			
					echo form_dropdown('cont', $class);?>
					</div>
					</div>				
					<div class="field">
					<label for="name">معلومات إضافة</label>
					<div class="input">
						<?php $name_data= array(
						"name" =>"info",
						"value" =>$get[0]['info'],
						"class"=>"csitinput",
						"row"=>25,
						);
					echo form_textarea($name_data)."<p/>";?>
					</div>
					</div>
				</div>
				<?php echo form_hidden('id',$get[0]['id'])?>
				<?php echo form_hidden('type','account')?>
				<?php echo form_submit('submit','حفظ' , 'id=button-save');?>
			</div>
				<?php echo form_close(); ?>
		</div>
	</div>
<?php echo $this->load->view('inculdes/footer');