<?php
 header("Access-Control-Allow-Origin: *");
 header("Access-Control-Allow-Headers: access");
 header("Access-Control-Allow-Methods: GET");
 header("Access-Control-Allow-Credentials: true");
 header('Content-Type: application/json');
 include_once '../config/database.php';
 include_once '../objects/search.php';
 
 $database = new Database();
 $db = $database->getConnection();
 
 $city = new search($db,'users');
 $city->id =isset($_GET['id']) ? $_GET['id'] : '';
 $tt = isset($_GET['time']) ? $_GET['time'] : '';
 $stmt=$city->Details();
 $products_arr=array();
 
 $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
 $uuid = 0;
 while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
     extract($row);
	 $uid=$id;
	 $tr = '';
	 $t = new search($db,'times');
	 $t->times = $tt;
	 $t->id = $id;
	 $stmtt = $t -> Times();
	 
	 while ($roww = $stmtt->fetch(PDO::FETCH_ASSOC)){
	   extract($roww);
	   if($payment_method =='online'){
		   $pay ='آنلاین';
	   }else if($payment_method =='in_home'){
		   $pay ='در محل';
	   }else if($payment_method =='in_clinic'){
		   $pay ='در مطب';
	   }else if($payment_method =='no_payment'){
		   $pay ='بدون پرداخت';
	   }
	   $tr = $tr.$title.'#'.$date.'#'.$uuid.'#'.$price.'#'.$comment.'#'.$pay.'$$';
	 }
     $product_item=array(
			"name" =>  $first_name.' '.$last_name,
			"id" =>  $uuid,
			"comment" =>  $comment,
			"times" =>  $tr,
			"image" =>  $actual_link.'/moderator/files/profile_images/'.$image,
     );
     $products_arr[] = $product_item;	 
 }
 echo json_encode($products_arr); 
?>