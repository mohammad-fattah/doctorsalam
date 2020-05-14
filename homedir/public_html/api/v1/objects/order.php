<?php
class order{
    private $conn;
    private $table_name ;
    public function __construct($db,$table){
      $this->conn = $db;
      $this->table_name = $table;
    }

	function AddOrder(){
	  $data=[
	   'user_key'=>$this->user_key,
	   'doctor_id'=>$this->doctor_id,
	   'doctor_clinic'=>$this->doctor_clinic,
	   'doctor_insurance'=>$this->doctor_insurance,
	   'doctor_view'=>$this->doctor_view,
	   'doctor_reson'=>$this->doctor_reson,
	   'factor'=>$this->factor,
	   'product_id'=>$this->product_id,
	  ];
	  $query = "INSERT INTO `".$this->table_name."`(user_key,doctor_id,address,insurance,view,reson,factor,product_id) VALUES(:user_key,:doctor_id,:doctor_clinic,:doctor_insurance,:doctor_view,:doctor_reson,:factor,:product_id)";
      $stmt = $this->conn->prepare( $query );
      $stmt->execute($data);
	  
	  $query = "UPDATE `times` SET status='in_use' WHERE id='".$this->product_id."'";
      $stmt = $this->conn->prepare( $query );
	  /*$stmt->bindParam(':id', $this->product_id, PDO::PARAM_STR);
	  $stmt->bindParam(':status', 'in_use', PDO::PARAM_STR);*/
      $stmt->execute($data);
	  
	  return true;
    }
	
	function ChangeStatus(){
	 if($this->status == '0'){
	  $query = "UPDATE `".$this->table_name."` SET `status`='پرداخت غیرموفق صورتحساب' WHERE `factor`='".$this->factor."'";
      $stmt = $this->conn->prepare( $query );
      $stmt->execute();
	  
	  $query = "SELECT product_id FROM `".$this->table_name."` WHERE `factor`=:factor"; 
      $stmt = $this->conn->prepare( $query );
      $stmt->bindParam(':factor', $this->factor, PDO::PARAM_STR);
      $stmt->execute();
	  $product_id = $stmt->fetchColumn();
	  
	  $query = "UPDATE `times` SET status='active' WHERE id='".$product_id."'";
      $stmt = $this->conn->prepare( $query );
      $stmt->execute();
	 }else{
	  $query = "UPDATE `".$this->table_name."` SET `status`='پرداخت موفق صورتحساب' WHERE `factor`='".$this->factor."'";
      $stmt = $this->conn->prepare( $query );
      $stmt->execute(); 
	  
	  $query = "SELECT product_id FROM `".$this->table_name."` WHERE `factor`=:factor"; 
      $stmt = $this->conn->prepare( $query );
      $stmt->bindParam(':factor', $this->factor, PDO::PARAM_STR);
      $stmt->execute();
	  $product_id = $stmt->fetchColumn();
	  
	  $query = "UPDATE `times` SET status='in_use' WHERE id='".$product_id."'";
      $stmt = $this->conn->prepare( $query );
      $stmt->execute();
	 }
    }
	
	function ChangeStatusWallet(){
	 if($this->status == '0'){
	  $query = "UPDATE `".$this->table_name."` SET `status`='deactive' WHERE `factor`='".$this->factor."'";
      $stmt = $this->conn->prepare( $query );
      $stmt->execute();
	 }else{
	  $query = "UPDATE `".$this->table_name."` SET `status`='active' WHERE `factor`='".$this->factor."'";
      $stmt = $this->conn->prepare( $query );
      $stmt->execute(); 
	 }
    }
}