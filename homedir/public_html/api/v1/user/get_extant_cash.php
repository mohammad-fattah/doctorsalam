<?php
 header("Access-Control-Allow-Origin: *");
 header("Access-Control-Allow-Headers: access");
 header("Access-Control-Allow-Methods: GET");
 header("Access-Control-Allow-Credentials: true");
 header('Content-Type: application/json');

 include_once '../config/database.php';
 include_once '../objects/user.php';
 $database = new Database();
 $db = $database->getConnection();
 $user = new user($db,'wallet');
 $nuser=$user->user = isset($_GET['user']) ? $_GET['user'] : die();
 $stmt=$user->get_extant_cash();
 $products_arr=array();
 $extant_price=0;
 while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
  extract($row);
  $extant_price =number_format($extant);
 }
 $products_arr =array("extant" =>$extant_price);
 echo json_encode($products_arr);