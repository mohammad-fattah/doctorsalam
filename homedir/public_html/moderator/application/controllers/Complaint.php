<?php
class Complaint extends CI_Controller {
    function __construct() {
        parent::__construct();
    }
    function index() {
       $this->load->view('complaint/index', $view_data);
    }  
}