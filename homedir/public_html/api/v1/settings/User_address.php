<?php
 header("Access-Control-Allow-Origin: *");
 header("Access-Control-Allow-Headers: access");
 header("Access-Control-Allow-Methods: GET");
 header("Access-Control-Allow-Credentials: true");
 header('Content-Type: application/json');
 include_once '../config/database.php';
 include_once '../objects/settings.php';
 
 $database = new Database();
 $db = $database->getConnection();
 
 $covers = new settings($db,'users_address');
 $covers->user = isset($_GET['id']) ? $_GET['id'] : '';
 $stmt=$covers->doctor_address();
 $products_arr=array();
 $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
 while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
     extract($row); 
     $product_item=array(
			"id" =>  $id,
			"state" =>  $state,
			"city" =>  $city,
			"address" =>  $address,
			"area" =>  $area,
     );
     $products_arr[] = $product_item; 	 
 }
 echo json_encode($products_arr);
?>