 <?php
 // session_start();
 header("Access-Control-Allow-Origin: *");
 header("Access-Control-Allow-Headers: access");
 header("Access-Control-Allow-Methods: GET");
 header("Access-Control-Allow-Credentials: true");
 header('Content-Type: application/json');

 include_once '../config/database.php';
 include_once '../objects/chat.php';
 include_once '../objects/user.php';

 
 $database = new Database();
 $db = $database->getConnection();
 // $user = new user($db, 'users');

 $post = new chat($db,'posts');
 
 // $user_unique_id=$post->chat_unique_id= isset($_COOKIE['uniqueID']) ? $_COOKIE['uniqueID'] : die();

 // $post->unique_id= isset($_POST['unique_id']) ? $_POST['unique_id'] : die();
 // $post->description = isset($_POST['description']) ? $_POST['description'] : die();

  $post->unique_id= $_POST['unique_id'];
  // $post->unique_id= '5e2878b6a4a72';

  $post->description = $_POST['description'];
  $post->client_name = $_POST['client_name'];
 $stmt=$post->insert_message();
return $stmt;