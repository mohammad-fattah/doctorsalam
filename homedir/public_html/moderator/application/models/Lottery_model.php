<?php

class Lottery_model extends Crud_model {

    private $table = null;

    function __construct() {
        $this->table = 'lottery';
        parent::__construct($this->table);
    }

    function get_details($options = array()) {
        $sql = "SELECT * FROM `lottery`";
        return $this->db->query($sql);
    }
	function save($options = array()) {
		$title = get_array_value($options, "title");
		$start_date = get_array_value($options, "start_date");
		$end_date = get_array_value($options, "end_date");
		$lottery_date = get_array_value($options, "lottery_date");
		$lowest_score = get_array_value($options, "lowest_score");
		$comment = get_array_value($options, "comment");
		$prize = get_array_value($options, "prize");
		$status = get_array_value($options, "status");
		
		$sql="insert into `lottery`(title,start_date,end_date,lottery_date,status,lowest_score,comment,prize) values('$title','$start_date','$end_date','$lottery_date','$status','$lowest_score','$comment','$prize')";
		return $this->db->query($sql);
	}

}
