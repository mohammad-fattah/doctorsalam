<?php
class document{
    private $conn;
    private $table_name ;
    public function __construct($db,$table){
      $this->conn = $db;
      $this->table_name = $table;
    }
	function get_document(){
      $insurance = $this->insurance;	  
      $dependent = $this->dependent;	  
	  $query = "SELECT *,`type` AS param_type FROM `".$this->table_name."` WHERE `insurance`=:insurance AND `dependent`=:dependent ORDER BY `priority`";
	  $stmt = $this->conn->prepare( $query );
	  $stmt->bindParam(':insurance', $insurance, PDO::PARAM_STR);
	  $stmt->bindParam(':dependent', $dependent, PDO::PARAM_STR);
      $stmt->execute();
	  return $stmt;
    }
}