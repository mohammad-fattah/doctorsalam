<?php

class Point_categories_model extends Crud_model {

    private $table = null;

    function __construct() {
        $this->table = 'point';
        parent::__construct($this->table);
    }

    function get_details($options = array()) {
        $sql = "SELECT * FROM `point`";
        return $this->db->query($sql);
    }
	function save($options = array()) {
		$title = get_array_value($options, "title");
		$start_date = get_array_value($options, "start_date");
		$end_date = get_array_value($options, "end_date");
		$lowest_score = get_array_value($options, "lowest_score");
		$comment = get_array_value($options, "comment");
		$status = get_array_value($options, "status");
		
		$sql="insert into `point`(title,start_date,end_date,status,lowest_score,comment) values('$title','$start_date','$end_date','$status','$lowest_score','$comment')";
		return $this->db->query($sql);
	}
    function get_details_point_client($options = array()) {
        $sql = "SELECT * FROM `point`";
        return $this->db->query($sql);
    }
	function all_transaction($user_id) {
		$point = $this->db->dbprefix('client_point');
		$username=$user_id;
		$sql="SELECT * FROM $point WHERE username='$username' ORDER BY id DESC";
        return $this->db->query($sql);
    }
}
