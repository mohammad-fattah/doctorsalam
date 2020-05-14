<?php
 header("Access-Control-Allow-Origin: *");
 header("Access-Control-Allow-Headers: access");
 header("Access-Control-Allow-Methods: GET");
 header("Access-Control-Allow-Credentials: true");
 header('Content-Type: application/json');

 include_once '../config/database.php';
 include_once '../objects/agent.php';
 
 $database = new Database();
 $db = $database->getConnection();
 
 $agent = new agent($db,'bank');
 
 $agent->user = isset($_GET['user']) ? $_GET['user'] : die();
 
 $stmt=$agent->bank();
 
 $products_arr=array();
 $products_arr["bank"]=array();
 while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $product_item=array(
			"id" =>  $id,
            "name" => $name,
            "bankName" => $bankName,
            "cartNumber" => $card_number,
            "shaba" => $shaba,
            "accountOwner" => $account_owner
        );
        array_push($products_arr["bank"], $product_item);
 }
 
 echo json_encode($products_arr);