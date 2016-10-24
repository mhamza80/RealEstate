<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Send_sms{
	 function __construct(){
		
	}

	function send_sms($from,$to,$text,$unicode,$sms_user,$sms_password){
	    $max_unit_to_use = "1.5"; //in click a tellunites  (1, 1.5, 2, 2.5, 3 , 4)
	    $validity = "1440";  //in minutes , 1440 = 24 hours = 1 day
	    $gateway = "http://www.resalty.net/api/sendSMS.php?";
	    $msg_type = "SMS_TEXT";
	
	    $msgo = $text;
	    ///// DO NOT Change below this line ##########################
	    //now i will generate messegae id
	    //$sms_msg_id = md5(microtime(). $_SERVER['REMOTE_ADDR']);
	    $vars_to_submit = $gateway . "userid=$sms_user&password=$sms_password&router=2";
	
	    $vars_to_submit .= "&sender=$from&to=$to";
	    if ($unicode == "1"){
	        $vars_to_submit .= "&encoding=utf-8";
	        $subtext = "";
	        for ($i = 0; $i <= strlen($text) -1 ; $i++) {
	        $this_char = substr($text,$i,1);
	        if ($this_char == "أ"){
	            $subtext .= "0671";
	        }
	        if ($this_char == "إ"){
	            $subtext .= "0673";
	        }
	        if ($this_char == "ا"){
	            $subtext .= "0627";
	        }
	        if ($this_char == "ؤ"){
	            $subtext .= "0676";
	        }
	        if ($this_char == "ئ"){
	            $subtext .= "0678";
	        }
	        if ($this_char == "ب"){
	            $subtext .= "0628";
	        }
	        if ($this_char == "ة"){
	            $subtext .= "0629";
	        }
	        if ($this_char == "ت"){
	            $subtext .= "062A";
	        }
	        if ($this_char == "ث"){
	            $subtext .= "062B";
	        }
	        if ($this_char == "ج"){
	            $subtext .= "062C";
	        }
	        if ($this_char == "ح"){
	            $subtext .= "062D";
	        }
	        if ($this_char == "خ"){
	            $subtext .= "062E";
	        }
	        if ($this_char == "د"){
	            $subtext .= "062F";
	        }
	        if ($this_char == "ذ"){
	            $subtext .= "0630";
	        }
	        if ($this_char == "ر"){
	            $subtext .= "0631";
	        }
	
	        if ($this_char == "ز"){
	            $subtext .= "0632";
	        }
	
	        if ($this_char == "س"){
	            $subtext .= "0633";
	        }
	
	        if ($this_char == "ش"){
	            $subtext .= "0634";
	        }
	
	        if ($this_char == "ص"){
	            $subtext .= "0635";
	        }
	
	        if ($this_char == "ض"){
	            $subtext .= "0636";
	        }
	
	        if ($this_char == "ط"){
	            $subtext .= "0637";
	        }
	
	        if ($this_char == "ظ"){
	            $subtext .= "0638";
	        }
	
	        if ($this_char == "ع"){
	            $subtext .= "0639";
	        }
	
	        if ($this_char == "غ"){
	            $subtext .= "063A";
	        }
	
	        if ($this_char == "ف"){
	            $subtext .= "0641";
	        }
	
	        if ($this_char == "ق"){
	            $subtext .= "0642";
	        }
	
	        if ($this_char == "ك"){
	            $subtext .= "0643";
	        }
	
	        if ($this_char == "ل"){
	            $subtext .= "0644";
	        }
	
	        if ($this_char == "م"){
	            $subtext .= "0645";
	        }
	
	        if ($this_char == "ن"){
	            $subtext .= "0646";
	        }
	
	        if ($this_char == "ه"){
	            $subtext .= "0647";
	        }
	        
	        if ($this_char == "و"){
	            $subtext .= "0648";
	        }
	
	        if ($this_char == "ى"){
	            $subtext .= "0649";
	        }
	        
	        if ($this_char == "ي"){
	            $subtext .= "064A";
	        }
	        
	        if ($this_char == "؟"){
	            $subtext .= "061F";
	        }
	
	
	
	        if ($this_char == "*"){
	            $subtext .= "066D";
	        }
	        
	        if ($this_char == "0"){
	            $subtext .= "0660";
	        }
	
	        if ($this_char == "1"){
	            $subtext .= "0661";
	        }
	        if ($this_char == "2"){
	            $subtext .= "0662";
	        }
	
	        if ($this_char == "3"){
	            $subtext .= "0663";
	        }
	
	        if ($this_char == "4"){
	            $subtext .= "0664";
	        }
	
	        if ($this_char == "5"){
	            $subtext .= "0665";
	        }
	
	        if ($this_char == "6"){
	            $subtext .= "0666";
	        }
	
	        if ($this_char == "7"){
	            $subtext .= "0667";
	        }
	
	        if ($this_char == "8"){
	           $subtext .= "0668";
	        }
	        if ($this_char == "9"){
	           $subtext .= "0669";
	        }
	        if ($this_char == "%"){
	           $subtext .= "066A";
	        }
	        if ($this_char == "،"){
	           $subtext .= "060C";
	        }
	        if ($this_char == "ـ"){
	           $subtext .= "0640";
	        }
	        if ($this_char == " "){
	           $subtext .= "0020";
	        }
	        if ($this_char == "."){
	           $subtext .= "06D4";
	        }
	
	
	        
	        }
	
	
	        //die;
	    }
	    //echo $text;
	    $text = urlencode($text);
	    //die;
	    $vars_to_submit .= "&msg=$text";
	
	   $url_parsed = parse_url($vars_to_submit);
	   $host = $url_parsed["host"];
	   $port = (array_key_exists('port', $url_parsed) ? $url_parsed['port'] : 80);
	   if ($port==0)
	       $port = 80;
	   $path = $url_parsed["path"];
	   if ($url_parsed["query"] != "")
	       $path .= "?".$url_parsed["query"];
	
	   $out = "GET $path HTTP/1.0\r\nHost: $host\r\n\r\n";
	
	   $fp = fsockopen($host, $port, $errno, $errstr, 30);
		$in = "";
	   @fwrite($fp, $out);
	   $body = false;
	   while (!feof($fp)) {
	       $s = @fgets($fp, 1024);
	       if ( $body )
	           $in .= $s;
	       if ( $s == "\r\n" )
	           $body = true;
	   }
	
	   fclose($fp);
		return $in;
	    //echo $gateway . $vars_to_submit;
	    $first_result = explode('<br />',$vars_to_submit);
		$sec_result = explode(':',$first_result[0]);
		
		$third_result = explode(':',$sec_result[0]);

	}

	function sms_status_query($sms_user, $sms_password,$sms_id){
	
	    $vars_to_submit = "http://www.resalty.net/api/msgQuery?userid=$sms_user&password=$sms_password&msgid=$sms_id";
	    $sam = $vars_to_submit;
	    //echo $gateway . $vars_to_submit;
	    echo $sam;
	
	
	}

	function fetchURL($url) {
	   $url_parsed = parse_url($url);
	   $host = $url_parsed["host"];
	   $port = (array_key_exists('port', $url_parsed) ? $url_parsed['port'] : 80);
	   if ($port==0)
	       $port = 80;
	   $path = $url_parsed["path"];
	   if ($url_parsed["query"] != "")
	       $path .= "?".$url_parsed["query"];
	
	   $out = "GET $path HTTP/1.0\r\nHost: $host\r\n\r\n";
	
	   $fp = fsockopen($host, $port, $errno, $errstr, 30);
		$in = "";
	   @fwrite($fp, $out);
	   $body = false;
	   while (!feof($fp)) {
	       $s = @fgets($fp, 1024);
	       if ( $body )
	           $in .= $s;
	       if ( $s == "\r\n" )
	           $body = true;
	   }
	
	   fclose($fp);
	
	   return $in;
	}

	function getBalance($username,$password){ 
		$url=$this->fetchURL("http://www.resalty.net/api/getBalance.php?userid=".$username."&password=".$password);
		if(preg_match("/You have :/",$url)){
		$point=str_replace("You have :","",$url);
		$point=str_replace("Point","",$point);
		$point=trim($point);
		$re=$point;
		}
		else 
		{
		$re = $url;
		}
		return $re;
	}

		
}
?>