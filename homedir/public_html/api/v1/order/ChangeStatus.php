<?php
 include_once 'api/v1/config/database.php';
 include_once 'api/v1/objects/order.php';
 
 $database = new Database();
 $db = $database->getConnection();
 
 $parameter = new order($db,'orders');
 $parameter->status = $GetStatus;
 $parameter->factor = $GetFactor;
 
 $stmt=$parameter->ChangeStatus();
