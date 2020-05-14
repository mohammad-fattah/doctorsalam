<?php
 $title=$des;
 include_once 'api/v1/config/database.php';
 include_once 'api/v1/objects/settings.php';
 
 $database = new Database();
 $db = $database->getConnection();
 
 $blog = new settings($db,'help_articles');
 $blog->title =$title;
 $stmt=$blog->blog();
 while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
     extract($row);
	 //if($id == 7){
	 	//echo $title;
	 	echo $description;
	 //}  
 }
?>