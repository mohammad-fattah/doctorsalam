<?php
class merchant{
    private $conn;
    private $table_name ;
    public function __construct($db,$table){
      $this->conn = $db;
      $this->table_name = $table;
    }
	function merchant_list(){ 
	  $type=$this->type;
	  $query = "SELECT * FROM `".$this->table_name."` WHERE `user_type` = 'merchant' LIMIT 0,100";
      $stmt = $this->conn->prepare( $query );
	  //$stmt->bindParam(':type', $type, PDO::PARAM_STR);
      $stmt->execute();
	  return $stmt;
    }
	function merchant_info(){ 
	  $id=$this->id;
	  $query = "SELECT * FROM `".$this->table_name."` WHERE `id` = :id ";
      $stmt = $this->conn->prepare( $query );
	  $stmt->bindParam(':id', $id, PDO::PARAM_STR);
      $stmt->execute();
	  return $stmt;
    }
	function search(){
	  $q=$this->q;
	  $q="%$q%";
	  $query = "SELECT * FROM `".$this->table_name."` WHERE `job_title` LIKE :q AND user_type='merchant'";
      $stmt = $this->conn->prepare( $query );
	  $stmt->bindParam(':q', $q, PDO::PARAM_STR);
      $stmt->execute();
	  return $stmt;
    }
	function search_group(){
	  $q=$this->q;
	  $query = "SELECT * FROM `".$this->table_name."` WHERE user_type='merchant' AND `psp_category`=:q ";
      $stmt = $this->conn->prepare( $query );
	  $stmt->bindParam(':q', $q, PDO::PARAM_STR);
      $stmt->execute();
	  return $stmt;
    }
	function car_type(){ 
	  $query = "SELECT * FROM `".$this->table_name."` WHERE insure='thirdparty' ORDER BY `orderby`";
      $stmt = $this->conn->prepare( $query );
      $stmt->execute();
	  return $stmt;
    }
	function car_model(){
      $model=$this->model;		
	  $model="%$model%";
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