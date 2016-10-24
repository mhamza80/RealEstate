<?php echo $this->load->view('inculdes/header');?>
<title><?php echo $title;?></title>
<script type="text/javascript">
jQuery(function($) {
$("#date").datepicker({ dateFormat: 'yy-mm-dd' });
});	
</script>
<div class="box">
					<div class="title">
						<h5><?php echo $title;?> </h5>
					</div>
	<div class="table">
		<?php echo form_open_multipart('admin/income/edit','id=income' )?>
					<div class="form">
						<div class="fields">
							<div class="field">
								<div class="label">
									<label for="autocomplete">القسم:</label>
								</div>
								<div class="input">
									<input type="text" name="department" id="department" value="<?php echo $get[0]['department']?>">
								</div>
						</div>
						<div class="field">
								<div class="label">
									<label for="autocomplete">المبلغ:</label>
								</div>
								<div class="input">
									<input type="text" name="amount" id="amount" value="<?php echo $get[0]['amount'];?>">
								</div>
						</div>
						<div class="field">
								<div class="label">
									<label for="autocomplete">التاريخ:</label>
								</div>
								<div class="input">
									<input type="text" name="date" id="date" value="<?php echo $get[0]['date']?>">
								</div>
						</div>
						<div class="field">
								<div class="label">
									<label for="autocomplete">الإيضاح:</label>
								</div>
								<div class="input">
									<textarea rows="4" cols="50" name="Illustration" id="name" "><?php echo $get[0]['Illustration']?></textarea>
								</div>
						</div>
					</div>
					<?php echo form_hidden('id',$get[0]['id'])?>
					<?php echo form_submit('submit','حفظ' , 'id=button-save');?>
					<?php echo form_close();?>
					</div>
<?php echo $this->load->view('inculdes/footer');