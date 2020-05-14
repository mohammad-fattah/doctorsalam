<?php
 header("Access-Control-Allow-Origin: *");
 header("Access-Control-Allow-Headers: access");
 header("Access-Control-Allow-Methods: GET");
 header("Access-Control-Allow-Credentials: true");
 header('Content-Type: application/json');
 include_once '../config/database.php';
 include_once '../objects/search.php';
 
 $database = new Database();
 $db = $database->getConnection();
 
 $city = new search($db,'users');
 $city->type =isset($_GET['type']) ? $_GET['type'] : '';
 $tt = isset($_GET['time']) ? $_GET['time'] : '';
 $city->state = isset($_GET['state']) ? $_GET['state'] : '';
 $stmt=$city->SearchClinic();
 $products_arr=array();
 
 $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
 
 while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
     extract($row);
	 $tr = '';
	 $systemcode=$system_code;
	 $uid=$id;
     $product_item=array(
			"name" =>  $first_name.' '.$last_name,
			"id" =>  $uid,
			"times" =>  $tr,
			"image" =>  $actual_link.'/moderator/files/profile_images/'.$image,
			"state" => $state,
			"address" => $address,
			"system_code" => $systemcode,
     );
     $products_arr[] = $product_item; 	 
 }
 echo json_encode($products_arr);
?>