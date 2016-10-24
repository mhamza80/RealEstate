<?php echo $this->load->view('inculdes/header')?>
<title><?php echo $title?></title>
<script type="text/javascript">
				jQuery(function($) {
				$('#emp').dataTable({
				 "sPaginationType": "full_numbers",
					"bStateSave": true,
					"bProcessing": true,
					"bJQueryUI": true,
					"bLengthChange": true,
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
			        "sLast":     "الأخير",			  
			    }
				}
				
			    } );
			} );
		</script>

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
<?php if ($this->session->flashdata('error')){?>
		<div id="message-success" class="message message-success">
								<div class="image">
									<img src="<?php echo base_url('resources/images/icons/success.png')?>" alt="Success" height="32" />
								</div>
								<div class="text">

									<span><?php echo $this->session->flashdata('error')?></span>
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
					<br/>
					<?php if(empty($rows)){?>
							<?php echo anchor('admin/rentals/add','إضافة','id="add-type"')?>
							<br/>
							<div id="message-warning" class="message message-warning">
								<div class="image">
									<img src="<?php echo base_url('resources/images/icons/warning.png')?>" alt="Success" height="32" />
								</div>
								<div class="text">
									<span><?php echo "لا يوجد مستأجرين"?></span>
								</div>
								<div class="dismiss">
									<a href="#message-warning"></a>
								</div>
							</div>
							<?php }
							if(is_array($rows)){
								$i=0;
								echo anchor('admin/rentals/add','إضافة','id="add-type"')?>
						<table id="emp" border="2" class="jtable">
					        <thead><tr><th>رقم </th><th>المؤجر</th><th>المستاجر</th><th>الوحدة</th><th>العقار</th><th>الجوال</th><th>تحرير</th></tr>
					        	<?php foreach ($rows as $key => $list):
					        		$estate = $this->estate->get_by_id($list['estate_id']);
					        		$name   = $this->type->get_by_id($estate[0]['estate_type']);
					      			$i++;
					      			?>
					        	 </thead>
					                <tr>
					                	   <td><?php echo $i?></td>
						                   <td><?php echo $list['owner'];?></td>
						                   <td><?php echo $list['t_name'];?></td>
						                   <td><?php echo $estate[0]['estate_name'];?></td>
						                   <td><?php echo $name[0]['type'];?></td>
										   <td><?php if($list['t_phone']){echo anchor('admin/sms/send/'.$list['t_phone'].'/'.$list['id'],$list['t_phone']);};?></td>
						                   <td class="align-center buttons buttons-small">
											<?php
											if($this->session->userdata('rols') == 1):
											echo anchor('admin/rentals/delete/'.$list['id'],'حذف',array('id'=>'dialog-confirm-open','class'=>'test'));
											echo " | ";
											endif;
											//if($this->session->userdata('userId') == $list['entered_by']  or $this->session->userdata('rols') == "admin"):
											echo anchor('admin/rentals/edit/'.$list['id'],'تعديل','id=edit');
											echo " | ";
											//endif;
											echo anchor('admin/rentals/details/'.$list['id'].'/' .$list['id'],'عرض');
											?>
					    	            </tr>
					            <?php endforeach; ?>
					        </tbody>
						</table>
						<?php }
echo $this->load->view('inculdes/footer');	