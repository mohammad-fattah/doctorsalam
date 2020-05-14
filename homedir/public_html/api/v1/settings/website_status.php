<?php
 include_once '../config/database.php';
 include_once '../objects/settings.php';
 
 $database = new Database();
 $db = $database->getConnection();
 
 $setting = new settings($db,'settings');
 $setting->status =isset($_POST['status']) ? $_POST['status'] : 'on';
 $setting->website_status =isset($_POST['website_status']) ? $_POST['website_status'] : '';
 $stmt=$setting->website_status();
 $products_arr=array();
 $products_arr =array("message" =>"yes");
 echo json_encode($products_arr);
?>