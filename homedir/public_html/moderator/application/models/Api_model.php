<?php

class Api_model extends Crud_model {

    private $table = null;

    function __construct() {
        $this->table = 'users';
        parent::__construct($this->table);
    }
    
	function save($melli_code) {
	 $query = "UPDATE `users` set send_to_psp='1' WHERE `melli_code`='$melli_code'";
     return $this->db->query($query);
	}
	
	function save_pans($pans) {
	 $query = "UPDATE `cards` set send_to_psp='1' WHERE `card_number`='$pans'";
     return $this->db->query($query);
	}

}
