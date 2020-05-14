<?php
 include_once 'api/v1/config/database.php';
 include_once 'api/v1/objects/user.php';
 $database = new Database();
 $db = $database->getConnection();
 $user = new user($db,'wallet');
 $nuser=$user->user = $user_key_user;
 $stmt=$user->payment_list();