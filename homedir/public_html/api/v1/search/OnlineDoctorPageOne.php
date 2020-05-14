<?php
 include_once 'api/v1/config/database.php';
 include_once 'api/v1/objects/search.php';
 $database = new Database();
 $db = $database->getConnection();
 $city = new search($db,'users');
 $stmt_one=$city->SearchDoctorOnlinePageOne();
 $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
?>