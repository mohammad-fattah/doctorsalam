<?php

class Userpoint_categories_model extends Crud_model {

    private $table = null;

    function __construct() {
        $this->table = 'userpoint';
        parent::__construct($this->table);
    }

    function get_details($options = array()) {
        //$sql = "SELECT *,(select CONCAT(first_name,' ',last_name) from clients where `clients`.`phone`=`userpoint`.`username`) FROM `userpoint`";
		$sql = "SELECT * FROM `userpoint`";
        return $this->db->query($sql);
    }
	function save($options = array()) {
		$title = get_array_value($options, "title");
		$date = get_array_value($options, "date");
		$username = get_array_value($options, "username");
		$score = get_array_value($options, "score");
		$comment = get_array_value($options, "comment");
		$status = get_array_value($options, "status");
		
		$sql="insert into `userpoint`(title,date,username,status,score,comment) values('$title','$date','$username','$status','$score','$comment')";
		return $this->db->query($sql);
	}

}
