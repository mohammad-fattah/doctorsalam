<?php

class Discount_model extends Crud_model {

    private $table = null;

    function __construct() {
        $this->table = 'cards';
        parent::__construct($this->table);
    }

    function get_details($options = array()) {
		$cards_table = $this->db->dbprefix('cards');
		$user_key = $options['user_key'];
        $sql = "SELECT * FROM $cards_table WHERE user_key= '$user_key'";
        return $this->db->query($sql);
    }
	function get_client($options = array()) {
		$cards_table = $this->db->dbprefix('cards');
        $sql = "SELECT * FROM $cards_table WHERE `type`='bank'";
        return $this->db->query($sql);
    }
	
	function get_client_bank($user_id) {
		$cards_table = $this->db->dbprefix('cards');
		$id=$user_id;
		$where = "";
		if($id){
		  $where .= " AND user_key=$id";
		}
        $sql = "SELECT * FROM $cards_table WHERE `type`='bank' $where";
        return $this->db->query($sql);
    }
	function get_credit_bank($user_id) {
		$cards_table = $this->db->dbprefix('cards');
		$id=$user_id;
		$where = "";
		if($id){
		  $where .= " AND user_key=$id";
		}
        $sql = "SELECT * FROM $cards_table WHERE `type`='credit' $where";
        return $this->db->query($sql);
    }
	function save($options = array()) {
		$cards_table = $this->db->dbprefix('cards');
		$card_name = get_array_value($options, "card_name");
		$card_user_name = get_array_value($options, "card_user_name");
		$card_number = get_array_value($options, "card_number");
		$type="bank";
		$id = get_array_value($options, "id");
		$user_key = get_array_value($options, "user_key");
		$status = get_array_value($options, "status");
		
		if($id){
		    $sql="update $cards_table  SET card_name = '$card_name',card_user_name = '$card_user_name',card_number = '$card_number',status = '$status',`type` = '$type' WHERE id = '$id'";
		}else{
		    $sql="insert into $cards_table(card_name,card_user_name,card_number,status,`type`,user_key) values('$card_name','$card_user_name','$card_number','$status','$type','$user_key')";
		}
		
		return $this->db->query($sql);
	}

}

