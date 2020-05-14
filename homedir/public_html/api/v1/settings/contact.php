<?php
 $title=$des;
 include_once 'api/v1/config/database.php';
 include_once 'api/v1/objects/settings.php'; 
 $database = new Database();
 $db = $database->getConnection();
 $contact_us = new settings($db,'contact');
 $stmt = $contact->contact();
 while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
     extract($row);
	 if($setting_name=='company_name'){$site_name=$setting_value;}    
 }
 
