<?php $this->load->view('inculdes/header') ?>
<div class="box">
					<div class="title">
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
							
<?php $this->load->view('inculdes/footer') ?>