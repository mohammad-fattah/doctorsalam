<?php

class Terminals_categories_model extends Crud_model {

    private $table = null;

    function __construct() {
        $this->table = 'terminals';
        parent::__construct($this->table);
    }
    
    function get_one($id) {
        $sql = "SELECT * FROM `terminals` WHERE `id`='$id'";
        return $this->db->query($sql);
    }
    
    function get_details($options = array()) {
		$merchant_id = get_array_value($options, "merchant");
        $sql = "SELECT * FROM `terminals` WHERE `merchant`='$merchant_id'";
        return $this->db->query($sql);
    }
    
	function save($options = array() , $id) {
		
		$title = get_array_value($options, "title");
		$terminal_id = get_array_value($options, "terminal_id");
		$state = get_array_value($options, "state");
		$off_bank = get_array_value($options, "off_bank");
		$off_no_bank = get_array_value($options, "off_no_bank");
		$city = get_array_value($options, "city");
		$porsant = get_array_value($options, "porsant");
		$status = get_array_value($options, "status");
		$address = get_array_value($options, "address");
		$psp = get_array_value($options, "psp");
		$merchant = get_array_value($options, "merchant");
		//$id = get_array_value($options, "id");
		$type = get_array_value($options, "type");
		
		$exists = $this->db->get_where('terminals' , array('terminal_id'=>$terminal_id))->result();
		
		if($id==0){
			//$sql="insert into `terminals`(title,status,terminal_id,state,city,address,psp,merchant,off_bank,off_no_bank,porsant) values('$title','$status','$terminal_id','$state','$city','$address','$psp','$id','$off_bank','$off_no_bank','$porsant')";
			$result = $this->db->insert('terminals' , $options) ? "inserted" : "not inserted";
		}else if($exists){
			//$sql="update `terminals`  set title = '$title',status = '$status',state = '$state',city = '$city',address = '$address',psp = '$psp',merchant = '$id',off_bank = '$off_babk',off_no_bank = '$off_no_bank',porsant = '$porsant' where id = '$terminal_id'";
			unset($options['terminal_id']);
			$this->db->where(array('terminal_id'=>$terminal_id));
			$result = $this->db->update('terminals' , $options) ? "updated" : "not updated";
		}
		
		return $this->db->get_where('terminals' , array('terminal_id'=>$terminal_id))->row();
	}

}
