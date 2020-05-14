<?php

class Merchant_category_model extends Crud_model {

    private $table = null;

    function __construct() {
        $this->table = 'merchant_category';
        parent::__construct($this->table);
    }

    function get_details($options = array()) {
        
        $mc_table = $this->db->dbprefix('merchant_category');
        $result = array();
        if($options){
            $result = $this->db->get_where($mc_table,$options)->result();
        }else{
            $result = $this->db->get($mc_table)->result();
        }
        
        return $result;
    }
    
    function save($data , $id){
        
        $mc_table = $this->db->dbprefix('merchant_category');
        
        if($id){
            
            $this->db->where(array('id'=>$id));
            $result =  $this->db->update($mc_table , $data);
        
            
        }else{
           
            $result = $this->db->insert($mc_table , $data);    
        
        }
        
        if($result){
            return $this->db->get_where($mc_table , $data)->row()->id;
        }else{
            return false;    
        }
        
        
        
    }
    
    function delete($id){
        $mc_table = $this->db->dbprefix('merchant_category');
        $this->db->where('id',$id);
        return $this->db->update($mc_table , array('deleted'=>1));
    }
    
    function get_one($id){
        $mc_table = $this->db->dbprefix('merchant_category');
        return $this->db->get_where($mc_table , array('id'=>$id))->row();
    }

}
