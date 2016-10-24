<?php echo $this->load->view('inculdes/header')?>
<title><?php echo $title?></title>
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
			        "sLast":     "الأخير",			  
			    }
				}
				
			    } );
			} );
		</script>

<div class="box">
<?php if ($this->session->flashdata('add')){?>
		<div id="message-success" class="message message-success">
								<div class="image">
									<img src="<?php echo base_url('resources/images/icons/success.png')?>" alt="Success" height="32" />
								</div>
								<div class="text">

									<span><?php echo $this->session->flashdata('add')?></span>
								</div>
								<div class="dismiss">
									<a href="#message-success"></a>
								</div>
							</div>
							<?php }?>
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
							<?php echo anchor('admin/estates/add','إضافة','id="add-type"')?>
							<br/>
							<div id="message-warning" class="message message-warning">
								<div class="image">
									<img src="<?php echo base_url('resources/images/icons/warning.png')?>" alt="Success" height="32" />
								</div>
								<div class="text">
									<span><?php echo "لا يوجد وحدات مؤجرة ";?></span>
								</div>
								<div class="dismiss">
									<a href="#message-warning"></a>
								</div>
							</div>
							<?php }
							if(is_array($rows))
							{
								$i = 0;?>
						<table id="emp" border="2" class="jtable">
					        <thead><tr><th>رقم </th><th>المالك</th><th>العقار</th><th>الجوال</th><th>نوع العقار</th><th>الوحدة</th><th>حالة العقار</th><th>تحرير</th></tr>
					        	<?php foreach ($rows as $key => $list):
					        		 $units  = $this->stypes->get_by_id($list['sub_type_id']);
					        		 $type   = $this->type->get_by_id($list['estate_type']);
					        		 $status = $this->rental->get_by_estate($list['id']);
					      			 $i++;
					      			?>
					        	 </thead>
					                <tr>
					                	   <td><?php echo $i?></td>
						                   <td><?php echo $list['owner'];?></td>
						                   <td><?php echo $list['estate_name'];?></td>
						                   <td><?php echo $list['mobile'];?></td>
						                   <td><?php echo $type[0]['type'];?></td>
										   <td><?php echo $units[0]['name']?></td>
										   <td><?php if($list['status'] == 1){?> <img title="مؤجر" src="<?php echo base_url()."resources/images/icons/ava.png"?>"><?php } else{?><img title="متاح" src="<?php echo base_url()."resources/images/icons/ok.png"?>"><?php }?></td>
						                   <td class="align-center buttons buttons-small">
											<?php
											if($this->session->userdata('rols') == "1"):
											echo anchor('admin/estates/delete/'.$list['id'],'حذف',array('id'=>'dialog-confirm-open','class'=>'test'));
											echo " | ";
											endif;
											//if($this->session->userdata('userId') == $list['entered_by']  or $this->session->userdata('rols') == "admin"):
											echo anchor('admin/estates/edit/'.$list['id'],'تعديل','id=edit');
											echo " | ";
											//endif;
											echo anchor('admin/estates/details/'.$list['id'].'/' .$list['id'],'عرض');
											?>
					    	            </tr>
					            <?php endforeach; ?>
					        </tbody>
						</table>
						<?php }
									
echo $this->load->view('inculdes/footer');