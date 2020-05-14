<?php

class Off_categories_model extends Crud_model {

    private $table = null;

    function __construct() {
        $this->table = 'company';
        parent::__construct($this->table);
    }

    function get_details($options = array()) {
        $sql = "SELECT * FROM `off`";
        return $this->db->query($sql);
    }

}
