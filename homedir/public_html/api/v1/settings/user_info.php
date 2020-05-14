<?php
 session_start();
 $username='';
 if($_SESSION['bitmeh']){$username=$_SESSION['bitmeh'];}else{$_SESSION['bitmeh']='';}
 
 include_once 'api/v1/config/database.php';
 include_once 'api/v1/objects/settings.php';
 
 $database = new Database();
 $db = $database->getConnection();
 
 $users = new settings($db,'users');
 
 $stmt=$users->users();
 while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
     extract($row);
	 $first_name=$first_name;
	 $last_name = $last_name;
	 $job = $job_title;
	 $postalcode = $postalcode;
	 $phone = $phone;
	 $email = $email;
	 $state = $state;
	 $city = $city;
	 $address = $address;
	 $birthday = $birthday;  
 }
?>