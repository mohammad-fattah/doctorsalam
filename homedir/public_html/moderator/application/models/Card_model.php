<?php

class Card_model extends Crud_model {

    private $table = null;

    function __construct() {
        $this->table = 'cards';
        parent::__construct($this->table);
    }

    function get_details($options = array()) {
		$cards_table = $this->db->dbprefix('cards');
		$user_key = $options['user_key'];
        $sql = "SELECT * FROM $cards_table WHERE user_key= '$user_key' AND deleted='0'";
        return $this->db->query($sql);
    }
	function all_transaction($user_id) {
		$cards = $this->db->dbprefix('cards');
		$username=$user_id;
		$sql="SELECT * FROM $cards WHERE user_key='$username' AND deleted='0' ORDER BY id DESC";
        return $this->db->query($sql);
    }
	function cash($user_id) {
	    $sell_table = $this->db->dbprefix("orders");
	    $users = $this->db->dbprefix('users');
		$id=$user_id;
		$where = "";
		if($id){
		  $where .= " AND client_id=$id";
		}
        $sql = "SELECT *,(SELECT job_title FROM $users WHERE $users.id=$sell_table.merchant_id) as merchant FROM $sell_table WHERE CashIinstallments='نقد' $where";
        return $this->db->query($sql);
    }
	function get_extant($user_id) {
	    $cards = $this->db->dbprefix('cards');
		$username=$user_id;
        $sql = "SELECT extant FROM $cards WHERE username='$username' AND status='active' AND cards_type='cash' ORDER BY id DESC LIMIT 0,1";
        return $this->db->query($sql);
    }
	function get_extant_cash($user_id) {
	    $cards = $this->db->dbprefix('cards');
		$username=$user_id;
        $sql = "SELECT extant FROM $cards WHERE username='$username' AND cards_type='cash' AND status='active' ORDER BY id DESC LIMIT 0,1";
        return $this->db->query($sql);
    }
	function get_extant_credit_cash($user_id) {
	    $cards = $this->db->dbprefix('cards');
		$username=$user_id;
        $sql = "SELECT extant FROM $cards WHERE username='$username' AND cards_type='credit' AND status='active' ORDER BY id DESC LIMIT 0,1";
        return $this->db->query($sql);
    }
	function all_cards($user_id) {
	    $cards = $this->db->dbprefix('cards');
		$username=$user_id;
        $sql = "SELECT * FROM $cards WHERE username='$username' ORDER BY id DESC";
        return $this->db->query($sql);
    }
	function credit($user_id) {
	    $sell_table = $this->db->dbprefix("orders");
	    $users = $this->db->dbprefix('users');
		$id=$user_id;
		$where = "";
		if($id){
		  $where .= " AND client_id=$id";
		}
        $sql = "SELECT *,(SELECT job_title FROM $users WHERE $users.id=$sell_table.merchant_id) as merchant FROM $sell_table WHERE CashIinstallments='اقساط' $where";
        return $this->db->query($sql);
    }
	function current_clock_in_record($user_id) {
        $attendnace_table = $this->db->dbprefix('attendance');
        $sql = "SELECT $attendnace_table.*
        FROM $attendnace_table
        WHERE $attendnace_table.deleted=0 AND $attendnace_table.user_id=$user_id AND $attendnace_table.status='incomplete'";
        $result = $this->db->query($sql);
        if ($result->num_rows()) {
            return $result->row();
        } else {
            return false;
        }
    }
	function deleted($id) {
        $cards = $this->db->dbprefix('cards');
        $sql = "UPDATE $cards SET deleted='1' WHERE id='$id'";
        $result = $this->db->query($sql);
		return true;
        /*if ($result->num_rows()) {
            return $result->row();
        } else {
            return false;
        }*/
    }
	function count_dashboard_client($id) {
	    $sell_table = $this->db->dbprefix("orders");
	    $terminals_table = $this->db->dbprefix('terminals');
		//$info = new stdClass();
        $sql = "SELECT $sell_table.price,$terminals_table.off_bank,$terminals_table.off_no_bank,porsant from $sell_table left join $terminals_table on $sell_table.terminal=$terminals_table.id ";
        //$info->cards=$this->db->query($sql)->result();
		
		$result = $this->db->query($sql);
        if ($result->num_rows()) {
            return $result->num_rows();
        } else {
            return false;
        }
		
		//return $info;
    }
	function save($options = array()) {
		$card_table = $this->db->dbprefix('cards');
		$card_user_name = get_array_value($options, "card_user_name");
		$card_name = get_array_value($options, "card_name");
		$card_number = get_array_value($options, "card_number");
		$status = get_array_value($options, "status");
		$user_key = get_array_value($options, "user_key");
		$sql="insert into $card_table(card_user_name,card_name,card_number,status,user_key) values('$card_user_name','$card_name','$card_number','$status','$user_key')";
		return $this->db->query($sql);
	}
	function add_new_charge($options = array()) {
		$sell_table = $this->db->dbprefix('cards');
		$username = get_array_value($options, "username");
		$date = get_array_value($options, "date");
		$for = get_array_value($options, "for");
		$amount = get_array_value($options, "amount");
		$type = get_array_value($options, "type");
		$status = get_array_value($options, "status");
		$m="SELECT extant FROM cards WHERE username='$username' AND cards_type='cash' ORDER BY id DESC LIMIT 0,1";
		$extant=$this->db->query($m)->result();
		$count_extant=0;
		foreach ($extant as $team_member) {
          $count_extant=$team_member->extant;
        }
		$count_extant=$count_extant+$amount;
		$sql="insert into $sell_table(username,date,`for`,amount,`type`,status,extant) values('$username','$date','$for','$amount','$type','$status','$count_extant')";
		return $this->db->query($sql);
	}
	function add_new_credit_charge($options = array()) {
		$sell_table = $this->db->dbprefix('cards');
		$username = get_array_value($options, "username");
		$date = get_array_value($options, "date");
		$for = get_array_value($options, "for");
		$amount = get_array_value($options, "amount");
		$type = get_array_value($options, "type");
		$status = get_array_value($options, "status");
		$cards_type = get_array_value($options, "cards_type");
		$m="SELECT extant FROM cards WHERE username='$username' AND cards_type='credit' ORDER BY id DESC LIMIT 0,1";
		$extant=$this->db->query($m)->result();
		$count_extant=0;
		foreach ($extant as $team_member) {
          $count_extant=$team_member->extant;
        }
		$count_extant=$count_extant+$amount;
		$sql="insert into $sell_table(username,date,`for`,amount,`type`,status,extant,cards_type) values('$username','$date','$for','$amount','$type','$status','$count_extant','$cards_type')";
		return $this->db->query($sql);
	}
	function clearing_new_charge($options = array()) {
		$sell_table = $this->db->dbprefix('cards');
		$username = get_array_value($options, "username");
		$date = get_array_value($options, "date");
		$for = get_array_value($options, "for");
		$amount = get_array_value($options, "amount");
		$type = get_array_value($options, "type");
		$status = get_array_value($options, "status");
		$m="SELECT extant FROM cards WHERE username='$username' ORDER BY id DESC LIMIT 0,1";
		$extant=$this->db->query($m)->result();
		$count_extant=0;
		foreach ($extant as $team_member) {
          $count_extant=$team_member->extant;
        }
		$count_extant=$count_extant-$amount;
		$sql="insert into $sell_table(username,date,`for`,amount,`type`,status,extant) values('$username','$date','$for','$amount','$type','$status','$count_extant')";
		return $this->db->query($sql);
	}

}
