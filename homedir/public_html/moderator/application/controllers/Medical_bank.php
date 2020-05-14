<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Medical_bank extends MY_Controller {

    function __construct() {
        parent::__construct();
		$this->load->model("Roles_model");
		$this->load->model("Date_model");
		$this->load->model("Card_model");
    }
    public function index() {
        $this->template->rander("medical_bank/index");
    }
  
    function modal_form() {
        validate_submitted_data(array(
            "id" => "numeric"
        ));
        $id = $this->input->post('id');
        $options = array(
            "id" => $id,
        );

        $view_data['model_info'] = $this->Users_model->get_details($options)->row();

        $this->load->view('medical_bank/modal_form', $view_data);
    }
	function card_modal_form($user_key) {
        validate_submitted_data(array(
            "id" => "numeric"
        ));
        $view_data['model_info'] = $this->Card_model->get_one($id);
        $view_data['user_key'] = $user_key;
        $this->load->view('medical_bank/card_modal_form', $view_data);
    }
	
	function save_cards() {
        $data = array(
            "card_name" => $this->input->post('card_name'),
            "card_number" => $this->input->post('card_number'),
            "status" => $this->input->post('status'),
            "id" => $this->input->post('id'),
            "user_key" => $this->input->post('user_key'),
        );
        
        $save_id = $this->db->insert("cards",$data);
        
        if ($save_id) {
            echo json_encode(array("success" => true, "data" => $this->_category_row_data($save_id), 'id' => $save_id, 'message' => lang('record_saved')));
        } else {
            echo json_encode(array("success" => false, 'message' => lang('error_occurred')));
        }
        
    }
	function card_list_data($user_key) {

        $list_data = $this->db->get_where("cards",array('user_key'=>$user_key))->result();
        $result = array();
        foreach ($list_data as $data) {
            $result[] = $this->make_card_row($data);
        }
        echo json_encode(array("data" => $result));
    }
	private function make_card_row($data) {
		if($data->status=='active'){$active='فعال';}else{$active='غیرفعال';}
        if($data->type=="credit"){$data->card_name = "کارت اعتباری";}
		if($data->send_to_psp == '1'){
		  $send_to_psp = "<i class='glyphicon glyphicon-ok' style='color:green'></i>";
		}else{
		  $send_to_psp = modal_anchor(get_uri("User_cards/send_to_psp/" .$data->card_number.'/'.$data->user_key), "<i class='glyphicon glyphicon-plus' style='color:blue'></i>", array("title" => "ارسال به پی اس پی"));
		}
        return array(
            $data->card_name,
            $data->card_number,
			$active,
            $send_to_psp,
			js_anchor("<i class='fa fa-times fa-fw'></i>", array('title' => lang('delete_card'), "class" => "delete", "data-id" => $data->id, "data-action-url" => "user_cards/delete_category/".$data->id, "data-action" => "delete-confirmation"))
        );
    }
	function send_to_psp($id) {
		//$id = $this->input->post('id');
        $options = array(
            "id" => $id,
        );

        $view_data['model_info'] = $this->Users_model->get_details($options)->row();
        $this->load->view('medical_bank/send_to_psp', $view_data);
    }

    function add_client() {
		if ($this->Users_model->is_melli_code_exists($this->input->post('melli_code'))) {
            echo json_encode(array("success" => false, 'message' => "کد ملی از قبل ثبت شده است"));
            exit();
        }
		if ($this->Users_model->is_phone_exists($this->input->post('phone'))) {
            echo json_encode(array("success" => false, 'message' => "شماره همراه از قبل ثبت شده است"));
            exit();
        }

        validate_submitted_data(array(
            "first_name" => "required",
            "last_name" => "required",
            "password" => "required",
            "melli_code" => "required",
            "phone" => "required",
        ));
        $user_key=md5(uniqid(rand(), true));
        $user_data = array(
            "password" => md5($this->input->post('password')),
            "first_name" => $this->input->post('first_name'),
            "last_name" => $this->input->post('last_name'),
            "melli_code" => $this->input->post('melli_code'),
            "state" => $this->input->post('state'),
            "city" => $this->input->post('city'),
            "address" => $this->input->post('address'),
            "phone" => $this->input->post('phone'),
            "gender" => $this->input->post('gender'),
            "user_type" => "client",
            "user_key" => $user_key,
            "created_at" => get_current_utc_time()
        );
        //add a new team member
        $user_id = $this->db->insert("users",$user_data);
        if ($user_id) {
            echo json_encode(array("success" => true, "data" => $this->_row_data($user_id), 'id' => $user_id, 'message' => lang('record_saved')));
        } else {
            echo json_encode(array("success" => false, 'message' => lang('error_occurred')));
        }
    }

    //prepere the data for members list
    function list_data() {
        $options = array(
            "status" => $this->input->post("status"),
            "user_type" => "client",
			//"user_type" => $this->login_user->user_type,
            "user_key" => $this->login_user->user_key,
        );
        $list_data = $this->Users_model->get_details($options)->result();
        $result = array();
		$i=1;
        foreach ($list_data as $data) {
            $result[] = $this->_make_row($data,$i);
			$i++;
        }
        echo json_encode(array("data" => $result));
    }
	
	function list_data_limit() {
        $custom_fields = '';
        $options = array(
            "status" => $this->input->post("status"),
            "user_type" => "client",
			"user_type" => $this->login_user->user_type,
            "user_key" => $this->login_user->user_key,
        );


        $list_data = $this->Users_model->get_details_limit($options)->result();
        $result = array();
		$i=1;
        foreach ($list_data as $data) {
            $result[] = $this->_make_row($data, $i);
			$i++;
        }
        echo json_encode(array("data" => $result));
    }
    
    //get a row data for member list
    function _row_data($id) {
        $options = array(
            "id" => $id
        );
        $data = $this->Users_model->get_details($options)->row();
        return $this->_make_row($data, $i);
    }

    //prepare team member list row
    private function _make_row($data, $i) {
        if($data->status=='active'){$status='فعال';}else{$status='غیرفعال';}
        $row_data = array(
		    $i,
			$data->first_name.' '.$data->last_name,
            $data->phone,
            $data->melli_code,
            $data->state,
            $status
        );
        $delete_link = "";
        $delete_link = anchor(get_uri("medical_bank/view/" . $data->id), "<i class='fa fa-pencil'></i>", array("class" => "edit", "title" => lang('edit'))).js_anchor("<i class='fa fa-times fa-fw'></i>", array('title' => lang('delete_category'), "class" => "delete", "data-id" => $data->id, "data-action-url" => get_uri("medical_bank/delete/".$data->id), "data-action" => "delete"));
        $row_data[] = $delete_link;

        return $row_data;
    }
    function address($user_key) {
		$view_data['user_key'] = $user_key;
        $this->load->view("medical_bank/address",$view_data);
    }
	function address_form($user_key,$id) {
		$view_data['user_key']=$user_key;

		if($id){
		 $view_data['model_info']=$this->db->get_where('users_address',array("id"=>$id))->row();
		}
		$view_data['id']=$id;
        $this->load->view("medical_bank/address_form",$view_data);
	}

	function discount($user_key) {
		$view_data['user_key'] = $user_key;
        $this->load->view("medical_bank/discount",$view_data);
    }
	function discount_form($user_key,$id) {
		$view_data['staff_dropdown'] = $this->_get_staff_dropdown();
		$view_data['company_dropdown'] = $this->_get_company_dropdown();

		$drop_down_default = array();
		$drop_down_default['cash'] = 'تومان';
		$drop_down_default['percent'] = 'درصد';
		$view_data['value_type']=$drop_down_default;
		
		$drop_down_more = array();
		$drop_down_more['more'] = 'بیشتر';
		$drop_down_more['less'] = 'کمتر';
		$view_data['more_less']=$drop_down_more;
		
		$view_data['user_key']=$user_key;

		if($id){
		 $view_data['model_info']=$this->db->get_where('users_discount',array("id"=>$id))->row();
		}
		$view_data['id']=$id;
        $this->load->view("medical_bank/discount_form",$view_data);
	}
    function _get_company_dropdown(){
		$companies = $this->db->get_where('company' , array('deleted'=>0))->result();
		$drop_down = array();
		foreach($companies as $company){
		  $drop_down[$company->en_name] = $company->name;
		}	
		return $drop_down;
	}
	function _get_staff_dropdown(){
		$staff = $this->db->get_where('insurance',array("status"=>"1"))->result();
		$drop_down = array();
		foreach($staff as $agent){
			$drop_down[$agent->id] = $agent->name;
		}
		
		return $drop_down;
	}
	function add_discount($user_key){
		$company = $this->input->post('company');
		$a = '';
		for($i = 0;$i<count($company) - 1;$i++){
		 $a = $a .','.$company[$i];	
		}
        $user_data = array(
            "insurance" => $this->input->post('insurance'),
            "value" => $this->input->post('value'),
            "value_type" => $this->input->post('value_type'),
            "company" => $a,
            "more_less" => $this->input->post('more_less'),
            "more_less_val" => $this->input->post('more_less_val'),
            "user_key" => $user_key,
        );
		$id=$this->input->post('iddiscount');
		$save_id='';
		if($id){
		  $this->db->where("id",$id);
		  $save_id = $this->db->update('users_discount' , $user_data);
		}else{
          $save_id = $this->db->insert("users_discount",$user_data);
		  $insert_id = $this->db->insert_id();
		}
		if ($save_id) {
            echo json_encode(array("success" => true,"data" => $this->make_discount($insert_id,'',$user_key) ,'message' => lang('record_updated')));
        } else {
            echo json_encode(array("success" => false, 'message' => lang('error_occurred')));
        }
		
	}
	function add_address($user_key){
		
        $user_data = array(
            "state" => $this->input->post('state'),
            "city" => $this->input->post('city'),
            "area" => $this->input->post('area'),
            "address" => $this->input->post('address'),
            "user_key" => $user_key,
        );
		$id=$this->input->post('idaddress');
		$save_id='';
		if($id){
		  $this->db->get_where("users_address",array('id'=>$id));
		  $save_id = $this->db->update('users_address' , $user_data);
		}else{
          $save_id = $this->db->insert("users_address",$user_data);
		}
		if ($save_id) {
            echo json_encode(array("success" => true, 'message' => lang('record_updated')));
        } else {
            echo json_encode(array("success" => false, 'message' => lang('error_occurred')));
        }
		
	}
	function wallet($user_key) {
		$view_data['user_key'] = $user_key;
        $this->load->view("medical_bank/wallet",$view_data);
    }
	function card($user_key) {
		$view_data['user_key'] = $user_key;
        $this->load->view("medical_bank/card",$view_data);
    }
	
	function all_transaction_wallet($user_id) {

        $list_data = $this->db->get_where("wallet",array("username"=>$user_id))->result();
        $result = array();
        foreach ($list_data as $data) {
            $result[] =$this->_make_transaction_wallet($data);
        }
        echo json_encode(array("data" => $result));
    }
	function _make_transaction_wallet($data) {
		if($data->type=='plus'){
		 $type='<span style="color:#0ea20e;font-weight:bold">افزایش</span>';
		}else{
		 $type='<span style="color:#ff0e00;font-weight:bold">کاهش</span>';
		}
		if($data->status=='active'){
		 $status='<span style="color:#0ea20e;font-weight:bold">انجام شده</span>';
		}else{
		 $status='<span style="color:#ff0e00;font-weight:bold">در دست انجام</span>';
		}
		if($data->wallet_type=='cash'){
		 $wallet_type='نقدی';
		}else{
		 $wallet_type='اعتباری';
		}
        return array(
            $data->id,
            $data->for,
            $data->date,
            number_format($data->amount).' تومان',
            number_format($data->extant).' تومان',
            $type,
			$status,
			$wallet_type,
        );
    }
	function address_list($user_key) {
		$list_data = $this->db->get_where("users_address",array("user_key"=>$user_key))->result();
		$result = array();
		$i=1;
        foreach ($list_data as $data) {
            $result[] = $this->make_row_address($data,$i,$user_key);
			$i++;
        }
        echo json_encode(array("data" => $result));
    }
    function discount_list($user_key) {
        $list_data = $this->db->get_where("users_discount",array("user_key"=>$user_key))->result();
        $result = array();
		$i=1;
        foreach ($list_data as $data) {
            $result[] = $this->make_row_discount($data,$i,$user_key);
			$i++;
        }
        echo json_encode(array("data" => $result));
    }
	function make_discount($id,$i,$user_key) {
        $list_data = $this->db->get_where("users_discount",array("id"=>$id))->row();
		
		return $this->make_row_discount($list_data,$i,$user_key);
    }
	
	private function make_row_discount($data, $i,$user_key) {
		if($data->more_less == 'more'){
		  $more_less = "کمتر از";
		}else{
		  $more_less = "بیشتر از";
		}
		
		if($data->value_type == 'cash'){
		  $value_type = 'تومان';
		}else{
		  $value_type = 'درصد';
		}
        if($data->status=='active'){$status='فعال';}else{$status='غیرفعال';}
        $row_data = array(
		    $i,
            $this->db->get_where("insurance",array("id"=>$data->insurance))->row()->name,
            $data->company,
            number_format($data->value).' '.$value_type,
            $more_less.' '.number_format($data->more_less_val).' تومان',
        );
        $delete_link = "";
        $delete_link = modal_anchor(get_uri("medical_bank/discount_form/".$user_key.'/'.$data->id), "<i class='fa fa-pencil'></i>", array("class" => "edit", "title" => lang('edit'))).js_anchor("<i class='fa fa-times fa-fw'></i>", array('title' => lang('delete_category'), "class" => "delete", "data-id" => $data->id, "data-action-url" => get_uri("medical_bank/delete/".$data->id), "data-action" => "delete"));
        $row_data[] = $delete_link;
        return $row_data;
    }
    private function make_row_address($data, $i,$user_key) {
        $row_data = array(
		    $i,
            $data->state,
            $data->city,
            $data->area,
            $data->address,
        );
        $delete_link = "";
        $delete_link = modal_anchor(get_uri("medical_bank/address_form/".$user_key.'/'.$data->id), "<i class='fa fa-pencil'></i>", array("class" => "edit", "title" => lang('edit'))).js_anchor("<i class='fa fa-times fa-fw'></i>", array('title' => lang('delete_category'), "class" => "delete", "data-id" => $data->id, "data-action-url" => get_uri("medical_bank/delete/".$data->id), "data-action" => "delete"));
        $row_data[] = $delete_link;
        return $row_data;
    }    
    function delete() {
        validate_submitted_data(array(
            "id" => "required|numeric"
        ));

        $id = $this->input->post('id');
      
        if ($id != $this->login_user->id && $this->Users_model->delete($id)) {
            echo json_encode(array("success" => true, 'message' => lang('record_deleted')));
        } else {
            echo json_encode(array("success" => false, 'message' => lang('record_cannot_be_deleted')));
        }
    }

    //show team member's details view
    function view($id = 0, $tab = "") {
        if ($id) {
            $options = array("id" => $id);//, "user_type" => "client"
            $user_info = $this->db->get_where("users",$options)->row();
            if ($user_info) {
                $view_data['user_info'] = $user_info;
				$view_data["user_key"]=$user_info->user_key;
                $this->template->rander("medical_bank/view", $view_data);
            } else {
                show_404();
            }
        } else {
            show_404();
        }
    }
    //show the job information of a team member
    function job_info($user_id) {
        //$this->only_admin_or_own($user_id);

        $options = array("id" => $user_id);
        $user_info = $this->Users_model->get_details($options)->row();

        $view_data['id'] = $user_id;
		$view_data['user_info'] = $this->Users_model->get_one($user_id);
        //$view_data['job_info'] = $this->Users_model->get_job_info($user_id);
        //$view_data['job_info']->job_title = $user_info->job_title;
        $this->load->view("medical_bank/job_info", $view_data);
    }

    //save job information of a team member
    function save_job_info() {
        validate_submitted_data(array(
            "user_id" => "required|numeric"
        ));

        $user_id = $this->input->post('user_id');

        $job_data = array(
            "user_id" => $user_id,
            "salary" => unformat_currency($this->input->post('salary')),
            "salary_term" => $this->input->post('salary_term'),
            "date_of_hire" => $this->input->post('date_of_hire')
        );

        //we'll save the job title in users table
        $user_data = array(
            "job_title" => $this->input->post('job_title'),
            "psp_code" => $this->input->post('psp_code'),
            "psp_category" => $this->input->post('psp_category'),
            "off_bank" => $this->input->post('off_bank'),
            "off_no_bank" => $this->input->post('off_no_bank'),
            "porsant" => $this->input->post('porsant')
        );

        //$this->Users_model->save($user_data, $user_id);
        if ($this->Users_model->save($user_data, $user_id)) {
            echo json_encode(array("success" => true, 'message' => lang('record_updated')));
        } else {
            echo json_encode(array("success" => false, 'message' => lang('error_occurred')));
        }
    }

    //show general information of a team member
    function general_info($user_key) {
        //$this->update_only_allowed_members($user_id);
        $view_data['user_info'] = $this->db->get_where("users",array("user_key"=>$user_key))->row();
        $this->load->view("medical_bank/general_info", $view_data);
    }

    //save general information of a team member
    function save_general_info($user_id) {
        //$this->update_only_allowed_members($user_id);

        validate_submitted_data(array(
            "phone" => "required",
            "melli_code" => "required",
        ));

        $user_data = array(
            "first_name" => $this->input->post('first_name'),
            "last_name" => $this->input->post('last_name'),
            "address" => $this->input->post('address'),
            "phone" => $this->input->post('phone'),
            "melli_code" => $this->input->post('melli_code'),
            "gender" => $this->input->post('gender'),
            "state" => $this->input->post('state'),
            "city" => $this->input->post('city'),
			"email" => $this->input->post('email')
        );

        $user_info_updated = $this->Users_model->save($user_data, $user_id);

        if ($user_info_updated) {
            echo json_encode(array("success" => true, 'message' => lang('record_updated')));
        } else {
            echo json_encode(array("success" => false, 'message' => lang('error_occurred')));
        }
    }

    //show account settings of a team member
    function account_settings($user_key) {
        $view_data['user_info'] = $this->db->get_where("users",array("user_key"=>$user_key))->row();
        $this->load->view("medical_bank/account_settings", $view_data);
    }

    //prepare the dropdown list of roles
    private function _get_roles_dropdown() {
        $role_dropdown = array(
            "0" => lang('team_member'),
            "admin" => lang('admin')
        );
        $roles = $this->Roles_model->get_all(array("deleted" => 0))->result();
        foreach ($roles as $role) {
            $role_dropdown[$role->id] = $role->title;
        }
        return $role_dropdown;
    }

    //save account settings of a team member
    function save_account_settings($user_id) {
        //$this->only_admin_or_own($user_id);

        if ($this->Users_model->is_email_exists($this->input->post('email'), $user_id)) {
            echo json_encode(array("success" => false, 'message' => lang('duplicate_email')));
            exit();
        }
        $account_data = array(
            "email" => $this->input->post('email')
        );

        //don't reset password if user doesn't entered any password
        if ($this->input->post('password')) {
            $account_data['password'] = md5($this->input->post('password'));
        }

        if ($this->Users_model->save($account_data, $user_id)) {
            echo json_encode(array("success" => true, 'message' => lang('record_updated')));
        } else {
            echo json_encode(array("success" => false, 'message' => lang('error_occurred')));
        }
    }

    //save profile image of a team member
    function save_profile_image($user_id = 0) {
        //$this->update_only_allowed_members($user_id);

        //process the the file which has uploaded by dropzone
        $profile_image = str_replace("~", ":", $this->input->post("profile_image"));

        if ($profile_image) {
            $profile_image = move_temp_file("avatar.png", get_setting("profile_image_path"), "", $profile_image);

            $image_data = array("image" => $profile_image);

            $this->Users_model->save($image_data, $user_id);
            echo json_encode(array("success" => true, 'message' => lang('profile_image_changed')));
        }

        //process the the file which has uploaded using manual file submit
        if ($_FILES) {
            $profile_image_file = get_array_value($_FILES, "profile_image_file");
            $image_file_name = get_array_value($profile_image_file, "tmp_name");
            if ($image_file_name) {
                $profile_image = move_temp_file("avatar.png", get_setting("profile_image_path"), "", $image_file_name);
                $image_data = array("image" => $profile_image);
                $this->Users_model->save($image_data, $user_id);
                echo json_encode(array("success" => true, 'message' => lang('profile_image_changed')));
            }
        }
    }
	//show cash list of a team member
    function order($user_id) {
        if ($user_id) {
            $view_data['user_id'] = $user_id;
            $this->load->view("medical_bank/order", $view_data);
        }
    }
	function all_transaction_client($user_key) {
        $list_data = $this->db->get_where("orders",array("user_key"=>$user_key))->result();
        $result = array();
        $i=1;
        foreach ($list_data as $data) {
            $result[] = $this->_make_transaction_row($data,$i);
			$i++;
        }
        echo json_encode(array("data" => $result));
    }
	function terminals_info($user_id) {
        if ($user_id) {
            $view_data['user_id'] = $user_id;
            $view_data["custom_field_headers"] = $this->Custom_fields_model->get_custom_field_headers_for_table("orders", $this->login_user->is_admin, $this->login_user->user_type);
            $this->load->view("medical_bank/terminals_info", $view_data);
        }
    }
	private function _make_transaction_row($data,$i) {
		$dd=explode('-',$data->start_date);
		$time=explode(' ',$data->start_date);
		$date=$this->Date_model->gregorian_to_jalali($dd[0],$dd[1],$dd[2],'/');
		if($data->broker_id){
		  $broker_name=$this->db->get_where('users' , array('skype'=>$data->broker_id))->row();
		  $broker_name=$broker_name->first_name.' '.$broker_name->last_name;
		}else{
		  $broker_name='ندارد';
		}
        return array(
		    $i,
            $data->title,
            $date.' ساعت : '.$time[1],
            number_format($data->price).' تومان',
			$broker_name,
            $data->CashIinstallments,
            $data->status,
            anchor(get_uri("order/view/" . $data->id), "<i class='fa fa-pencil'></i>", array("class" => "edit", "title" => "جزییات")).js_anchor("<i class='fa fa-times fa-fw'></i>", array('title' => lang('delete_category'), "class" => "delete", "data-id" => $data->id, "data-action-url" => get_uri("order/delete/".$data->id), "data-action" => "delete"))
        );
    }
    
    //edit profile
    function profile($id = 0, $tab = "") {
            $options = array("id" => $id);
            $user_info = $this->Users_model->get_details($options)->row();
            if ($user_info) {
                $view_data['user_info'] = $user_info;
                $this->template->rander("medical_bank/profile", $view_data);
            } else {
                show_404();
            }
    }

    //change client password
    function change_password($id = 0) {
        if ($id * 1) {
            //we have an id. view the team_member's profie
            $options = array("id" => $id);
            $user_info = $this->Users_model->get_details($options)->row();
            
            if ($user_info) {

                //check which tabs are viewable for current logged in user
                $view_data['show_timeline'] = get_setting("module_timeline") ? true : false;

                $can_update_team_members_info = $this->can_update_team_members_info($id);

                $view_data['show_general_info'] = $can_update_team_members_info;
                $view_data['show_job_info'] = false;

                $view_data['show_account_settings'] = false;

                $show_attendance = false;
                $show_leave = false;

                $expense_access_info = $this->get_access_info("expense");
                $view_data["show_expense_info"] = (get_setting("module_expense") == "1" && $expense_access_info->access_type == "all") ? true : false;

                //admin can access all members attendance and leave
                //none admin users can only access to his/her own information 

                if ($this->login_user->is_admin || $user_info->id === $this->login_user->id) {
                    $show_attendance = true;
                    $show_leave = true;
                    $view_data['show_job_info'] = true;
                    $view_data['show_account_settings'] = true;
                } else {
                    //none admin users but who has access to this team member's attendance and leave can access this info
                    $access_timecard = $this->get_access_info("attendance");
                    if ($access_timecard->access_type === "all" || in_array($user_info->id, $access_timecard->allowed_members)) {
                        $show_attendance = true;
                    }

                    $access_leave = $this->get_access_info("leave");
                    if ($access_leave->access_type === "all" || in_array($user_info->id, $access_leave->allowed_members)) {
                        $show_leave = true;
                    }
                }


                //check module availability
                $view_data['show_attendance'] = $show_attendance && get_setting("module_attendance") ? true : false;
                $view_data['show_leave'] = $show_leave && get_setting("module_leave") ? true : false;


                //check contact info view permissions
                $show_cotact_info = $this->can_view_team_members_contact_info();
                $show_social_links = $this->can_view_team_members_social_links();

                //own info is always visible
                if ($id == $this->login_user->id) {
                    $show_cotact_info = true;
                    $show_social_links = true;
                }

                $view_data['show_cotact_info'] = $show_cotact_info;
                $view_data['show_social_links'] = $show_social_links;


                //show projects tab to admin
                $view_data['show_projects'] = false;
                if ($this->login_user->is_admin) {
                    $view_data['show_projects'] = true;
                }


                //$view_data['tab'] = $tab; //selected tab
                $view_data['user_info'] = $user_info;
                $view_data['social_link'] = $this->Social_links_model->get_one($id);
                $this->template->rander("medical_bank/change_password", $view_data);
            } else {
                show_404();
            }
        } else {
            //we don't have any specific id to view. show the list of team_member
            $view_data['team_members'] = $this->Users_model->get_details(array("user_type" => "client", "status" => "active"))->result();
            $this->template->rander("medical_bank/profile_card", $view_data);
        }
    }

}