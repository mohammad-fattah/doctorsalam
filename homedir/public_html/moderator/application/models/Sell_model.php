<?php

class Sell_model extends Crud_model {

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
	    $sell_table = $this->db->dbprefix("orders");
	    $users = $this->db->dbprefix('users');
		$id=$user_id;
		$where = "";
		if($id){
		  $where .= " WHERE client_id=$id";
		}
        $sql = "SELECT *,(SELECT job_title FROM $users WHERE $users.id=$sell_table.merchant_id) as merchant FROM $sell_table $where";
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
	function get_client_cash($user_id) {
	    
		/*if($id){
		  $where .= " AND user_key='$id'";
		}*/
        $sql = "SELECT *,(SELECT job_title FROM users WHERE users.id=projects.merchant_id) as merchant FROM projects WHERE user_key='$user_id' and deleted = 0";
        //$sql = "SELECT * FROM projects WHERE user_key='$user_id'";
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

}
