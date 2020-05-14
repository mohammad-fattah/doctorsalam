<?php

class Insurance_off_model extends Crud_model {

    private $table = null;

    function __construct() {
        $this->table = 'insurance_off';
        parent::__construct($this->table);
    }

}
