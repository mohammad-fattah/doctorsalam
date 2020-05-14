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
 
 $agent->user = isset($_GET['key']) ? $_GET['key'] : die();
 
 $stmt=$agent->user_order();
 
 $products_arr=array();
 $products_arr["user_order"]=array();
 while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $product_item=array(
			"id" =>  $id,
            "first_name" => $first_name,
            "last_name" => $last_name,
            "state" => $state,
            "city" => $city,
            "address" => $address,
            "suport_phone" => $suport_phone,
            "agent_name" => $agent_name,
        );
        //array_push( $product_item);
        array_push($products_arr["user_order"], $product_item);
 }
 
 echo json_encode($products_arr);