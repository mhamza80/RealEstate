<?php defined('BASEPATH') or exit('No direct script access allowed');/*
***********************************
        Hejri Date Script Version 1.0
   		4-4-1430
   Programed By : Saeed Hubaishan
          saeed@hubaishan.com
***********************************
       سكريت التاريخ الهجري
	برمجة: أبي الحارث الحاسوبي
	مشرف موقع صفحات الشيخ مقبل بن هادي الوادعي رحمه الله
	www.muqbel.net
***********************************
تحديثات السكريبت ستنشر بإذن الله في موقع
		www.salafsoft.com

///////////////////////////////////////////////////
//              طريقة التركيب                    //
//                                               //
//         قم برفع هذا الملف إلى موقعك           //
//      قم باستدعاء الملف من موقعك مباشرة        //
//   لإضافة التاريخ الهجري لموقعك استخدم الأمر     //
//            include ("hejridate.php")              //
//  وذلك في أي صفحة تريد ، مع ملاحظة مسار الملف   //
///////////////////////////////////////////////////


/* ==========================adate دالة تنسيق الوقت العربية
تعمل نفس عمل الدالة date ولكن مع عرض التاريخ بالعربي
***********أحرف تنسيق التاريخ الهجري 
	_j اليوم بدون أصفار
	_d يوم مع أصفار
	 _z رقم اليوم في السنة
	 _M,_F اسم الشهر
	 _m   رقم الشهر مع أصفار
	 _n رقم الشهر بدون أصفار
	 _t عدد الأيام في الشهر
	 _L السنة كبيسة أم لا 1=كبيسة
	 _Y السنة رقم كامل
	 _y السنة من رقمين
******أحرف تنسيق التاريخ الميلادي التي تم إعادة توجيهها
	l,D اسم يوم الإسبوع
	F اسماء الأشهر السريانية (كانون، شباط...)
	M اسماء الأشهر (تسمية إنجليزية)يناير ، فبراير...)
	a ,A صباحا ومساء للوقت
*/

class Hejridate {
 function __construct(){
		
	}
function adate($format='_j _M _Yهـ',$timestamp=0)
         {
$gmonths=array("يناير","فبراير","مارس","أبريل","مايو","يونيو","يوليو","أغسطس","سبتمبر","أكتوبر","نوفمبر","ديسمبر");
$smonths=array("كانون الثاني","شباط","آذار","نيسان","أيار","حزيران","تموز","آب","أيلول","تشرين الأول","تشرين الثاني","كانون الأول");
$days=array("الأحد","الإثنين","الثلاثاء","الأربعاء","الخميس","الجمعة","السبت");
$hmonths=array("محرم","صفر","شهر ربيع الأول","شهر ربيع الثاني","جمادى الأولى","جمادى الآخرة","رجب","شعبان","شهر رمضان","شوال","ذو القعدة","ذو الحجة");

if ($timestamp==0) {$timestamp=time();}
list($w, $mn,$am)=explode(' ', date("w n a",$timestamp));
$j=intval($timestamp/86400);
$j=$j+492150; //492534;
$n = intval($j / 10631);
$j=$j-($n*10631);
$y = intval($j / 354.36667);
$hy = ($n*30)+$y+1;
$j=$j-round($y*354.36667);
$z=$j;
$m = intval($j/29.5);
$hm = $m+1;
$j=$j-round($m*29.5);
$d = $j;
$hd = intval($d);

If ($hd == 0) {
$hd=($hm%2==1)? (29): (30);
$hm = $hm - 1;
}

If ($hm == 0 ) {
$hm = 12;
$hy = $hy - 1;
if (round(($hy%30)*0.36667)>round((($hy-1)%30)*0.36667)) {
	$hd=30;
	$z=355;
	} else {
		$hd=29;
		$z=354;
	}
}
$L=(round(($hy%30)*0.36667)>round((($hy-1)%30)*0.36667))?(1):(0);
$str='';
for ($n=0;$n<=strlen($format);$n++) {
	$c=substr($format,$n,1);
switch ($c) {
	case "l":
	case "D":
	$str.=$days[$w];
	break;
	case "F":
	$str.=$smonths[($mn-1)];
	break;
	case "M":
	$str.=$gmonths[($mn-1)];
	break;
	case "a":
	$str.=($am=='am')? ('ص'):('م');
	break;
	case "A":
	$str.=($am=='AM')? ('صباحًا'):('مساءً');
	break;
	case "_":
		$n=$n+1;
		switch (substr($format,$n,1)) {
			case "j":
			$str.=$hd;
			break;
			case "d":
			$str.=str_pad($hd,2,"0",STR_PAD_LEFT);
			break;
			case "z":
			$str.=$z-1;
			break;
			case "F":case "M":
			$str.=$hmonths[($hm-1)];
			break;
			case "t":
			$t=($hm%2==1)? (30): (29);
			If ($hm == 12 && $L==1) $t =30;
			$str.=$t;
			break;
			case "m":
			$str.=str_pad($hm,2,"0",STR_PAD_LEFT);
			break;
			case "n":
			$str.=$hm;
			break;
			case "y":
			$str.=substr($hy,2);
			break;
			case "Y":
			$str.=$hy;
			break;
			case "L":
			$str.=$L;
			break;
		}	
	break;
	case '\\':
	$str.=substr($format,$n,2);
	$n++;
	break;
	default:
	$str.=$c;
	break;
}	
	
}
return date($str,$timestamp);
}
/* ==========================edate دالة تنسيق الوقت اإنجليزية
English date format
do same of (date) but if can view hejri date
***********hejridate format letters 
	_j Day of the month without leading zeros
	_d Day of the month, 2 digits with leading zeros
	 _z The day of the year (starting from 0)
	 _M, _F A full textual representation of a month, such as Ramadan
	 _m  Numeric representation of a month, with leading zeros
	 _n Numeric representation of a month, without leading zeros
	 _t Number of days in the given month
	 _L Whether it's a leap year, 1 if it is a leap year, 0 otherwise
	 _Y A full numeric representation of a year, 4 digits
	 _y A two digit representation of a year
*/
function edate($format='_j _M _Y',$timestamp=0)
         {
$hmonths=array("\M\u\h\a\\r\\r\a\m","\S\a\f\a\\r","\R\a\b\i' \A\w\w\a\l","\R\a\b\i' \T\h\a\\n\i","\J\a\m\a\d\a \E\l \O\u\l\a","\J\a\m\a\d\a \E\l \T\h\a\\n\i\a\h","\R\a\j\a\b","\S\h\a'\b\a\\n","\R\a\m\a\d\a\\n","\S\h\a\w\w\a\l","\T\h\o\u\l \K\i'\d\a\h","\T\h\o\u\l \H\i\j\j\a\h");

if ($timestamp==0) {$timestamp=time();}
list($w, $mn,$am)=explode(' ', date("w n a",$timestamp));
$j=intval($timestamp/86400);
$j=$j+492150; //492534;
$n = intval($j / 10631);
$j=$j-($n*10631);
$y = intval($j / 354.36667);
$hy = ($n*30)+$y+1;
$j=$j-round($y*354.36667);
$z=$j;
$m = intval($j/29.5);
$hm = $m+1;
$j=$j-round($m*29.5);
$d = $j;
$hd = intval($d);

If ($hd == 0) {
$hd=($hm%2==1)? (29): (30);
$hm = $hm - 1;
}

If ($hm == 0 ) {
$hm = 12;
$hy = $hy - 1;
if (round(($hy%30)*0.36667)>round((($hy-1)%30)*0.36667)) {
	$hd=30;
	$z=355;
	} else {
		$hd=29;
		$z=354;
	}
}
$L=(round(($hy%30)*0.36667)>round((($hy-1)%30)*0.36667))?(1):(0);
$str='';
for ($n=0;$n<=strlen($format);$n++) {
	$c=substr($format,$n,1);
switch ($c) {
	case "_":
		$n=$n+1;
		switch (substr($format,$n,1)) {
			case "j":
			$str.=$hd;
			break;
			case "d":
			$str.=str_pad($hd,2,"0",STR_PAD_LEFT);
			break;
			case "z":
			$str.=$z-1;
			break;
			case "F":case "M":
			$str.=$hmonths[($hm-1)];
			break;
			case "t":
			$t=($hm%2==1)? (30): (29);
			If ($hm == 12 && $L==1) $t =30;
			$str.=$t;
			break;
			case "m":
			$str.=str_pad($hm,2,"0",STR_PAD_LEFT);
			break;
			case "n":
			$str.=$hm;
			break;
			case "y":
			$str.=substr($hy,2);
			break;
			case "Y":
			$str.=$hy;
			break;
			case "L":
			$str.=$L;
			break;
		}	
	break;
	case '\\':
	$str.=substr($format,$n,2);
	$n++;
	break;
	default:
	$str.=$c;
	break;
}	
	
}
return date($str,$timestamp);
}


/* ============================hejri2time يحول التاريخ الهجري إلى timestamp
يكون التاريخ المدخل بترتيب اليوم ثم الشهر ثم السنة
يمكن استخدام الرموز التالية في الفصل بين أجزاء التاريخ
- / \ .
*/
function hejri2time($thedate)
         {
list($hd,$hm,$hy)= preg_split('/[\/\-\.\s\\\\]+/',$thedate);
$hy=$hy-1;
$n=intval($hy/30);
$j=($n*10631)+round(($hy-($n*30))*354.36667);
$hm=$hm-1;
$j=$j+round($hm*29.5)+$hd;
$j=$j-492150;
$jd=$j*86400; 
return $jd;
}
}
