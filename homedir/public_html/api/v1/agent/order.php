<?php
 header("Access-Control-Allow-Origin: *");
 header("Access-Control-Allow-Headers: access");
 header("Access-Control-Allow-Methods: GET");
 header("Access-Control-Allow-Credentials: true");
 header('Content-Type: application/json');

 include_once '../config/database.php';
 include_once '../objects/agent.php';
 include_once '../config/datapicker.php';
 
 $database = new Database();
 $db = $database->getConnection();
 
 $agent = new agent($db,'orders');
 
 $agent->user = isset($_GET['user']) ? $_GET['user'] : die();
 
 $stmt=$agent->order();
 
 $products_arr=array();
 $products_arr["orders"]=array();
 while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
		$data=explode('-',$date);
		$time=explode(' ',$date);
		$da=gregorian_to_jalali($data[0],$data[1],$data[2],'');
		$da=$da.' ساعت : '.$time[1];
		/*type*/
		if($type=='thirdparty'){$type='شخص ثالث';}
		elseif($type=='carbody'){$type='بدنه';}
		/*type*/
		/*status*/
		if($status=='open'){$status='سفارش باز';}
		elseif($status=='cancel'){$status='کنسل شده';}
		elseif($status=='peyment'){$status='پرداخت شده';}
		/*status*/
        $product_item=array(
			"id" =>  $id,
            "type" => $type,
            "price" => number_format($price),
            "date" => $da,
            "state" => $state,
            "status" => $status,
            "factor" => $factor,
        );
        array_push($products_arr["orders"], $product_item);
 }
 echo json_encode($products_arr);