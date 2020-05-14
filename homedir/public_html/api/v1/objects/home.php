<?php
class home{
    private $conn;
    private $table_name ;
    public function __construct($db,$table){
      $this->conn = $db;
      $this->table_name = $table;
    }
	function home_list(){ 
	  $query = "SELECT * FROM `".$this->table_name."` ORDER BY `olv`";
      $stmt = $this->conn->prepare( $query );
      $stmt->execute();
	  return $stmt;
    }
	function home_type(){
	  $query = "SELECT * FROM `".$this->table_name."` WHERE insure='fire' ORDER BY `orderby`";
      $stmt = $this->conn->prepare( $query );
      $stmt->execute();
	  return $stmt;
    }
	function home_price(){
	  $query = "SELECT * FROM `".$this->table_name."` ORDER BY `olv` ASC";
      $stmt = $this->conn->prepare( $query );
      $stmt->execute();
	  return $stmt;
    }
	function home_model(){
      $model=$this->model;		
	  $model="%$model%";
	  $query = "SELECT * FROM `".$this->table_name."` WHERE `name` LIKE :car";
      $stmt = $this->conn->prepare( $query );
	  $stmt->bindParam(':car', $model, PDO::PARAM_STR);
      $stmt->execute();
	  return $stmt;
    }
}