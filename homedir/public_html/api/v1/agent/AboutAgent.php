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
 $agent = new agent($db,'help_articles');
 $agent->title = 'درباره ما';
 $stmt=$agent->agent_about();
 $products_arr=array();
 while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $product_item=array(
			"about" =>  $description,
        );
        $products_arr[] = $product_item;
 }
 echo json_encode($products_arr);