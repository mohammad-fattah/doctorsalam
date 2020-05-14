<?php

class Company_model extends Crud_model {

    private $table = null;

    function __construct() {
        $this->table = 'company';
        parent::__construct($this->table);
    }

    function get_details() {
        $company = $this->db->dbprefix('company');
        $where = "";
        $sql = "SELECT $company.*
        FROM $company
        WHERE $company.deleted=0 $where 
        ORDER BY $company.sort";
        return $this->db->query($sql);
    }
	function get_policy() {
        $company = $this->db->dbprefix('insurance');
        $where = "";
        $sql = "SELECT * FROM $company";
        return $this->db->query($sql);
    }
	function save($options = array()) {
		$where="";
		$k=0;
		$id = get_array_value($options, "id");
		$status = get_array_value($options, "status");
        if ($status) {
		 if($k==1){
            $where .= ",`active`='$status'";
		 }else{
		    $where .= " `active`='$status'";
            $k=1;			
		 }
        }
		$sort = get_array_value($options, "sort");
        if ($sort) {
            $where .= ",`sort`='$sort'";
        }
		$market = get_array_value($options, "market");
        if ($market) {
            $where .= ",`market`='$market'";
        }
		$rezayat = get_array_value($options, "rezayat");
        if ($rezayat) {
            $where .= ",`rezayat`='$rezayat'";
        }
		$emtiaz = get_array_value($options, "emtiaz");
        if ($emtiaz) {
            $where .= ",`emtiaz`='$emtiaz'";
        }
		$sayar = get_array_value($options, "sayar");
        if ($sayar) {
            $where .= ",`sayar`='$sayar'";
        }
		$pasokh = get_array_value($options, "pasokh");
        if ($pasokh) {
            $where .= ",`pasokh`='$pasokh'";
        }
		$tavangari = get_array_value($options, "tavangari");
        if ($tavangari) {
            $where .= ",`tavangari`='$tavangari'";
        }
		$khesarat = get_array_value($options, "khesarat");
        if ($khesarat) {
            $where .= ",`khesarat`='$khesarat'";
        }
		$sql="update company set ".$where." where id='$id'";
		return $this->db->query($sql);
	}
	function updated($options = array()) {
		$where="";
		$id = get_array_value($options, "id");
		$deleted = get_array_value($options, "deleted");
        /*if ($deleted) {
            $where .= " `deleted`='$deleted' ";
        }*/
		$sql="update company set `deleted`='$deleted' where id='$id'";
		return $this->db->query($sql);
	}

}
