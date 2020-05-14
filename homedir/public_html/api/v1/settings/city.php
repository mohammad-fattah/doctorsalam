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
 
 $city = new settings($db,'city');
 $city->name =isset($_GET['name']) ? $_GET['name'] : '';
 $stmt=$city->City();
 $products_arr=array();
 while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
     extract($row);
     $product_item=array(
			"name" =>  $name,
			"id" =>  $id,
     );
     $products_arr[] = $product_item; 	 
 }
 echo json_encode($products_arr);
?>