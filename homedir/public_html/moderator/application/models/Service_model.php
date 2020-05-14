<?php

class Service_model extends Crud_model {


    private $table = null;

    function  __construct() {

        $this->table = 'product';

        parent::__construct($this->table);
        

    }
    
    function get_compact_products_data($store_id){
        
        $result = array();
        
        if($store_id){
        
        
            $this->db->where('store_key' , $store_id);
            $products_info = $this->db->get('product')->result();
            
            $counter = 0;
            
            foreach($products_info as $product_info){
                
                $result[$counter]['product_info']['id'] = $product_info->id;
                $result[$counter]['product_info']['name'] = $product_info->name;
                $result[$counter]['product_info']['price'] = $product_info->price;
                $result[$counter]['product_info']['brand'] = $product_info->brand;
                $result[$counter]['product_info']['likes'] = $product_info->likes;
                //$result[$counter]['product_info']['discount'] = $this->Product_categories_model->get_product_current_discount($product_info->id);
                
                
                $this->db->where('product_key' , $product_info->id);
                $product_pics = $this->db->get('product_pics',1)->row();
                $result[$counter]['product_pics']['pic_path'] = $product_pics->pic_path;
                
                $counter++;
            }
            
        }   
        return $result;
         
    }
    
    function get_complete_products_data($product_id){
        
        $result = array();
        
        if($product_id){
        
        
            $this->db->where('id' , $product_id);
            $product_info = $this->db->get('product')->row();
            
                $result['product_info']['id'] = $product_info->id;
                $result['product_info']['name'] = $product_info->name;
                $result['product_info']['price'] = $product_info->price;
                $result['product_info']['brand'] = $product_info->brand;
                $result['product_info']['likes'] = $product_info->likes;
                $result['product_info']['pic'] = $product_info->pic;
                //$result['product_info']['discount'] = $this->Product_categories_model->get_product_current_discount($product_info->id);
                
                
                $this->db->where('product_key' , $product_info->id);
                $product_pics = $this->db->get('product_pics')->result();
                
                $pic_counter = 0;
                
                foreach($product_pics as $product_pic){
                    
                    $result['product_pics'][$pic_counter]['pic_path'] = $product_pic->pic_path;
                    $pic_counter++;
                    
                }
                
                
                $this->db->where('product_key' , $product_info->id);
                $product_comments = $this->db->get('product_seller_comments')->row();
                $result['product_comments']['summerized'] = $product_comments->summerized;
                $result['product_comments']['complete'] = $product_comments->complete;
                $result['product_comments']['specifics'] = json_decode($product_comments->specifics);
                
             
            
        }   
        return $result;
         
    }
	function get_services_details($group,$limit) {
	  if($limit){
		  $limit=' limit 0,'.$limit;
	  }else{
		  $limit='';
	  }
	  $sql = "SELECT *,(SELECT off_bank FROM terminals WHERE terminals.merchant=users.id ORDER BY off_bank limit 0,1) AS percent FROM `users` WHERE user_type='merchant' AND psp_category='$group' $limit";
      return $this->db->query($sql);
	}
	function get_merchant_details($id) {
	  $sql = "SELECT *,(SELECT off_bank FROM terminals WHERE terminals.merchant='$id' ORDER BY off_bank limit 0,1) AS percent FROM `users` WHERE user_type='merchant' AND id='$id'";
      return $this->db->query($sql);
	}
	function get_services_category($group) {
	  $sql = "SELECT * FROM `merchant_category` WHERE id='$group' LIMIT 0,1";
      return $this->db->query($sql);
	}
    

}