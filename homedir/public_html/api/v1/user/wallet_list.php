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
 $stmt=$user->wallet_list();
 $products_arr=array();
 while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
		if($type=='plus'):
		 $type='+';
		else:
		 $type='-';
		endif;
        $product_item=array(
			"id" =>  $id,
			"date" =>  $date,
			"for" =>  $for,
			"amount" =>  number_format($amount),
			"type" =>  $type,
			"extant" =>  number_format($extant),
			"factor" =>  $factor,
        );
        $products_arr[] = $product_item;  
 }
 echo json_encode($products_arr);