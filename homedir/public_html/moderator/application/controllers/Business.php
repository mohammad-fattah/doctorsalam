<?php
class Business extends CI_Controller {
    function __construct() {
        parent::__construct();
    }
    function index() {
       $this->load->view('business/index', $view_data);
    }  
}