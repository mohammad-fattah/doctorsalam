<?php
class agent{
    private $conn;
    private $table_name ;
    public $id;
    public $name;
    public $insure;
    public $percent;
    public $active;
    public function __construct($db,$table){
      $this->conn = $db;
      $this->table_name = $table;
    }
	function agent_insure(){ 
	  $query = "SELECT * FROM `".$this->table_name."` WHERE status='1' ORDER BY `id`";
      $stmt = $this->conn->prepare( $query );
      $stmt->execute();
	  return $stmt;
    }
	function agent_info(){ 
	  $query = "SELECT *,(SELECT COUNT(id) FROM `messages` WHERE `to_user_id`=:user AND deleted='0') AS cmsg FROM `".$this->table_name."`";
      $stmt = $this->conn->prepare( $query );
	  $stmt->bindParam(':user', $this->user, PDO::PARAM_STR); 
      $stmt->execute();
	  return $stmt;
    }
	function agent_about(){ 
	  $query = "SELECT * FROM `".$this->table_name."` WHERE title=:title";
      $stmt = $this->conn->prepare( $query );
	  $stmt->bindParam(':title', $this->title, PDO::PARAM_STR);
      $stmt->execute();
	  return $stmt;
    }
    function insurance(){ 
	  $query = "SELECT * FROM `".$this->table_name."` WHERE phone=:user ";
      $stmt = $this->conn->prepare( $query );
      $stmt->bindParam(':user', $this->user, PDO::PARAM_STR);
      $stmt->execute();
	  return $stmt;
    }
	function user_order(){ 
	  $query = "SELECT * FROM `".$this->table_name."` WHERE agent_key=:user ";
      $stmt = $this->conn->prepare( $query );
      $stmt->bindParam(':user', $this->user, PDO::PARAM_STR);
      $stmt->execute();
	  return $stmt;
    }
	function bank(){ 
	  $query = "SELECT * FROM `".$this->table_name."` WHERE phone=:user ";
      $stmt = $this->conn->prepare( $query );
      $stmt->bindParam(':user', $this->user, PDO::PARAM_STR);
      $stmt->execute();
	  return $stmt;
    }
	function cashouts(){ 
	  $query = "SELECT * FROM `".$this->table_name."` WHERE agent=:user and status='تسویه'";
      $stmt = $this->conn->prepare( $query );
      $stmt->bindParam(':user', $this->user, PDO::PARAM_STR);
      $stmt->execute();
	  return $stmt;
    }
	function signin(){ 
	  $query = "SELECT * FROM `".$this->table_name."` WHERE username=:username and password=:password limit 0,1";
      $stmt = $this->conn->prepare( $query );
      $stmt->bindParam(':username', $this->username, PDO::PARAM_STR);
      $stmt->bindParam(':password', $this->password, PDO::PARAM_STR);
      $stmt->execute();
	  return $stmt;
    }
}