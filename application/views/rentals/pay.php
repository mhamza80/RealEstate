<?php echo $this->load->view('inculdes/header')?>
<script type="text/javascript">
$(document).ready(function() {
	$('#wait_1').hide();
	$('#type').change(function(){
	  $('#wait_1').show();
	  $('#result_1').hide();
      $.get("<?php echo base_url('admin/rentals/cheque')?>", {
		func: "unit",
		type: $('#type').val(),
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
<title><?php echo $title?></title>
<div class="box">
					<div class="title">
						<h5><?php echo $title;?> </h5>
					</div>
<?php if(validation_errors()){?>
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
<?php echo form_open_multipart('admin/rentals/vouchers','id=vo' )?>
			<div class="form">
				<div class="fields">
					<div class="field field-first">
						<div class="label">
							<label for="autocomplete">المبلغ المستحق :</label>
						</div>
						<div class="input">
							<input type="text" name="amount" id="amount" value="<?php echo round($rows[0]['amount'])?>"readonly>
						</div>
					</div>
					<div class="field field-first">
						<div class="label">
							<label for="autocomplete"> المبلغ المستلم :</label>
						</div>
						<div class="input">
							<input type="text" name="recived" class="test" style="width:235px;">
						</div>
					</div>
					<div class="field field-first">
						<div class="label">
							<label for="autocomplete"> المبلغ بالحروف :</label>
						</div>
						<div class="input">
							<input type="text" name="am" class="test" style="width:235px;" value="<?php echo $str = $this->convert_ar->money2str(round($rows[0]['amount']), 'SAR', 'ar');  ?>"readonly>
						</div>
					</div>
					<div class="field">
						<div class="label">
							<label for="autocomplete"> طريقة الدفع :</label>
						</div>
						<div class="input">
							<select name="action" id="type">
								<option value="cash" class="unlocked">نقدا</option>
								<option value="cheque" class="folder-open">شيك</option>
							</select>
						</div>
					</div>
					<div class="field">
						<span id="wait_1" style="display: none;">
			    			<img alt="Please Wait" src="<?php echo base_url()?>css/cp/images/ajax-loader.gif"/>
						 </span>
						 <span id="result_1" style="display: none;"></span>
					</div>
					<div class="field">
						<div class="label">
							<label for="autocomplete"> إستلمنا من :</label>
						</div>
						<div class="input">
							<input type="text" name="name" id="name" value="<?php echo $rental[0]['t_name']?>"readonly>
						</div>
					</div>
					<div class="field">
						<div class="label">
							<label for="autocomplete">  المستلم :</label>
						</div>
						<div class="input">
							<input type="text" name="receiver" id="reciver" value="القصر العصرى للعقارات" readonly>
						</div>
					</div>
						<div class="field">
							<div class="label">
								<label for="autocomplete"> وذلك مقابل :</label>
							</div>
						<div class="input">
							<textarea rows="4" cols="50" name="reason" id = "reason">
							</textarea>
						</div>
					</div>
				</div>
				<?php echo form_hidden('id',$rows[0]['id'])?>
				<?php echo form_hidden('money',$rows[0]['amount'])?>
				<?php echo form_hidden('rental_id',$rows[0]['rental_id'])?>
				<?php echo form_submit('submit','حفظ' , 'id=button-save');?>
				<?php echo form_close(); ?>
			</div>
<?php echo $this->load->view('inculdes/footer');