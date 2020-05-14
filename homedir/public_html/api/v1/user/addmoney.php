<?php
 session_start();
 header("Access-Control-Allow-Origin: *");
 header("Access-Control-Allow-Headers: access");
 header("Access-Control-Allow-Methods: GET");
 header("Access-Control-Allow-Credentials: true");
 header('Content-Type: application/json');

 include_once '../config/database.php';
 include_once '../objects/user.php';
 
 $database = new Database();
 $db = $database->getConnection();
 
 $user = new user($db,'wallet');
 $user->user = isset($_GET['user']) ? $_GET['user'] : die();
 
 $stmt=$user->get_extant_cash();
 $extant=0;
 while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
  extract($row);
  $extant=$extant;
 }
 $user = new user($db,'wallet');
 $user->user = isset($_GET['user']) ? $_GET['user'] : die();
 $user->amount = $amount = isset($_GET['price']) ? $_GET['price'] : die();
 $factor = $user->factor = rand(1000000,1000000000);
 $user->extant = $extant + $amount;
 $user->for = 'شارژ کیف پول';
 $user->type = 'plus';
 $user->status = 'deactive';
 $user->wallet_type = 'cash';
 
 $user->add_money(); 
 echo $factor;