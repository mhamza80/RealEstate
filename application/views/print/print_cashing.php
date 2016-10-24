<?php echo $this->load->view('inculdes/header')?>
<script  src="<?php echo base_url()?>js/jquery.printElement.min.js" type="text/javascript"></script>
<script type="text/javascript">
jQuery(function($) {
	$('a.print').click(function(){
		$(".form").printElement(
	            {
	            overrideElementCSS:[
			'<?php echo site_url('css/cp/v.css')?>',
			{ href:'<?php echo site_url('css/cp/v.css')?>',media:'print'}]			
	           });
	});
});
</script>
<title><?php echo $title?></title>
	<div class="box">
			<div class="title">
				<h5><?php echo $title;?> </h5>
			</div>
		<div class="table">
		<div id="printt" style="display:none"></div>
			<?php if($this->session->userdata('rols') == 1):?>
				<a class="print" href='#'><img alt="" src="<?php  echo base_url('resources/images/icons/print.png')?>" title="transaction"></a>
			<?php endif;?>
		<div id="print">				
			<div class="form">
				 <table class="tab" width="960" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="300" align="center" valign="middle"><span> <span class="titen">Modern Palace Real-estate<br />
      Office</span><br />
      </span><span class="tit_sub">C.r : 101016373<br />
        P.O box 8221 riyadh 11482<br />
        FAX : 0096856574 <br />
        TEL : 0114788889
         </span></td>
    <td width="360" align="center" valign="middle"><img src="<?php echo base_url('resources/images/icons/logo.png')?>" width="180" height="180" /></td>
    <td width="300" height="200" align="center" valign="middle"><span ><span class="tit">مكتب<br />
      القصر العصري للعقارات</span><br />
      </span><span class="tit_sub">س.ت : 101016373<br />
        ص.ب 8221 الرياض 11482<br />
        فاكس : 0096856574<br / >
        هاتف : 0114788889
        </span></td>
  </tr>
  <tr>
    <td height="65" colspan="3" align="center"><div><span class="tit">أمر صرف</span><br />
      <span class="titen"><u>Receipet Pay</u></span></div></td>
  </tr>
  <tr>
    <td height="23" colspan="3" align="center">&nbsp;</td>
  </tr>
  <tr>
    <td height="50" colspan="3" align="right" dir="rtl"><table width="960" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td style="padding:10px"width="40" class="tit_sub" dir="rtl">التاريخ:</td>
        <td width="208"><?php echo $rows[0]['date']  ?><div id="hor"></div></td>
        <td width="684" align="right" class="tit_sub" dir="ltr">Date: </td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="50" dir="rtl" colspan="3" align="center"><table width="960" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td style="padding:10px" class="tit_sub" dir="rtl">يصرف للسيد : /</td>
        <td width="652"><?php echo $rows[0]['receiver']?><div id="hor2"></div></td>
        <td align="left" class="tit_sub" style="padding:10px" dir="ltr">Recieved from Mr. : </td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="50" dir="rtl" colspan="3" align="center"><table width="960" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="82" class="tit_sub" style="padding:10px" dir="rtl">مبلغ وقدره:</td>
        <td width="786"><?php echo $str = $this->convert_ar->money2str(round($rows[0]['amount']), 'SAR', 'ar');  ?><div id="hor3"></div></td>
        <td width="92" align="left" class="tit_sub" style="padding:10px" dir="ltr">Amount of: </td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="50" dir="rtl" colspan="3" align="center"><table width="960" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td style="padding:10px"width="81" class="tit_sub" dir="rtl">شيك رقم:</td>
        <td width="162"><?php echo $rows[0]['cheqe_number']?><div id="hor4"></div></td>
        <td width="81" align="right" class="tit_sub" dir="ltr">Cheque No: </td>
        <td width="48" align="right" class="tit_sub" dir="ltr">&nbsp;</td>
        <td width="44" class="tit_sub" dir="rtl">التاريخ:</td>
        <td width="160"><?php echo $rows[0]['cheqe_date']?><div id="hor4"></div></td>
        <td width="46" align="right" class="tit_sub" dir="ltr">Date: </td>
        <td width="48" align="right" class="tit_sub" dir="ltr">&nbsp;</td>
        <td width="69" class="tit_sub" dir="rtl">على بنك:</td>
        <td width="168"><?php echo $rows[0]['bank_name']?><div id="hor4"></div></td>
        <td width="53" class="tit_sub" align="left" dir="ltr" style="padding:10px">Bank: </td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td height="50" dir="rtl" colspan="3" align="center"><table width="960" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="88" class="tit_sub" style="padding:10px" dir="rtl">وذلك مقابل:</td>
        <td width="780"><?php echo $rows[0]['Illustration']?><div id="hor3"></div></td>
        <td width="92" align="left" class="tit_sub" style="padding:10px" dir="ltr">Payment of: </td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="50" dir="rtl" colspan="3" align="center"><table width="960" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td style="padding:10px"width="67" class="tit_sub" dir="rtl">المدفوع:</td>
        <td width="159"><?php echo number_format(round($rows[0]['amount']),0,'.',",")." " ."ريال"?><div id="hor5"></div></td>
        <td width="734" align="right" class="tit_sub" dir="ltr">Payed: </td>
      </tr>
    </table></td>
  </tr>  
  <tr>
    <td height="75" colspan="3" align="center"><table width="960" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="293" height="64" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td align="center" class="tit_sub">المستلم</td>
          </tr>
          <tr>
            <td align="center" class="tit_sub">Reciver</td>
          </tr>
          <tr>
            <td height="37" align="center"><div id="hor6"><?php echo $rows[0]['receiver']?></div></td>
          </tr>
        </table></td>
        <td width="667">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan="3" align="center">&nbsp;</td>
  </tr>
</table>
                
			</div>
		</div>
<?php echo $this->load->view('inculdes/footer');