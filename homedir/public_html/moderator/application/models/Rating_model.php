<?php

class Rating_model extends Crud_model {

    private $table = null;

    function __construct() {
        $this->table = 'rating';
        parent::__construct($this->table);
    }

    function get_details() {
        $sql = "SELECT * FROM `rating`";
        return $this->db->query($sql);
    }
	
	function save($options = array()) {
		$title = get_array_value($options, "title");
		$lowest_score = get_array_value($options, "lowest_score");
		$price_score = get_array_value($options, "price_score");
		$comment = get_array_value($options, "comment");
		$score_type = get_array_value($options, "score_type");
		$status = get_array_value($options, "status");
		$color = get_array_value($options, "color");
		
		$sql="insert into `rating`(title,status,lowest_score,price_score,comment,score_type,color) values('$title','$status','$lowest_score','$price_score','$comment','$score_type','$color')";
		return $this->db->query($sql);
	}

}
