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
 
 $user = new user($db,'reminder');
 $nuser=$user->user = isset($_GET['user']) ? $_GET['user'] : die();
 $stmt=$user->reminder_list();
 $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
 $products_arr=array();
 while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $product_item=array(
			"id" =>  $id,
            "company" => $company,
            "insurance_type" => $insurance_type,
            "date" => $date,
            "pic" => $actual_link.'/'.$pic
        );
        $products_arr[] = $product_item;  
 }
 echo json_encode($products_arr);