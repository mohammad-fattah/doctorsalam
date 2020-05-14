<?php

class Parameters_model extends Crud_model {

    private $table = null;

    function __construct() {
        $this->table = 'insure_type';
        parent::__construct($this->table);
    }

    function get_vehicle_type($options = array()) {
	    $insure_type = $this->db->dbprefix('insure_type');
		$type = get_array_value($options, "type");
	    $result = $this->db->get_where($insure_type,array('insure'=>$type))->result();
        return $result;
    }
	
	function get_area($options = array()) {
	    $insure_type = $this->db->dbprefix('insure_area');
		$type = get_array_value($options, "type");
	    $result = $this->db->get_where($insure_type,array('insure_type'=>$type))->result();
        return $result;
    }
}
