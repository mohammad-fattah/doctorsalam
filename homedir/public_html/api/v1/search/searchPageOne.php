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
 //$tt = isset($_GET['time']) ? $_GET['time'] : '';
 $city->state = isset($_GET['state']) ? $_GET['state'] : '';
 $city->q = isset($_GET['q']) ? $_GET['q'] : '';
 $city->page = isset($_GET['page']) ? $_GET['page'] : '';
 $city->specialty = isset($_GET['specialty']) ? $_GET['specialty'] : '';
 $stmt=$city->SearchOne();
 $products_arr=array();
 
 $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http")."://$_SERVER[HTTP_HOST]";
 while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
     extract($row);
     $product_item=array(
			"name" =>  $first_name.' '.$last_name,
			"id" =>  $id,
			"image" =>  $actual_link.'/moderator/files/profile_images/'.$image,
			"specialty" => $specialty_name,
			"address" => $address,
     );
     $products_arr[] = $product_item; 	 
 }
 echo json_encode($products_arr);
?>