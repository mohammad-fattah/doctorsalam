<?php

class Psp_model extends Crud_model {

    private $table = null;

    function __construct() {
        $this->table = 'psp';
        parent::__construct($this->table);
    }

    function get_details($options = array()) {
        
        $psp_table = $this->db->dbprefix('psp');
        $result = array();
        if($options){
            $result = $this->db->get_where($psp_table,$options)->result();
        }else{
            $result = $this->db->get($psp_table)->result();
        }
        
        return $result;
    }
    
    function save($data , $id){
        
        $psp_table = $this->db->dbprefix('psp');
        
        if($id){
            
            $this->db->where(array('id'=>$id));
            $result =  $this->db->update($psp_table , $data);
        
            
        }else{
           
            $result = $this->db->insert($psp_table , $data);    
        
        }
        
        if($result){
            return $this->db->get_where($psp_table , $data)->row()->id;
        }else{
            return false;    
        }
        
        
        
    }
    
    function get_one($id){
        $psp_table = $this->db->dbprefix('psp');
        return $this->db->get_where($psp_table , array('id'=>$id))->row();
    }

}
