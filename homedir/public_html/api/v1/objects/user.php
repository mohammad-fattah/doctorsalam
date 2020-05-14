<?php
class user{
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
	function register(){ 
	  $pass=md5($this->pass);
	  $user_key=md5(rand(1000,100000));
	  $data=['user'=>$this->user,'fname'=>$this->fname,'lname'=>$this->lname,'pass'=>$pass,'user_key'=>$user_key];
	  $query = "INSERT INTO `".$this->table_name."`(phone,first_name,last_name,password,user_key) VALUES(:user,:fname,:lname,:pass,:user_key)";
      $stmt = $this->conn->prepare( $query );
      $stmt->execute($data);
	  return $user_key;
    }
	function changepass(){ 
	  $pass=md5($this->pass);
	  $data=['user'=>$this->user,'pass'=>$pass];
	  $query = "UPDATE `".$this->table_name."` SET password=:pass WHERE phone=:user";
      $stmt = $this->conn->prepare( $query );
	  $stmt->bindParam(':user', $this->user, PDO::PARAM_STR);
	  $stmt->bindParam(':pass', $this->pass, PDO::PARAM_STR);
      $stmt->execute($data);
	  return $stmt;
    }
	function update(){
	  
	  $data=[
	   'user'=>$this->user,
	   'first'=>$this->first_name,
	   'last'=>$this->last_name,
	   'cellphone'=>$this->cellphone,
	   'address'=>$this->address,
	  ];
	  $query = "UPDATE `".$this->table_name."` SET first_name='".$this->first_name."',last_name='".$this->last_name."',cellphone='".$this->cellphone."',state='".$this->state."',city='".$this->city."',address='".$this->address."',postalcode='".$this->postal_code."',melli_code='".$this->melli_code."' WHERE phone='".$this->user."'";
      $stmt = $this->conn->prepare( $query );
      $stmt->execute();
	  return $stmt;
    }
	function password(){ 
	  $query = "SELECT * FROM `".$this->table_name."` WHERE `phone`=:user AND `password`=:pass LIMIT 0,1";
      $stmt = $this->conn->prepare( $query );
	  $stmt->bindParam(':user', $this->user, PDO::PARAM_STR);
	  $stmt->bindParam(':pass', $this->pass, PDO::PARAM_STR);
      $stmt->execute();
	  return $stmt;
    }
	function forget(){ 
	  $query = "SELECT * FROM `".$this->table_name."` WHERE `phone`=:user LIMIT 0,1";
      $stmt = $this->conn->prepare( $query );
	  $stmt->bindParam(':user', $this->user, PDO::PARAM_STR);
      $stmt->execute();
	  return $stmt;
    }
	function messages_list(){ 
	  $query = "SELECT * FROM `".$this->table_name."` WHERE `to_user_id`=:user AND deleted='0'";
      $stmt = $this->conn->prepare( $query );
	  $stmt->bindParam(':user', $this->user, PDO::PARAM_STR);
      $stmt->execute();
	  return $stmt;
    }
	function reminder_list(){ 
	  $query = "SELECT * FROM `".$this->table_name."` WHERE `username`=:user AND status='1' AND deleted='0'";
      $stmt = $this->conn->prepare( $query );
	  $stmt->bindParam(':user', $this->user, PDO::PARAM_STR);
      $stmt->execute();
	  return $stmt;
    }
	function order_list(){ 
	  $user_type = $this->user_type;
	  if($user_type == 'doctor'){
	   $query = "SELECT *,(SELECT CONCAT(first_name,' ',last_name) FROM `users` WHERE `users`.user_key=`".$this->table_name."`.user_key) AS doctor_name FROM `".$this->table_name."` WHERE `doctor_id`=:user";
	  }else{
		$query = "SELECT *,(SELECT CONCAT(first_name,' ',last_name) FROM `users` WHERE `users`.id=`".$this->table_name."`.doctor_id) AS doctor_name FROM `".$this->table_name."` WHERE `user_key`=:user";  
	  }
      $stmt = $this->conn->prepare( $query );
	  $stmt->bindParam(':user', $this->user, PDO::PARAM_STR);
      $stmt->execute();
	  return $stmt;
    }
	function wallet_list(){ 
	  $query = "SELECT * FROM `".$this->table_name."` WHERE `username`=:user AND status='active' ORDER BY id DESC";
      $stmt = $this->conn->prepare( $query );
	  $stmt->bindParam(':user', $this->user, PDO::PARAM_STR);
      $stmt->execute();
	  return $stmt;
    }
	function payment_list(){ 
	  $query = "SELECT * FROM `".$this->table_name."` WHERE `username`=:user ORDER BY id ASC";
      $stmt = $this->conn->prepare( $query );
	  $stmt->bindParam(':user', $this->user, PDO::PARAM_STR);
      $stmt->execute();
	  return $stmt;
    }
	function card_list(){ 
	  $query = "SELECT *,(SELECT CONCAT(name,'#',logo) FROM banks WHERE `".$this->table_name."`.per=banks.per) AS bank_name FROM `".$this->table_name."` WHERE `user_key`=:user";
      $stmt = $this->conn->prepare( $query );
	  $stmt->bindParam(':user', $this->user, PDO::PARAM_STR);
      $stmt->execute();
	  return $stmt;
    }
	function get_extant_cash(){ 
	  $query = "SELECT extant FROM `".$this->table_name."` WHERE username=:user AND wallet_type='cash' AND status='active' ORDER BY id DESC LIMIT 0,1";
      $stmt = $this->conn->prepare( $query );
	  $stmt->bindParam(':user', $this->user, PDO::PARAM_STR);
      $stmt->execute();
	  return $stmt;
    }
	function new_order(){ 
	  $user=$this->username;
	  $title=$this->title;
	  $insure=$this->insure;
	  $price=$this->price;
	  $description=$this->description;
	  $deadline='گرفتن قیمت';
	  $CashIinstallments='نقد';
	  $price=str_replace(",","",$price);
	  $data=['user'=>$user,'title'=>$title,'insure'=>$insure,'price'=>$price,'description'=>$description,'deadline'=>$deadline,'CashIinstallments'=>$CashIinstallments];
	  $query = "INSERT INTO `".$this->table_name."`(title,description,insure,price,client_id,deadline,CashIinstallments) VALUES(:title,:description,:insure,:price,:user,:deadline,:CashIinstallments)";
      $stmt = $this->conn->prepare( $query );
      $stmt->execute($data);
	  return $stmt;
    }
	function save_reminder(){ 
	  $user='';$name='';$date='';$state='';$city='';$phone='';$comment='';
	  $user=$this->user;
	  $name=$this->fname;
	  $date=$this->date_reminder;
	  $state=$this->state;
	  $city=$this->city;
	  $phone=$this->phone;
	  $comment=$this->comment;
	  $data=['username'=>$user,'name'=>$name,'date'=>$date,'state'=>$state,'city'=>$city,'phone'=>$phone,'comment'=>$comment];
	  $query = "INSERT INTO `".$this->table_name."`(username,name,date,state,city,phone,comment) VALUES(:user,:name,:date,:state,:city,:phone,:comment)";
      $stmt = $this->conn->prepare( $query );
      $stmt->execute($data);
	  return $stmt;
    }
    function add_card(){
	  $ret=$this->chk_card($this->card);
	  if($ret==0){
	    $data=['user_key'=>$this->user,'card_number'=>$this->card,'card_name'=>$this->cardname,'per'=>$this->per,'type'=>'bank'];
	    $query = "INSERT INTO `".$this->table_name."`(user_key,card_number,card_name,type,per) VALUES(:user_key,:card_number,:card_name,:type,:per)";
        $stmt = $this->conn->prepare( $query );
        $stmt->execute($data);
		return 1;
	  }else{
		return 0;
	  }
    }
	function chk_card($card){ 
	  $ret=0;
	  $query = "SELECT * FROM `cards` WHERE `card_number`=:card";
      $stmt = $this->conn->prepare( $query );
	  $stmt->bindParam(':card', $card, PDO::PARAM_STR);
      $stmt->execute();
	  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
	   $ret=1;
	  }
	  return $ret;
    }
	function add_money(){
	  $data=[
	   'user'=>$this->user,
	   'for'=>$this->for,
	   'type'=>$this->type,
	   'wallet_type'=>$this->wallet_type,
	   'status'=>$this->status,
	   'extant'=>$this->extant,
	   'amount'=>$this->amount,
	   'factor'=>$this->factor,
	  ];
	  $query = "INSERT INTO `".$this->table_name."`(`username`,`for`,`amount`,`type`,`wallet_type`,`status`,`extant`,`factor`) VALUES(:user,:for,:amount,:type,:wallet_type,:status,:extant,:factor)";
      $stmt = $this->conn->prepare( $query );
      $stmt->execute($data);
	  return $stmt;
    }
	
}