<?php
class projects{
    private $conn;
    private $table_name ;
    public function __construct($db,$table){
      $this->conn = $db;
      $this->table_name = $table;
    }
	function login(){ 
	  $query = "SELECT * FROM `".$this->table_name."` WHERE `phone`=:user LIMIT 0,1";
      $stmt = $this->conn->prepare( $query );
	  $stmt->bindParam(':user', $this->user, PDO::PARAM_STR);
      $stmt->execute();
	  return $stmt;
    }
	function add_order(){
	  $data=['factor'=>$this->factor,'username'=>$this->username,'company_name'=>$this->company_name,'date'=>$this->date,'description'=>$description,'price'=>$price,'status'=>'ثبت سفارش','CashIinstallments'=>$CashIinstallments,'type'=>'online','insure_type'=>'thirdparty','user_key'=>$this->user_key];
	  $query = "INSERT INTO `".$this->table_name."`(factor,client_id,title,created_date,description,price,status,CashIinstallments,`type`,insure_type,user_key) VALUES(:factor,:username,:company_name,:date,:description,:price,:status,:CashIinstallments,:online,:insure_type,:user_key)";

      $stmt = $this->conn->prepare( $query );
      $stmt->execute($data);
	  return $stmt;
    }
	function project_time(){
	  $data=['id'=>$this->id,'status'=>'open','start_time'=>$this->start_time,'user_key'=>$this->user_key];
	  $query = "INSERT INTO `".$this->table_name."`(project_id,user_id,start_time,status) VALUES(:id,:user_key,:start_time,:status)";
      $stmt = $this->conn->prepare( $query );
      $stmt->execute($data);
	  return $stmt;
    }
}