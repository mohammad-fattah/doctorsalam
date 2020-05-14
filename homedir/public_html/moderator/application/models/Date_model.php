<?php

class Date_model extends Crud_model {
    function div($a,$b) { 
     return (int) ($a / $b); 
    }
    function gregorian_to_jalali ($g_y, $g_m, $g_d,$str) 
    { 
     $g_days_in_month = array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31); 
     $j_days_in_month = array(31, 31, 31, 31, 31, 31, 30, 30, 30, 30, 30, 29); 
     $gy = $g_y-1600; 
     $gm = $g_m-1; 
     $gd = $g_d-1;  
     $g_day_no = 365*$gy+$this->div($gy+3,4)-$this->div($gy+99,100)+$this->div($gy+399,400);
     for ($i=0; $i < $gm; ++$i) 
      $g_day_no += $g_days_in_month[$i]; 
      if ($gm>1 && (($gy%4==0 && $gy%100!=0) || ($gy%400==0))) 
      $g_day_no++; 
      $g_day_no += $gd; 
      $j_day_no = $g_day_no-79; 
      $j_np = $this->div($j_day_no, 12053); /* 12053 = 365*33 + 32/4 */ 
      $j_day_no = $j_day_no % 12053; 
      $jy = 979+33*$j_np+4*$this->div($j_day_no,1461); /* 1461 = 365*4 + 4/4 */ 
      $j_day_no %= 1461; 
      if($j_day_no >= 366) { 
       $jy += $this->div($j_day_no-1, 365); 
       $j_day_no = ($j_day_no-1)%365; 
      } 
      for($i = 0; $i < 11 && $j_day_no >= $j_days_in_month[$i]; ++$i) 
       $j_day_no -= $j_days_in_month[$i]; 
       $jm = $i+1; 
       $jd = $j_day_no+1; 
     return $jy.'/'.$jm.'/'.$jd ;
    }
	function jalali_to_gregorian($jy,$jm,$jd,$mod=''){
	 list($jy,$jm,$jd)=explode('_',$this->tr_num($jy.'_'.$jm.'_'.$jd));/* <= Extra :اين سطر ، جزء تابع اصلي نيست */
     if($jy > 979){
      $gy=1600;
      $jy-=979;
     }else{
      $gy=621;
     }
	 
     $days=(365*$jy) +(((int)($jy/33))*8) +((int)((($jy%33)+3)/4)) +78 +$jd +(($jm<7)?($jm-1)*31:(($jm-7)*30)+186);
     $gy+=400*((int)($days/146097));
     $days%=146097;
     if($days > 36524){
      $gy+=100*((int)(--$days/36524));
      $days%=36524;
      if($days >= 365)$days++;
     }
     $gy+=4*((int)(($days)/1461));
     $days%=1461;
     $gy+=(int)(($days-1)/365);
     if($days > 365)$days=($days-1)%365;
     $gd=$days+1;
     foreach(array(0,31,((($gy%4==0) and ($gy%100!=0)) or ($gy%400==0))?29:28 ,31,30,31,30,31,31,30,31,30,31) as $gm=>$v){
     if($gd <= $v)break;
      $gd-=$v;
     }
	 if($gd < 10){
	  $gd = '0'.$gd;
	 }
	 if($gm < 10){
	  $gm = '0'.$gm;
	 }
     return $gy.'-'.$gm.'-'.$gd;
    }
	function tr_num($str,$mod='en',$mf='٫'){
 $num_a=array('0','1','2','3','4','5','6','7','8','9','.');
 $key_a=array('۰','۱','۲','۳','۴','۵','۶','۷','۸','۹',$mf);
 return($mod=='fa')?str_replace($num_a,$key_a,$str):str_replace($key_a,$num_a,$str);
}
}
