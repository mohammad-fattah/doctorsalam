<?php
 /*header("Access-Control-Allow-Origin: *");
 header("Access-Control-Allow-Headers: access");
 header("Access-Control-Allow-Methods: GET");
 header("Access-Control-Allow-Credentials: true");
 header('Content-Type: application/json');*/

 include_once '../config/database.php';
 include_once '../objects/user.php';

 $database = new Database();
 $db = $database->getConnection();
 $user = new user($db,'reminder');
 $user->user = $_POST['phone_reminder'];
 $user->fname = $_POST['fname_reminder'];
 $user->date_reminder = $_POST['date_reminder'];
 $user->phone = $_POST['phone_reminder'];
 $user->state = $_POST['state'];
 $user->city = $_POST['city'];
 $user->comment = $_POST['comment_reminder'];

 $stmt=$user->save_reminder();
 $products_arr=array();
 $products_arr =array("message" =>"yes"); 
 echo json_encode($products_arr);