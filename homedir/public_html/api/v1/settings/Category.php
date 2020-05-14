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
 
 $covers = new settings($db,'insurance');
 $stmt=$covers->insure();
 $products_arr=array();
 $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
 while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
     extract($row); 
     $product_item=array(
			"name" =>  $title,
			"pic" =>  $actual_link.$pic,
			"id" =>  $id,
     );
     $products_arr[] = $product_item; 	 
 }
 echo json_encode($products_arr);
?>