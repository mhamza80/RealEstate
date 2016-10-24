<script type="text/javascript">
jQuery(function($) {
	$('a.print').click(function(){
		$(".form").printThis({
			     importCSS: false,          
			      printContainer: true,      
			      loadCSS: "<?php echo site_url('css/cp/contt.css')?>",
			  });
	});
});
</script>
<style>

.form {
		margin:0 auto;
		width:750px;
		font-weight:700;
		direction:rtl;	
	}
	
	.middle {
		font-size:11px;
		vertical-align:top;	
	}
	
	.form label {
		font-size:11px;
		width:auto;	
	}
	
	.form .middle{
		text-align:center;
		font-weight:bold;	
	}

	.form .logo{
		width:100px;
		height:70px;
		margin:0 auto;
		display:block;	
	}
	
	.form .field{
		widows:200px;
	}
	
	.form .input{
		float:left;
		width:130px;
		margin:0 0 5px 5px;
		border:none;
		border-bottom:1px solid #999;
	}
	
	.form .input1{
		width:120px;
		margin:0 0 5px 5px;
		border:none;
		border-bottom:1px solid #999;
	}
	
	.form .inputL{
		float:right;
		width:135px;
		margin:5px 5px 0 0;
		direction:rlt;
		border:none;
		border-bottom:1px solid #999;
	}
	
	.form .labelL{
		float:left;
		direction:ltr;
		margin:5px 0 0 0;
	}
	
	.form .fullInputSize{
		width:98%;
		display:block;
		margin:0 auto;
		border:none;
		border-bottom:1px solid #999;
	}
	
	.form .labelDL{
		direction:ltr;
		float:right;
	}
	
	.form .label{
		float:right;
		margin:0 0 5px 0;
	}
	
	.form .fullLabelSize{
		width:30%;
		display:block;
		margin:0 auto;
	}
	
	.form .smallInputSize{
		width:80%;
		display:block;
		margin:0 auto;
		height:30px;
		border:none;
		border-bottom:1px solid #999;
	}
	
	.form .smallLabelSize1{
		display: block;
		margin: 0 auto;
		width: 55%;
		direction:ltr;
	}
	
	.form .smallLabelSize{
		display: block;
		margin: 0 auto;
		width: 27%;
		direction:ltr;
	}
	
	.form .labelMidlle{
		display:block;
		text-align:center;
		font-size:16px;
		font-weight:bold;	
	}

#print .form table tbody tr td table tr td {
	text-align: justify;
}
</style>
</head>
<a class="print" href='#'><img alt="" src="<?php  echo base_url('resources/images/icons/printer.png')?>" title="transaction"></a>
		<div id="print">		
			<div class="form">
                <table>             
					<thead>
					<tr align="center">
						<td width="24%" height="80" colspan="1" class="middle" style="width:30%;">
							مكتب القصر العصري للعقارات<br>
							س.ت : 101016373<br>
							ص.ب 8221 الرياض 11482<br>
							فاكس : 0112914949<br />
							هاتف : 0114788889
						</td>
                        
						<td colspan="2" style="width:40%; align:center;"><img width="350" height="350" src="<?php  echo base_url('resources/images/icons/logo.png')?>" class="logo"/></td>
						
                        <td width="33%" colspan="0" class="middle" style="width:33%; font-size:13px" dir="ltr">
							Modern Palace Real-estate office<br>
							C.r : 101016373<br>
							P.O box 8221 riyadh 11482<br>
							FAX : 0112914949<br />
							TEL : 0114788889
						</td>     
					</tr>
					
					</thead>
					
					<tbody>                        
						<tr>
							<td style="width:27%;">
                                <div class="field">
										<label for="autocomplete">التاريخ :</label>
										<input type="text" name="amount" class="input" 
                                        value=""readonly>
								</div>
							</td>                            
					  </tr>
                        <tr>
                        	<td>                 
							</td> 
                            
						  <td colspan="2">
                            <div class="field">
										<label for="autocomplete" class="labelMidlle">عـقــد ايجـــار</label>
								</div>  
						  </td>                            
						</tr>
                        
                        <!--<tr height="15"></tr>-->
                        
                        <tr>
                       	  <td colspan="1">
                                <div class="field">
										<label for="autocomplete" >بعون تعالى لله تم الاتفاق بين كلا من :</label>
								</div>  
							</td>
                            
                       	  <td colspan="3"><input type="text" name="name" id="name" class="fullInputSize" 
                            value=""></td>                             
						</tr>
                        
                        <!--<tr height="15"></tr>-->
                        
                        <tr>
                        	<td colspan="4">
                               	<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="12%"><label for="autocomplete" >الطرف الأول المؤجر /</label></td>
    <td width="88%">
								<input type="text" name="name" id="name" class="fullInputSize" 
                            value="<?php echo $rows[0]['owner']?>"></td>
  </tr>
</table>
 
							</td>
                       	</tr>
                        
                        <!--<tr height="15"></tr>-->
                        
                        <tr>
                        	<td colspan="3"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                        	  <tr>
                        	    <td width="17%"><label for="autocomplete" >الطرف الثانى المستأجر /</label></td>
                        	    <td width="83%">
                                        <input type="text" name="name" id="name" class="fullInputSize" 
                            value="<?php echo $rows[0]['t_name']?>"></td>
                      	    </tr>
                      	  </table>
                                  
                            </td>
                            
                        	<td>
                            	<label for="autocomplete">العنوان :</label>
                           	  <input type="text" name="name" id="name" class="input1" style="width:138px;"
                                value="<?php echo $rows[0]['t_address']?>">
							</td>                            
						</tr>
                        
                        <!--<tr height="15"></tr>-->
                        
                        <tr>
                       	  <td style="width:25%;">
                            	<label for="autocomplete"> الجنسية :</label>
                                <input type="text" name="name3" id="name3" class="input1" style="width:115px;"
                                value="<?php echo $rows[0]['nationality']?>" /></td>
                            
                            <td width="25%" style="width:25%;">
                           	  <label for="autocomplete"> رقم البطاقة :</label>
                            	<input type="text" name="name" id="name" class="input1" style="width:100px;"
                                value="<?php echo $rows[0]['Identity']?>">
							</td>
                            
                          <td width="18%" style="width:26%;">
                            	<label for="autocomplete"> مصدرها:</label>
                           	<input type="text" name="name" id="name" class="input1" style="width:95px;"
                                value="<?php echo $rows[0]['id_plcae']?>">
						  </td> 
                            
                            <td style="width:25%;">
                            	<label for="autocomplete"> تاريخها:</label>
                           	  <input type="text" name="name" id="name" class="input1" style="width:119px;"
                                value="<?php echo $rows[0]['id_issue']?>">
							</td>                            
						</tr>
                        
                        <!--<tr height="15"></tr>-->
                        
                        <tr>
                        	<td style="width:25%;">
                            	<label for="autocomplete">نوع العقد المؤجر :</label>
                           	  <input type="text" name="name" id="name" class="input1" style="width:75px;"
                                value="<?php echo $rows[0]['contract_type']?>">
							</td>
                           
                            <td style="width:25%;">
                            	<label for="autocomplete">الموقع :</label>
                           	  <input type="text" name="name" id="name" class="input1" style="width:120px;"
                                value="<?php echo $rows[0]['location']?>">
							</td>
                            
                            <td style="width:25%;">
                            	<label for="autocomplete"> الشارع :</label>
                            	<input type="text" name="name" id="name" class="input1" style="width:138px;"
                                value="<?php echo $rows[0]['street']?>">
							</td> 
                            
                            <td style="width:25%;">
                            	<label for="autocomplete"> رقم الهاتف :</label>
                            	<input type="text" name="name" id="name" class="input1" style="width:119px;"
                                value="<?php echo $rows[0]['t_phone']?>">
							</td>                            
						</tr>
                        
                        <!--<tr height="15"></tr>-->
                        
                        <tr>
                        	<td style="width:25%;">
                            	<label for="autocomplete">مدة العقد :</label>
                           	  <input type="text" name="name" id="name" class="input1" style="width:75px;"
                                value="<?php echo $rows[0]['duration']?>">
							</td>
                            
                            <td>
                            	<label for="autocomplete">بداية العقد :</label>
                           	  <input type="text" name="name" id="name" class="input1" style="width:105px;"
                                value="<?php echo $rows[0]['start_contarct'];?>">
							</td>
							                 
                            <td>
                            	<label for="autocomplete"> نهاية العقد :</label>
                           	  <input type="text" name="name" id="name" class="input1" style="width:105px;"
                                value="<?php echo $rows[0]['end_contarct'];?>">
							</td>
							<td style="width:25%;">
                            	<label for="autocomplete">تكلفة المياه :</label>
                            	<input type="text" name="name" id="name" class="input1" style="width:85px;"
                                value="<?php echo $rows[0]['water']?>">
							</td>                                  
						</tr>
                        
                        <!--<tr height="15"></tr>-->
                        
                        <tr>
                        	<td colspan="2">
                            	<label for="autocomplete">مقدار الإيجار :</label>
                           	  <input type="text" name="name" id="name" class="input1" style="width:237px;"
                                value="<?php echo  number_format($rows[0]['rent_price'],0,'.',",")." ريال"; ?>">
							</td>
                            
                          <td colspan="2">
                            	<label for="autocomplete">شروط الدفع :</label>
                            	<input type="text" name="name" id="name" class="input1" style="width:275px; right:861px; top:396px "
                                value="<?php echo $rows[0]['condition']?>">
							</td>                            
						</tr>
						<tr>
                        	<td height="38">                 
							</td> 
                            
							<td colspan="2">
                                <div class="field">
										<label for="autocomplete" class="labelMidlle">شــروط العقــــد</label>
								</div>  
							</td>                            
							</tr>
                        <tr>
                       	  <td colspan="4"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                       	    <tr>
                       	      <td valign="top" style="font-size:12px; font-weight:bold;">اولا &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;:</td>
                       	      <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                       	        <tr>
                       	          <td width="35%" valign="top"><label for="autocomplete10">استأجر الطرف الثانى المكان المشار اليه عالية بقصد استعمالة</label></td>
                       	          <td width="9%" valign="top"><input type="text" name="name2" id="name2" class="input1" style="width:68px; margin-top:auto;"
                                value="<?php echo $rows[0]['purpose']?>" /></td>
                       	          <td width="56%" valign="top"><label for="autocomplete11" style="margin:0 5px 0 0;display:block;"> وذلك بعد حالته الراهنة . وتعهد بإعادتة بعد نهاية العقد كما كان عند بدايتة .</label></td>
                   	            </tr>
                   	          </table></td>
                   	        </tr>
                       	    <tr>
                       	      <td width="9%" valign="top" style="font-size:12px; font-weight:bold;">ثانيا &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;:</td>
                       	      <td width="91%" align="justify" valign="top"><span style="font-size:12px;">تعهد المستأجر ألا يحدث فى المكان المؤجر عليه أى تغيير من بناء أو هدم أو إزالة حوائط
                              أو بناء أو إزالة أعمدة أو أى عمل من شأنه أن يحدث ضررا للمبنى إلا بعد الرجوع للمالك وأخذ موافقة
                                خطية لإخلاء مسؤلية الجميع ويحق للطرف المؤجر رفض الطلب بهذا الخصوص
                                كما تعهد المتسأجر بأن يترك للمؤجر جميع التعديلات والمبانى والإصلاحات التى قد يكون أجراها
                                وكذلك ما تم تركبيه من بلاط أو اوراق جدران أو اسقف مستعارة أو أعمدة جبس أو إعادة الوضع كما كان عليه وقت التأجير
                                 ولا يتم تركيب أو تجديد أجهزة الإستقبال الدش إلا بموافقة الطرف الأول خطيا.
                                 </span></td>
                   	        </tr>
                       	    <tr>
                       	      <td valign="top" style="font-size:12px; font-weight:bold;">ثالثا &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;:</td>
                       	      <td align="justify" valign="top"><span style="font-size:12px;">لا يحق للمستأجر أن يطالب المؤجر بأى مبالغ مالية قام بدفعها او أراد الخروج وعدم إكمال المدة المحددة قبل نهايتها كما تعهد بدفع الإيجار كاملا عن المدة المحددة ولا يحق له لأى سبب أن يؤجل دفع الإيجار أو أن يطالب بتخفيضه أو أن يقتطع منه أى مبلغ عن أى اصلاحات قام بها دون أخذ الموافقة الخطية من قبل المؤجر قبل إجرائها. </span></td>
                   	        </tr>
                       	    <tr>
                       	      <td width="9%" valign="top" style="font-size:12px; font-weight:bold;">رابعا &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;:</td>
                       	      <td align="justify" valign="top"><span style="font-size:12px;">فى حالة عدم مراجعة المتسأجر للمكتب لتجديد عقده فإنه يتم احتساب مبلغ وقدره <?php echo  number_format($rows[0]['delay'],0,'.',",")." ريال"; ?> عن كل يوم تأخير من نهاية العقد وحتي تجديد العقد أو استلام الموقع من المستأجر ويحق للمؤجر اتخاذ مايراه بعد نهاية العقد او في حال تاخره عن دفع القسط المستحق بعد مضى أسبوع من إستحقاقه مثل قطع خدمات المياه والكهرباء عن الموقع بدون إعتراض المستأجر على ذلك ودون مسؤلية علي مكتب إدارة العقار.</span></td>
                   	        </tr>
                       	    <tr>
                       	      <td valign="top" style="font-size:12px; font-weight:bold;">خامسا &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</td>
                       	      <td align="justify" valign="top"><span style="font-size:12px;">تعهد المستأجر بأن لا يؤجر من الباطن أو أن يتنازل عن كل المكان المؤجر عليه أو جزء منه حتى لأقرب اقربائه دون الحصول على موافقة خطية من المؤجر الذي يحق له قبول أو رفض ذلك. </span></td>
                   	        </tr>
                       	    <tr>
                       	      <td width="9%" valign="top" style="font-size:12px; font-weight:bold;">سادسا &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</td>
                       	      <td align="justify" valign="top"><span style="font-size:12px;">بعد إستلام المستأجر للموقع فهو مسؤل مسؤلية كامله وفى حال وجود تلفيات بالمكان المؤجر فللمؤجر تقدير التلفيات ومطالبة المستأجر بدفعها فورا أو ان يقوم المستأجر بإصلاحها او إعادتها على سابق حالتها.  </span></td>
                   	        </tr>
                       	    <tr>
                       	      <td valign="top" style="font-size:12px; font-weight:bold;">سابعا &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;:</td>
                       	      <td align="justify" valign="top"><span style="font-size:12px;">تعهد المستأجر وألتزم بإخلاء المكان المؤجر عليه فور انتهاء مدة العقد ولا يحق له	الأستمرار فيه إلا بعقد جديد بينه وبين المؤجر ويحق للمؤجر التعديل فى بنود العقد حسب مايراه دون معارضة المستأجر وعلية مراجعة المكتب قبل إنتهاء العقد.  </span></td>
                   	        </tr>
                       	    <tr>
                       	      <td width="9%" valign="top" style="font-size:12px; font-weight:bold;">ثامنا &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;:</td>
                       	      <td align="justify" valign="top"><span style="font-size:12px;">تعهد المستأجر ألا يزعج المجاورين باى أضرار أو إزعاج مثل إلقاء النفايات فى غير مكانها أو إخراج المياه أو إحداث الفوضى والضجيج منه أو من أطفاله أو زواره. </span></td>
                   	        </tr>
                       	    <tr>
                       	      <td valign="top" style="font-size:12px; font-weight:bold;">تاسعا &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;:</td>
                       	      <td align="justify" valign="top"><span style="font-size:12px;">تعهد المستأجر بتسديد كافة المصاريف المستحقة على المكان المؤجر مثل إستهلاك الكهرباء والماء والتليفون والغاز ومصاريف الغرامات التى تحدث من جراء عدم سداده لما ذكر . كما أن على المستأجر تصفية عداد الكهرباء الخاص بالشقة المؤجره له من شركة الكهرباء بإستهلاكه للشهر الذى يتم فيه إخلاء الشقة عند نهاية العقد أو لاى سبب من الأسباب المنصوص عليها بهذا العقد.  </span></td>
                   	        </tr>
                       	    <tr>
                       	      <td width="9%" valign="top" style="font-size:12px; font-weight:bold;">عاشرا &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</td>
                       	      <td align="justify" valign="top"><span style="font-size:12px;">تعهد المستأجر عدم تخزين اى مواد خطيرة او مضرة بالصحة أو اى مواد ممنوعة او التى من شأنها تهديد سلامة المبنى والمحل أو المجاروين له والمستأجر مسؤل مسؤلية كاملة عن كافة الأضرار التى قد تحدث اذا خالف هذا الشرط. </span></td>
                   	        </tr>
                       	    <tr>
                       	      <td valign="top" style="font-size:12px; font-weight:bold;">حادي عشر &nbsp;:</td>
                       	      <td align="justify" valign="top"><span style="font-size:12px;">بهذا تم الإتفاق والتراضى على جميع الشروط والإلتزامات وقبلها المستأجر بعد قراءته وسماعه لجميع بنوده وشروطه كاملة وليس لديه أى اعتراض عليها وهى ملزمه له إلزاما شرعيا.  </span></td>
                   	        </tr>
                       	    <tr>
                       	      <td width="9%" valign="top" style="font-size:12px; font-weight:bold;">ثاني عشر &nbsp; &nbsp;:</td>
                       	      <td align="justify" valign="top"><span style="font-size:12px;">أي إخلاء من قبل المستأجر لأى بند من البنود السابقة فيحق للمؤجر مطالبته بإخلاء المكان فورا وعليه ان يسدد باقى مايستحق عليها من إيجار حتى نهاية المدة المحددة فى العقد. </span></td>
                   	        </tr>
                       	    <tr>
                       	      <td width="9%" valign="top" style="font-size:12px; font-weight:bold;">ثالث عشر   &nbsp; &nbsp;:</td>
                       	      <td align="justify" valign="top"><span style="font-size:12px;">ان التوقيع على هذا العقد يعتبر إقرار كاملا لكل ماورد فيه من نصوص وغير قابل لأى طريق من طرق الطعن او التظلم أو الغبن وهو ملزم للطرفين إلزاما شرعيا وعليه التقيد به كاملا وقد تم تحرير هذا العقد من أصل وصورتين الإصل يسلم للمستأجر والصورتين تبقى لدى المؤجر وقد إستلم المستأجر الأصل للتمشى بموجيه والإطلاع عليه بإستمرار حفظا لحقوق الطرفين . وإذ هما يوقعها عليه ويشهدان ومن يشهد من خلقه والله الهادى إلى سواء السبيل. </span></td>
                   	        </tr>
                   	      </table></td>                          
						</tr>
                        
                        <!--<tr height="15"></tr>-->
                        
                        <tr>
                        	<td colspan="4">
                                <div class="field">
										<label for="autocomplete"><span style="font-size:12px; font-weight:bold;">ملاحظات</span>
                                         &nbsp;:&nbsp;&nbsp;</label>
                                        <textarea type="text" name="name"  id="name" class="input" style="width:678px;height:30px;"><?php echo $rows[0]['info'];?></textarea>
								</div>  
							</td> 
                        </tr>

                        <!--<tr height="15"></tr>-->
                        
                        <tr>
                       	  <td colspan="2">       
                            	<label for="autocomplete" class="labelMidlle">الطرف التانى (المستأجر)</label>
						  </td>
                          
                          <td colspan="1">       
						  </td>    
                          
                          <td colspan="2">       
                            	<label for="autocomplete" class="labelMidlle">الطرف الأول (المؤجر)</label>
						  </td>                        
						</tr>
                        
                        <!--<tr height="15"></tr>-->
                        
                        <tr>
                       	  <td colspan="2">       
                            	<label for="autocomplete" class="label">الاسم :</label>
                                <input type="text" name="name" id="name" class="inputL" style="width:250px;"
                                value="<?php echo $rows[0]['t_name']?>">
                                
                                <br/><br/>
                                
                                <label for="autocomplete" class="label">التوقيع :</label>
                                <input type="text" name="name" id="name" class="inputL" style="width:243px;"
                               value="">
						  </td>  
                          
                          <td colspan="1">       
                            	<label for="autocomplete" class="labelMidlle">الختم</label>
						  </td> 
                          
                          <td colspan="2">       
                            	<label for="autocomplete" class="label">الاسم :</label>
                                <input type="text" name="name" id="name" class="inputL" style="width:157px; float:right;"
                                value="<?php echo $rows[0]['owner']?>">
                                
                                <br/><br/>
                                
                                <label for="autocomplete" class="label">التوقيع :</label>
                                <input type="text" name="name" id="name" class="inputL" style="width:150px; float:right;"
                                value="">
						  </td>                         
						</tr>
                        
                        <!--<tr height="15"></tr>-->

				  </tbody>
                    </table>
			</div>

		</div>          