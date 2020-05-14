<?php
class settings{
    private $conn;
    private $table_name ;
    public function __construct($db,$table){
      $this->conn = $db;
      $this->table_name = $table;
    }
	function settings(){
	 $query = "SELECT * FROM `".$this->table_name."` "; 
     $stmt = $this->conn->prepare( $query );
     $stmt->execute();
	 return $stmt;
    }
	function api_key(){ 
	  $query = "SELECT * FROM `".$this->table_name."` WHERE `setting_name`='api_kavenegar' LIMIT 0,1";
      $stmt = $this->conn->prepare( $query );
      $stmt->execute();
	  return $stmt;
    }
	function OffCode(){
      $code=$this->input;		
	  $query = "SELECT * FROM `".$this->table_name."` WHERE `code`=:code LIMIT 0,1";
      $stmt = $this->conn->prepare( $query );
	  $stmt->bindParam(':code', $code, PDO::PARAM_STR);
      $stmt->execute();
	  return $stmt;
    }
	function users(){
	 $user=$this->user;
	 $query = "SELECT * FROM `".$this->table_name."` WHERE `phone`=:user"; 
     $stmt = $this->conn->prepare( $query );
	 $stmt->bindParam(':user', $user, PDO::PARAM_STR);
     $stmt->execute();
	 return $stmt;
    }
	function doctor_address(){
	 $user=$this->user;
	 $query = "SELECT * FROM `".$this->table_name."` WHERE `user_key`=:user"; 
     $stmt = $this->conn->prepare( $query );
	 $stmt->bindParam(':user', $user, PDO::PARAM_STR);
     $stmt->execute();
	 return $stmt;
    }
	function doctor(){
	 $user=$this->user;
	 $query = "SELECT *,(SELECT `name` FROM `insurance` WHERE `insurance`.site_link = `".$this->table_name."`.specialty) AS specialty_name,(SELECT SUM(id) FROM `orders` WHERE `orders`.doctor_id = `".$this->table_name."`.id) AS Sum FROM `".$this->table_name."` WHERE `id`=:user"; 
     $stmt = $this->conn->prepare( $query );
	 $stmt->bindParam(':user', $user, PDO::PARAM_STR);
     $stmt->execute();
	 return $stmt;
    }
	function bank(){
	 $per=$this->per;
	 $query = "SELECT * FROM `".$this->table_name."` WHERE `per`=:per"; 
     $stmt = $this->conn->prepare( $query );
	 $stmt->bindParam(':per', $per, PDO::PARAM_STR);
     $stmt->execute();
	 return $stmt;
    }
	function Covers_body(){
	 $id=$this->id;
	 $deleted=$this->deleted;
	 $query = "SELECT * FROM `".$this->table_name."` WHERE `agent_insure_id`=:id AND deleted =:deleted ORDER BY insurance_cover"; 
     $stmt = $this->conn->prepare( $query );
	 $stmt->bindParam(':id', $id, PDO::PARAM_STR);
	 $stmt->bindParam(':deleted', $deleted, PDO::PARAM_STR);
     $stmt->execute();
	 return $stmt;
    }
	function City(){
	 $name='%'.$this->name.'%';
	 $query = "SELECT * FROM `".$this->table_name."` WHERE `name` LIKE '$name' ORDER BY `name`"; 
     $stmt = $this->conn->prepare( $query );
     $stmt->execute();
	 return $stmt;
    }
	function State(){
	 $query = "SELECT * FROM `".$this->table_name."` WHERE status='active'"; 
     $stmt = $this->conn->prepare( $query );
     $stmt->execute();
	 return $stmt;
    }
	function Covers_life(){
	 $id=$this->id;
	 $deleted=$this->deleted;
	 $query = "SELECT * FROM `".$this->table_name."` WHERE `agent_insure_id`=:id AND deleted =:deleted"; 
     $stmt = $this->conn->prepare( $query );
	 $stmt->bindParam(':id', $id, PDO::PARAM_STR);
	 $stmt->bindParam(':deleted', $deleted, PDO::PARAM_STR);
     $stmt->execute();
	 return $stmt;
    }
	function Offs_body(){
	 $id=$this->id;
	 $deleted=$this->deleted;
	 $query = "SELECT * FROM `".$this->table_name."` WHERE `agent_insure_id`=:id AND deleted =:deleted AND display='yes' ORDER BY insurance_off"; 
     $stmt = $this->conn->prepare( $query );
	 $stmt->bindParam(':id', $id, PDO::PARAM_STR);
	 $stmt->bindParam(':deleted', $deleted, PDO::PARAM_STR);
     $stmt->execute();
	 return $stmt;
    }
	function company(){
	 $query = "SELECT * FROM `".$this->table_name."` "; 
     $stmt = $this->conn->prepare( $query );
     $stmt->execute();
	 return $stmt;
    }
	function brokers(){
	 $query = "SELECT * FROM `".$this->table_name."` WHERE deleted='0'"; 
     $stmt = $this->conn->prepare( $query );
     $stmt->execute();
	 return $stmt;
    }
	function blog(){
	 $title=$this->title;
	 $query = "SELECT * FROM `".$this->table_name."` WHERE title=:title"; 
     $stmt = $this->conn->prepare( $query );
	 $stmt->bindParam(':title', $title, PDO::PARAM_STR);
     $stmt->execute();
	 return $stmt;
    }
	function contact(){
	 $id = $this->id;
	 $query = "SELECT * FROM `".$this->table_name."` WHERE id=:id"; 
     $stmt = $this->conn->prepare( $query );
	 $stmt->bindParam(':id', $id, PDO::PARAM_STR);
     $stmt->execute();
	 return $stmt;
    }    
	function insure(){
	 $query = "SELECT name as title,site_link as description,sort,pic,tab_message FROM `insurance` WHERE deleted='0' AND status='1' AND site_link!='' ORDER BY `sort`"; 
     $stmt = $this->conn->prepare( $query );
     $stmt->execute();
	 return $stmt;
    }
	function insurance_parameter(){
	 $where='';
	 $insurance = $this->insurance;
	 $main_sub = $this->main_sub;
	 if($main_sub){
	  $where .=" AND main_sub=:main_sub "; 
	 }
	 $parameter_type = $this->parameter_type;
	 if($parameter_type){
	  $where .=" AND parameter_type=:parameter_type "; 
	 }
	 
	 $query = "SELECT id AS idp,`size`,element_name AS elementName,`name`,`dependent`,`type`,`default`,main_sub FROM `".$this->table_name."` WHERE deleted='0' AND insurance=:insurance $where ORDER BY `priority` ASC"; 
     $stmt = $this->conn->prepare( $query );
	 $stmt->bindParam(':insurance', $insurance, PDO::PARAM_STR);
	 if($main_sub){
	   $stmt->bindParam(':main_sub', $main_sub, PDO::PARAM_STR);
	 }
	 if($parameter_type){
	   $stmt->bindParam(':parameter_type', $parameter_type, PDO::PARAM_STR);
	 }
     $stmt->execute();
	 return $stmt;
    }
	function insurance_parameter_val(){
	 $id = $this->id;
	 $query = "SELECT * FROM `".$this->table_name."` WHERE status='active' AND insurance_parameter=:insurance ORDER BY `orderby` ASC"; 
     $stmt = $this->conn->prepare( $query );
	 $stmt->bindParam(':insurance', $id, PDO::PARAM_STR);
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
	function insurance_parameter_dependent(){
	 $id = $this->id;
	 $idp = $this->idp;
	 //$type = $this->type;
	 $query = "SELECT * FROM `".$this->table_name."` WHERE status='active' AND insurance_parameter=:insurance AND `id_val`=:idp ORDER BY `orderby` ASC";
     $stmt = $this->conn->prepare( $query );
	 $stmt->bindParam(':insurance', $id, PDO::PARAM_STR);
	 $stmt->bindParam(':idp', $idp, PDO::PARAM_STR);
	 //$stmt->bindParam(':type', $type, PDO::PARAM_STR);
     $stmt->execute();
	 return $stmt;
    }
	function agent_insure(){
	 $uid = $this->uid;
	 $query = "SELECT * FROM `insurance` WHERE deleted='0' AND status='1' AND site_link=:uid"; 
     $stmt = $this->conn->prepare( $query );
	 $stmt->bindParam(':uid', $uid, PDO::PARAM_STR);
     $stmt->execute();
	 return $stmt;
    }
	function videos(){
	 $limit=$this->limit;
	 $query = "SELECT * FROM videos LIMIT 0,".$limit; 
     $stmt = $this->conn->prepare( $query );
     $stmt->execute();
	 return $stmt;
    }
	function detail_videos(){
	 $id=$this->id;
	 $query = "SELECT * FROM videos WHERE id=:id limit 0,1";
     $stmt = $this->conn->prepare( $query );
	 $stmt->bindParam(':id', $id, PDO::PARAM_STR);
     $stmt->execute();
	 return $stmt;
    }
	function left_videos(){
	 $query = "SELECT * FROM videos limit 0,6";
     $stmt = $this->conn->prepare( $query );
     $stmt->execute();
	 return $stmt;
    }
	function website_status(){ 
	  $status=$this->status;
	  $website_status=$this->website_status;
	  //$website_status="website_status";
	  $query = "UPDATE `".$this->table_name."` SET setting_value=:status WHERE setting_name=:website_status";
      $stmt = $this->conn->prepare( $query );
	  $stmt->bindParam(':status', $status, PDO::PARAM_STR);
	  $stmt->bindParam(':website_status', $website_status, PDO::PARAM_STR);
      $stmt->execute();
	  return $stmt;
    }
	function lottery(){
	  $query = "SELECT * FROM `".$this->table_name."` WHERE status='1' AND deleted='0' ORDER BY id desc LIMIT 0,1";
      $stmt = $this->conn->prepare( $query );
      $stmt->execute();
	  return $stmt;
    }
	function article(){
     $limit=$this->limit;
	 $query = "SELECT * FROM help_articles LIMIT 0,".$limit; 
     $stmt = $this->conn->prepare( $query );
     $stmt->execute();
	 return $stmt;
    }
    function detail_article(){
	 $id=$this->id;
	 $query = "SELECT * FROM help_articles WHERE id=:id limit 0,1";
     $stmt = $this->conn->prepare( $query );
	 $stmt->bindParam(':id', $id, PDO::PARAM_STR);
     $stmt->execute();
	 return $stmt;
    }
	function left_article(){
	 $query = "SELECT * FROM help_articles limit 0,6";
     $stmt = $this->conn->prepare( $query );
     $stmt->execute();
	 return $stmt;
    }
	function divi($a,$b) { 
     return (int) ($a / $b); 
    }
    function gregorian_to_jalalii ($g_y, $g_m, $g_d,$str) 
    { 
     $g_days_in_month = array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31); 
     $j_days_in_month = array(31, 31, 31, 31, 31, 31, 30, 30, 30, 30, 30, 29); 
     $gy = $g_y-1600; 
     $gm = $g_m-1; 
     $gd = $g_d-1;  
     $g_day_no = 365*$gy+$this->divi($gy+3,4)-$this->divi($gy+99,100)+$this->divi($gy+399,400);
     for ($i=0; $i < $gm; ++$i) 
      $g_day_no += $g_days_in_month[$i]; 
      if ($gm>1 && (($gy%4==0 && $gy%100!=0) || ($gy%400==0))) 
      $g_day_no++; 
      $g_day_no += $gd; 
      $j_day_no = $g_day_no-79; 
      $j_np = $this->divi($j_day_no, 12053); /* 12053 = 365*33 + 32/4 */ 
      $j_day_no = $j_day_no % 12053; 
      $jy = 979+33*$j_np+4*$this->divi($j_day_no,1461); /* 1461 = 365*4 + 4/4 */ 
      $j_day_no %= 1461; 
      if($j_day_no >= 366) { 
       $jy += $this->divi($j_day_no-1, 365); 
       $j_day_no = ($j_day_no-1)%365; 
      } 
      for($i = 0; $i < 11 && $j_day_no >= $j_days_in_month[$i]; ++$i) 
       $j_day_no -= $j_days_in_month[$i]; 
       $jm = $i+1; 
       $jd = $j_day_no+1; 
     return $jy.'/'.$jm.'/'.$jd ;
    }
}