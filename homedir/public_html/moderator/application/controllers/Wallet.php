<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Wallet extends MY_Controller {

    function __construct() {
        parent::__construct();
        //$this->init_permission_checker("help_and_knowledge_base");
        
        $this->load->model("Wallet_model");
        $this->load->model("Help_articles_model");
    }

    //show help page
    function index() {
        //$this->check_module_availability("module_help");

        $type = "help";

        $view_data["categories"] = $this->Wallet_model->get_details(array("type" => $type, "only_active_categories" => true))->result();
        $view_data["type"] = $type;
        $this->template->rander("wallet/index", $view_data);
    }
	function cash() {
        $this->check_module_availability("module_help");

        $type = "help";

        $view_data["categories"] = $this->Wallet_model->get_details(array("type" => $type, "only_active_categories" => true))->result();
        $view_data["type"] = $type;
        $this->template->rander("wallet/cash", $view_data);
    }
	function credit() {
        $this->check_module_availability("module_help");

        $type = "help";

        $view_data["categories"] = $this->Wallet_model->get_details(array("type" => $type, "only_active_categories" => true))->result();
        $view_data["type"] = $type;
        $this->template->rander("wallet/credit", $view_data);
    }
	function charge() {
        $view_data["extant"] = $this->Wallet_model->get_extant_cash($this->login_user->user_key)->result();
        $this->template->rander("wallet/charge", $view_data);
    }
	function charge_credit() {
        $view_data["extant"] = $this->Wallet_model->get_extant_credit_cash($this->login_user->user_key)->result();
        $this->template->rander("wallet/charge_credit", $view_data);
    }
	function clearing() {
        $view_data["extant"] = $this->Wallet_model->get_extant_cash($this->login_user->user_key)->result();
        $this->template->rander("wallet/clearing", $view_data);
    }
	function transfer() {
        $view_data["extant"] = $this->Wallet_model->get_extant_cash($this->login_user->user_key)->result();
        $this->template->rander("wallet/transfer", $view_data);
    }
    
    //show add/edit category modal
    function category_modal_form($type) {
        $this->access_only_allowed_members();

        validate_submitted_data(array(
            "id" => "numeric"
        ));

        $id = $this->input->post('id');
        $view_data['model_info'] = $this->Wallet_model->get_one($id);
        $view_data['type'] = $type;
        $this->load->view('wallet/categories/modal_form', $view_data);
    }

    //save category
    function save_category() {
        $this->access_only_allowed_members();
		$id="";
        $data = array(
            "title" => $this->input->post('title'),
            "start_date" => $this->input->post('start_date'),
            "end_date" => $this->input->post('end_date'),
            "lottery_date" => $this->input->post('lottery_date'),
            "prize" => $this->input->post('prize'),
            "comment" => $this->input->post('comment'),
            "lowest_score" => $this->input->post('lowest_score'),
            "status" => $this->input->post('status')
        );
        $save_id = $this->Wallet_model->save($data, $id);
        if ($save_id) {
            echo json_encode(array("success" => true, "data" => $this->_category_row_data($save_id), 'id' => $save_id, 'message' => lang('record_saved')));
        } else {
            echo json_encode(array("success" => false, 'message' => lang('error_occurred')));
        }
    }
	function add_charge() {
        //$this->access_only_allowed_members();
		$factor=rand(10000,1000000000);
        $data = array(
            "username" => $this->login_user->user_key,
            "date" => date('Y-m-d H:i:s'),
            "for" => $this->input->post('for'),
            "amount" => $this->input->post('price'),
            "type" => 'plus',
            "status" => 'deactive',
            "factor" => $factor,
        );
        $save_id = $this->Wallet_model->add_new_charge($data);
		//redirect('wallet/charge');
		redirect('bank/payment.php?price='.$this->input->post('price').'&factor='.$factor);
    }
	function result_transaction($factor,$status,$msg,$price){
        $data = array(
            "username" => $this->login_user->user_key,
            "msg" => $msg,
            "status" => $status,
            "factor" => $factor,
            "price" => $price,
        );
        $save_id = $this->Wallet_model->result_transaction($data);
		redirect('wallet/charge');	
	}
	function add_credit_charge() {
        //$this->access_only_allowed_members();
        $data = array(
            "username" => $this->login_user->user_key,
            "date" => date('Y-m-d H:i:s'),
            "for" => $this->input->post('for'),
            "amount" => $this->input->post('price'),
            "type" => 'plus',
            "status" => 'deactive',
            "wallet_type" => 'credit'
        );
        $save_id = $this->Wallet_model->add_new_credit_charge($data);
		redirect('wallet/charge_credit');
    }
	function minus_charge() {
        //$this->access_only_allowed_members();
        $data = array(
            "username" => $this->login_user->user_key,
            "date" => date('Y-m-d H:i:s'),
            "for" => $this->input->post('for'),
            "amount" => $this->input->post('price'),
            "type" => 'minus',
            "status" => 'active'
        );
        $save_id = $this->Wallet_model->clearing_new_charge($data);
		redirect('wallet/clearing');
    }
    //delete/undo a category 
    function delete_category() {
        $this->access_only_allowed_members();

        validate_submitted_data(array(
            "id" => "required|numeric"
        ));

        $id = $this->input->post('id');
        if ($this->input->post('undo')) {
            if ($this->Wallet_model->delete($id, true)) {
                echo json_encode(array("success" => true, "data" => $this->_category_row_data($id), "message" => lang('record_undone')));
            } else {
                echo json_encode(array("success" => false, lang('error_occurred')));
            }
        } else {
            if ($this->Wallet_model->delete($id)) {
                echo json_encode(array("success" => true, 'message' => lang('record_deleted')));
            } else {
                echo json_encode(array("success" => false, 'message' => lang('record_cannot_be_deleted')));
            }
        }
    }

    //prepare categories list data
    function all_transaction($user_id) {
        //$this->access_only_allowed_members();

        $list_data = $this->Wallet_model->all_transaction($user_id)->result();
        $result = array();
        foreach ($list_data as $data) {
            $result[] = $this->_make_transaction_row($data);
        }
        echo json_encode(array("data" => $result));
    }
	function all_cash($type) {
        $this->access_only_allowed_members();

        $list_data = $this->Wallet_model->cash($type)->result();
        $result = array();
        foreach ($list_data as $data) {
            $result[] = $this->_make_category_row($data);
        }
        echo json_encode(array("data" => $result));
    }
	function all_credit($type) {
        $this->access_only_allowed_members();

        $list_data = $this->Wallet_model->credit($type)->result();
        $result = array();
        foreach ($list_data as $data) {
            $result[] = $this->_make_category_row($data);
        }
        echo json_encode(array("data" => $result));
    }

    //get a row of category row
    private function _category_row_data($id) {
        $options = array("id" => $id);
        $data = $this->Wallet_model->get_details($options)->row();
        return $this->_make_category_row($data);
    }

    //make a row of category row
    private function _make_category_row($data) {
		if($data->status==1){$active='فعال';}else{$active='غیرفعال';}
		$price=$data->price ? to_currency($data->price, $data->currency_symbol) : "-";
        return array(
            $data->title,
            $data->start_date,
            $price,
            $data->merchant,
            $active,
             js_anchor("<i class='fa fa-times fa-fw'></i>", array('title' => lang('delete_category'), "class" => "delete", "data-id" => $data->id, "data-action-url" => get_uri("help/delete_category"), "data-action" => "delete"))
        );
    }

	private function _make_transaction_row1($data) {
		if($data->status==1){$active='فعال';}else{$active='غیرفعال';}
		if($data->wallet_type=='cash'){$wallet_type='نقدی';}else{$wallet_type='اعتباری';}
		$price=$data->price ? to_currency($data->price, $data->currency_symbol) : "-";
		$off_bank=($data->price*$data->off_bank)/100;
		$off_bank=$off_bank ? to_currency($off_bank, $data->currency_symbol) : "-";
		$off_no_bank=($data->price*$data->off_no_bank)/100;
		$off_no_bank=$off_no_bank ? to_currency($off_no_bank, $data->currency_symbol) : "-";
        return array(
            $data->title,
            $data->start_date,
            $price,
			$off_bank,
			$off_no_bank,
            $data->merchant,
            $data->CashIinstallments,
            $data->wallet_type,
        );
    }
	function _make_transaction_row($data) {
		if($data->type=='plus'){$type='<span style="color:#0ea20e;font-weight:bold">افزایش</span>';}else{$type='<span style="color:#ff0e00;font-weight:bold">کاهش</span>';}
		if($data->status=='active'){$status='<span style="color:#0ea20e;font-weight:bold">انجام شده</span>';}else{$status='<span style="color:#ff0e00;font-weight:bold">در دست انجام</span>';}
		if($data->wallet_type=='cash'){$wallet_type='نقدی';}else{$wallet_type='اعتباری';}
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

    //show add/edit article form
    function article_form($type, $id = 0) {
        $this->access_only_allowed_members();

        $view_data['model_info'] = $this->Help_articles_model->get_one($id);
        $view_data['type'] = $type;
        $view_data['categories_dropdown'] = $this->Wallet_model->get_dropdown_list(array("title"), "id", array("type" => $type));
        $this->template->rander('wallet/articles/form', $view_data);
    }

}