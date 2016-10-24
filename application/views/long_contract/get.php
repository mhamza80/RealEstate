<?php echo $this->load->view('inculdes/header')?>
<title><?php echo $title;?></title>
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
<?php if(empty($rows)){
		 echo anchor('admin/contracts/create','إضافة','id="add-type"')?>
		<div id="message-warning" class="message message-warning">
								<div class="image">
									<img src="<?php echo base_url('resources/images/icons/warning.png')?>" alt="warning" height="32" />
								</div>
								<div class="text">
									<span><?php echo "لا توجد إيجارات مضافة من قبل"?></span>
								</div>
								<div class="dismiss">
									<a href="#message-warning"></a>
								</div>
							</div>
							<?php }
							if(is_array($rows)){$i = 0;
							echo anchor('admin/contracts/create','إضافة','id="add-type"')?>
						<table id="emp" border="2" class="jtable">
					        <thead><tr><th>رقم </th><th>نوع العقار</th><th>تحرير</th></tr>
					        	<?php foreach ($rows as $key => $list):$i++;
					        		$name = $this->long_contract->get_by_id($list['estate_id']);?>
					         </thead>
					             <tr>
					               <td><?php echo $i?></td>
						           <td><?php echo anchor("admin/contracts/details/".$list['id'],$name[0]['name']);?></td>
					    	       <td>
									<?php
										if($this->session->userdata('rols') == 1):
										echo anchor('admin/contracts/delete/'.$list['estate_id'],'حذف',array('id'=>'dialog-confirm-open','class'=>'test'));
										echo " | ";
										endif;
										echo anchor('admin/contracts/edit/'.$list['id'],'تعديل','id=edit');
										echo " | ";
										echo anchor('admin/contracts/details/'.$list['id'].'/' .$list['id'],'عرض');
										?>
					            	<?php endforeach;?>
					           	 </td>
					            </tr>
						</table>
							<?php }				
echo $this->load->view('inculdes/footer');	