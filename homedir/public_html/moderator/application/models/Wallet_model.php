<?php

class Wallet_model extends Crud_model {

    private $table = null;

    function __construct() {
        $this->table = "orders";
        parent::__construct($this->table);
    }

    function get_details($options = array()) {
	    $sell_table = $this->db->dbprefix("orders");
	    $users = $this->db->dbprefix('users');
        $sql = "SELECT *,(SELECT job_title FROM $users WHERE $users.id=$sell_table.merchant_id) as merchant FROM $sell_table ";
        return $this->db->query($sql);
    }
	function all_transaction($user_id) {
		$wallet = $this->db->dbprefix('wallet');
		$username=$user_id;
		$sql="SELECT * FROM $wallet WHERE username='$username' ORDER BY id DESC";
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
	    $wallet = $this->db->dbprefix('wallet');
		$username=$user_id;
        $sql = "SELECT extant FROM $wallet WHERE username='$username' AND status='active' AND wallet_type='cash' ORDER BY id DESC LIMIT 0,1";
        return $this->db->query($sql);
    }
	function get_extant_cash($user_id) {
	    $wallet = $this->db->dbprefix('wallet');
		$username=$user_id;
        $sql = "SELECT extant FROM $wallet WHERE username='$username' AND wallet_type='cash' AND status='active' ORDER BY id DESC LIMIT 0,1";
        return $this->db->query($sql);
    }
	function get_extant_credit_cash($user_id) {
	    $wallet = $this->db->dbprefix('wallet');
		$username=$user_id;
        $sql = "SELECT extant FROM $wallet WHERE username='$username' AND wallet_type='credit' AND status='active' ORDER BY id DESC LIMIT 0,1";
        return $this->db->query($sql);
    }
	function all_wallet($user_id) {
	    $wallet = $this->db->dbprefix('wallet');
		$username=$user_id;
        $sql = "SELECT * FROM $wallet WHERE username='$username' ORDER BY id DESC";
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
	function count_dashboard_client($id) {
	    $sell_table = $this->db->dbprefix("orders");
	    $terminals_table = $this->db->dbprefix('terminals');
		//$info = new stdClass();
        $sql = "SELECT $sell_table.price,$terminals_table.off_bank,$terminals_table.off_no_bank,porsant from $sell_table left join $terminals_table on $sell_table.terminal=$terminals_table.id ";
        //$info->wallet=$this->db->query($sql)->result();
		
		$result = $this->db->query($sql);
        if ($result->num_rows()) {
            return $result->num_rows();
        } else {
            return false;
        }
		
		//return $info;
    }
	function save($options = array()) {
		$sell_table = $this->db->dbprefix("orders");
		$title = get_array_value($options, "title");
		$start_date = get_array_value($options, "start_date");
		$end_date = get_array_value($options, "end_date");
		$projects_date = get_array_value($options, "projects_date");
		$lowest_score = get_array_value($options, "lowest_score");
		$comment = get_array_value($options, "comment");
		$prize = get_array_value($options, "prize");
		$status = get_array_value($options, "status");
		
		$sql="insert into $sell_table(title,start_date,end_date,projects_date,status,lowest_score,comment,prize) values('$title','$start_date','$end_date','$projects_date','$status','$lowest_score','$comment','$prize')";
		return $this->db->query($sql);
	}
	function add_new_charge($options = array()) {
		$sell_table = $this->db->dbprefix('wallet');
		$username = get_array_value($options, "username");
		$date = get_array_value($options, "date");
		$for = get_array_value($options, "for");
		$amount = get_array_value($options, "amount");
		$type = get_array_value($options, "type");
		$status = get_array_value($options, "status");
		$factor = get_array_value($options, "factor");
		$m="SELECT extant FROM wallet WHERE username='$username' AND wallet_type='cash' AND status='active' ORDER BY id DESC LIMIT 0,1";
		$extant=$this->db->query($m)->result();
		$count_extant=0;
		foreach ($extant as $team_member) {
          $count_extant=$team_member->extant;
        }
		$count_extant=$count_extant;
		//$count_extant=$count_extant+$amount;
		$sql="insert into $sell_table(username,date,`for`,amount,`type`,status,extant,factor) values('$username','$date','$for','$amount','$type','$status','$count_extant','$factor')";
		return $this->db->query($sql);
	}
	function result_transaction($options = array()) {
		$sell_table = $this->db->dbprefix('wallet');
		$username = get_array_value($options, "username");
		$status = get_array_value($options, "status");
		$factor = get_array_value($options, "factor");
		$price = get_array_value($options, "price");
		$msg = get_array_value($options, "msg");
		if($status=='active'){
		 $m="SELECT extant FROM wallet WHERE username='$username' AND wallet_type='cash' AND status='active' ORDER BY id DESC LIMIT 0,1";
		 $extant=$this->db->query($m)->result();
		 $count_extant=0;
		 foreach ($extant as $team_member) {
          $count_extant=$team_member->extant;
         }
		 $count_extant=$count_extant+$price;
		}
		$sql="UPDATE $sell_table SET status='$status',extant='$count_extant',msg='$msg' WHERE factor='$factor'";
		return $this->db->query($sql);
	}
	function add_new_credit_charge($options = array()) {
		$sell_table = $this->db->dbprefix('wallet');
		$username = get_array_value($options, "username");
		$date = get_array_value($options, "date");
		$for = get_array_value($options, "for");
		$amount = get_array_value($options, "amount");
		$type = get_array_value($options, "type");
		$status = get_array_value($options, "status");
		$wallet_type = get_array_value($options, "wallet_type");
		$m="SELECT extant FROM wallet WHERE username='$username' AND wallet_type='credit' ORDER BY id DESC LIMIT 0,1";
		$extant=$this->db->query($m)->result();
		$count_extant=0;
		foreach ($extant as $team_member) {
          $count_extant=$team_member->extant;
        }
		$count_extant=$count_extant+$amount;
		$sql="insert into $sell_table(username,date,`for`,amount,`type`,status,extant,wallet_type) values('$username','$date','$for','$amount','$type','$status','$count_extant','$wallet_type')";
		return $this->db->query($sql);
	}
	function clearing_new_charge($options = array()) {
		$sell_table = $this->db->dbprefix('wallet');
		$username = get_array_value($options, "username");
		$date = get_array_value($options, "date");
		$for = get_array_value($options, "for");
		$amount = get_array_value($options, "amount");
		$type = get_array_value($options, "type");
		$status = get_array_value($options, "status");
		$m="SELECT extant FROM wallet WHERE username='$username' ORDER BY id DESC LIMIT 0,1";
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
