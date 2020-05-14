<?php
 session_start();
 header("Access-Control-Allow-Origin: *");
 header("Access-Control-Allow-Headers: access");
 header("Access-Control-Allow-Methods: GET");
 header("Access-Control-Allow-Credentials: true");
 header('Content-Type: application/json');

 include_once '../config/database.php';
 include_once '../objects/agent.php';
 
 $database = new Database();
 $db = $database->getConnection();
 
 $agent = new agent($db,'agent');
 
 $agent->username = isset($_GET['username']) ? $_GET['username'] : die();
 $agent->password = isset($_GET['password']) ? $_GET['password'] : die();
 
 $stmt=$agent->signin();
 
 $products_arr=array();
 $products_arr["signin"]=array();
 $product_item=array("result" =>  "no");

 $i=0;
 
 while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
  extract($row);
  $product_item=array("result" =>  "ok");
  $_SESSION["agent"]=array($id,$first_name,$last_name,$company,$status,$state,$city,$address,$agent_id);
  $i++;
  array_push($products_arr["signin"], $product_item);
 } 
 if($i==0){
  array_push($products_arr["signin"], $product_item);
 }
 echo json_encode($products_arr);