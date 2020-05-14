<?php
class Signin extends CI_Controller {
    function __construct() {
        parent::__construct();
    }

    function index() {
        if ($this->Users_model->login_user_id()) {
          redirect('dashboard');
        } else {
            $this->form_validation->set_rules('email', '', 'callback_authenticate');
            $this->form_validation->set_error_delimiters('<span>', '</span>');
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('signin/index');
				
            } else {
                redirect('dashboard');
            }
        }
    }
    function authenticate($email) {
        $user_type = $this->input->post("user_type");
        $password = $this->input->post("password");
        $redirect = $this->input->post("redirect");
        if (!$this->Users_model->authenticate($email, $password,$user_type)) {
            $this->form_validation->set_message('authenticate', lang("authentication_failed"));
            return false;
        }
		if ($redirect) {
         redirect($redirect);
        } else {
         return true;
        }  
    }
    function sign_out() {
        $this->Users_model->sign_out();
    }
}
