<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style type="text/css">
body {
	margin:0;
	padding:0;
	background-color:#ccc;
	color:#000;
	font: 0.8em/2.0em Arial, "MS Trebuchet", sans-serif;
	text-align:center;
}
label {
	display:block;
	padding-bottom:3px;
}


#container { 
	background-color:#fff;
	border:3px solid #eee;
	margin:50px auto 0;
	padding:20px;
	width:480px;
	text-align:center;
}
#uploadcontainer { 
	padding:0;
	padding:20px;
	text-align:center;
}


* {
    margin: 0;
    padding: 0;
}
body {
    background-color: #FFFFFF;
    color: #2E3C1F;
    font: 12px Arial,Helvetica,sans-serif;
}
a {
    color: #3C72B0;
}
h1 {
    color: #A3A8AD;
    font-size: 16px;
    line-height: 30px;
}
div.close{
	padding-top:14px;
	font-size:14px;

}
blockquote {
    line-height: 16px;
}
#myform {
    margin: 10px 0;
}
label {
    display: block;
    line-height: 20px;
}
textarea, input {
    background-color: #F3F3F3;
    border: 1px solid #D0D0D0;
    color: #2E3C1F;
    font: 12px Arial,Helvetica,sans-serif;
    padding: 2px;
}
textarea {
    width: 100%;
}
p.moremargin {
    margin: 5px 0;
}
#container {
    padding: 10px;
}
#closelink {
    font-weight: bold;
    padding: 20px 0 10px;
    text-align: center;
}
div.error {
   color: #CC0000;
    font-size: 15px;
    font-weight: bold;
    padding-top: 28px;
}
div.sucess {
   color: green;
    font-size: 15px;
    font-weight: bold;
    padding-top: 28px;
}
.ok {
    padding:10px;
}

</style>
</head>
<body>

<div id="uploadcontainer">
		<h1>إرفاق ملف</h1>
		<?php echo form_open_multipart('admin/cheque/add_upload' )?>
		<div class="form">
			<div class="fields">
					<div class="field field-first">
						<label for="name">إختر الملف</label>
							<div class="input">
							<input name="upload" type="file" size="15" />
							<input type="submit" name="Submit" value="رفع" />
						</div>
					</div> 
				</div>
			</div>
			<?php echo form_hidden('id',$this->uri->segment(4))?>
			<?php echo form_close();?>
		<div class="error"><?php
		if(isset($error))
		{
			echo $error;	
		}
		?> 
	</div>
	<div class="close"><a href="#" onclick="self.parent.tb_remove();"><?php if(!isset($sucess)){echo "إلغاء";}?></a></div>
		<div class="sucess"><?php if(isset($sucess)){
			echo $sucess;?>
			<span class="ok"><a href="#" onclick="self.parent.tb_remove();">إغلاق</a></span>	
			<?php }?>
		</div>
	</div>
</body>
</html>