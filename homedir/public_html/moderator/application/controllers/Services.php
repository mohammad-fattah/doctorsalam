<?php
class Services extends CI_Controller {
    
    function __construct() {
        
        parent::__construct();
        
        $this->load->model("Service_model");
		$this->load->model("Category_categories_model");
		$this->load->model("Product_model");
		//$this->load->model("Merchants_model");
    }
    
    function index() {
       $this->load->view('services/index');
    }
    
    function show_store_products($store_id){
        if($store_id){
            $view_data['products'] = $this->Service_model->get_compact_products_data($store_id);
            $this->load->view('services/products', $view_data);
        }else{
            show_404();
        }
    }
    
    function product_details($product_id){
        if($product_id){
            $view_data['product'] = $this->Service_model->get_complete_products_data($product_id);
            $this->load->view('services/product_details', $view_data);
        }else{
            show_404();
        }
    }
	function merchant($group){
	   $producter = $this->Service_model->get_services_details($group)->result();
	   $name = $this->Service_model->get_services_category($group)->result();
       $view_data['product'] = $producter;
       $view_data['name'] = $name;
       $this->load->view('services/merchant', $view_data);
    }
	function detail($id){
	   $producter = $this->Service_model->get_merchant_details($id)->result();
	   foreach ($producter as $p) {
		   $group=$p->psp_category;
	   }
	   $other = $this->Service_model->get_services_details($group,4)->result();
       $view_data['product'] = $producter;
	   $view_data['other'] = $other;
       $this->load->view('services/detail', $view_data);
    }
    
}