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
 
 $user = new user($db,'cards');
 $user->user = isset($_GET['user']) ? $_GET['user'] : die();
 $user->card = isset($_GET['card']) ? $_GET['card'] : die();
 $user->per = isset($_GET['per']) ? $_GET['per'] : die();
 $user->cardname = isset($_GET['cardname']) ? $_GET['cardname'] : '';
 $stmt=$user->add_card();
 $products_arr=array();
 if($stmt==1){
  $products_arr =array("status" =>"200");
 }else{
  $products_arr =array("status" =>"0"); 
 }  
 echo json_encode($products_arr);