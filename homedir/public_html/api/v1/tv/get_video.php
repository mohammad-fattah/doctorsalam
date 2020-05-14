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
 
 $video = new settings($db,'video');
 $video->id =isset($_GET['id']) ? $_GET['id'] : '';
 $stmt=$video->detail_videos();
 $products_arr=array();
 while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
     extract($row);
     $product_item=array(
			"title" =>  $video_title,
			"thumb" =>  $yt_thumb,
			"id" =>  $id,
			"url_flv" =>  $url_flv,
     );
     $products_arr[] = $product_item; 	 
 }
 echo json_encode($products_arr);
?>