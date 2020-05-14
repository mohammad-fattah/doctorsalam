<?php
class search{
    private $conn;
    private $table_name ;
    public function __construct($db,$table){
      $this->conn = $db;
      $this->table_name = $table;
    }
	function Search(){
	  $limit = '';
	  $where = '';
      $page=$this->page;		
      $type=$this->type;		
      $state=$this->state;		
      $specialty=$this->specialty;		
	  if($page) {
		$page = ($page - 1 ) * 10;
		$limit = " LIMIT ".$page.",10 ";
	  }
	  if($state) {$where = $where . " AND state=:state ";}
	  if($specialty) {$where = $where . " AND specialty=:specialty ";}
	  $query = "SELECT *,(SELECT `name` FROM `insurance` WHERE `insurance`.site_link = `".$this->table_name."`.specialty) AS specialty_name,(SELECT CONCAT(`state`,' - ',city,' - ',address) FROM `users_address` WHERE `users_address`.user_key = `".$this->table_name."`.user_key ORDER BY id LIMIT 0,1) AS address,(SELECT SUM(id) FROM `orders` WHERE `orders`.doctor_id = `".$this->table_name."`.id) AS Sum FROM `".$this->table_name."` WHERE `user_type`=:type $where $limit";
      $stmt = $this->conn->prepare( $query );
	  $stmt->bindParam(':type', $type, PDO::PARAM_STR);
	  if($state) {$stmt->bindParam(':state', $state, PDO::PARAM_STR);}
	  if($specialty) {$stmt->bindParam(':specialty', $specialty, PDO::PARAM_STR);}
      $stmt->execute();
	  return $stmt;
    }
	function SearchOne(){
	  $where = '';
      $type=$this->type;		
      
	  $query = "SELECT *,(SELECT `name` FROM `insurance` WHERE `insurance`.site_link = `".$this->table_name."`.specialty) AS specialty_name FROM `".$this->table_name."` WHERE `user_type`=:type LIMIT 0,5";
      $stmt = $this->conn->prepare( $query );
	  $stmt->bindParam(':type', $type, PDO::PARAM_STR);
      $stmt->execute();
	  return $stmt;
    }
	function SearchClinic(){
	  $where = '';
      $type=$this->type;		
      $state=$this->state;		
	  if($state) {$where = $where . " AND state=:state ";}
	  $query = "SELECT * FROM `".$this->table_name."` WHERE `user_type`=:type $where";
      $stmt = $this->conn->prepare( $query );
	  $stmt->bindParam(':type', $type, PDO::PARAM_STR);
	  if($state) {$stmt->bindParam(':state', $state, PDO::PARAM_STR);}
      $stmt->execute();
	  return $stmt;
    }
	function SearchDoctorOnlinePageOne(){
      $type='doctor';
	  $query = "SELECT *,(SELECT `name` FROM `insurance` WHERE insurance.site_link = `".$this->table_name."`.specialty) AS specialtyName FROM `".$this->table_name."` WHERE `user_type`=:type ";
      $stmt = $this->conn->prepare( $query );
	  $stmt->bindParam(':type', $type, PDO::PARAM_STR);
      $stmt->execute();
	  return $stmt;
    }
	function Times(){
      $times=$this->times;		
      $times1=date('Y-m-d',strtotime($times."+1 days"));		
      $times2=date('Y-m-d',strtotime($times."+2 days"));		
      $id=$this->id;		
	  $query = "SELECT *,id AS uuid FROM `".$this->table_name."` WHERE (`date`=:times OR `date`=:times1 OR `date`=:times2) AND doctor=:id AND status='active'";
      $stmt = $this->conn->prepare( $query );
	  $stmt->bindParam(':times', $times, PDO::PARAM_STR);
	  $stmt->bindParam(':times1', $times1, PDO::PARAM_STR);
	  $stmt->bindParam(':times2', $times2, PDO::PARAM_STR);
	  //$stmt->bindParam(':status', "active", PDO::PARAM_STR);
	  $stmt->bindParam(':id', $id, PDO::PARAM_STR);
      $stmt->execute();
	  return $stmt;
    }
	function Details(){
      $id=$this->id;		
	  $query = "SELECT * FROM `".$this->table_name."` WHERE `id`=:id ";
      $stmt = $this->conn->prepare( $query );
	  $stmt->bindParam(':id', $id, PDO::PARAM_STR);
      $stmt->execute();
	  return $stmt;
    }
}