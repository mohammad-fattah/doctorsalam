<?php

class Specialty_model extends Crud_model {

    private $table = null;

    function __construct() {
        $this->table = 'insurance';
        parent::__construct($this->table);
    }

    function get_details() {
        $staff = $this->db->dbprefix('insurance');
        $where = "";
        $sql = "SELECT $staff.*
        FROM $staff
        WHERE $staff.deleted=0 $where 
        ORDER BY $staff.sort";
        return $this->db->query($sql);
    }
	function get_policy() {
        $staff = $this->db->dbprefix('insurance');
        $where = "";
        $sql = "SELECT * FROM $staff";
        return $this->db->query($sql);
    }
	function insert($options = array()){
		$insurance = $this->db->dbprefix('insurance');
		$name = get_array_value($options, "name");
		$site_link = get_array_value($options, "site_link");
		$sort = get_array_value($options, "sort");
		$status = get_array_value($options, "status");
		$sql="insert into $insurance(name,site_link,sort,status) values('$name','$site_link','$sort','$status')";
		return $this->db->query($sql);
	}
}
