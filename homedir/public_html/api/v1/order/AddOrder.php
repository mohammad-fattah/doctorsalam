<?php
 include_once '../config/database.php';
 include_once '../objects/order.php';
 
 $database = new Database();
 $db = $database->getConnection();
 
 $parameter = new order($db,'orders');
 $parameter->user_key = isset($_POST['user_key']) ? $_POST['user_key'] : '';
 $parameter->doctor_id = isset($_POST['doctor_id']) ? $_POST['doctor_id'] : '';
 $parameter->time_order = isset($_POST['time_order']) ? $_POST['time_order'] : '';
 $parameter->date_order = isset($_POST['date_order']) ? $_POST['date_order'] : '';
 $parameter->doctor_clinic = isset($_POST['doctor_clinic']) ? $_POST['doctor_clinic'] : '';
 $parameter->doctor_insurance = isset($_POST['doctor_insurance']) ? $_POST['doctor_insurance'] : '';
 $parameter->doctor_view = isset($_POST['doctor_view']) ? $_POST['doctor_view'] : '';
 $parameter->doctor_reson = isset($_POST['doctor_reson']) ? $_POST['doctor_reson'] : '';
 $parameter->price = isset($_POST['price']) ? $_POST['price'] : '';
 $parameter->product_id = isset($_POST['product_id']) ? $_POST['product_id'] : '';
 $factor = $parameter->factor = rand(1000000,1000000000);
 
 $stmt=$parameter->AddOrder();
 echo $factor;
