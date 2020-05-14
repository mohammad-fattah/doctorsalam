<?php

class Insurance_api_model extends Crud_model {

    private $table = null;

    function __construct() {
        $this->table = 'users';
        parent::__construct($this->table);
    }
    
	function model($car) {
	 $query = "select * from `model` where `carModel`='$car'";
     return $this->db->query($query);
	}
	function thirdparty($model,$off,$poshesh) {
	 $query = "select * from `price_insurance` where `type`='$type' AND poshesh='$poshesh'";
     $rr=$this->db->query($query);
	 $newoff=100-($off*5);
     $tprice=0;
     $query = "select * from `price_insurance` where `type`='$type' AND poshesh='$poshesh'";
     //$sth=$this->db->query($query);
     foreach($rr as $r){
      extract($r);
      $tprice=floor(($price*$newoff)/100); 
      $aa=$this->company($tprice,$off);
     }
	 return $aa;
	 //return $this->db->query($query);
	}
	function company($price,$off) {
	 $tprice=$price-(($price*($off*10))/1000);
     $emtiaz='100';
	 $query = "select * from `company` where thirdparty='1' order by en_name='dana' DESC";
     return $this->db->query($query);
	}
}
