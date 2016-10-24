<?php echo $this->load->view('inculdes/header')?>
<title><?php echo $title?></title>
<script type="text/javascript">
				jQuery(function($) {
				$('#eme').dataTable({
					"sPaginationType": "full_numbers",
					"bStateSave": true,
					"bProcessing": true,
					"bJQueryUI": true,
					"bLengthChange": true,
				                        "bFilter": true,
				                        "bSort":false,
				                        "bInfo": true,
				                        "sDom": '<"H"Tfr>t<"F"ip>',
				            			"oTableTools": {
				            				"sSwfPath": "http://localhost/estate/resources/scripts/copy_csv_xls_pdf.swf",							
				            				"aButtons": [
				            								{
				            									"sExtends": "copy",
				            									 'mColumns':[1,2,3,4],
				            									"sButtonText": "نسخ"
				            								},								
				            								{
				            									"sExtends": "print",
				            									'mColumns':[0,1,2,3,4],
				            					                "sButtonText": "طباعة"				            					              
				            								},
				            								{
				            									"sExtends": "xls",
				            									 'mColumns':[1,2,3],
				            									"sButtonText": "تصدير إكسل"
				            								}
				            							]
				            			},
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
<?php $get = $this->estate->count();
	  		$rental = $this->rental->count();			
		    $FC = new FusionCharts("Column3D","750", "300","0","0");
		    $FC->setRenderer('javascript');
		// specify the graph parameters
			$strParam="caption=;xAxisName=;yAxisName=;decimalPrecision=0; formatNumberScale=0;showNames=1;baseFontSize =13";		
			$FC->setChartParams($strParam);
			  $arrData[0][0] = "العقارات";
			  $arrData[1][0] = "الإيجارات";
	          $arrData[0][1] = $get;
	          $arrData[1][1] = $rental;
	          $FC->addChartDataFromArray($arrData);
			?>
			<div class="box">
					<div class="title">
						<h5>تقرير الرسم البيانى </h5>
					</div>
					<div class="table">	
						<div id="chart1div" align="left"><?php  $FC->renderChart();?></div>
					</div>
				</div>
				<div id="box-tabs" class="box">
					<div class="title">
						<h5>التنبيهات</h5>
						<ul class="links">
							<li><a href="#box-messages">الإقساط</a></li>
							<li><a href="#box-other">الإيجارات</a></li>
							<li><a href="#box-contracts">العقود الطويلة</a></li>
						</ul>
					</div>
					<div class="table">	
						<div id="box-messages">
							<?php if(is_array($installment))
							{
								$this->load->helper('rent');
								installment($installment,$alert[0]['days']);	
							}?>
	
						</div>
						<div id="box-other">
							<?php if(is_array($rent))
							{
								$this->load->helper('rent');
								rent($rent,$rent_alert[0]['days']);
							}?>
						</div>
						<div id="box-contracts">
							<?php if(is_array($long_contracts))
							{
								$this->load->helper('rent');
								long_contarcts($long_contracts,$contracts[0]['days']);
							}?>
						</div>
<?php echo $this->load->view('inculdes/footer');