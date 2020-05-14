<?php

class Submit_form extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Broker_model');
    }

    /* load agent list view */

    function index() {
    }
	
	function check_password_strength(){
	
		$pass_length = isset($_POST['password']) ? strlen($this->input->post('password')) : 0;
		
		if($pass_length>9){
			echo json_encode(array('status'=>'strong'));
		}else if($pass_length>5 && $pass_length<10){
			echo json_encode(array('status'=>'average'));
		}else if($pass_length<6 && $pass_length>0){
			echo json_encode(array('status'=>'weak'));
		}else{
			echo json_encode(array('status'=>''));
		}
	}

}

/* End of file agent.php */
/* Location: ./application/controllers/agent.php */