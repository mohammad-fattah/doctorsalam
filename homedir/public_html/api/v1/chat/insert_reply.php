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
$post = new chat($db,'posts');

$post->unique_id= $_POST['unique_id'];
$post->description = $_POST['description'];
$post->client_name = $_POST['client_name'];
$post->source_description= $_POST['source_description'];


$stmt=$post->insert_reply();
return $stmt;