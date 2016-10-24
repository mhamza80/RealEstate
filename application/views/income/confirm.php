<?php echo $this->load->view('inculdes/header')?>
<script type="text/javascript">
jQuery(function($) {
$("#date").datepicker();
});
</script>
<script type="text/javascript">
$(document).ready(function() {	  
    // Checkboxes click function
    $('input[type="checkbox"]').on('click',function(){
        // Here we check which boxes in the same group have been selected
        // Get the current group from the class
        var checked = [];
        // Loop through the checked checkboxes in the same group
        // and add their values to an array
        $('input[type="checkbox"].' +  ':checked').each(function(){
            checked.push($(this).val());
            $.ajax({
                type: "POST",
                url:"<?php echo base_url('admin/income/confirmed')?>",
                data: { checked : checked },
                complete: function() {
                    alert('تم التأكيد بنجاح ');
                    window.setTimeout(function(){location.reload()},500)
                },
                error: function() {
                    alert('خطأ');
                },
            }); 
        });
    }); 
});
</script>
<script type="text/javascript">
				jQuery(function($) {
				$('#emp').dataTable({
				 "sPaginationType": "full_numbers",
					"bStateSave": true,
					"bProcessing": true,
					"bJQueryUI": true,
					"bLengthChange": false,
			                            "bFilter": true,
			                            "bSort":false,
			                            "bInfo": true,

					 "oLanguage": {
					"sProcessing":   "جاري التحميل...",
			    "sLengthMenu":   "أظهر مُدخلات _MENU_",
			    "sZeroRecords":  "لم يُعثر على أية سجلات",
			    "sInfo":         "إظهار _START_ إلى _END_ من أصل _TOTAL_ مُدخل",
			    "sInfoEmpty":    "يعرض 0 إلى 0 من أصل 0 سجلّ",
			    "sInfoFiltered": "(منتقاة من مجموع _MAX_ مُدخل)",
			    "sInfoPostFix":  "",
			    "sSearch":       "ابحث:",
				"oPaginate": {
			        "sFirst":    "الأول",
			        "sPrevious": "السابق",
			        "sNext":     "التالي",
			        "sLast":     "الأخير"
			    }

				}
			    } );
			} );
		</script>
<title><?php echo $title;?></title>
<div class="box">
<?php if ($this->session->flashdata('sucess')){?>
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
					<div class="title">
						<h5><?php echo $title;?> </h5>
					</div>
			<div class="table">
			<?php if(empty($rows)){?>
		<div id="message-warning" class="message message-warning">
								<div class="image">
									<img src="<?php echo base_url('resources/images/icons/warning.png')?>" alt="warning" height="32" />
								</div>
								<div class="text">
									<span><?php echo "لا توجد إيرادات للتأكيد عليها"?></span>
								</div>
								<div class="dismiss">
									<a href="#message-warning"></a>
								</div>
							</div>
							<?php }
								if(is_array($rows)){$i=0;?>
								<table id="emp" border="2" class="jtable">
					       			 <thead><tr><th>رقم</th><th>العقار</th><th>الوحدة</th><th>القسم</th><th>المبلغ</th><th>التاريخ</th><th>الإيضاح</th><th>تأكيد</th></tr></thead>
					        			<?php foreach ($rows as $key => $list):
					        				$rental = $this->rental->get_by_id($list['rental_id']);
					        				$estate = $this->estate->get_by_id($rental[0]['estate_id']);
					        				if(!empty($list['long_contract_id'])){
					        				$first  = $this->long_contract->get_details($list['long_contract_id']);			        				
					        				$s 		= $this->long_contract->get_by_id($first[0]['estate_id']);
					        				}
					        				if(empty($list['long_contract_id'])){
					        					$s 		= $this->type->get_by_id($estate[0]['estate_type']);
					        				}
						        			$hdate  = $this->ger->GregorianToHijri($list['date'],'YYYY-MM-DD');
						      				$i++;?>
					               		 <tr>
						               		 <td><?php echo $i?></td>
						               		 <td><?php if(!empty($list['long_contract_id'])){echo $s[0]['name'];}else{echo $s[0]['type'];}?></td>
						               		 <td><?php if(!empty($list['long_contract_id'])){echo $s[0]['name'];}else{ echo $estate[0]['estate_name'];}?></td>
							                 <td><?php echo $list['department'];?></td>
							                 <td><?php echo number_format(round($list['amount']),0,'.',",")." " ."ريال";?></td>
							                 <td><?php echo $hdate;?></td>
							                 <td><?php echo $list['Illustration'];?></td>
						                     <td class="align-center buttons buttons-small">
											 <input type="checkbox" name="ch[]" id="recive" value="<?php echo $list['id']?>"></td>
					    	       		 </tr>
					         	   		<?php endforeach; ?>					        
								</table>
							<?php }				
echo $this->load->view('inculdes/footer');	