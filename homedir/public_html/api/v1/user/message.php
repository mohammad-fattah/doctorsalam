<?php
 header("Access-Control-Allow-Origin: *");
 header("Access-Control-Allow-Headers: access");
 header("Access-Control-Allow-Methods: GET");
 header("Access-Control-Allow-Credentials: true");
 header('Content-Type: application/json');

 include_once '../config/database.php';
 include_once '../objects/user.php';
 include_once '../objects/settings.php';
 
 $database = new Database();
 $db = $database->getConnection();
 
 $settings = new settings($db,'settings');
 
 $user = new user($db,'messages');
 $nuser=$user->user = isset($_GET['key']) ? $_GET['key'] : die();
 $stmt=$user->messages_list();
 
 $products_arr=array();
 while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
		$d=explode('-',$created_at);
		$data=$settings->gregorian_to_jalali($d[0],$d[1],$d[2],'/');
        $product_item=array(
			"id" =>  $id,
            "message" => $message,
            "subject" => $subject,
            "created_at" => $data
        );
        $products_arr[] = $product_item;  
 }
 echo json_encode($products_arr);