<?php
 include_once 'api/v1/objects/user.php';
 $user = new user($db,'orders');
 if($user_type == 'doctor'){
  $user->user_type = 'doctor';
  $user->user = $user_id;
 }else{
  $user->user_type = $user_type;
  $user->user = $user_key_user; 
 }
 $stmt=$user->order_list();