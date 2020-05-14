<?php
class parameter{
    private $conn;
    private $table_name ;
    public function __construct($db,$table){
      $this->conn = $db;
      $this->table_name = $table;
    }
	function get_parameter(){
      $insurance = $this->insurance;		
      $priority = $this->priority;	  
	  $query = "SELECT *,`type` AS param_type FROM `".$this->table_name."` WHERE `insurance`=:insurance AND priority=:priority AND deleted='0'";
	  $stmt = $this->conn->prepare( $query );
	  $stmt->bindParam(':insurance', $insurance, PDO::PARAM_STR);
	  $stmt->bindParam(':priority', $priority, PDO::PARAM_STR);
      $stmt->execute();
	  return $stmt;
    }
	function get_parameter_val(){		
      $insurance_parameter = $this->insurance_parameter;		
      $insurance = $this->insurance;		
      $idval = $this->id_val;
      $def = $this->def;
      if($idval){
       if($def==1){		  
	    $query = "SELECT * FROM `".$this->table_name."` WHERE `insurance_parameter`=:insurance_parameter AND status='active' AND insurance=:insurance ORDER BY `orderby`";
        $stmt = $this->conn->prepare( $query );
	    $stmt->bindParam(':insurance_parameter', $insurance_parameter, PDO::PARAM_STR);
	   }else{
		$query = "SELECT * FROM `".$this->table_name."` WHERE `insurance_parameter`=:insurance_parameter AND status='active' AND id_val=:idval AND insurance=:insurance ORDER BY `orderby`";
        $stmt = $this->conn->prepare( $query );
	    $stmt->bindParam(':idval', $idval, PDO::PARAM_STR);
	    $stmt->bindParam(':insurance_parameter', $insurance_parameter, PDO::PARAM_STR);  
	    $stmt->bindParam(':insurance', $insurance, PDO::PARAM_STR);  
	   }
	  }else{
	   $query = "SELECT * FROM `".$this->table_name."` WHERE `insurance_parameter`=:insurance_parameter AND status='active' AND insurance=:insurance ORDER BY `orderby`";
       $stmt = $this->conn->prepare( $query );
	   $stmt->bindParam(':insurance_parameter', $insurance_parameter, PDO::PARAM_STR);
	   $stmt->bindParam(':insurance', $insurance, PDO::PARAM_STR);
	  }
      $stmt->execute();
	  return $stmt;
    }
	function insurance_parameter_price(){
	 $id = str_replace('"','',$this->id);
	 $company = "'%".$this->en_name."%'";
	 $query = "SELECT * FROM `".$this->table_name."` WHERE `".$this->table_name."`.deleted='0' AND `company` LIKE $company $id ORDER BY `".$this->table_name."`.priority"; 
     $stmt = $this->conn->prepare( $query );
	 $stmt->bindParam(':id', $id, PDO::PARAM_STR);
     $stmt->execute();
	 return $stmt;
    }
	function company(){
	 //$query = "SELECT * FROM `".$this->table_name."` WHERE deleted='0'"; 
	 $query = "SELECT *,insurance_payment.id AS `dependent` FROM `".$this->table_name."` left join insurance_payment on company.en_name=insurance_payment.company"; 
     $stmt = $this->conn->prepare( $query );
     $stmt->execute();
	 return $stmt;
    }
}