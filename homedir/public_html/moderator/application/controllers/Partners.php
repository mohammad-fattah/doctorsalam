<?php
class Partners extends CI_Controller {
    function __construct() {
        parent::__construct();
    }
    function index() {
       $this->load->view('partners/index', $view_data);
    }  
}