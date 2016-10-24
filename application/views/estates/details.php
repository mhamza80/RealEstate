<?php echo $this->load->view('inculdes/header')?>
<link href="<?php echo base_url();?>css/cp/jquery.fancybox.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>css/cp/style.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>css/cp/thickbox.css" rel="stylesheet" type="text/css">
<script  src="<?php echo base_url()?>js/jquery.fancybox.js" type="text/javascript"></script>
<script  src="<?php echo base_url()?>js/jquery.accordion.js" type="text/javascript"></script>
<script  src="<?php echo base_url()?>js/jquery.easing.1.3.js" type="text/javascript"></script>
<script  src="<?php echo base_url()?>js/jquery.printElement.min.js" type="text/javascript"></script>


<script type="text/javascript">

jQuery(function($) {
	$( "#tabs" ).tabs();
});
</script>

<style media="print">
body { font-family: Verdana; text-decoration:underline; font-color:red; }
</style>
<script type="text/javascript">
jQuery(function($) {
	$(".various").fancybox({
		type: 'ajax',
		'maxWidth'	: 730,
		'maxHeight'	: 600,
		'autoSize'	: true
	});
		});
</script>
<script type="text/javascript">
jQuery(function($) {
	$(".post_images").fancybox({
		'maxWidth'	: 730,
		'maxHeight'	: 600,
		'autoSize'	: true
	});
		});
</script>
<script type="text/javascript">
jQuery(function($) {
	$('a.media').click(function(){
	$('a.media').media({width:300, height:200});
		});
});
</script>
<script type="text/javascript">
jQuery(function($) {
	$('a.print').click(function(){
		$("#print").printElement(
	            {
	            overrideElementCSS:[
			'<?php echo base_url('css/cp/print.css')?>']
	            });
	});
});
</script>
 <script type="text/javascript">
 jQuery(function($) {	
				$('#st-accordion').accordion();
            });
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
					
				<p id="back"><?php echo anchor('admin/estates/index','العودة لصفحة العقارات');?></p>
				<div id="tabs">
					<ul>
						<li><a href="#tabs-1">التفاصيل</a></li>
						<li><a href="#tabs-2">المستندات</a></li>
						<li><a href="#tabs-3">الصور</a></li>
					</ul>
	<div id="tabs-1">
	
			<a class="print" href='#'><img alt="" src="<?php  echo base_url('resources/images/icons/printer.png')?>" title="transaction">
				
				</a>

	<div id="print">
	<div id="worker-info" style="direction:rtl; ">
	<?php $city = $this->city->get_by_id($rows[0]['city_id']);
	$type = $this->type->get_by_id($rows[0]['estate_type']);?>
	<ul>
	<li><strong>المالك :</strong> <?php echo $rows[0]['owner'];?></li>
	<li><strong>عنوان المالك :</strong> <?php echo $rows[0]['address'];?></li>
	<li><strong>الهاتف :</strong> <?php echo $rows[0]['phone'];?></li>
	<li><strong>الجوال:</strong> <?php echo $rows[0]['mobile'];?></li>
	<li><strong>إسم العقار :</strong> <?php echo $rows[0]['estate_name'];?></li>
	<li><strong>المدينة:</strong> <?php echo $city[0]['city'];?></li>
	<li><strong>الحى :</strong> <?php echo $rows[0]['district'];?></li>
	<li><strong>نوع العقار :</strong> <?php echo  $type[0]['type'];?></li>
	<li><strong> الوحدة:</strong> <?php echo $units[0]['name'];?></li>
	<li><strong>المخطط :</strong> <?php echo $rows[0]['schema'];?></li>
	<li><strong>حالة العقار :</strong> <?php echo $rows[0]['estate_status'];?></li>
	<li><strong>عمر العقار :</strong> <?php echo $rows[0]['estate_age'];?></li>
	<li><strong>رقم الصك :</strong> <?php echo $rows[0]['instrument_num'];?></li>
	<li><strong>رقم الوحة:</strong> <?php echo $rows[0]['board_num'];?></li>
 	<li><strong>سعر الحد :</strong> <?php echo number_format($rows[0]['price_limit'],0,'.',",")?></li>
	<li><strong>سعر السوم :</strong> <?php echo number_format($rows[0]['price_somme'],0,'.',",");?></li>
	<li><strong>سعر المتر مربع :</strong><?php echo  number_format($rows[0]['price_meter'],0,'.',","); ?></li>
	<li><strong>رقم القطعة :</strong> <?php echo $rows[0]['part_numer'];?></li>
	<li><strong>سعر القطعة :</strong> <?php echo number_format($rows[0]['part_price'],0,'.',",");?></li>
	<li><strong>رقم البلوك :</strong> <?php echo $rows[0]['block_number'];?></li>
	<li><strong>المساحة :</strong> <?php echo number_format($rows[0]['area'],0,'.',",")?>م<sup>2</sup></li>
	<li><strong>الحد الجنوبي :</strong> <?php echo $rows[0]['border_south'];?></li>
	<li><strong>الحد الشمالى :</strong> <?php echo $rows[0]['border_north'];?></li>
	<li><strong>الحد الشرقى :</strong> <?php echo $rows[0]['border_east'];?></li>
	<li><strong>الحد الغربى :</strong> <?php echo $rows[0]['border_east'];?></li>
	<li><strong>معلومات إضافية :</strong> <?php echo $rows[0]['info'];?></li>
	</ul>
	</div>
	</div>
	</div>
	<div id="tabs-2">
	<?php 
	$documents = $this->document->get_by_id($rows[0]['id']);
	if(empty($documents)):
		echo anchor('admin/estates/add_documents/'.$rows[0]['id'],'إضافة مستند جديد',"id=addicon2");?>
	<div id="message-warning" class="message message-warning">
								<div class="image">
									<img src="<?php echo base_url('resources/images/icons/warning.png')?>" alt="Success" height="32" />
								</div>
								<div class="text">
									<span><?php echo "لا توجد اي مستندات خاصة بهذه المعاملة"?></span>
								</div>
								<div class="dismiss">
									<a href="#message-warning"></a>
								</div>
							</div>
							<?php endif;
							
			if(is_array($documents))
			{
				echo anchor('admin/estates/add_documents/'.$rows[0]['id'],'إضافة مستند جديد',"id=addicon2");
			
					foreach ($documents as $key => $list) {
					$i = 0;
				}?>
			<table id="emp" border="2" class="jtable">

       	 <thead><tr><th>رقم </th><th>عنوان المستند</th><th>تاريخ الإضافة</th><th>تحرير</th></tr>

        	<?php foreach ($documents as $key => $list):
      			$i++;
      			$cut_date = explode(" ", $documents[0]['added_date'])
        	 ?>
        	 </thead>
                <tr>
                	<td><?php echo $i?></td>
	                <td><?php echo $list['file_name'];?></td>
	                <td><?php echo $cut_date[0];?></td>
                  <td class="align-center buttons buttons-small">
					<?php
					echo anchor('admin/upload/delete_document/'.$list['file_name'].'/'.$list['id'].'/'.$this->uri->segment(4),'حذف',array('id'=>'dialog-confirm-open','class'=>'test'));
					echo " | ";?>
					<a target="_blank" href="<?php echo base_url()."resources/assets/img/articles/".$list['file_name']?>" onclick="open(this.href, this.target, 'width=600, height=450, top=200, left=250'); return false;">عرض</a>
					</td>
    	            </tr>
    	          
            <?php endforeach; ?>
        </tbody>
	</table>
<?php }?>
	</div>
	<div id="tabs-3">
	<h2>صور العقار</h2>
		<?php  
		 if(empty($pictures)):
	 		echo anchor('admin/estates/add_photo/'.$rows[0]['id'],'إضافة صورة جديدة',"id=addicon2");?>	 
	 	<div id="message-warning" class="message message-warning">
								<div class="image">
									<img src="<?php echo base_url('resources/images/icons/warning.png')?>" alt="Success" height="32" />
								</div>
								<div class="text">
									<span><?php echo "لا توجد اي صور مضافة من قبل"?></span>
								</div>
								<div class="dismiss">
									<a href="#message-warning"></a>
								</div>
							</div>
							<?php endif;
			  if(is_array($pictures)):
			  $i = 0; 
			  echo anchor('admin/estates/add_photo/'.$rows[0]['id'],'إضافة صورة جديدة',"id=addicon2");?>	 
			<table id="emp" border="2" class="jtable">
	       	 <thead><tr><th>رقم </th><th>عنوان الصورة</th><th>تاريخ الإضافة</th><th>تحرير</th></tr>
        	<?php foreach ($pictures as $key => $list):
      			$i++;
      			$cut_date = explode(" ", $pictures[0]['added_date'])
      	
        	 ?>
        	 </thead>
                <tr>
                	<td><?php echo $i;?></td>
	                <td><?php $image_properties = array(
					          'src' => base_url()."resources/assets/img/articles/".$list['file_name'],
					          'class' => 'post_images',
					          'width' => '100',
					          'height' => '100',
							);
	               echo img($image_properties); ?></td>
	                <td><?php echo $cut_date[0];?></td>
                  <td class="align-center buttons buttons-small">
					<?php
					echo anchor('admin/upload/delete_photo/'.$list['file_name'].'/'.$list['id'].'/'.$this->uri->segment(4),'حذف',array('id'=>'dialog-confirm-open','class'=>'test'));
					echo " | ";?>
					<a target="_blank" href="<?php echo base_url()."resources/assets/img/articles/".$list['file_name']?>" onclick="open(this.href, this.target, 'width=600, height=450, top=200, left=250'); return false;">عرض</a>
					</td>
    	            </tr>
    	          
            <?php endforeach; ?>
        </tbody>
	</table>
	 <?php endif;?>
	
			</div>	
							
		</div>	
 <?php echo $this->load->view('inculdes/footer');