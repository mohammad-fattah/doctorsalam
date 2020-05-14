<?php
 header("Access-Control-Allow-Origin: *");
 header("Access-Control-Allow-Headers: access");
 header("Access-Control-Allow-Methods: GET");
 header("Access-Control-Allow-Credentials: true");
 header('Content-Type: application/json');

 include_once '../config/database.php';
 include_once '../objects/settings.php';
 $database = new Database();
 $db = $database->getConnection();
 $user = new settings($db,'off');
 $user->input = isset($_POST['input']) ? $_POST['input'] : die();
 $stmt=$user->OffCode();
 $products_arr=array();
 
 $has = 0;
 while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
  extract($row);
  $has = 1;
  $product_item=array(
   "status"=>"200",
   "id"=>$id,
   "price"=>$price,
  );
  $products_arr[] = $product_item;     
 }
 if($has == 0){
  $product_item=array(
   "status"=>"400",
  );
  $products_arr[] = $product_item;	 
 }
 echo json_encode($products_arr);