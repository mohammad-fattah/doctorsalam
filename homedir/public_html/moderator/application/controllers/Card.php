<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Card extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model("Card_model");
    }
    function index() {
        $this->template->rander("card/index");
    }
	function users($user_key) {
		$view_data["user_key"] = $user_key;
        //$this->template->rander("card/users",$view_data);
		$this->load->view("card/users", $view_data);
    }
	
    function add_card($user_key) {
		validate_submitted_data(array(
            "id" => "numeric"
        ));

		//$view_data["currency_dropdown"] = $this->get_currency_dropdown_select2_data();
		$view_data['banks_dropdown'] = $this->get_banks_dropdown();
        $view_data['model_info'] = $this->Card_model->get_one($id);
        $view_data['user_key'] = $user_key;
        $this->load->view('card/modal_form', $view_data);
    }
	function list_data($user_key) {

        $list_data = $this->Card_model->get_details(array('user_key'=>$user_key))->result();
        $result = array();
        foreach ($list_data as $data) {
            $result[] = $this->_make_category_row($data);
        }
        echo json_encode(array("data" => $result));
    }
	function get_banks_dropdown(){
		$banks = $this->Card_model->db->get('banks')->result();
		$dropdown = array();
		foreach($banks as $bank){
			$dropdown[$bank->name] = $bank->name;
		}
		return $dropdown;
	}
    private function _make_category_row($data) {
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
    function save_card() {
		$id="";
        $data = array(
            "card_user_name" => $this->input->post('card_user_name'),
            "card_name" => $this->input->post('card_name'),
            "card_number" => $this->input->post('card_number'),
            "status" => $this->input->post('status'),
            "user_key" => $this->login_user->user_key
        );
		$user_key = $this->login_user->user_key;
        $save_id = $this->Card_model->save($data, $id);
        if ($save_id) {
            echo json_encode(array("success" => true, "data" => $this->_category_row_data($user_key), 'id' => $save_id, 'message' => lang('record_saved')));
        } else {
            echo json_encode(array("success" => false, 'message' => lang('error_occurred')));
        }
    }
	 //delete/undo a category 
    function delete_card($id) {
		$user_key = $this->login_user->user_key;
        if ($this->input->post('undo')) {
            if ($this->Card_model->delete($id, true)) {
                echo json_encode(array("success" => true, "data" => $this->_category_row_data($user_key), "message" => lang('record_undone')));
            } else {
                echo json_encode(array("success" => false, lang('error_occurred')));
            }
        } else {
            if ($this->Card_model->deleted($id)) {
                echo json_encode(array("success" => true, 'message' => lang('record_deleted')));
            } else {
                echo json_encode(array("success" => false, 'message' => lang('record_cannot_be_deleted')));
            }
        }
    }

    //prepare categories list data
    function all_transaction($user_id) {
        $list_data = $this->Card_model->all_transaction($user_id)->result();
        $result = array();
        foreach ($list_data as $data) {
            $result[] = $this->_make_transaction_row($data);
        }
        echo json_encode(array("data" => $result));
    }
	function all_cash($type) {
        $list_data = $this->Card_model->cash($type)->result();
        $result = array();
        foreach ($list_data as $data) {
            $result[] = $this->_make_category_row($data);
        }
        echo json_encode(array("data" => $result));
    }
	function all_credit($type) {
        $list_data = $this->Card_model->credit($type)->result();
        $result = array();
        foreach ($list_data as $data) {
            $result[] = $this->_make_category_row($data);
        }
        echo json_encode(array("data" => $result));
    }

    //get a row of category row
    private function _category_row_data($user_key) {
        //$options = array("id" => $id);
        $data = $this->Card_model->all_transaction($user_key)->row();
        return $this->_make_transaction_row($data);
    }

	private function _make_transaction_row($data) {
		if($data->status=='active'){$type='<span style="color:#0ea20e;font-weight:bold">فعال</span>';}else{$type='<span style="color:#ff0e00;font-weight:bold">غیرفعال</span>';}
		if($data->send_to_psp=='1'){$status='<span style="color:#0ea20e;font-weight:bold">متصل به بانک</span>';}else{$status='<span style="color:#ff0e00;font-weight:bold">اتصال برقرار نیست</span>';}
		if($data->type=='bank'){$wallet_type='بانکی';}else{$wallet_type='اعتباری';}
		if($data->card_name==''){$card_bank='-----------';}else{$card_bank=$data->card_name;}
		if($data->card_number==''){$card_number='-----------';}else{$card_number=$data->card_number;}
		$d=explode(' ',$data->date);
        return array(
            $data->id,
            $d[0],
            $card_number,
            $card_bank,
            $type,
			$status,
			$wallet_type,
			js_anchor("<i class='fa fa-times fa-fw'></i>", array('title' => lang('delete_card'), "class" => "delete", "data-id" => $data->id, "data-action-url" => get_uri("card/delete_card/".$data->id), "data-action" => "delete"))
        );
    }

}