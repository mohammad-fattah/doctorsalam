<?php
class Reminders_model extends Crud_model {
    private $table = null;
    function __construct() {
        $this->table = 'reminder';
        parent::__construct($this->table);
    }
    function get_details($options = array()) {
        $insurance_categories_table = $this->db->dbprefix('reminder');
        $sql = "SELECT * FROM $insurance_categories_table";
        return $this->db->query($sql);
    }
	function fetch_data()
    {   
        $this->db->order_by("id", "DESC");
        $query = $this->db->get("reminder");
        return $query->result();
    }
}
