<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Report extends MY_Controller {

    function __construct() {
        parent::__construct();
		$this->init_permission_checker("can_view_merchant");
		$this->load->model("Report_model");
		$this->load->model("Date_model");
    }

	function index(){
		$this->template->rander('report/view');
	}

    function modal_form() {
        $this->load->view('village/modal_form');
    }

    function add_village() {
		
		if ($this->Village_model->statistical_code_exists($this->input->post('statistical_code'))) {
            echo json_encode(array("success" => false, 'message' => "روستا با این کد آماری قبلا ثبت شده است"));
            exit();
        }
		if ($this->Village_model->village_code_exists($this->input->post('village_code'))) {
            echo json_encode(array("success" => false, 'message' => "روستا با این کد روستایی قبلا ثبت شده است."));
            exit();
        }
		
        $village_data = array(
            "name" => $this->input->post('name'),
            "state" => $this->input->post('state'),
            "city" => $this->input->post('city'),
            "district" => $this->input->post('district'),
            "rural_district" => $this->input->post('rural_district'),
            "statistical_code" => $this->input->post('statistical_code'),
            "village_code" => $this->input->post('village_code'),
        );
        
		//add a new village
        $new_village = $this->Village_model->save($village_data);
        if ($new_village) {
            echo json_encode(array("success" => true, "data" => $this->_make_row($new_village), 'id' => $new_village->id, 'message' => lang('record_saved')));
        } else {
            echo json_encode(array("success" => false, 'message' => lang('error_occurred')));
        }
    }
/************terminal**********************/

	function terminal(){
		$this->load->view('report/terminal');
	}

/************discounts*********************/

	function discount(){
		$this->load->view('report/discount');
	}

/************shop*********************/

	function shop(){
		$this->load->view('report/shop');
	}

/************cards*********************/

	function cards(){
		$this->load->view('report/cards');
	}



/************sell_cash*********************/

    function sell_cash_list() {
		if($this->login_user->user_type=="client"){
			$user_key=$this->login_user->user_key;
			$list_data = $this->Report_model->get_all_cash($user_key);
		}else{
			$list_data = $this->Report_model->get_all_cash();
		}
        $result = array();
        foreach ($list_data as $data) {
            $result[] = $this->_make_row_sell_cash($data);
        }
        echo json_encode(array("data" => $result));
    }
	function merchant_cash_list($id=0) {
		if($id){
		 $user_key=$id;	
		}
	    else{
	     $user_key=$this->login_user->id;
		}
		$list_data = $this->Report_model->merchant_cash($user_key);
        $result = array();
        foreach ($list_data as $data) {
            $result[] = $this->_make_row_sell_cash($data);
        }
        echo json_encode(array("data" => $result));
    }

    private function _make_row_sell_cash($data) {
        $type = $data->type == "online" ? "آنلاین" : "حضوری";
		$user = $this->Report_model->get_user_data('user_key' , $data->user_key);
		$terminal = $this->Report_model->db->get_where('terminals' , array('id'=>$data->terminal))->row()->title;
		
		$dd=explode('-',$data->start_date);
		$time=explode(' ',$data->start_date);
		$sdate=$this->Date_model->gregorian_to_jalali($dd[0],$dd[1],$dd[2],'/');
		
		$row_data = array(
            $sdate,
			$user['name'],
			$user['phone'],
            $terminal,
            ($data->price/10).'  تومان',
            $data->title,
            $type,
			//modal_anchor(get_uri("report/register_notification/".$data->user_key), "<i class='fa fa-pencil'></i>", array("class" => "edit", "title" => "ایجاد نوتیفیکیشن مرتبط برای کاربر", "data-post-id" => $data->user_key))
        );
		
        return $row_data;
    }
	
	function sell_cash() {
		$this->load->view("report/sell_cash");
    }

/************sell_credit********************/

    function sell_credit_list() {
		$list_data = $this->Report_model->get_all_credit();
        $result = array();
        foreach ($list_data as $data) {
            $result[] = $this->_make_row_sell_credit($data);
        }
        echo json_encode(array("data" => $result));
    }

    private function _make_row_sell_credit($data) {
        $type = $data->type == "online" ? "آنلاین" : "حضوری";
		$user = $this->Report_model->get_user_data('user_key' , $data->user_key);
		$terminal = $this->Report_model->db->get_where('terminals' , array('id'=>$data->terminal))->row()->title;
		$row_data = array(
            $data->start_date,
			$user['name'],
			$user['phone'],
            $terminal,
            $data->price,
            $data->title,
            $type,
			modal_anchor(get_uri("report/register_notification/".$data->user_key), "<i class='fa fa-pencil'></i>", array("class" => "edit", "title" => "ایجاد نوتیفیکیشن مرتبط برای کاربر", "data-post-id" => $data->user_key))
        );
		
        return $row_data;
    }
	
	function sell_credit() {
		$this->load->view("report/sell_credit");
    }


/************request************************/

    function request_list() {
		$list_data = $this->Report_model->get_all_request();
        $result = array();
        foreach ($list_data as $data) {
            $result[] = $this->_make_row_request($data);
        }
        echo json_encode(array("data" => $result));
    }

    private function _make_row_request($data) {
		$user = $this->Report_model->get_user_data('user_key' , $data->username);
		$type = $data->wallet_type == "cash" ? "نقد" : "اعتباری" ;
		$row_data = array(
            $data->date,
			$user['name'],
			$user['phone'],
            $data->amount,
            $type,
			"<a href='".get_uri("report/confirm_request/".$data->id)."' calss='edit' title='موافقت با درخواست' ><i class='fa fa-check'></i></a>".
			"<a href='".get_uri("report/remove_request/".$data->id)."' calss='edit' title='مخالفت با درخواست' ><i class='fa fa-user-times'></i></a>"
        );
		
        return $row_data;
    }
	
	function request() {
		$this->load->view("report/request");
    }


/************transfer************************/

    function transfer_list() {
		$list_data = $this->Report_model->get_all_transfer();
        $result = array();
        foreach ($list_data as $data) {
            $result[] = $this->_make_row_transfer($data);
        }
        echo json_encode(array("data" => $result));
    }

    private function _make_row_transfer($data) {
		$user = $this->Report_model->get_user_data('user_key' , $data->username);
		$type = $data->type == "plus" ? "افرایش اعتبار" : "کاهش اعتبار";
		$related_user = $this->Report_model->get_user_data('user_key' ,
							$this->Report_model->db->get_where('wallet' , array('id'=>$data->transfer_id))->row()->username);
		$to_from = $data->type == "plus" ? "از" : "به";
		$to_from = $to_from." ".$related_user['name'];
		
		$row_data = array(
            $data->date,
			$user['name'],
			$user['phone'],
            $data->amount,
			$type,
			$to_from,
			modal_anchor(get_uri("report/register_notification/".$data->user_key), "<i class='fa fa-pencil'></i>", array("class" => "edit", "title" => "ایجاد نوتیفیکیشن مرتبط برای کاربر", "data-post-id" => $data->user_key))
        );
		
        return $row_data;
    }
	
	function transfer() {
		$this->load->view("report/transfer");
    }


/************charge************************/

    function charge_list() {
		$list_data = $this->Report_model->get_all_charge();
        $result = array();
        foreach ($list_data as $data) {
            $result[] = $this->_make_row_charge($data);
        }
        echo json_encode(array("data" => $result));
    }

    private function _make_row_charge($data) {
		$user = $this->Report_model->get_user_data('user_key' , $data->username);
		$row_data = array(
            $data->date,
			$user['name'],
			$user['phone'],
            $data->amount,
			modal_anchor(get_uri("report/register_notification/".$data->user_key), "<i class='fa fa-pencil'></i>", array("class" => "edit", "title" => "ایجاد نوتیفیکیشن مرتبط برای کاربر", "data-post-id" => $data->user_key))
        );
		
        return $row_data;
    }
	
	function charge() {
		$this->load->view("report/charge");
    }


}

