<?php
class chat{
    private $conn;
    private $table_name ;
    public function __construct($db,$table){
      $this->conn = $db;
      $this->table_name = $table;

    }

    function fetch_messages(){
      $data=['created_by'=>$this->unique_id,'created_for'=>$this->unique_id];
      // $data=['created_by'=>$this->unique_id];
      $query = "SELECT * FROM `".$this->table_name."` WHERE created_by=:created_by OR created_for=:created_for";
      // $query = "SELECT * FROM `".$this->table_name."` WHERE created_by=:created_by";
      $stmt = $this->conn->prepare( $query );
      $stmt->execute($data);
      $data=[];
      return $stmt;
    }

	function insert_message(){ 
    $data=['created_by'=>$this->unique_id,'created_for'=>'1','description'=>$this->description,'unique_id'=>$this->unique_id, 'client_name'=>$this->client_name];
    $input_query = "INSERT INTO `".$this->table_name."`(created_by,created_for,description,unique_id,client_name) VALUES(:created_by,:created_for,:description,:unique_id,:client_name)";
      $input_stmt = $this->conn->prepare( $input_query );
      $input_stmt->execute($data);
    return $input_stmt;
    }


    function insert_reply(){
      $data=['created_by'=>$this->unique_id,'created_for'=>'1','description'=>$this->description,'unique_id'=>$this->unique_id, 'client_name'=>$this->client_name, 'reply'=>'1', 'source_description'=>$this->source_description];
      $input_query = "INSERT INTO `".$this->table_name."`(created_by,created_for,description,unique_id,client_name, reply, source_description) VALUES(:created_by,:created_for,:description,:unique_id,:client_name, :reply, :source_description)";
      $input_stmt = $this->conn->prepare( $input_query );
      $input_stmt->execute($data);
      return $input_stmt;
    }
}



