<?php
class car{
    private $conn;
    private $table_name ;
    public function __construct($db,$table){
      $this->conn = $db;
      $this->table_name = $table;
    }
	function car_list(){ 
	  $name=$this->name;
	  $type=$this->type;
	  $name="%$name%";
	  $query = "SELECT * FROM `".$this->table_name."` WHERE `type` LIKE :name AND insure = :type ORDER BY `olv`";
      $stmt = $this->conn->prepare( $query );
	  $stmt->bindParam(':name', $name, PDO::PARAM_STR);
	  $stmt->bindParam(':type', $type, PDO::PARAM_STR);
      $stmt->execute();
	  return $stmt;
    }
	function search(){ 
	  $type=$this->type;
	  $type="%$type%";
	  $q=$this->q;
	  $q="%$q%";
	  $query = "SELECT * FROM `".$this->table_name."` WHERE `name` LIKE :q AND `type` LIKE :type ORDER BY `olv`";
      $stmt = $this->conn->prepare( $query );
	  $stmt->bindParam(':type', $type, PDO::PARAM_STR);
	  $stmt->bindParam(':q', $q, PDO::PARAM_STR);
      $stmt->execute();
	  return $stmt;
    }
	function car_type(){
      $type=$this->type;		
	  $query = "SELECT * FROM `".$this->table_name."` WHERE insure=:type AND status='active' ORDER BY `orderby`";
      $stmt = $this->conn->prepare( $query );
	  $stmt->bindParam(':type', $type, PDO::PARAM_STR);
      $stmt->execute();
	  return $stmt;
    }
	function car_model(){
      $model=$this->model;		
	  $model="%$model %";
	  $query = "SELECT * FROM `".$this->table_name."` WHERE `name` LIKE :car";
      $stmt = $this->conn->prepare( $query );
	  $stmt->bindParam(':car', $model, PDO::PARAM_STR);
      $stmt->execute();
	  return $stmt;
    }
	function search_model(){
	  $q=$this->q;
	  $q="%$q%";
	  $type=$this->type;
	  $type="%$type%";
	  $query = "SELECT * FROM `".$this->table_name."` WHERE `name` LIKE :q AND `name` LIKE :type";
      $stmt = $this->conn->prepare( $query );
	  $stmt->bindParam(':q', $q, PDO::PARAM_STR);
	  $stmt->bindParam(':type', $type, PDO::PARAM_STR);
      $stmt->execute();
	  return $stmt;
    }
}