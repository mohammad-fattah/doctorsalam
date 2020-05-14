<?php

class Sharing_model extends Crud_model {

    private $table = null;

    function __construct() {
        $this->table = 'sharing';
        parent::__construct($this->table);
    }

    function get_details($club) {
		$where="";
		if ($club) {
            $where .= " WHERE club='$club'";
        }
        $sql = "SELECT * FROM `sharing` $where";
        return $this->db->query($sql);
    }
	function dropdown() {
        $sql = "SELECT * FROM `rating` WHERE status='1' ";
        return $this->db->query($sql);
    }
	function save($options = array()) {
		$level = get_array_value($options, "level");
		$customer = get_array_value($options, "customer");
		$percent = get_array_value($options, "percent");
		$status = get_array_value($options, "status");
		$club = get_array_value($options, "club");
		
		$sql="insert into `sharing`(status,level,customer,percent,club) values('$status','$level','$customer','$percent','$club')";
		return $this->db->query($sql);
	}

}
