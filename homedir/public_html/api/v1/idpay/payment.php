<?php
session_start();
require_once('variables.php');

$header = array(
  'Content-Type: application/json',
  'X-API-KEY:' . APIKEY,
  'X-SANDBOX:' . SANDBOX,
);

if($_GET['price']){
 $amount = $_GET['price'];
 $amount=str_replace(",","",$amount); 
 $amount =$amount *10; 
}else{
 $amount = $_SESSION['price']*10;
}

$params = array(
  'order_id' => '101',
  'amount' => $amount,
  'phone' => $_SESSION['bitmeh'],
  'desc' => 'توضیحات پرداخت کننده',
  'callback' => URL_CALLBACK,
);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, URL_PAYMENT);
curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($params));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

$result = curl_exec($ch);
curl_close($ch);

$result = json_decode($result);

if (empty($result) ||
    empty($result->link)) {

  print 'Error handeling';
  return FALSE;
}

//.Redirect to payment form
header('Location:' . $result->link);