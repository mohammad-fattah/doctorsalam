<?php

class Report_model extends Crud_model {

    private $table = null;

    function __construct() {
        $this->table = 'report';
        parent::__construct($this->table);
    }
	
	public function get_user_data($key = 0 , $id = 0){
		if($key && $id){
			$user = $this->db->get_where('users' , array($key => $id))->row();
			//$gender = $user->gender == "male" ? "آقا" : "خانم";
			$result = array(
				'name' => $user->first_name." ".$user->last_name,
				'phone' => $user->phone,
			);
		}
		return $result;
	}
	
	public function get_all_transfer(){
		return $this->db->get_where('wallet' , array('status'=>'active' , 'for'=>'انتقال'))->result();
	}
	public function get_all_cash($user_key){
		if($user_key){
		 return $this->db->get_where("orders" , array('deleted'=>'0' , 'CashIinstallments'=>'نقد','user_key'=>$user_key))->result();	
		}else{
		 return $this->db->get_where("orders" , array('deleted'=>'0' , 'CashIinstallments'=>'نقد'))->result();	
		}
	}
	public function merchant_cash($user_key){
		 return $this->db->get_where("orders" , array('deleted'=>'0' , 'CashIinstallments'=>'نقد','merchant_id'=>$user_key))->result();	
	}
	public function get_all_credit(){
		return $this->db->get_where("orders" , array('deleted'=>'0' , 'CashIinstallments'=>'اقساطی'))->result();
	}
	
	
	public function get_all_charge(){
		return $this->db->get_where('wallet' , array('status'=>'active' , 'for'=>'شارژ'))->result();
	}
	
	
	public function get_all_request(){
		return $this->db->get_where('wallet' , array('status'=>'active' , 'for'=>'درخواست اعتبار'))->result();
	}
	
}
