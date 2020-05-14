<?php

class Group_categories_model extends Crud_model {

    private $table = null;

    function __construct() {
        $this->table = 'group';
        parent::__construct($this->table);
    }

    function get_details($options = array()) {
        $sql = "SELECT * FROM `group` WHERE deleted='0'";
        return $this->db->query($sql);
    }
	function save($options = array()) {
		$title = get_array_value($options, "title");
		$url = get_array_value($options, "url");
		$category = get_array_value($options, "category");
		$description = get_array_value($options, "description");
		$status = get_array_value($options, "status");
		
		$sql="insert into `group`(title,url,category,description,status) values('$title','$url','$category','$description','$status')";
		return $this->db->query($sql);
	}
	function delete($id) {
	  $sql="UPDATE `group` SET deleted=1 WHERE id=$id";
	  return $this->db->query($sql);	
	}

}
