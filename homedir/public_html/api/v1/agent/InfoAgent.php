<?php
 header("Access-Control-Allow-Origin: *");
 header("Access-Control-Allow-Headers: access");
 header("Access-Control-Allow-Methods: GET");
 header("Access-Control-Allow-Credentials: true");
 header('Content-Type: application/json');

 include_once '../config/database.php';
 include_once '../objects/agent.php';
 
 $database = new Database();
 $db = $database->getConnection();
 
 $agent = new agent($db,'settings');
 $agent->user = isset($_GET['key']) ? $_GET['key'] : 'all';
 $stmt=$agent->agent_info();
 $cmsg=0;
 $products_arr=array();
 while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
   extract($row);
   if($setting_name=='agent_name'){$agent_name=$setting_value;}     
   if($setting_name=='company_phone'){$company_phone=$setting_value;}     
   if($setting_name=='company_name'){$company_name=$setting_value;}     
   if($setting_name=='allow_company'){$allow_company=$setting_value;}     
   if($setting_name=='company_website'){$company_website=$setting_value;}     
   if($setting_name=='share_message'){$share_message=$setting_value;}     
   if($setting_name=='status_app_background'){$status_app_background=$setting_value;}     
   if($setting_name=='app_background'){$app_background=$setting_value;}     
   if($setting_name=='agent_pic'){$agent_pic=$setting_value;}     
   if($setting_name=='message_off'){$message_off=$setting_value;}     
   if($setting_name=='website_status'){$website_status=$setting_value;}
   if($setting_name=='company_address'){$company_address=$setting_value;}
   if($setting_name=='application_phone'){$application_phone=$setting_value;}
   if($setting_name=='application_name'){$application_name=$setting_value;}
   $cmsg=$cmsg;   
 }
 $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
 $product_item=array(
  "name" => $agent_name,
  "suport_phone" => $company_phone,
  "company_name" => $company_name,
  "company" => $allow_company,
  "url" => $company_website,
  "message" => $share_message,
  "statusBarColor" => $status_app_background,
  "themeColor" => $app_background,
  "agent_pic" => $actual_link.$agent_pic,
  "message_off" => $message_off,
  "website_status" => $website_status,
  "count_msg" => $cmsg,
  "company_address" => $company_address,
  "application_name" => $application_name,
  "application_phone" => $application_phone,
 );
 $products_arr[] = $product_item;
 echo json_encode($products_arr);