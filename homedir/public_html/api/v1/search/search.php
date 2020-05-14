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
 $city->q = isset($_GET['q']) ? $_GET['q'] : '';
 $city->page = isset($_GET['page']) ? $_GET['page'] : '';
 $city->specialty = isset($_GET['specialty']) ? $_GET['specialty'] : '';
 $stmt=$city->Search();
 $products_arr=array();
 
 $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
 $count = $stmt->rowCount();
 while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
     extract($row);
	 $tr = '';
	 $systemcode=$system_code;
	 $uid=$id;
	 $t = new search($db,'times');
	 $t->times = $tt;
	 $t->id = $id;
	 $stmtt = $t -> Times();
	 
	 while ($roww = $stmtt->fetch(PDO::FETCH_ASSOC)){
	   extract($roww);
	   $tr = $tr.$title.'#'.$date.'$$';
	 }
	 if(!$Sum){
	  $Sum = 0;
	 }
	 $s = 5;
     $product_item=array(
			"name" =>  $first_name.' '.$last_name,
			"id" =>  $uid,
			"times" =>  $tr,
			"image" =>  $actual_link.'/moderator/files/profile_images/'.$image,
			"specialty" => $specialty_name,
			"address" => $address,
			"system_code" => $systemcode,
			"Sum" => $Sum,
			"created" => $s,
			"count" => $count,
     );
     $products_arr[] = $product_item; 	 
 }
 echo json_encode($products_arr);
?>