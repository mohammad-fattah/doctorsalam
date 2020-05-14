<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Merchant extends MY_Controller {

    function __construct() {
        parent::__construct();
        //$this->access_only_team_members();
		//$this->init_permission_checker("can_view_merchant");
		//$this->load->model("Psp_model");
		$this->load->model("Merchant_model");
		$this->load->model("Date_model");
    }
   
	public function discounts($merchant_id = 0){
		
		if($merchant_id){
			$view_data["merchant_id"] = $merchant_id;
			$this->load->view("merchant/discounts", $view_data);
		}else{
			$view_data["merchant_id"] = $this->Merchant_category_model->db->get_where('users', array('user_key'=>$this->login_user->user_key))->row()->id;
			$this->template->rander("merchant/discounts", $view_data);
		}
	}
	
	
	public function staff_grouped_discounts($merchant_id = 0){
		$view_data["merchant_id"] = $merchant_id;
		if($merchant_id){
			$this->load->view("merchant/staff_grouped_discounts", $view_data);
		}else{
			$this->template->rander("merchant/staff_grouped_discounts", $view_data);
		}
	}

	public function client_grouped_discounts($merchant_id = 0){
		$view_data["merchant_id"] = $merchant_id;
		$this->template->rander("merchant/client_grouped_discounts", $view_data);
		
	}
	
	public function show_discounts_modal_form($id){
			$temp = $this->Merchant_category_model->db->get_where('discounts' , array('id'=>$id))->row();			
			$view_data['model_info'] = $this->Merchant_category_model->db->get_where('discounts' , array('title'=>$temp->title, 'activeOrDeactive'=>'active' , 'requestedOrUsed'=>'wait'))->row();			
			$this->Merchant_category_model->db->where(array('id'=>$view_data['model_info']->id));
			$this->Merchant_category_model->db->update('discounts' , array('requestedOrUsed'=>'requested'));
			$view_data['type'] = $view_data['model_info']->type == "percent" ? "درصد" : "ریال";
			$view_data['merchant'] = $this->Merchant_category_model->db->get_where('users' , array('id'=>$view_data['model_info']->merchant_id))->row();
			$this->load->view('merchant/show_discounts_modal_form' , $view_data);
	}


	
	public function discounts_modal_form($id = 0 , $merchant_id ){
		if($id){
			$view_data['model_info'] = $this->Merchant_category_model->db->get_where('discounts' , array('id'=>$id))->row();
		}
		$view_data['id'] = $id;
		$view_data['merchant_id'] = $merchant_id;
		$this->load->view('merchant/discounts_modal_form' , $view_data);
	}

	public function save_discounts(){
		$counter = array();
		
		$id = $this->input->post('id');
		if($id == 0){
			$repeat = $this->input->post('number');
			for($i = 1 ; $i<= $repeat ; $i++){
				
				$data = array(
					"code" => rand(10000,99999),
					"expire_date" => $this->input->post('expire_date'),
					"start_date" => $this->input->post('start_date'),
					"value" => $this->input->post('value'),
					"type" => $this->input->post('type'),
					"merchant_id" => $this->input->post('merchant_id'),
					"activeOrDeactive" => $this->input->post('activeOrDeactive'),
					"users" => $this->input->post('users'),
					"title" => $this->input->post('title'),
					"comment" => $this->input->post('comment'),
				);
				
				$counter[] = $data;
				
				$result = $this->Merchant_category_model->db->insert('discounts' , $data);

				$saved_data = $this->Merchant_category_model->db->get_where('discounts' , array(
					"title" => $data['title'],
					"start_date" => $data['start_date'],
					"value" => $data['value'],
					"type" => $data['type'],
					"code" => $data['code'],
					"comment" => $data['comment'],
					))->row();
			
				$final_data[] = $this->_make_row_discounts($saved_data , $this->input->post($merchant_id));
				
			}
			
					
		}
		else{
			$data = array(
				"expire_date" => $this->input->post('expire_date'),
				"start_date" => $this->input->post('start_date'),
				"value" => $this->input->post('value'),
				"type" => $this->input->post('type'),
				"merchant_id" => $this->input->post('merchant_id'),
				"activeOrDeactive" => $this->input->post('activeOrDeactive'),
				"users" => $this->input->post('users'),
				"title" => $this->input->post('title'),
				"comment" => $this->input->post('comment'),
			);
			$this->Merchant_category_model->db->where(array('id'=>$id));
			$result = $this->Merchant_category_model->db->update('discounts' , $data);
			
			$saved_data = $this->Merchant_category_model->db->get_where('discounts' , array('id'=>$id))->row();
			$final_data = $this->_make_row_discounts($saved_data , $this->input->post($merchant_id));
		}
		
		if ($result) {
            echo json_encode(array("success" => true, "data" => $final_data, 'id' => 1, 'message' => lang('record_saved')));
        } else {
            echo json_encode(array("success" => false, 'message' => 'خطا در ذخیره اطلاعات رخ داده است !'));
        }
	}

	public function discount_list_data($merchant_id = 0){
		$options = array(
            "deleted" => 0,
        );
		
		if($merchant_id){
			$options['merchant_id'] = $merchant_id;
		}
        
        $list_data = $this->Merchant_category_model->db->get_where('discounts' , $options)->result();
        $result = array();
        foreach ($list_data as $data) {
            $result[] = $this->_make_row_discounts($data , $merchant_id);
        }
        echo json_encode(array("data" => $result));
	}

	
	public function _make_row_discounts($data , $merchant_id){
		$active = $data->activeOrDeactive == "active" ? "فعال" : "غیر فعال";
		if( $data->requestedOrUsed == "requested" ){$used = "درخواست داده شده";}elseif( $data->requestedOrUsed == "used" ){ $used = "استفاده شده";}else{ $used ="درخواست نشده";}
		$type   = $data->type == "percent" ? "درصدی" : "ریالی";
		if($data->users == "allUsers" ){ $users  =  "همه کاربران" ;}elseif( $data->users == "myUsers" ){ $users  = "کاربران من" ; }else{$users  =  "کاربران جدید";}
		return array(
			$data->title,
			$data->code,
			$data->start_date,
			$data->expire_date,
			$data->value,
			$type,
			$users,
			$data->comment,
			$active,
			$used,
			modal_anchor(get_uri("merchant/discounts_modal_form/".$data->id."/".$merchant_id), "<i class='fa fa-pencil'></i>", array("class" => "edit", "title" => "ویرایش تخفیف", "data-post-id" => $data->id))
            . js_anchor("<i class='fa fa-times fa-fw'></i>", array('title' => lang('delete_category'), "class" => "delete", "data-id" => $data->id, "data-action-url" => get_uri("village/delete/".$data->id), "data-action" => "delete"))
		);
	}


	public function staff_grouped_discount_list_data($merchant_id = 0){
		$options = array(
            "deleted" => 0,
        );
		
		if($merchant_id){
			$options['merchant_id'] = $merchant_id;
		}
        $this->Merchant_category_model->db->group_by("title");
        $list_data = $this->Merchant_category_model->db->get_where('discounts' , $options)->result();
        $result = array();
        foreach ($list_data as $data) {
			$code_number = $this->Merchant_category_model->db->get_where('discounts' , array('title'=>$data->title ,'requestedOrUsed'=>'wait', 'activeOrDeactive'=>'active'))->num_rows();
			$activeOrDeactive = $code_number >0 ?  "active" : "deactive";
            $result[] = $this->_make_row_staff_grouped_discounts($data ,$code_number ,$activeOrDeactive, $merchant_id);
		}
        echo json_encode(array("data" => $result));
	}

	
	public function _make_row_staff_grouped_discounts($data ,$code_number,$activeOrDeactive, $merchant_id){
		$active = $activeOrDeactive == "active" ? "فعال" : "غیر فعال";
		$type   = $data->type == "percent" ? "درصد" : "ریال";
		if($data->users == "allUsers" ){ $users  =  "همه کاربران" ;}elseif( $data->users == "myUsers" ){ $users  = "کاربران من" ; }else{$users  =  "کاربران جدید";}
		$merchant = $this->Merchant_category_model->db->get_where('users' , array('id'=>$data->merchant_id))->row();
		$merchant_name = $merchant->job_title;
		$value = $data->value." ".$type;
		return array(
			$merchant_name,
			$data->title,
			$data->start_date,
			$data->expire_date,
			$code_number,
			$value,
			$users,
			$data->comment,
			$active,
		);
	}

	

	public function client_grouped_discount_list_data($merchant_id = 0 , $position = 0){
		$options = array(
            "deleted" => 0,
        );
		
		if($merchant_id){
			$options['merchant_id'] = $merchant_id;
		}
		
        $this->Merchant_category_model->db->group_by("title");
        $list_data = $this->Merchant_category_model->db->get_where('discounts' , $options)->result();
        $result = array();
        foreach ($list_data as $data){
			if($this->Merchant_category_model->db->get_where('discounts' , array('title'=>$data->title ,'requestedOrUsed'=>'wait', 'activeOrDeactive'=>'active'))->num_rows()>0){ $activeOrDeactive = "active"; }else{ $activeOrDeactive = "deactive";}
            $result[] = $this->_make_row_client_grouped_discounts($data ,$merchant_id , $activeOrDeactive , $position);
		}
        echo json_encode(array("data" => $result));
	}

	
	public function _make_row_client_grouped_discounts($data ,$merchant_id , $activeOrDeactive , $position){
		if($position){
			$active = $data->activeOrDeactive == "active" ? "فعال" : "منقضی شده"; 
		}else{
			$active = $activeOrDeactive == "active" ? "قابل استفاده" : "منقضی شده";
		}
		$type   = $data->type == "percent" ? "درصد" : "ریال";
		$merchant = $this->Merchant_category_model->db->get_where('users' , array('id'=>$data->merchant_id))->row();
		$merchant_name = $merchant->job_title;
		$value = $data->value." ".$type;
		$button = $activeOrDeactive == "active" ? "<button class='btn'>می خواهم</button>" : "<button class='btn' disabled>می خواهم</button>";
		
		$dd=explode('-',$data->start_date);
		$time=explode(' ',$data->start_date);
		$sdate=$this->Date_model->gregorian_to_jalali($dd[0],$dd[1],$dd[2],'/');
		
		$dd=explode('-',$data->expire_date);
		$time=explode(' ',$data->expire_date);
		$edate=$this->Date_model->gregorian_to_jalali($dd[0],$dd[1],$dd[2],'/');
		
		$result =  array(
			$merchant_name,
			$data->title,
			$sdate,
			$edate,
			$value,
			$data->comment,
			$active,
		);
		if(!$position){
			$result[] =	modal_anchor(get_uri("merchant/show_discounts_modal_form/".$data->id),$button, array("class" => "edit", "title" => "کد تخفیف", "data-post-id" => $data->id));
		}
		
		return $result;
		
	}

	
	
	public function contract_modal_form($id = 0 , $user_id){
        $view_data['id'] = $id;
		$view_data['user_id'] = $user_id;
		$view_data['length_dropdown'] = array('1'=>'یک ماه','3'=>'سه ماه','6'=>'شش ماه','9'=>'نه ماه','12'=>'یک سال','24'=>'دو سال'); 
		if($id){
			$view_data['modal_info'] = $this->Merchant_category_model->db->get_where('contract' , array('id'=>$id))->row();
        }
		$this->load->view('merchant/contract_modal_form', $view_data);
	}


	public function _make_row_contract($saved_data , $user_id,$i=1){
		
		$status = $saved_data->status == 1 ? "فعال" : "غیر فعال";
		$file = "<a target='_blank' href='".base_url().$saved_data->file.".pdf'>دانلود فایل</a>";
		
		$length = array('1'=>'یک ماه','3'=>'سه ماه','6'=>'شش ماه','9'=>'نه ماه','12'=>'یک سال','24'=>'دو سال');
		$result = array(
			$i,
			$saved_data->code,
		);
		
		
		/*if(!$user_id){
			$merchant = $this->Merchant_category_model->db->get_where('users' , array('id'=>$saved_data->user_id))->row();
			$merchant_name = $merchant->first_name." ".$merchant->last_name;
			$result[] = $merchant_name;
		}*/
		
		$result[] =	$length[$saved_data->length];
		$result[] =	$saved_data->date;
		$result[] =	$status;
		$result[] =	$file;
		
		
		if($user_id){
			/*$merchant = $this->Merchant_category_model->db->get_where('users' , array('id'=>$saved_data->user_id))->row();
			$merchant_name = $merchant->first_name." ".$merchant->last_name;
			$result[2] = $merchant_name;*/
			$result[2] =$length[$saved_data->length];
			$result[] = js_anchor("<i class='fa fa-times fa-fw'></i>", array('title' =>"حذف", "class" => "delete", "data-id" => $saved_data->id, "data-action-url" => get_uri("merchant/delete_contract/".$saved_data->id), "data-action" => "delete"));
		}
		
		return $result;
	}


	public function delete_contract($id){
		$this->Merchant_category_model->db->where(array('id'=>$id));
		if ($this->Merchant_category_model->db->update('contract' , array('deleted'=>1))) {
            echo json_encode(array("success" => true, 'message' => lang('record_deleted')));
        } else {
            echo json_encode(array("success" => false, 'message' => lang('record_cannot_be_deleted')));
        }

	}

	public function save_upload_contract(){
		
		$id = $this->input->post('id');
		
		$data = array(
			'code' => $this->input->post('code'),
			'length' => $this->input->post('length'),
			'date' => $this->input->post('date'),
			'status' => $this->input->post('status'),
			'file' => "./files/contracts/".$this->input->post('code')."/".$this->input->post('contract_name'),
			'user_id' => $this->input->post('user_id'),
		);
		
		$targetfolder = "./files/contracts/".$this->input->post('code');
		if(is_dir('./files')) mkdir('./files', 0777, TRUE);
		
		if(is_dir($targetfolder)){
			if(file_exists($filepath)){
				unlink($filepath);
			}
		}else{
			mkdir($targetfolder, 0777, TRUE);
		}
		
		$config['upload_path'] = $targetfolder;
        $config['allowed_types'] = 'pdf';
        $config['file_name'] = $this->input->post('contract_name');
 
        $this->load->library('upload', $config);
 
        $this->upload->do_upload('contract');
	
		if($this->Merchant_category_model->db->get_where('contract' , array('code'=>$data['code']))->num_rows()>0){
			$this->Merchant_category_model->db->where(array('code'=>$data['code']));
			$finalresult = $this->Merchant_category_model->db->update('contract' , $data);
		}else{
			$finalresult = $this->Merchant_category_model->db->insert('contract' , $data);
		}
	
		
		$saved_data = $this->Merchant_category_model->db->get_where('contract' , array('code'=>$data['code']))->row();
		
		if ($finalresult) {
            echo json_encode(array("success" => true, "data" => $this->_make_row_contract($saved_data), 'id' => $saved_data->id, 'message' => lang('record_saved')));
        } else {
            echo json_encode(array("success" => false, 'message' => 'خطا در ذخیره اطلاعات رخ داده است !'));
        }
	}

	public function all_contracts($user_id = 0){
		if($user_id){
			$options = array(
				"deleted" => 0,
				"user_id" => $user_id,
			);
        }else{
			$options = array(
				"deleted" => 0,
			);
		}
        $list_data = $this->Merchant_category_model->db->get_where('contract' , $options)->result();
        $result = array();
		$i=1;
        foreach ($list_data as $data) {
            $result[] = $this->_make_row_contract($data , $user_id,$i);
			$i++;
        }
        echo json_encode(array("data" => $result));
	}

    public function index() {
        $this->template->rander("merchant/index");
    }

    public function club_merchants($club_name) {
		$this->access_only_allowed_members();
        $view_data["show_contact_info"] = $this->can_view_team_members_contact_info();

        $view_data["custom_field_headers"] = $this->Custom_fields_model->get_custom_field_headers_for_table("team_members", $this->login_user->is_admin, $this->login_user->user_type);

        $view_data['club_name'] = $club_name;
        
        $this->load->view("merchant/club_merchants", $view_data);
    }

    /* open new member modal */

    function modal_form($club_name = 0) {
        //$this->access_only_admin();

        validate_submitted_data(array(
            "id" => "numeric"
        ));

        //$view_data['role_dropdown'] = $this->_get_roles_dropdown();
		//$view_data['roles_dropdown'] = array('' => '-') + $this->_get_mc_dropdown();
		
        $id = $this->input->post('id');
        $options = array(
            "id" => $id,
        );

        $view_data['club_name'] = $club_name;
        
        $view_data['model_info'] = $this->Users_model->get_details($options)->row();

        //$view_data["custom_fields"] = $this->Custom_fields_model->get_combined_details("team_members", 0, $this->login_user->is_admin, $this->login_user->user_type)->result();

        $this->load->view('merchant/modal_form', $view_data);
    }

    /* save new member */

    function add_merchant() {
        //$this->access_only_admin();

        if ($this->Users_model->is_email_exists($this->input->post('email'),"merchant")) {
            echo json_encode(array("success" => false, 'message' => "ایمیل از قبل ثبت شده است"));
            exit();
        }
		if ($this->Users_model->is_melli_code_exists($this->input->post('melli_code'),"merchant")) {
            echo json_encode(array("success" => false, 'message' => "کد ملی از قبل ثبت شده است"));
            exit();
        }
		if ($this->Users_model->is_phone_exists($this->input->post('phone'),"merchant")) {
            echo json_encode(array("success" => false, 'message' => "شماره همراه از قبل ثبت شده است"));
            exit();
        }
        validate_submitted_data(array(
            "email" => "required|valid_email",
            "first_name" => "required",
            "last_name" => "required",
            //"role" => "required"
        ));
        $user_key=md5(uniqid(rand(), true));
        $user_data = array(
            "email" => $this->input->post('email'),
            "password" => md5($this->input->post('password')),
            "first_name" => $this->input->post('first_name'),
            "last_name" => $this->input->post('last_name'),
            "melli_code" => $this->input->post('melli_code'),
            "state" => $this->input->post('state'),
            "job_title" => $this->input->post('job_title'),
            "city" => $this->input->post('city'),
            "is_admin" => $this->input->post('is_admin'),
            "address" => $this->input->post('address'),
            "phone" => $this->input->post('phone'),
            "gender" => $this->input->post('gender'),
            "merchant_code" => $this->input->post('merchant_code'),
			"alternative_phone" => $this->input->post('alternative_phone'),
            "user_type" => "merchant",
            "level" => "1",
			//"club_name"=> $this->input->post('merchant_code')?$this->input->post('merchant_code'):$this->login_user->club_name,
			"club_name"=> $this->login_user->club_name,
            "user_key" => $user_key,
            "created_at" => get_current_utc_time()
        );
        $user_data["is_admin"] = 0;
        $user_data["role_id"] = 0;

        //add a new team member
        $user_id = $this->Users_model->save($user_data);
        //$this->Users_model->add_new_card($user_key);
        if ($user_id) {
            echo json_encode(array("success" => true, "data" => $this->_row_data($user_id), 'id' => $user_id, 'message' => lang('record_saved')));
        } else {
            echo json_encode(array("success" => false, 'message' => lang('error_occurred')));
        }
    }

    //prepere the data for members list
    function list_data($club_name = 0) {
        $custom_fields = '';//$this->Custom_fields_model->get_available_fields_for_table("team_members", $this->login_user->is_admin, $this->login_user->user_type);
        $options = array(
            "status" => $this->input->post("status"),
            "user_type" => "merchant",
            "club_name" => $club_name ? $club_name : $this->login_user->club_name,
            "custom_fields" => $custom_fields
        );
        

        $list_data = $this->Users_model->get_details($options)->result();
        $result = array();
        foreach ($list_data as $data) {
            $result[] = $this->_make_row($data, $custom_fields);
        }
        echo json_encode(array("data" => $result));
    }
	function list_data_top($limit,$order) {
        $custom_fields = '';
        $options = array(
            "status" => $this->input->post("status"),
            "user_type" => "merchant",
            "club_name" => $club_name ? $club_name : $this->login_user->club_name,
            "custom_fields" => $custom_fields,
			"limit" => $limit,
			//"orders" => $order,
        );
        

        $list_data = $this->Users_model->get_details($options)->result();
        $result = array();
        foreach ($list_data as $data) {
            $result[] = $this->_make_row($data, $custom_fields);
        }
        echo json_encode(array("data" => $result));
    }

    //get a row data for member list
    function _row_data($id) {
        $custom_fields = $this->Custom_fields_model->get_available_fields_for_table("team_members", $this->login_user->is_admin, $this->login_user->user_type);
        $options = array(
            "id" => $id,
            "custom_fields" => $custom_fields
        );

        $data = $this->Users_model->get_details($options)->row();
        return $this->_make_row($data, $custom_fields);
    }

    //prepare team member list row
    private function _make_row($data, $custom_fields) {
        $image_url = get_avatar($data->image);
        $user_avatar = "<span class='avatar avatar-xs'><img src='$image_url' alt='...'></span>";
        $full_name = $data->first_name . " " . $data->last_name . " ";


        //check contact info view permissions
        $show_cotact_info = $this->can_view_team_members_contact_info();

        $row_data = array(
            $data->id,
            //get_team_member_profile_link($data->id, $full_name),
			$data->first_name.' '.$data->last_name,
            $data->job_title,
            $data->merchant_code,
            $data->club_name,
            $data->state.' - '.$data->city,
            $data->melli_code,
            $data->phone
            //$show_cotact_info ? $data->email : "",
            //$show_cotact_info && $data->phone ? $data->phone : "-"
        );
		
        /*foreach ($custom_fields as $field) {
            $cf_id = "cfv_" . $field->id;
            $row_data[] = $this->load->view("custom_fields/output_" . $field->field_type, array("value" => $data->$cf_id), true);
        }*/
        
        $delete_link = "";
        //if ($this->login_user->is_admin && $this->login_user->id != $data->id) {
            $delete_link = anchor(get_uri("merchant/view/" . $data->id), "<i class='fa fa-pencil'></i>", array("class" => "edit", "title" => lang('edit'))).js_anchor("<i class='fa fa-times fa-fw'></i>", array('title' => lang('delete_team_member'), "class" => "delete", "data-id" => $data->id, "data-action-url" => get_uri("merchant/delete"), "data-action" => "delete-confirmation"));
        //}
        $row_data[] = $delete_link;

        return $row_data;
    }

    //delete a team member
    function delete() {
        //$this->access_only_admin();

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
        if ($id * 1) {
            //we have an id. view the team_member's profie
            $options = array("id" => $id, "user_type" => "merchant");
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


                $view_data['tab'] = $tab; //selected tab
                $view_data['user_info'] = $user_info;
                $view_data['social_link'] = $this->Social_links_model->get_one($id);
                $this->template->rander("merchant/view", $view_data);
            } else {
                show_404();
            }
        } else {
            //we don't have any specific id to view. show the list of team_member
            $view_data['team_members'] = $this->Users_model->get_details(array("user_type" => "merchant", "status" => "active"))->result();
            $this->template->rander("merchant/profile_card", $view_data);
        }
    }
    function store($id = 0, $tab = "") {
        if ($id * 1) {
            //we have an id. view the team_member's profie
            $options = array("id" => $id, "user_type" => "merchant");
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


                $view_data['tab'] = $tab; //selected tab
                $view_data['user_info'] = $user_info;
                $view_data['social_link'] = $this->Social_links_model->get_one($id);
                $this->template->rander("merchant/store", $view_data);
            } else {
                show_404();
            }
        } else {
            //we don't have any specific id to view. show the list of team_member
            $view_data['team_members'] = $this->Users_model->get_details(array("user_type" => "merchant", "status" => "active"))->result();
            $this->template->rander("merchant/store", $view_data);
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
        $this->load->view("merchant/job_info", $view_data);
    }

    //save job information of a team member
    function save_job_info() {
        //$this->access_only_admin();

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
    function general_info($user_id) {
        //$this->update_only_allowed_members($user_id);

        $view_data['user_info'] = $this->Users_model->get_one($user_id);
        //$view_data['roles_dropdown'] = array('' => '-') + $this->_get_mc_dropdown();//$this->Psp_model->get_dropdown_list(array("title"), "id");
        //$view_data["custom_fields"] = $this->Custom_fields_model->get_combined_details("team_members", $user_id, $this->login_user->is_admin, $this->login_user->user_type)->result();
        
        $this->load->view("merchant/general_info", $view_data);
    }

    //save general information of a team member
    function save_general_info($user_id) {
        $this->update_only_allowed_members($user_id);

        validate_submitted_data(array(
            "first_name" => "required",
            "last_name" => "required",
            "address" => "required",
            "gender" => "required",
            "state" => "required",
            "city" => "required",
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
            "comment" => $this->input->post('comment'),
            "job_title" => $this->input->post('job_title'),
            "merchant_code" => $this->input->post('merchant_code'),
            "alternative_phone" => $this->input->post('alternative_phone'),
            "psp_category" => $this->input->post('psp_category'),
			"lat" => $this->input->post('lat'),
			"long"=> $this->input->post('long'),
			"email"=> $this->input->post('email'),
        );

        $user_info_updated = $this->Users_model->save($user_data, $user_id);

        save_custom_fields("merchant", $user_id, $this->login_user->is_admin, $this->login_user->user_type);

        if ($user_info_updated) {
            echo json_encode(array("success" => true, 'message' => lang('record_updated')));
        } else {
            echo json_encode(array("success" => false, 'message' => lang('error_occurred')));
        }
    }

    //show social links of a team member
    function social_links($user_id) {
        //important! here id=user_id
        $this->update_only_allowed_members($user_id);

        $view_data['user_id'] = $user_id;
        $view_data['model_info'] = $this->Social_links_model->get_one($user_id);
        $this->load->view("users/social_links", $view_data);
    }

    //save social links of a team member
    function save_social_links($user_id) {
        $this->update_only_allowed_members($user_id);

        $id = 0;
        $has_social_links = $this->Social_links_model->get_one($user_id);
        if (isset($has_social_links->id)) {
            $id = $has_social_links->id;
        }

        $social_link_data = array(
            "facebook" => $this->input->post('facebook'),
            "twitter" => $this->input->post('twitter'),
            "linkedin" => $this->input->post('linkedin'),
            "googleplus" => $this->input->post('googleplus'),
            "digg" => $this->input->post('digg'),
            "youtube" => $this->input->post('youtube'),
            "pinterest" => $this->input->post('pinterest'),
            "instagram" => $this->input->post('instagram'),
            "github" => $this->input->post('github'),
            "tumblr" => $this->input->post('tumblr'),
            "vine" => $this->input->post('vine'),
            "user_id" => $user_id,
            "id" => $id ? $id : $user_id
        );

        $this->Social_links_model->save($social_link_data, $id);
        echo json_encode(array("success" => true, 'message' => lang('record_updated')));
    }

    //show account settings of a team member
    function account_settings($user_id) {
        //$this->only_admin_or_own($user_id);

        $view_data['user_info'] = $this->Users_model->get_one($user_id);
        if ($view_data['user_info']->is_admin) {
            $view_data['user_info']->role_id = "admin";
        }
        $view_data['role_dropdown'] = $this->_get_roles_dropdown();
        $this->load->view("users/account_settings", $view_data);
    }

    //prepare the dropdown list of roles
    private function _get_roles_dropdown() {
        $role_dropdown = array(
            "0" => lang('team_member'),
            "admin" => lang('admin') //static role
        );
        $roles = $this->Roles_model->get_all(array("deleted" => 0))->result();
        foreach ($roles as $role) {
            $role_dropdown[$role->id] = $role->title;
        }
		//$role_dropdown[0]='به پرداخت';
		//$role_dropdown[2]='آپ';
        return $role_dropdown;
    }
	
	//merchant_category
	private function _get_mc_dropdown() {
        $mc_dropdown = array();
        $mcs = $this->Merchant_category_model->get_details(array('deleted'=>0));
        foreach ($mcs as $mc) {
            $mc_dropdown[$mc->id] = $mc->title;
        }
        return $mc_dropdown;
    }
	
	private function _get_psp_dropdown() {
        $psp_dropdown = array();
        $psps = $this->Psp_model->db->get_where('psp' , array("deleted" => "0"))->result();
        foreach ($psps as $psp) {
            $psp_dropdown[$psp->id] = $psp->title;
        }
        return $psp_dropdown;
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

        if ($this->login_user->is_admin && $this->login_user->id != $user_id) {
            //only admin user has permission to update team member's role
            //but admin user can't update his/her own role 
            $role = $this->input->post('role');
            $role_id = $role;

            if ($role === "admin") {
                $account_data["is_admin"] = 1;
                $account_data["role_id"] = 0;
            } else {
                $account_data["is_admin"] = 0;
                $account_data["role_id"] = $role_id;
            }

            $account_data['disable_login'] = $this->input->post('disable_login');
            $account_data['status'] = $this->input->post('status') === "inactive" ? "inactive" : "active";
        }

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
        $this->update_only_allowed_members($user_id);

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

    //show projects list of a team member
    function projects_info($user_id) {
        if ($user_id) {
            $view_data['user_id'] = $user_id;
            $view_data["custom_field_headers"] = $this->Custom_fields_model->get_custom_field_headers_for_table("orders", $this->login_user->is_admin, $this->login_user->user_type);
            $this->load->view("merchant/projects_info", $view_data);
        }
    }
	
	//show cash list of a team member
    function cash_info($user_id) {
       // if ($user_id) {
            $view_data['user_id'] = $user_id;
            //$view_data["custom_field_headers"] = $this->Custom_fields_model->get_custom_field_headers_for_table("orders", $this->login_user->is_admin, $this->login_user->user_type);
            $this->load->view("merchant/cash_info", $view_data);
        //}
    }
	function contract($user_id = 0) {
       // if ($user_id) {
            $view_data['user_id'] = $user_id;
            $this->load->view("merchant/contract", $view_data);
        //}
    }
	function credit_info($user_id) {
        if ($user_id) {
            $view_data['user_id'] = $user_id;
            $view_data["custom_field_headers"] = $this->Custom_fields_model->get_custom_field_headers_for_table("orders", $this->login_user->is_admin, $this->login_user->user_type);
            $this->load->view("merchant/credit_info", $view_data);
        }
    }
	function terminals_info($user_id) {
        if ($user_id) {
            $view_data['user_id'] = $user_id;
            $view_data["custom_field_headers"] = $this->Custom_fields_model->get_custom_field_headers_for_table("orders", $this->login_user->is_admin, $this->login_user->user_type);
            $this->load->view("merchant/terminals_info", $view_data);
        }
    }
	function product_info($user_id) {
        if ($user_id) {
            $view_data['user_id'] = $user_id;
            $view_data["custom_field_headers"] = $this->Custom_fields_model->get_custom_field_headers_for_table("orders", $this->login_user->is_admin, $this->login_user->user_type);
            $this->load->view("merchant/product_info", $view_data);
        }
    }
	function store_product($user_id) {
        if ($user_id) {
            $view_data['user_id'] = $user_id;
            $view_data["custom_field_headers"] = $this->Custom_fields_model->get_custom_field_headers_for_table("orders", $this->login_user->is_admin, $this->login_user->user_type);
            $this->load->view("merchant/store_product", $view_data);
        }
    }

    public function broker() {

        $this->template->rander("merchant/broker");
    }
	public function agent() {

        $this->template->rander("merchant/agent");
    }
    
	function broker_list() {
        $options = array(
            "status" => $this->input->post("status"),
            "user_type" => "merchant",
			"broker_id" => $this->login_user->user_key,
        );
        $list_data = $this->Users_model->get_broker_merchant($options)->result();
        $result = array();
        foreach ($list_data as $data) {
            $result[] = $this->_make_row_broker($data);
        }
        echo json_encode(array("data" => $result));
    }
	function agent_list() {
        /*$options = array(
            "status" => $this->input->post("status"),
            "user_type" => "merchant",
			"broker_id" => $this->login_user->user_key,
        );
        $list_data = $this->Users_model->get_agent_merchant($options)->result();
        $result = array();
        foreach ($list_data as $data) {
            $result[] = $this->_make_row_broker($data);
        }
        echo json_encode(array("data" => $result));*/
		$custom_fields = '';//$this->Custom_fields_model->get_available_fields_for_table("team_members", $this->login_user->is_admin, $this->login_user->user_type);
        $options = array(
            "status" => $this->input->post("status"),
            "user_type" => "merchant",
            "club_name" => $club_name ? $club_name : $this->login_user->club_name,
            "custom_fields" => $custom_fields,
			"broker_id" => $this->login_user->user_key,
        );
        

        $list_data = $this->Users_model->get_agent_merchant($options)->result();
        $result = array();
        foreach ($list_data as $data) {
            $result[] = $this->_make_row($data, $custom_fields);
        }
        echo json_encode(array("data" => $result));
    }
    private function _make_row_broker($data) {
        $row_data = array(
			$data->id,
			$data->first_name.' '.$data->last_name,
			$data->contract_date,
			$data->contract_time,
            //$data->job_title,
            //$data->state,
            //$data->city,
            //$data->percent,
            //$status
        );
        return $row_data;
    }

	function modal_form_broker() {
        validate_submitted_data(array(
            "id" => "numeric"
        ));

        $view_data['role_dropdown'] = $this->_get_roles_dropdown();

        $id = $this->input->post('id');
        $options = array(
            "id" => $id,
        );

        $view_data['model_info'] = $this->Users_model->get_details($options)->row();

        $view_data["custom_fields"] = $this->Custom_fields_model->get_combined_details("team_members", 0, $this->login_user->is_admin, $this->login_user->user_type)->result();

        $this->load->view('merchant/modal_form_broker', $view_data);
    }
	function add_broker_merchant() {
        //check duplicate email address, if found then show an error message
        if ($this->Users_model->is_email_exists($this->input->post('email'))) {
            echo json_encode(array("success" => false, 'message' => lang('duplicate_email')));
            exit();
        }

        validate_submitted_data(array(
            "email" => "required|valid_email",
            "first_name" => "required",
            "last_name" => "required",
            "job_title" => "required",
            "role" => "required"
        ));

        $user_data = array(
            "email" => $this->input->post('email'),
            "password" => md5($this->input->post('password')),
            "first_name" => $this->input->post('first_name'),
            "last_name" => $this->input->post('last_name'),
            "melli_code" => $this->input->post('melli_code'),
            "state" => $this->input->post('state'),
            "city" => $this->input->post('city'),
            "psp" => $this->input->post('role'),
            "psp_code" => $this->input->post('psp_code'),
            "psp_category" => $this->input->post('psp_category'),
            "off_bank" => $this->input->post('off_bank'),
            "off_no_bank" => $this->input->post('off_no_bank'),
            "point" => $this->input->post('point'),
            "porsant" => $this->input->post('porsant'),
            "is_admin" => $this->input->post('is_admin'),
            "address" => $this->input->post('address'),
            "phone" => $this->input->post('phone'),
            "job_title" => $this->input->post('job_title'),
            "phone" => $this->input->post('phone'),
            "gender" => $this->input->post('gender'),
            "lat" => $this->input->post('lat'),
            "long" => $this->input->post('long'),
            "user_type" => "merchant"
            //"created_at" => get_current_utc_time()
        );

        //make role id or admin permission 
        $role = $this->input->post('role');
        $role_id = $role;

        if ($role === "admin") {
            $user_data["is_admin"] = 1;
            $user_data["role_id"] = 0;
        } else {
            $user_data["is_admin"] = 0;
            $user_data["role_id"] = $role_id;
        }


        //add a new team member
        $user_id = $this->Users_model->save($user_data);
        if ($user_id) {
            //user added, now add the job info for the user
            /*$job_data = array(
                "user_id" => $user_id,
                "salary" => $this->input->post('salary') ? $this->input->post('salary') : 0,
                "salary_term" => $this->input->post('salary_term'),
                "date_of_hire" => $this->input->post('date_of_hire')
            );
            $this->Users_model->save_job_info($job_data);*/


            save_custom_fields("team_members", $user_id, $this->login_user->is_admin, $this->login_user->user_type);

            //send login details to user
            if ($this->input->post('email_login_details')) {

                //get the login details template
                $email_template = $this->Email_templates_model->get_final_template("login_info");

                $parser_data["SIGNATURE"] = $email_template->signature;
                $parser_data["USER_FIRST_NAME"] = $user_data["first_name"];
                $parser_data["USER_LAST_NAME"] = $user_data["last_name"];
                $parser_data["USER_LOGIN_EMAIL"] = $user_data["email"];
                $parser_data["USER_LOGIN_PASSWORD"] = $this->input->post('password');
                $parser_data["DASHBOARD_URL"] = base_url();

                $message = $this->parser->parse_string($email_template->message, $parser_data, TRUE);
                send_app_mail($this->input->post('email'), $email_template->subject, $message);
            }
        }

        if ($user_id) {
            echo json_encode(array("success" => true, "data" => $this->_row_data($user_id), 'id' => $user_id, 'message' => lang('record_saved')));
        } else {
            echo json_encode(array("success" => false, 'message' => lang('error_occurred')));
        }
    }


}