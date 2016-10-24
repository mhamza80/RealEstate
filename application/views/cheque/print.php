<?php echo $this->load->view('inculdes/header')?>
<title><?php echo $title?></title>
<div class="box">
			<div class="title">
				<h5><?php echo $title;?> </h5>
			</div>
	<div class="table">
		<form target="_blank" action="<?php echo base_url('admin/cheque/display') ;?>" method="post">			
			<div class="form">
				<div class="fields">
					<div class="field field-first">
						<div class="label">
							<label for="autocomplete">يصرف لأمر السيد /  :</label>
						</div>
						<div class="input">
							<input type="text" name="to" id="to" value="<?php echo $rows[0]['name']?>">
						</div>
					</div>					
					<div class="field">
						<div class="label">
							<label for="autocomplete">حرر فى مدينة :</label>
						</div>
						<div class="input">
							<input type="text" name="city" id="name" value="<?php echo $rows[0]['city']?>">
						</div>
					</div>					
					<div class="field">
						<div class="label">
							<label for="autocomplete">  المبلغ :</label>
						</div>
						<div class="input">
							<input type="text" name="amount" id="amount" value="<?php echo number_format(round($rows[0]['amount']),0,'.',",")." " ."ريال"?>">
						</div>
					</div>
					<div class="field">
						<div class="label">
							<label for="autocomplete"> وذلك عن :</label>
						</div>
						<div class="input">
							<input type="text" name="about" id="about" value="<?php echo $rows[0]['about']?>">
						</div>
					</div>		
					<div class="field">
						<div class="label">
							<label for="autocomplete">المبلغ بالحروف:</label>
						</div>
						<div class="input">
							<input type="text" name="amount" id="amount" value="<?php echo  $this->convert_ar->money2str(round($rows[0]['amount']), 'SAR', 'ar');?>">
						</div>
					</div>							
				</div>
			</div>
		<?php echo form_hidden('id',$rows[0]['id'])?>
		<input id="Print" type="submit" value="  طباعة  "></input>
		</form>

		
<?php echo $this->load->view('inculdes/footer');