<?php
 session_start();
 header("Access-Control-Allow-Origin: *");
 header("Access-Control-Allow-Headers: access");
 header("Access-Control-Allow-Methods: GET");
 header("Access-Control-Allow-Credentials: true");
 header('Content-Type: application/json');

 include_once '../config/database.php';
 include_once '../objects/user.php';
 
 $database = new Database();
 $db = $database->getConnection();
 
 $user = new user($db,'users');
 $user->user = isset($_GET['user']) ? $_GET['user'] : die();
 $pass = isset($_GET['pass']) ? $_GET['pass'] : die();
 $user->pass = md5($pass);
 $stmt=$user->password();
 
 $products_arr=array();
 $hasuser=0;
 while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
  extract($row);
  $hasuser=1; 
  $first_name=$first_name;  
  $last_name=$last_name;  
  $user_type=$user_type;
  $job_title=$job_title;
  $user_key=$user_key;
 }
 if($hasuser==0){
   $products_arr =array("message" =>"no");
 }else{
   $products_arr =array("message" =>"yes","first_name"=>$first_name,"last_name"=>$last_name,"user_type"=>$user_type,"job_title"=>$job_title,"user_key"=>$user_key);
   $_SESSION['bitmeh']=$user->user;
 } 
 echo json_encode($products_arr);