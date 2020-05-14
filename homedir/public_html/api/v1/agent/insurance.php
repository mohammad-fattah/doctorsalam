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
 
 $agent = new agent($db,'insurance_price');
 
 $agent->user = isset($_GET['user']) ? $_GET['user'] : die();
 
 $stmt=$agent->insurance();
 
 $products_arr=array();
 $products_arr["insurance"]=array();
 while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $product_item=array(
			"id" =>  $id,
            "name" => $name,
            "insur" => $insur,
            "percent" => $percent,
            "active" => $active
        );
        array_push($products_arr["insurance"], $product_item);
 }
 
 echo json_encode($products_arr);