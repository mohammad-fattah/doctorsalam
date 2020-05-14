<?php
 header("Access-Control-Allow-Origin: *");
 header("Access-Control-Allow-Headers: access");
 header("Access-Control-Request-Headers: access");
 header("Access-Control-Allow-Methods: POST");
 header("Access-Control-Allow-Credentials: true");
 header('Content-Type: application/json');
 include_once '../config/database.php';
 include_once '../objects/chat.php';
 include_once '../objects/settings.php';
 $database = new Database();
 $db = $database->getConnection(); 
 $messages = new chat($db, 'posts');
 $messages->unique_id = $_GET['unique_id'];      
 $messages->limit = 100;
 $stmt_messages = $messages->fetch_messages();         
 while ($newrow = $stmt_messages->fetch(PDO::FETCH_ASSOC))
 {
     extract($newrow);
     $array=array(
      "description" => $description,
      "created_at" => $created_at,
      "created_by" => $created_by,
      "id" => $id,
      "reply" => $reply,
      "source_description" => $source_description
    );
        $products_arr[] = $array;
   }
// $out = array_values($array);
// echo json_encode($out);
// echo json_encode($array);
 echo json_encode($products_arr);


