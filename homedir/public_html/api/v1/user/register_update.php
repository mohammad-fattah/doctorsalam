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
 $user->fname = isset($_GET['fname']) ? $_GET['fname'] : die();
 $user->lname = isset($_GET['lname']) ? $_GET['lname'] : die();
 $user->pass = isset($_GET['pass']) ? $_GET['pass'] : die();
 $stmt=$user->register();
 $_SESSION['bitmeh']=$user->user;
 $products_arr=array();
 $products_arr =array("message" =>"yes","user_key" =>$stmt); 
 echo json_encode($products_arr);