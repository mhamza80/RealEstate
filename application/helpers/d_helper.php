<?php 
function EgyptianCalendar($unix_time, $gmt, 
                 $poffset = '1970-02-26 7:45 PM', 
                 $pweight = '-9777600.22222222223', 
                 $defiency='nonedeficient', 
                 $timeset= array("hours" => 24, 
                                 "minutes" => 60, 
                                 "seconds" => 60))
{
// Code Segment 1 – Calculate Floating Point
$tme = $unix_time;

if ($gmt>0){$gmt=-$gmt;} else {$gmt=abs($gmt);}

$ptime = strtotime($poffset)+(60*60*$gmt);
$weight = $pweight+(1*$gmt);

$egypt_xa = ($tme)/(24*60*60);
$egypt_ya = $ptime/(24*60*60);
$egypt = (($egypt_xa -$egypt_ya) -
         $weight)+(microtime/999999);

// Code Segment 2 – Set month day arrays
$nonedeficient = array(
   "seq1" => array(30,30,30,30,30,30,30,30,30,30,30,30,5));

$monthnames = array(
   "seq1" => array('Thoth','Phaophi','Athyr','Choiak',
   'Tybi', 'Mecheir','Phamenoth','Pharmuthi','Pachon',
   'Payni','Epiphi','Mesore','epagomenai'));
                                    
$monthusage = isset($defiency) ? ${$defiency} : $deficient;

// Code Segment 3 – Calculate month number, day number
foreach($monthusage as $key => $item){
    $i++;
    foreach($item as $numdays){
        $ttl_num=$ttl_num+$numdays;
        $ttl_num_months++;
    }
}

$revolutionsperyear = $ttl_num / $i;
$numyears = egyptd((floor($egypt) / $revolutionsperyear),0);
$avg_num_month = $ttl_num_months/$i;
$jtl = abs(abs($egypt) - 
       ceil($revolutionsperyear*($numyears+1)));

while($month==0){
    $day=0;
    $u=0;
    foreach($monthusage as $key => $item){
        $t=0;   
        foreach($item as $numdays){
            $t++;
            $tt=0;
            for($sh=1;$sh<=$numdays;$sh++){
                $ii=$ii+1;
                $tt++;
                if ($ii==floor($jtl)){
                    if ($egypt>0){
                        $daynum = $tt;
                        $month = $t;
                    } else {
                        $daynum = $numdays-$tt;
                        $month = $avg_num_month-$t;
                    }
                    $sequence = $key;
                    $nodaycount=true;
                }
            }
            if ($nodaycount==false)
                $day++;
        }
        $u++;
    }
}

//$numyears = abs($numyears);

$timer = substr($egypt, strpos($egypt,'.')+1,
    strlen($egypt)-strpos($egypt,'.')-1);
$egypt_out= $numyears.'/'.$month.'/'.$daynum.' '.$day.'.'. 
    floor(intval(substr($timer,0,2))/100*$timeset['hours']).':'. 
    floor(intval(substr($timer,2,2))/100*$timeset['minutes']).':'. 
    floor(intval(substr($timer,4,2))/100*$timeset['seconds']).'.'.
    substr($timer,6,strlen($timer)-6);
$egypt_obj = array('year'=>$numyears,
    'month'=>$month, 
    'mname' => $monthnames[$sequence][$month-1],
    'day'=>$daynum, 
    'jtl'=>$jtl, 
    'day_count'=>$day,
    'hours'=>floor(intval(substr($timer,0,2))/100
             *$timeset['hours']),
    'minute'=>floor(intval(substr($timer,2,2))/100
              *$timeset['minutes']),
    'seconds'=>floor(intval(substr($timer,4,2))/100
               *$timeset['seconds']),
    'microtime'=>substr($timer,6,strlen($timer)-6),
                 'strout'=>$egypt_out);

return $egypt_obj;
}

?>