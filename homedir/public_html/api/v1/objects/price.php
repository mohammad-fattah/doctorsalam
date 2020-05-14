<?php
class price{
    private $conn;
    private $table_name ;
    public function __construct($db,$table){
      $this->conn = $db;
      $this->table_name = $table;
    }
	function getPriceThirdparty(){
	 $type=$this->type;
	 $query = "SELECT * FROM `".$this->table_name."` WHERE `type`=:type AND insur_type='thirdparty'"; 
     $stmt = $this->conn->prepare( $query );
     $stmt->bindParam(':type', $type, PDO::PARAM_STR);
     $stmt->execute();
	 return $stmt;
    }
	function getPriceBody(){
	 $type=$this->type;
	 $type='4-cylinder';
	 $query = "SELECT * FROM `".$this->table_name."` WHERE `type`=:type AND insur_type='body'"; 
     $stmt = $this->conn->prepare( $query );
     $stmt->bindParam(':type', $type, PDO::PARAM_STR);
     $stmt->execute();
	 return $stmt;
    }
	function getOff(){
	 $insure_id=$this->insure_id;
	 // GROUP BY `company`
	 $query = "SELECT * FROM `".$this->table_name."` WHERE `deleted`='0' AND `agent_insure_id`=:insure_id ORDER BY `sort` ASC"; 
     $stmt = $this->conn->prepare( $query );
     $stmt->bindParam(':insure_id', $insure_id, PDO::PARAM_STR);
     $stmt->execute();
	 return $stmt;
    }
	function getPriceFire(){
	 $type=$this->type;
	 $type='residential'; 
	 $query = "SELECT * FROM `".$this->table_name."` WHERE `type`=:type AND insur_type='fire'"; 
     $stmt = $this->conn->prepare( $query );
	 $stmt->bindParam(':type', $type, PDO::PARAM_STR);
     $stmt->execute();
	 return $stmt;
    }
	function getPriceLife(){
	 $modat=$this->modat;
	 $type=$this->type;
	 $poshesh=$this->poshesh;
	 //$query = "SELECT *,SUM(price) AS cprice FROM `".$this->table_name."` WHERE `type`=:type AND insur_type='life' ".$poshesh." GROUP BY `company`"; 
	 $query = "SELECT *,SUM(price) AS cprice FROM `".$this->table_name."` WHERE `type`=:type AND insur_type='life' GROUP BY `company`"; 
     $stmt = $this->conn->prepare( $query );
     $stmt->bindParam(':type', $type, PDO::PARAM_STR);
     $stmt->execute();
	 return $stmt;
    }
	function getCompany(){
     $active=$this->active;
     $en_company=$this->company;
     $order=$this->order;
	 $norder="`".$order."` DESC,cash_third DESC"; 
	 
	 if($order){
	   if($order=='low'){
		$query = "SELECT * FROM `".$this->table_name."` WHERE thirdparty=:active AND deleted='0' order by en_name=:en_company DESC,`off_third` DESC,cash_third DESC";   
	   }elseif($order=='hight'){
		$query = "SELECT * FROM `".$this->table_name."` WHERE thirdparty=:active AND deleted='0' order by en_name=:en_company DESC,`off_third` ASC,cash_third DESC";   
	   }else{
		$query = "SELECT * FROM `".$this->table_name."` WHERE thirdparty=:active AND deleted='0' order by en_name=:en_company DESC,".$norder;   
	   }
	 }else{
	   $query = "SELECT * FROM `".$this->table_name."` WHERE thirdparty=:active AND deleted='0' order by en_name=:en_company DESC";
	 }
     $stmt = $this->conn->prepare( $query );
     $stmt->bindParam(':active', $active, PDO::PARAM_STR);
     $stmt->bindParam(':en_company', $en_company, PDO::PARAM_STR);
     $stmt->execute();
	 return $stmt;
    }
 
}