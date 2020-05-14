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
 $user->user = $_SESSION['bitmeh'];
 $user->first_name = isset($_GET['first_name']) ? $_GET['first_name'] : '';
 $user->last_name = isset($_GET['last_name']) ? $_GET['last_name'] : '';
 $user->cellphone = isset($_GET['cellphone']) ? $_GET['cellphone'] : '';
 $user->melli_code = isset($_GET['melli_code']) ? $_GET['melli_code'] : '';
 $user->state = isset($_GET['state']) ? $_GET['state'] : '';
 $user->city = isset($_GET['city']) ? $_GET['city'] : '';
 $user->address = isset($_GET['address']) ? $_GET['address'] : '';
 $user->postal_code = isset($_GET['postal_code']) ? $_GET['postal_code'] : '';
 $stmt=$user->update();
 //echo 'ali';
 $products_arr=array();
 $products_arr =array("message" =>$_SESSION['bitmeh']); 
 echo json_encode($products_arr);