<?php echo $this->load->view('inculdes/header')?>
<link href="<?php echo base_url();?>css/cp/jquery.fancybox.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>css/cp/style.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>css/cp/thickbox.css" rel="stylesheet" type="text/css">
<script  src="<?php echo base_url()?>js/jquery.fancybox.js" type="text/javascript"></script>
<script  src="<?php echo base_url()?>js/jquery.easing.1.3.js" type="text/javascript"></script>
<script  src="<?php echo base_url()?>js/printThis.js" type="text/javascript"></script>
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
<script type="text/javascript">
jQuery(function($) {
	$( "#tabs" ).tabs();
});
</script>


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



<title><?php echo $title;?></title>
<div class="box">
			<div class="title">
				<h5><?php echo $title;?> </h5>
			</div>
			<div class="table">
				<p id="back"><?php echo anchor('admin/estates/index','العودة لصفحة العقارات');?></p>
				<div id="tabs">
					<ul>
						<li><a href="#tabs-1">محفوظ</a></li>
						<li><a href="#tabs-2">أرشيف</a></li>
					</ul>
				<div id="tabs-1">
					<?php if(is_array($rows)): $i=0?>
					<table id="emp" border="2" class="jtable">
					    <thead><tr><th>رقم</th><th>المؤجر</th><th>المستأجر</th><th>الجوال</th><th>الإجراءات</th></tr></thead>
					        <?php foreach ($rows as $key => $list):$i++; ?>
					        
					      <tr>
					            <td><?php echo $i?></td>
						        <td><?php echo $list['owner']?></td>
						        <td><?php echo $list['t_name'];?></td>
						        <td><?php echo $list['t_phone'];?></td>
					            <td class="align-center buttons buttons-small">
								<?php
								if($this->session->userdata('rols')==1):
								echo anchor('admin/contract/delete/'.$list['id'],'حذف',array('id'=>'dialog-confirm-open','class'=>'test'));											
								echo " | ";
								endif;
								echo anchor('admin/contract/details/'.$list['id'].'/' .$list['id'],'عرض','class=various');
								?></td>
					    </tr>
					        <?php endforeach; ?>	
					       				         
					</table>
					<?php endif;?>
				</div>
				<div id="tabs-2">
					<?php if(is_array($archive)): $i=0?>
					<table id="emp" border="2" class="jtable">
					    <thead><tr><th>رقم</th><th>المؤجر</th><th>المستأجر</th><th>الجوال</th><th>الإجراءات</th></tr></thead>
					        <?php foreach ($archive as $key => $list):$i++; ?>
					      <tr>
					            <td><?php echo $i?></td>
						        <td><?php echo $list['owner']?></td>
						        <td><?php echo $list['t_name'];?></td>
						        <td><?php echo $list['t_phone'];?></td>
					            <td class="align-center buttons buttons-small">
								<?php
								if($this->session->userdata('rols')==1):
								echo anchor('admin/contract/delete/'.$list['id'],'حذف',array('id'=>'dialog-confirm-open','class'=>'test'));											
								echo " | ";
								endif;
								echo anchor('admin/contract/details/'.$list['id'].'/' .$list['id'],'عرض','class=various');
								?>
					    </tr>
					        <?php endforeach; ?>					         
					</table>
					<?php endif;?>
				</div>								
			</div>	
 <?php echo $this->load->view('inculdes/footer');