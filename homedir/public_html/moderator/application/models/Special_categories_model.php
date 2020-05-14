<?php

class Special_categories_model extends Crud_model {

    private $table = null;

    function __construct() {
        $this->table = 'special';
        parent::__construct($this->table);
    }

    function get_details($club) {
		$where="";
		if ($club) {
            $where .= " WHERE club='$club'";
        }
        $sql = "SELECT * FROM `special` $where";
        return $this->db->query($sql);
    }
	function save($options = array()) {
		$title = get_array_value($options, "title");
		$start_date = get_array_value($options, "start_date");
		$end_date = get_array_value($options, "end_date");
		$lowest_score = get_array_value($options, "lowest_score");
		$comment = get_array_value($options, "comment");
		$prize = get_array_value($options, "prize");
		$status = get_array_value($options, "status");
		$club = get_array_value($options, "club");
		
		$sql="insert into `special`(title,start_date,end_date,status,lowest_score,comment,prize,club) values('$title','$start_date','$end_date','$status','$lowest_score','$comment','$prize','$club')";
		return $this->db->query($sql);
	}

}
