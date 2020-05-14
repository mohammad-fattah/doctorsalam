<?php

class Signup extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('email');
		//public $tokenm='';
    }

    function index() {
        //by default only client can signup directly
        //if client login/signup is disabled then show 404 page
        if (get_setting("disable_client_signup")) {
            show_404();
        }

        $view_data["type"] = "client";
        $view_data["signup_type"] = "new_client";
        $view_data["signup_message"] = lang("create_an_account_as_a_new_client");
        $this->load->view("signup/index", $view_data);
    }
	function password() {
        //by default only client can signup directly
        //if client login/signup is disabled then show 404 page
        if (get_setting("disable_client_signup")) {
            show_404();
        }

        $view_data["type"] = "client";
        $view_data["signup_type"] = "new_client";
        $view_data["signup_message"] = lang("create_an_account_as_a_new_client");
        $this->load->view("signup/password", $view_data);
    }
	function code() {
        //by default only client can signup directly
        //if client login/signup is disabled then show 404 page
        if (get_setting("disable_client_signup")) {
            show_404();
        }

        $view_data["type"] = "client";
        $view_data["signup_type"] = "new_client";
        $view_data["signup_message"] = lang("create_an_account_as_a_new_client");
        $this->load->view("signup/code", $view_data);
    }
	function product() {
        $leveler = $this->Users_model->rating()->result();
        $view_data['model_info'] = $leveler;
        $this->load->view("signup/product", $view_data);
    }
	function finish() {
        $view_data = array(
          "mobile" => $this->input->post("mobile"),
          "level" => $this->input->post("level"),
          "price" => $this->input->post("price"),
        );
		redirect('bank/payment.php?price='.$this->input->post('price').'&factor='.rand(10000,100000000));
		//$user_id = $this->Users_model->finish($view_data);
    }
	function signup() {
        //by default only client can signup directly
        //if client login/signup is disabled then show 404 page
        if (get_setting("disable_client_signup")) {
            show_404();
        }

        $view_data["type"] = "client";
        $view_data["signup_type"] = "new_client";
        $view_data["signup_message"] = lang("create_an_account_as_a_new_client");
        $this->load->view("signup/signup", $view_data);
    }
    function check_phone() {
        validate_submitted_data(array(
            "mobile" => "required"
        ));

        $user_data = array(
            "mobile" => $this->input->post("mobile")
        );
		$mobile=$this->input->post("mobile");
        if ($this->Users_model->is_email_exists($mobile)) {
		 $view_data["mobile"] = $mobile;
		 $this->load->view("signup/password", $view_data);
        }else{
		 //send_sms($mobile);
		 $token=rand(10000,99999);
		 $view_data["token"] = $token;
		 $tokenm=$token;
		 $view_data["mobile"] = $mobile;
		 $url = "https://api.kavenegar.com/v1/70565A48476F4A3263555861667664696A7179424749386C316E727238307158/verify/lookup.json?receptor=".$mobile."&token=".$token."&template=savregister";
         $action = //SOAP action;
         $parameter = '</xml version="1.0" encoding="utf-8" ?><soap:Envelope></soap:Envelope>';
         $header = array("Content-Type: text/xml; charset=utf-8","SOAPAction: ".$action,"Content-length: ".strlen($parameter));
         $request = curl_init();
         curl_setopt($request, CURLOPT_URL,            $url );
         curl_setopt($request, CURLOPT_CONNECTTIMEOUT, 10);
         curl_setopt($request, CURLOPT_TIMEOUT,        10);
         curl_setopt($request, CURLOPT_RETURNTRANSFER, true );
         curl_setopt($request, CURLOPT_SSL_VERIFYPEER, false);
         curl_setopt($request, CURLOPT_SSL_VERIFYHOST, false);
         curl_setopt($request, CURLOPT_POST,           true );            
         curl_setopt($request, CURLOPT_POSTFIELDS,     $parameter); 
         curl_setopt($request, CURLOPT_VERBOSE, TRUE); 
         curl_setopt($request, CURLOPT_HTTPHEADER, $header); 
         $result = curl_exec($request);
         if( $result===false ){
          die('error: '.curl_error($request));
         }else{
          $xmlobj = simplexml_load_string($result);
          var_dump($xmlobj);
         }
         curl_close($request); 
		 ///
		 $this->load->view("signup/code", $view_data);	
		}
    }
	function check_pass() {
        validate_submitted_data(array(
            "mobile" => "required",
            "password" => "required"
        ));

        $user_data = array(
            "mobile" => $this->input->post("mobile"),
            "password" => $this->input->post("password")
        );
		$mobile=$this->input->post("mobile");
		$password=$this->input->post("password");
        if ($this->Users_model->authenticate($mobile, $password)) {
		 echo 'true';
        }else{
		 echo 'false';	
		}
    }
	function check_code() {
        validate_submitted_data(array(
          "code" => "required"
        ));

        $user_data = array(
          "code" => $this->input->post("code")
        );
		$code=$this->input->post("code");
		$mobile=$this->input->post("mobile");
		$signup_key=$this->input->post("signup_key");
		
		$view_data["message"] = "کد وارد شده صحیح نمی باشد";
		$view_data["token"] =$signup_key;
		$view_data["mobile"] =$mobile;
		$code=$this->input->post("code");
        if ($code==$signup_key) {
		 $this->load->view("signup/signup", $view_data);
        }else{
		 $this->load->view("signup/code", $view_data);	
		}
    }
   
    //redirected from email
    function accept_invitation($signup_key = "") {
        $valid_key = $this->is_valid_key($signup_key);
        if ($valid_key) {
            $email = get_array_value($valid_key, "email");
            $type = get_array_value($valid_key, "type");
            if ($this->Users_model->is_email_exists($email)) {
                $view_data["heading"] = "Account exists!";
                $view_data["message"] = lang("account_already_exists_for_your_mail") . " " . anchor("signin", lang("signin"));
                $this->load->view("errors/html/error_general", $view_data);
                return false;
            }

            if ($type === "staff") {
                $view_data["signup_message"] = lang("create_an_account_as_a_team_member");
            } else if ($type === "client") {
                $view_data["signup_message"] = lang("create_an_account_as_a_client_contact");
            }

            $view_data["signup_type"] = "invitation";
            $view_data["type"] = $type;
            $view_data["signup_key"] = $signup_key;
            $this->load->view("signup/index", $view_data);
        } else {
            $view_data["heading"] = "406 Not Acceptable";
            $view_data["message"] = lang("invitation_expaired_message");
            $this->load->view("errors/html/error_general", $view_data);
        }
    }

    private function is_valid_key($signup_key = "") {
        $signup_key = decode_id($signup_key, "signup");
        $signup_key = $this->encrypt->decode($signup_key);
        $signup_key = explode('|', $signup_key);
        $type = get_array_value($signup_key, "0");
        $email = get_array_value($signup_key, "1");
        $expire_time = get_array_value($signup_key, "2");
        $client_id = get_array_value($signup_key, "3");
        if ($type && $email && valid_email($email) && $expire_time && $expire_time > time()) {
            return array("type" => $type, "email" => $email, "client_id" => $client_id);
        }
    }

    function create_account() {

        $signup_key = $this->input->post("signup_key");

        validate_submitted_data(array(
            "first_name" => "required",
            "last_name" => "required",
            "password" => "required"
        ));
        $mobile=$this->input->post("mobile");
		$view_data["mobile"] = $mobile;
        $user_data = array(
            "first_name" => $this->input->post("first_name"),
            "phone" => $this->input->post("mobile"),
            "last_name" => $this->input->post("last_name"),
            "password" => md5($this->input->post("password")),
            "melli_code" => $this->input->post("melli_code"),
            "created_at" => get_current_utc_time()
        );
		$melli_code=$this->input->post("melli_code");
		if ($this->Users_model->is_melli_code_exists($melli_code)) {
			$view_data["message_melli"] = "قبلا با این کد ملی ثبت نام کرده اید , اگر عضو شده اید از اینجا وارد شوید .";
			
		    $this->load->view("signup/signup", $view_data);
		}else{
		 $user_id = $this->Users_model->create_account($user_data);
		 
		 $this->load->view("signup/product",$view_data);	
		}
    }
}
