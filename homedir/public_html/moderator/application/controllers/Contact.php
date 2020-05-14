<?php
class Contact extends CI_Controller {
    function __construct() {
        parent::__construct();
    }
    function index() {
       $this->load->view('contact/index', $view_data);
    }  
}