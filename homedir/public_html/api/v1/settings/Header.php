<?php
 session_start();
 $username='';
 $code='';
 $urlref='';
 $option_specialty='';
 $broker='';
 if(isset($_SESSION['bitmeh'])){$username=$_SESSION['bitmeh'];}else{$_SESSION['bitmeh']='';}
 $user_key_user = '';
 if(isset($_GET['broker'])){
  $b=$_GET['broker'];
  $b=str_replace('.php','',$b);
  setcookie("broker",$b,time()+(86400*30),'/');
 }
 if(isset($_COOKIE["broker"])) {
  $broker=$_COOKIE["broker"];	 
 }
 include_once 'api/v1/config/database.php';
 include_once 'api/v1/objects/settings.php';

 $database = new Database();
 $db = $database->getConnection();

 $settings = new settings($db,'settings');

 $stmt=$settings->settings();
 while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
     extract($row);
	 if($setting_name=='app_title'){$site_name=$setting_value;}
     if($setting_name=='company_address'){$company_address=$setting_value;}
     if($setting_name=='company_phone'){$phone_site=$setting_value;}
     if($setting_name=='company_website'){$website=$setting_value;}
     if($setting_name=='company_email'){$company_email=$setting_value;}
     if($setting_name=='site_logo'){$site_logo=$setting_value;}
     if($setting_name=='site_fav'){$site_fav=$setting_value;}  
     if($setting_name=='website_status'){$website_status=$setting_value;}  
     if($setting_name=='website_show_broker'){$website_show_broker=$setting_value;}  
     if($setting_name=='website_show_tv'){$website_show_tv=$setting_value;}  
     if($setting_name=='website_show_club'){$website_show_club=$setting_value;}  
     if($setting_name=='message_off'){$message_off=$setting_value;}  
     if($setting_name=='site_background'){$theme_color=$setting_value;} 
     if($setting_name=='android_app_link'){$android_app_link=$setting_value;}
     if($setting_name=='ios_app_link'){$ios_app_link=$setting_value;}
     if($setting_name=='company_facebook'){$company_facebook=$setting_value;}  
     if($setting_name=='company_instagram'){$company_instagram=$setting_value;}  
     if($setting_name=='company_telegram'){$company_telegram=$setting_value;}  
     if($setting_name=='company_twitter'){$company_twitter=$setting_value;} 
     if($setting_name=='company_aparat'){$company_aparat=$setting_value;}
     if($setting_name=='longitude'){$longitude=$setting_value;} 
     if($setting_name=='latitude'){$latitude=$setting_value;}
 }

 $stm_insure=$settings->insure();
 $j=0;
 $style='';
 $active_insurance=array();
 while ($newrow = $stm_insure->fetch(PDO::FETCH_ASSOC)){
     extract($newrow);
	 $active_insurance[$description]=$title;
	 $option_specialty.='<option value="'.$description.'">'.$title.'</option>';
	 $j++;
 }

 //$video->limit ='5';

 if($username){
  $users = new settings($db,'users');
  $users->user=$username;
  $stmt=$users->users();
  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
     extract($row);
	 $first_name_user = $first_name = $first_name;
	 $last_name_user = $last_name = $last_name;
	 $job_user = $job_title;
	 $postalcode_user = $postalcode;
	 $phone_user = $phone;
	 $email_user = $email;
	 $state_user = $state;
	 $city_user = $city;
	 $address_user = $address;
	 $birthday_user = $birthday;  
	 $melli_code = $melli_code;  
	 $user_key_user = $user_key;  
	 $user_type = $user_type;  
	 $image = $image;  
	 $user_id = $id;  
  }
 }
 $lottery = new settings($db,'lottery');
 $lottery->user=$username;
 $stmtt=$lottery->lottery();
 $title_lottery='';
 while ($row = $stmtt->fetch(PDO::FETCH_ASSOC)){
     extract($row);
	 $dd=explode('-',$end_date);
	 $title_lottery=$title;
	 $comment_lottery = $comment;
	 $end_date_lottery = $end_date; 
	 $lowest_score_lottery = $lowest_score;  
	 $prize = $prize;  
 }
?>