<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>برنامج إدارة العقارات</title>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
		<!-- stylesheets -->
		<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>resources/css/reset.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>resources/css/style.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>resources/css/colors/blue.css">
		
		<!-- scripts (jquery) -->
		<script  src="<?php echo base_url()?>resources/scripts/jquery-1.4.2.min.js" type="text/javascript"></script>
		<script  src="<?php echo base_url()?>resources/scripts/jquery-ui-1.8.custom.min.js" type="text/javascript"></script>
		<script  src="<?php echo base_url()?>resources/scripts/smooth.js" type="text/javascript"></script>
		
		
		<script type="text/javascript">
			$(document).ready(function () {
				style_path = "<?php echo base_url()?>resources/css/colors";

				$("input.focus").focus(function () {
					if (this.value == this.defaultValue) {
						this.value = "";
					}
					else {
						this.select();
					}
				});

				$("input.focus").blur(function () {
					if ($.trim(this.value) == "") {
						this.value = (this.defaultValue ? this.defaultValue : "");
					}
				});

				$("input:submit, input:reset").button();
			});
		</script>
	</head>
	<body>
		<div id="login">
			<!-- login -->
			<div class="title">
				<h5>برنامج إدارة العقارات</h5>
				<div class="corner tl"></div>
				<div class="corner tr"></div>
			</div>
			<div class="messages">
            <!--
				<div id="message-error" class="message message-error">
					<div class="image">
						<img src="resources/images/icons/error.png" alt="Error" height="32" />
					</div>
					<div class="text">
						<h6>Error Message</h6>
						<span>This is the error message.</span>
					</div>
					<div class="dismiss">
						<a href="#message-error"></a>
					</div>
				</div>
                -->
			</div>
			<div class="inner">
			<?php echo form_open('welcome/sing_in');?>
				<div class="form">
					<!-- fields -->
					<div class="fields">
						<div class="field">
							<div class="label">
								<label for="username">اسم المستخدم:</label>
							</div>
							<div class="input">
								<input type="text" id="username" name="name" size="40" value="admin" class="focus" />
							</div>
						</div>
						<div class="field">
							<div class="label">
								<label for="password">كلمة المرور:</label>
							</div>
							<div class="input">
								<input type="password" id="password" name="pass" size="40" value="password" class="focus" />
							</div>
						</div>
						
						<div class="buttons">
							<input type="submit" value="دخـــول" />
						</div>
					</div>
					<!-- end fields -->
					<!-- links -->
					
					
					<!-- end links -->
				</div>
				<?php echo form_close()?>
				<?php if($this->session->flashdata('error'))
				{?>
					<div class="messages">
				<div id="message-error" class="message message-error">
					<div class="image">
						<img src="<?php echo base_url()?>resources/images/icons/error.png" alt="Error" height="32" />
					</div>
					<div class="text">
						<h6>خطأ</h6>
						<span><?php echo $this->session->flashdata('error')?></span>
					</div>
					<div class="dismiss">
						<a href="#message-error"></a>
					</div>
				</div>

			</div>
					<?php }?>
			
			</div>
			<!-- end login -->
		</div>
	</body>
</html>