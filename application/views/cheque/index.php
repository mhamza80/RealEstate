<?php echo $this->load->view('inculdes/header')?>
<title><?php echo $title;?></title>
<script type="text/javascript">
				jQuery(function($) {
				$('#emp').dataTable({
				 "sPaginationType": "full_numbers",
					"bStateSave": true,
					"bJQueryUI": true,
					"bProcessing": true,
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
		<div id="dialog-add-classifi" title="إضافة مدينة  جديدة">
			<p class="validateTips">جميع الحقول إحبارية.</p>
			<?php echo form_open_multipart('admin/transaction/add_classification','id=city' )?>
			<div class="form">
				<div class="fields">
					<div class="field">
						<div class="label">
							<label for="autocomplete">المدينة:</label>
						</div>
						<div class="input">
						<input type="text" name="name" id="name">
						</div>
					</div>
				</div>
			</div>
			<input type="hidden" id="details" value="">
			<?php echo form_close();?>
		</div>
<?php if(empty($rows)):
		echo anchor('admin/cheque/create','إضافة','id="add-type"');?>
		<div id="message-warning" class="message message-warning">
								<div class="image">
									<img src="<?php echo base_url('resources/images/icons/warning.png')?>" alt="warning" height="32" />
								</div>
								<div class="text">
									<span><?php echo "لا توجد شيكات مضافة"?></span>
								</div>
								<div class="dismiss">
									<a href="#message-warning"></a>
								</div>
							</div>
							<?php endif;
							if(is_array($rows)):$i = 0;
									echo anchor('admin/cheque/create','إضافة','id="add-type"');?>
						<table id="emp" border="2" class="jtable">
					        <thead><tr><th>رقم </th><th>إسم المستفيد</th><th>المبلغ</th><th>التاريخ</th><th>نسخة الشيك</th><th>الإجراءات</th></tr>
					        	<?php foreach ($rows as $key => $list):	$i++; ?>
					        </thead>
					           <tr>
					               <td><?php echo $i?></td>
						           <td><?php echo $list['name'];?></td>
						           <td><?php echo number_format(round($list['amount']),0,'.',",")." " ."ريال";?></td>
						           <td><?php echo date("Y-m-d",$list['date']);?></td>
						           <td><?php if(empty($list['cheque_name'])){echo "لا يوجد";}else{?><a target="_blank" href="<?php echo base_url()."files/".$list['cheque_name']?>" onclick="open(this.href, this.target, 'width=600, height=450, top=200, left=250'); return false;">عرض</a><?php }?></td>
					               <td class="align-center buttons buttons-small">
										<?php
										if($this->session->userdata('rols') == 1):
										echo anchor('admin/cheque/delete/'.$list['id'],'حذف',array('id'=>'dialog-confirm-open','class'=>'test'));
										echo " | ";
										endif;?>
										<a href="<?php echo base_url('admin/cheque/upload/'.$list['id'])."?placeValuesBeforeTB_=savedValues&TB_iframe=true&height=300&width=500&modal=true"?>" class="thickbox">إضافة مرفقات </a>
										</td>
					    	       </tr>
					           	 <?php endforeach;?>
					        </tbody>
						</table>
					<?php endif;	
echo $this->load->view('inculdes/footer');	