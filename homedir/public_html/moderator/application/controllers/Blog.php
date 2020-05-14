<?php
class Blog extends CI_Controller {
    function __construct() {
        parent::__construct();
    }
    function index() {
       $this->load->view('blog/index', $view_data);
    }  
}