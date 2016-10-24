<?php echo $this->load->view('inculdes/header')?>
<script  src="<?php echo base_url()?>js/printThis.js" type="text/javascript"></script>
<script type="text/javascript">
jQuery(function($) {
	$('a.print').click(function(){
		$.ajax({
			type: 'POST',
			cache: false,
			 url: "<?php echo site_url('admin/admin/numbers')?>",
			data: '1',			
			complete: function(ee) {
			 $('.title_txt').load(window.location.pathname+' .title_txt');
			$(".form").printThis({
			     importCSS: false,          
			      printContainer: true,      
			      loadCSS: "<?php echo site_url('css/cp/v8.css')?>",
			  });
			},		
		});
	});
});
</script>
<script type="text/javascript">
jQuery(function($) {
	$('a.user').click(function(){
		$.ajax({
			type: 'POST',
			cache: false,
			 url: "<?php echo site_url('admin/admin/numbers')?>",
			 data: '1',	
			 complete: function(ee) {			
			 $('.title_txt').load(window.location.pathname+' .title_txt');
			 $(".form").printThis({
			     importCSS: false,          
			      printContainer: true,      
			      loadCSS: "<?php echo site_url('css/cp/v8.css')?>",
			  });
			},		
		});
		$.ajax({
			type: 'POST',
			cache: false,
			 url: "<?php echo site_url('admin/admin/single_vocher')?>",
			 data: {id:'<?php echo $rows[0]['id']?>'},
			 	complete: function(ee) {	
				 $('.table').load(window.location.pathname+' .table');					
				},					
		});
	});
});
</script>
<link rel="stylesheet" href="<?php echo site_url('css/cp/v8.css')?>" type="text/css" />
<title><?php echo $title; ?></title>

	

<div class="box">
	<div class="table">
	<div id="printt" style="display:none"></div>
			<?php if($this->session->userdata('rols') == 1):?>
				<a class="print" href='#'><img alt="" src="<?php  echo base_url('resources/images/icons/print.png')?>" title="print"></a>
			<?php endif;?>
			<?php if($this->session->userdata('rols') != 1 & $rows[0]['privilege'] == 0):?>
				<a class="user" href='#'><img alt="" src="<?php  echo base_url('resources/images/icons/print.png')?>" title="print"></a>
			<?php endif;?>			
		<div id="print">				
			<div class="form">
				 <table class="tab" width="960" align="center" cellpadding="0" cellspacing="0">
  <tr>
  
   </tr>
  <tr>
    <td  colspan="0" align="center">&nbsp;</td>
  </tr>
  <tr>
    <td  colspan="0" align="right" dir="rtl"><br><br><br><br><br>
    <table width="960" border="0" cellspacing="0" cellpadding="0">
      <tr><br>
        <td width="25%" height="98" style="padding:40px; padding-top:44px"><div class="number_txt"><?php echo number_format(round($rows[0]['amount']),0,'.',",")." " .""?></div></td>
        <td width="50%" align="right" ><div class="title_txt">رقــم <?php echo $number[0]['number']?></div> </td>
        <td width="25%" align="left" ><div class="number_txt"><?php echo $hdate?></div>
         
        </td>
        <td width="684" align="right" class="number_txt" dir="ltr"> </td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="10" dir="rtl" colspan="0" align="center"><table width="960" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="204" height="18"  class="number_txt" style="padding:10px" dir="rtl"></td>
        <td width="750"  align="right"><div class="name_txt1"><?php echo $rows[0]['pay_name']?></div></td>
        <td width="154" align="left"  style="padding:10px" dir="ltr"> </td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="20" dir="rtl" colspan="0" align="center"><table width="960" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="117" class="tit_sub" style="padding:10px" dir="rtl"></td>
        <td width="750" height="18"   align="right" valign="top"><div class="name_txt"><?php echo $str = $this->convert_ar->money2str(round($rows[0]['amount']), 'SAR', 'ar');  ?></div></td>
        <td width="92" align="left" class="tit_sub" style="padding:10px" dir="ltr"></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="20" dir="rtl" colspan="0" align="center">
    <table width="960" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="81" dir="rtl"></td>
        <td width="162"><div class="cheque_txt"><?php echo $rows[0]['cheqe_number']?></div></td>
        <td width="81" align="right"  ></td>
        <td width="48" align="right"  >&nbsp;</td>
        <td width="44"  dir="rtl"></td>
        <td width="160" ><div class="cheque_txt"><?php echo $rows[0]['cheqe_date']?></div></td>
        <td width="46" align="right"  dir="ltr"> </td>
        <td width="48" align="right" dir="ltr">&nbsp;</td>
        <td width="58"  dir="rtl"></td>
        <td width="179" ><div class="cheque_txt"><?php echo $rows[0]['bank_name']?></div></td>
        <td width="53"  align="left" dir="ltr" style="padding:10px"> </td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td  dir="rtl" colspan="0" align="center"><table width="960" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="116"  style="padding:10px" dir="rtl"></td>
        <td height="20"  width="750"  align="right"><div class="name_txt2"><?php echo $rows[0]['reason']?></div></td>
        <td width="92" align="left" style="padding:10px" dir="ltr"></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td  dir="rtl" colspan="0" align="center"><table width="960" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td style="padding:10px" width="67" class="tit_sub" dir="rtl"></td>
        <td width="159"><div class="cheque_txt1"><?php echo number_format(round($rows[0]['amount']),0,'.',",")." " .""?></div></td>
        <td width="734" align="right" class="tit_sub" dir="ltr"></td>
      </tr>
    </table></td>
  </tr>
   <tr>
    <td  dir="rtl" colspan="0" align="center"><table width="960" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td style="padding:10px" width="65" class="tit_sub" dir="rtl"></td>
        <td width="154"><div class="cheque_txt2"><?php  echo "0"//echo number_format(round($rem->amount),0,'.',",")." " .""?></div></td>
        <td width="490" align="right" class="tit_sub" dir="ltr"></td>
        <td width="245" height="37" align="right"><div class="reciver_txt"><?php echo $rows[0]['receiver']?></div></td>
      </tr>
    </table></td>
  </tr>
  <tr>
 <td  colspan="0" align="center"><table width="960" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="293" height="64" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
       <tr>
            
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