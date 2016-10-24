<?php echo $this->load->view('inculdes/header')?>
<title><?php echo $title;?></title>
<script type="text/javascript">
				jQuery(function($) {
				$('#emp').dataTable({
				 "sPaginationType": "full_numbers",
					"bStateSave": true,
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
					<div class="title">
						<h5><?php echo $title;?> </h5>
					</div>
					<div class="table">
							<?php if(is_array($estate)){
										$i = 0;
									?>
								<table id="emp" border="2" class="jtable">
					
					        <thead><tr><th>رقم </th><th>العقار</th><th> الوحدات</th><th>الإجراءات</th></tr>
					
					        	<?php foreach ($estate as $key => $list):
					        		$count = $this->type->count($list['id']);
					      			$i++;
					
					        	 ?>
					        	 </thead>
					                <tr>
					                	   <td><?php echo $i?></td>
						                   <td><?php echo $list['type'];?></td>
						                   <td><?php if(is_array($units)):
						                   				foreach ($units as $key => $value) {
						                   					$link = $this->estate->get_unit($value['id']);
						                   					
						                   					echo $value['name']."</br>";
						                   				}
						                   				endif;
						                   ?></td>
						                  <td class="align-center buttons buttons-small">
											<?php
											echo anchor('admin/types/delete/'.$list['id'],'حذف',array('id'=>'dialog-confirm-open','class'=>'test'));
											echo " | ";
											echo anchor('admin/types/edit/'.$list['id'].'/' .$list['id'],'تعديل','id=edit');
											echo " | ";
											echo anchor('admin/types/report/'.$list['id'].'/' .$list['id'],'تقرير');
											
											?>
					    	            </tr>
					            <?php endforeach; ?>
					        </tbody>
						</table>
							<?php }				
echo $this->load->view('inculdes/footer');	