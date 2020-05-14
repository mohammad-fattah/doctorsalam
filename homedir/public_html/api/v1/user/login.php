<?php
 header("Access-Control-Allow-Origin: *");
 header("Access-Control-Allow-Headers: access");
 header("Access-Control-Request-Headers: access");
 header("Access-Control-Allow-Methods: GET");
 header("Access-Control-Allow-Credentials: true");
 header('Content-Type: application/json');
 include_once '../config/database.php';
 include_once '../objects/user.php';
 include_once '../objects/settings.php';
 $database = new Database();
 $db = $database->getConnection();
 
 /**/
 $setting = new settings($db,'settings');
 $stm=$setting->api_key();
 while ($row = $stm->fetch(PDO::FETCH_ASSOC)){
  extract($row);
  $api_kavenegar=$setting_value;
 }
 /**/
 
 $user = new user($db,'users');
 $nuser=$user->user = isset($_GET['user']) ? $_GET['user'] : die();
 $ntoken=$user->token = isset($_GET['token']) ? $_GET['token'] : die();
 $stmt=$user->login();
 $products_arr=array();
 $hasuser=0;
 while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
  $hasuser=1;
 }
 
 if($hasuser==0){
  callAPI('GET', 'https://api.kavenegar.com/v1/'.$api_kavenegar.'/verify/lookup.json?','receptor='.$nuser.'&token='.$ntoken.'&template=register');
 }else{
  $products_arr =array("return" =>array("status"=>"0"));
  echo json_encode($products_arr);
 }
 function callAPI($method, $url,$data){
  $curl = curl_init();
  $url=$url.$data; 
  curl_setopt($curl, CURLOPT_URL, $url);
  $result = curl_exec($curl);
  if(!$result){die("Connection Failure");}
  curl_close($curl);
 }