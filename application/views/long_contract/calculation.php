<?php echo $this->load->view('inculdes/header')?>
<title><?php echo $title?></title>
<script type="text/javascript">
$(document).ready(function(){

    var counter = 2;
	
    $("#addButton").click(function () {
			
		if(counter>10){
	        alert("10 حقول فقط");
	        return false;
	    }  
		
		var newTextBoxDiv = $(document.createElement('div')).attr("id", 'TextBoxDiv' + counter);
            newTextBoxDiv.html(
			'<div class="field">'+
            '<label>السنة  #'+ counter +  ' ' + 'من  : </label>' +
            '<div class="input">'+      
			'<input type="text" name="from[]'+ counter +
			'" id="daete"' + counter + '" value="">'+
			'</div>'+'</div>'+
			
			'<div class="field">'+
			'<label>إلى    : </label>' +
			'<div class="input">'+      
			'<input type="text" name="to[]' +counter + 
			'" id="gere33" value="">'+
			'</div>'+'</div>'+
			
			'<div class="field">'+
			'<label>المبلغ: </label>' +
			'<div class="input">'+      
			'<input type="text" name="amount[]' +counter +
			'" id="subj' + counter+  '" value="" >'+
			'</div> '+ '</div>'	
			+
			'<div class="field">'+ 
			'<label>الخيارات: </label>' +
			'<div class="checkboxes">'+
			'<div class="checkbox">'+
				'<input type="checkbox" value="1" id="checkbox-1" name="installment[]" />'+
					'<label for="checkbox-1">قسط واحد</label>'+
			'</div>'+
			'<div class="checkbox">'+
				'<input type="checkbox" value="2" id="checkbox-2" name="installment[]" />'+
					'<label for="checkbox-2">قسطين</label>'+
			'</div>'+
			'<div class="checkbox">'+
				'<input type="checkbox" value="1" name="date[]" />'+
					'<label for="checkbox-3">تاريخ هجري</label>'+
			'</div>'+
			'<div class="checkbox">'+
				'<input type="checkbox" value="2" name="date[]" />'+
					'<label for="checkbox-3">تاريخ ميلادى</label>'+
					
		'</div>'
		
			);
        
		newTextBoxDiv.appendTo("#TextBoxesGroup");
			
	    counter++;
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
		<?php echo form_open_multipart('admin/contracts/calculation','id="myform"')?>
			<div class="form">
				<div class="fields">
					<div class="field field-first">
						<label for="name">السنة #1 من</label>
							<div class="input">
							<?php $name_data= array(
							"name" =>"from[]1",
							"size"=>25,
							"title"=>"يجب أن يحتوى على ارقام فقط"
							);
						echo form_input($name_data)."<p/>";?>			
						</div>
					</div>
					<div class="field">
						<label for="name">السنة إلى</label>
						<div class="input">
							<?php $name_data= array(
							"name" =>"to[]1",
							"size"=>25,
							"title"=>"يجب أن يحتوى على ارقام فقط"
							);
						echo form_input($name_data)."<p/>";?>			
						</div>
					</div>
			<div class="field">
			<label for="name">المبلغ</label>
			<div class="input">
				<?php $name_data= array(
				"name" =>"amount[]1",
				"size"=>25,
				"title"=>"يجب أن يحتوى على ارقام فقط"
				);
			echo form_input($name_data)."<p/>";?>			
			</div>
			</div>
			<div class="field">
			<label for="name">الخيارات</label>
			<div class="checkboxes">
				<div class="checkbox">
					<input value="1" type="checkbox" id="checkbox-1" name="installment[]" />
						<label for="checkbox-1">قسط واحد</label>
				</div>
				<div class="checkbox">
					<input  value="2" type="checkbox" id="checkbox-2" name="installment[]" />
						<label for="checkbox-2">قسطين</label>
				</div>
				<div class="checkbox">
					<input type="checkbox" value="1" name="date[]" />
						<label for="checkbox-3">تاريخ هجري</label>
				</div>
				<div class="checkbox">
					<input type="checkbox" value="2" name="date[]" />
						<label for="checkbox-3">تاريخ ميلادى</label>
				</div>
			</div>
			</div>
			<div class="field">
			<div id="TextBoxDiv1">
	        <input type='button' value='إضافة حقول' id='addButton'>
		</div>
		</div>
		<div id='TextBoxesGroup'>
		</div>
		</div>
		<?php echo form_submit('submit','حفظ' , 'id=button-save');?>
		<?php echo form_hidden('id',$this->uri->segment(4))?>
		<?php echo form_close(); ?>
		</div>
	<?php echo $this->load->view('inculdes/footer');	