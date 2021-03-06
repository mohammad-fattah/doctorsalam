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
 
 $agent = new agent($db,'orders');
 
 $agent->user = isset($_GET['user']) ? $_GET['user'] : die();
 
 $stmt=$agent->cashouts();
 
 $products_arr=array();
 $products_arr["cashouts"]=array();
 while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $product_item=array(
			"id" =>  $id,
            "type" => $type,
            "price" => $price,
            "date" => $date,
            "state" => $state,
            "status" => $status,
        );
        array_push($products_arr["cashouts"], $product_item);
 }
 echo json_encode($products_arr);