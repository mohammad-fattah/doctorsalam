<?php

class Insurance_cover_model extends Crud_model {

    private $table = null;

    function __construct() {
        $this->table = 'insurance_cover';
        parent::__construct($this->table);
    }

}
