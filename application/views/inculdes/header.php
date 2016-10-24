<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
		<!-- stylesheets -->
		<link href="<?php echo base_url();?>resources/css/reset.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url();?>resources/css/style.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url();?>resources/css/style_fixed.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url();?>resources/css/colors/blue.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url();?>css/demo_page.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url();?>css/demo_table.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url();?>css/demo_table_jui.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url();?>css/jquery.dataTables.css" rel="stylesheet" type="text/css" />
	    <link href="<?php echo base_url();?>css/TableTools.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url();?>resources/css/jquery.datepick.css" rel="stylesheet" type="text/css" />		
		<link href="<?php echo base_url();?>css/cp/thickbox.css" rel="stylesheet" type="text/css" />
		<link id="color" rel="stylesheet" type="text/css" href="<?php echo base_url();?>resources/css/colors/blue.css" />
		<!-- scripts (jquery) -->
		<script  src="<?php echo base_url()?>resources/scripts/jquery.min.js" type="text/javascript"></script>	
		
		<script  src="<?php echo base_url()?>js/thickbox.js" type="text/javascript"></script>
		<script  src="<?php echo base_url()?>resources/scripts/jquery.tools.min.js" type="text/javascript"></script>	
		<!--[if IE]><script language="javascript" type="text/javascript" src="resources/scripts/excanvas.min.js"></script><![endif]-->
		<script  src="<?php echo base_url()?>js/jquery-ui.min.js" type="text/javascript"></script>	
		<script  src="<?php echo base_url()?>resources/scripts/jquery.ui.selectmenu.js" type="text/javascript"></script>
		<script  src="<?php echo base_url()?>resources/scripts/jquery.flot.min.js" type="text/javascript"></script>
		<script  src="<?php echo base_url()?>resources/scripts/jquery.media.js" type="text/javascript"></script>
		<script  src="<?php echo base_url()?>resources/scripts/jquery.calendars.js" type="text/javascript"></script>
		<script  src="<?php echo base_url()?>resources/scripts/jquery.calendars.plus.js" type="text/javascript"></script>
		<script  src="<?php echo base_url()?>resources/scripts/jquery.calendars.picker.js" type="text/javascript"></script>
		<script  src="<?php echo base_url()?>resources/scripts/jquery.calendars.islamic.js" type="text/javascript"></script>
		<script  src="<?php echo base_url()?>resources/scripts/jquery.calendars.islamic-ar.js" type="text/javascript"></script>
		<script  src="<?php echo base_url()?>resources/scripts/jquery.form.min.js" type="text/javascript"></script>
		


		<script type="text/javascript">
			jQuery(document).ready(function($) {
				style_path = "http://localhost/estate/resources/css/colors";
				$("#date-picker").datepicker();
				$("#box-tabs, #box-left-tabs").tabs();
				$("#tabs").tabs();
			});
		</script>

		<!-- scripts (custom) -->
		<script  src="<?php echo base_url()?>resources/scripts/smooth.js" type="text/javascript"></script>
		<script  src="<?php echo base_url()?>resources/scripts/smooth.menu.js" type="text/javascript"></script>
		<script  src="<?php echo base_url()?>public/FusionCharts.js" type="text/javascript"></script>		
		<script  src="<?php echo base_url()?>js/prettify.js" type="text/javascript"></script>
		<script  src="<?php echo base_url()?>js/json2.js" type="text/javascript"></script>
		<script  src="<?php echo base_url()?>js/lib.js" type="text/javascript"></script>
		<script  src="<?php echo base_url()?>js/jquery.vticker.js" type="text/javascript"></script>
		<script  src="<?php echo base_url()?>resources/scripts/smooth.table.js" type="text/javascript"></script>
		<script  src="<?php echo base_url()?>resources/scripts/smooth.form.js" type="text/javascript"></script>
		<script  src="<?php echo base_url()?>resources/scripts/smooth.dialog.js" type="text/javascript"></script>
		<script  src="<?php echo base_url()?>resources/scripts/smooth.autocomplete.js" type="text/javascript"></script>
		<script  src="<?php echo base_url()?>resources/scripts/jquery-ui-sliderAccess.js" type="text/javascript"></script>
		<script  src="<?php echo base_url()?>resources/scripts/jquery-ui-timepicker-addon.js" type="text/javascript"></script>
		<script  src="<?php echo base_url()?>js/jquery.dataTables.js" type="text/javascript"></script>
		<script  src="<?php echo base_url()?>js/ZeroClipboard.js" type="text/javascript"></script>
		<script  src="<?php echo base_url()?>js/TableTools.js" type="text/javascript"></script>
		
		<style type="text/css">	
			.container {width: 960px; margin: 0 auto; overflow: hidden;}
			
			.clock {width:143px; margin:0 auto; padding:30px; border:1px solid #333333; color:#fff; }
			
			#Date { font-family:'BebasNeueRegular', Arial, Helvetica, sans-serif; font-size:32px; text-align:center; text-shadow:0 0 5px #00c6ff; }
			
			ul.clock { width:143px; margin:29px auto; padding:0px; list-style:none; text-align:center; }
			ul li.watch { display:inline; font-size:33px; text-align:center; font-family:'BebasNeueRegular', Arial, Helvetica, sans-serif; text-shadow:0 0 5px #00c6ff; }
			
			#point { position:relative; -moz-animation:mymove 1s ease infinite; -webkit-animation:mymove 1s ease infinite; color:black; margin-top:14px;}
			
			/* Simple Animation */
			@-webkit-keyframes mymove 
			{
			0% {opacity:1.0; text-shadow:0 0 20px #00c6ff;}
			50% {opacity:0; text-shadow:none; }
			100% {opacity:1.0; text-shadow:0 0 20px #00c6ff; }	
			}
			
			@-moz-keyframes mymove 
			{
			0% {opacity:1.0; text-shadow:0 0 20px #00c6ff;}
			50% {opacity:0; text-shadow:none; }
			100% {opacity:1.0; text-shadow:0 0 20px #00c6ff; }	
			}
</style>


<script type="text/javascript">
jQuery(function($) {
		// Create two variable with the names of the months and days in an array
		var monthNames = [ "January", "February", "March", "April", "May", "June", "July", "أغسطس", "September", "October", "November", "December" ]; 
		var dayNames= ["Sunday","Monday","Tuesday","الإربعاء","Thursday","Friday","Saturday"]
		
		// Create a newDate() object
		var newDate = new Date();
		// Extract the current date from Date object
		newDate.setDate(newDate.getDate());
		// Output the day, date, month and year   
		$('#Date').html(dayNames[newDate.getDay()] + " " + newDate.getDate() + ' ' + monthNames[newDate.getMonth()] + ' ' + newDate.getFullYear());
		
		setInterval( function() {
			// Create a newDate() object and extract the seconds of the current time on the visitor's
			var seconds = new Date().getSeconds();
			// Add a leading zero to seconds value
			$("#sec").html(( seconds < 10 ? "0" : "" ) + seconds);
			},1000);
			
		setInterval( function() {
			// Create a newDate() object and extract the minutes of the current time on the visitor's
			var minutes = new Date().getMinutes();
			// Add a leading zero to the minutes value
			$("#min").html(( minutes < 10 ? "0" : "" ) + minutes);
		    },1000);
			
		setInterval( function() {
			// Create a newDate() object and extract the hours of the current time on the visitor's
			var hours = new Date().getHours();
			// Add a leading zero to the hours value
			$("#hours").html(( hours < 10 ? "0" : "" ) + hours);
		    }, 1000);	
		});
</script>
	</head>
	<body>
		<div id="colors-switcher" class="color">
			<a href="" class="blue" title="Blue"></a>
			<a href="" class="green" title="Green"></a>
			<a href="" class="brown" title="Brown"></a>
			<a href="" class="purple" title="Purple"></a>
			<a href="" class="red" title="Red"></a>
			<a href="" class="greyblue" title="GreyBlue"></a>
		</div>
		<div id="dialog-confirm" title="تأكيد الحذف؟">
			<p><span class="ui-icon ui-icon-alert"  style="float:right; font-size:14px; margin:0 7px 20px 0; display:none;"></span>متأكد أنك تريد حذف هذا؟ لا يمكن التراجع عن هذا الأمر.</p>
		</div>
		<div id="dialog-confirm-archive" title="تأكيد التحويل؟">
			<p><span class="ui-icon ui-icon-alert"  style="float:right; font-size:14px; margin:0 7px 20px 0; display:none;"></span>سيتم تحويل المستأجر الى الأرشيف</p>
		</div>
		<div id="header">
			<div id="header-outer">
				<!-- logo -->
				<div id="logo">
					<h1><a href="" title="Smooth Admin"><img src="<?php echo base_url()."resources/images/icons/logo.png"?>" alt="logo" /></a></h1>
				</div>				
				<ul id="user">
					<li class="first"><a href="<?php echo site_url('admin/admin/edit/'.$this->session->userdata('userId'))?>">معلوماتى</a></li>
					<?php   if($this->session->userdata('rols')=="1"):?>
					<li><a href="<?php echo site_url('admin/income/confirm')?>">الرسائل (<?php echo $this->income_m->confirm()?>)</a></li>
					<li><a href="<?php echo site_url('admin/admin/vochers')?>">سندات (<?php echo $this->installment->count()+$this->voucher->count()+$this->partial_payment->count()?>)</a></li>
					<?php endif;?>
					<li><a href=<?php echo base_url('admin/admin/log_out')?>>خروج</a></li>
				</ul>
				<div id="title">
					القصر العصرى للعقارات
				</div>
				<div id="header-inner">
					<div id="home">
						<a href="<?php echo site_url('admin/dashboard/index')?>"></a>
					</div>
					<ul id="quick">
						<li>
							<a href="<?php echo site_url('admin/estates/index')?>" title="transaction"><span class="icon"><img src="<?php echo base_url('resources/images/icons/home.png')?>" alt="transaction" /></span><span>العقارات</span></a>
								<ul>
								<li><a href="<?php echo site_url('admin/estates/add')?>">إضافة</a></li>
								<li><a href="<?php echo site_url('admin/cities/index')?>">المدن</a></li>
								<li><a href="<?php echo site_url('admin/types/index')?>">أنواع العقار</a></li>
								<li><a href="<?php echo site_url('admin/contracts/index')?>">العقود الطويلة</a></li>
								</ul>
						</li>
						<li>
							<a href="<?php echo site_url('admin/rentals/index')?>" title="الأرشيف"><span class="icon"><img src="<?php echo base_url('resources/images/icons/money.png')?>" alt="Events" /></span><span>الإيجارات</span></a>
							 <ul>
								<li><a href="<?php echo site_url('admin/contracts/get')?>">ايجارات العقود الطويلة</a></li>
							</ul>
							
						</li>
						<li>
							<a href="<?php echo site_url('admin/archive/index')?>" title="الأرشيف"><span class="icon"><img src="<?php echo base_url('resources/images/icons/archiver.png')?>" alt="Events" /></span><span>الأرشيف</span></a>
						</li>
						<li>
							<a href="" title="Pages"><span class="icon"><img src="<?php echo base_url('resources/images/icons/report.png')?>" alt="Pages" /></span><span>التقارير</span></a>
							<ul>
								<li><a href="<?php echo site_url('admin/reports/income')?>">الدخل</a></li>
								<li><a href="<?php echo site_url('admin/reports/outgoing')?>">المصروفات</a></li>
								<li><a href="<?php echo site_url('admin/reports/estates')?>">العقار</a></li>
								<li class="last">
								</li>
								
							</ul>
						</li>
						<li>
							<a href="" title="Links"><span class="icon"><img src="<?php echo base_url('resources/images/icons/page_white_copy.png')?>" alt="Links" /></span><span>الحسابات</span></a>
							<ul>
								<li><a href="<?php echo site_url('admin/income/index')?>">الإيردات</a></li>
								<li><a href="<?php echo site_url('admin/outgoings/index')?>">المصروفات</a></li>
								<li><a href="<?php echo site_url('admin/cheque/index')?>">الشيكات</a></li>
							</ul>
						</li>
						<li>
							<a href="" title="Links"><span class="icon"><img src="<?php echo base_url('resources/images/icons/pp.png')?>" alt="Links" /></span><span>الطباعة</span></a>
							<ul>
								<li><a href="<?php echo site_url('admin/contract/index')?>">العقود</a></li>
								<li><a href="<?php echo site_url('admin/contract/voucher')?>">سند قبض</a></li>
								<li><a href="<?php echo site_url('admin/contract/cashing')?>">أمر صرف</a></li>
							</ul>
						</li>
						 <?php if($this->session->userdata('rols')=="1"):?>
						<li>
							<a href="<?php echo site_url('admin/user/index')?>" title="Settings"><span class="icon"><img src="<?php echo base_url()?>resources/images/icons/users.png" alt="Settings" /></span><span>المستخدمين</span></a>
						</li>
						<?php endif;?>
						<li>
							<a href="" title="Settings"><span class="icon"><img src="<?php echo base_url()?>resources/images/icons/cog.png" alt="Settings" /></span><span>الضبط</span></a>
							<ul>
								<li><a href="<?php echo site_url('admin/settings/days')?>">فحص الإيجار</a></li>
								<li><a href="<?php echo site_url('admin/settings/installment')?>">فحص الاقساط</a></li>
								<li><a href="<?php echo site_url('admin/settings/long_contracts')?>">فحص العقود الطويلة</a></li>
								<li><a href="<?php echo site_url('admin/sms/index')?>">SMS مزود خدمة رسائل </a></li>
								<!--  <li><a href="<?php echo site_url('admin/backup/index')?>">نسخ قاعدة البيانات</a></li> !-->
							</ul>
						</li>
					</ul>
					<!-- end quick -->
					<div class="corner tl"></div>
					<div class="corner tr"></div>
				</div>
			</div>
		</div>
		<!-- end header -->
		<!-- content -->
		<div id="content">
			<div id="left">
				<div class="clock">
				   <div id="Date"></div>
				      <ul class="clock">
				          <li id="hours" class="watch"></li>
				          <li id="point" class="watch">:</li>
				          <li id="min" class="watch"></li>
				          <li id="point" class="watch">:</li>
				          <li id="sec" class="watch"></li>
				      </ul>
				</div>
				<div id="date-picker"></div>
				
				</div>
					<div id="right">