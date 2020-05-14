<?php

class Category_categories_model extends Crud_model {

    private $table = null;

    function __construct() {
        $this->table = 'category';
        parent::__construct($this->table);
    }

    function get_details($options = array()) {
        $sql = "SELECT * FROM `category` WHERE deleted='0'";
        return $this->db->query($sql);
    }
	function save($options = array()) {
		$title = get_array_value($options, "title");
		$url = get_array_value($options, "url");
		$description = get_array_value($options, "description");
		$status = get_array_value($options, "status");
		
		$sql="insert into `category`(title,url,description,status) values('$title','$url','$description','$status')";
		return $this->db->query($sql);
	}
	function delete($id) {
	  $sql="UPDATE `category` SET deleted=1 WHERE id=$id";
	  return $this->db->query($sql);	
	}

}
