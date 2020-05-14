<?php
 header("Access-Control-Allow-Origin: *");
 header("Access-Control-Allow-Headers: access");
 header("Access-Control-Allow-Methods: GET");
 header("Access-Control-Allow-Credentials: true");
 header('Content-Type: application/json');

 include_once '../config/database.php';
 include_once '../objects/user.php';
 
 $database = new Database();
 $db = $database->getConnection();
 $user = new user($db,'orders');
 $user->username = isset($_GET['user']) ? $_GET['user'] : die();
 $user->title = isset($_GET['title']) ? $_GET['title'] : '';
 $user->insure = isset($_GET['insure']) ? $_GET['insure'] : '';
 $user->price = isset($_GET['price']) ? $_GET['price'] : '';
 
 $off = isset($_GET['off']) ? $_GET['off'] : '';
 $sal = isset($_GET['sal']) ? $_GET['sal'] : '';
 $type = isset($_GET['type']) ? $_GET['type'] : '';
 $date = isset($_GET['date']) ? $_GET['date'] : '';
 $poshesh = isset($_GET['poshesh']) ? $_GET['poshesh'] : '';
 
 
 $company = isset($_GET['company']) ? $_GET['company'] :'';
 $DriverDiscount = isset($_GET['driver_discount']) ? $_GET['driver_discount'] :'';
 $datepicker = isset($_GET['datepicker']) ? $_GET['datepicker'] :'';
 $old_company = isset($_GET['old_company']) ? $_GET['old_company'] :'';
 $credit = isset($_GET['credit']) ? $_GET['credit'] :'';
 $has_damage = isset($_GET['has_damage']) ? $_GET['has_damage'] :'';
 $PropertyDamage = isset($_GET['property_damage']) ? $_GET['property_damage'] :'';
 $LossLife = isset($_GET['loss_life']) ? $_GET['loss_life'] :'';
 $NumberDamages = isset($_GET['number_damages']) ? $_GET['number_damages'] :'';
 $broker = isset($_GET['broker']) ? $_GET['broker'] :'';
 $number_installments_third = isset($_GET['number_installments_third']) ? $_GET['number_installments_third'] :'';
 $Installments_title_third = isset($_GET['Installments_title_third']) ? $_GET['Installments_title_third'] :'';
 
 
 $description='نوع وسیله نقلیه : '.$type.'#برند وسیله نقلیه : '.$machine.'#مدل وسیله نقلیه : '.$model.'#سال ساخت : '.$sal.'#درصد تخفیف ثالث : '.$takhfif.'#درصد تخفیف حوادث راننده : '.$DriverDiscount.'#تاریخ انقضای بیمه نامه : '.$datepicker.'#پوشش : '.$poshesh.'#شرکت بیمه گر قبلی : '.$old_company.'#مدت اعتبار بیمه نامه جدید : '.$credit.'#خسارت از بیمه نامه قبلی : '.$has_damage.'#تعداد خسارت مالی : '.$PropertyDamage.'#تعداد خسارت جانی :'.$LossLife.'#تعداد خسارت حوادث راننده : '.$NumberDamages;
 
 $user->description = $description;
 $stmt=$user->new_order();
 
 $products_arr=array();
 $products_arr[] = array("result"=>"success");
 echo json_encode($products_arr);