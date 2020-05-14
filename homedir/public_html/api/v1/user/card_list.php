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
 $user = new user($db,'cards');
 $nuser=$user->user = isset($_GET['user']) ? $_GET['user'] : die();
 $stmt=$user->card_list();
 $products_arr=array();
 $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
 while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
		$cardnumber='';
        $cardnumber.=substr($card_number,0,4);
        $cardnumber.="********";
        $cardnumber.=substr($card_number,12,4);
		
		$bb=explode('#',$bank_name);
		
        $product_item=array(
			"id" =>  $id,
			"card_number" =>  $cardnumber,
			"card_name" =>  $card_name,
			"bank_name" =>  $bb[0],
			"logo" =>  $actual_link.$bb[1],
        );
        $products_arr[] = $product_item;  
 }
 echo json_encode($products_arr);