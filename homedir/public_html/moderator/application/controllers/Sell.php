<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sell extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model("Sell_model");
    }

    //show help page
    function index() {
        $this->check_module_availability("module_help");

        $type = "help";

        $view_data["categories"] = $this->Sell_model->get_details(array("type" => $type, "only_active_categories" => true))->result();
        $view_data["type"] = $type;
        $this->template->rander("sell/index", $view_data);
    }
	function cash() {
        $this->check_module_availability("module_help");

        $type = "help";

        $view_data["categories"] = $this->Sell_model->get_details(array("type" => $type, "only_active_categories" => true))->result();
        $view_data["type"] = $type;
        $this->template->rander("sell/cash", $view_data);
    }
	function credit() {
        $this->check_module_availability("module_help");

        $type = "help";

        $view_data["categories"] = $this->Sell_model->get_details(array("type" => $type, "only_active_categories" => true))->result();
        $view_data["type"] = $type;
        $this->template->rander("sell/credit", $view_data);
    }
     
	function client($user_id) {
        $this->template->rander("sell/client");	
    }
	function merchant($user_id) {
        $this->template->rander("sell/merchant");	
    }
	function client_cash_table($user_id) {
        $list_data = $this->Sell_model->get_client_cash($user_id)->result();
        $result = array();
        foreach ($list_data as $data) {
            $result[] = $this->_make_category_row($data);
        }
        echo json_encode(array("data" => $result));
    }
	function client_credit($user_id) {
        $this->template->rander("sell/client/credit");	
    }
	function client_credit_table($user_id) {
        $list_data = $this->Sell_model->get_client_credit($user_id)->result();
        $result = array();
        foreach ($list_data as $data) {
            $result[] = $this->_make_category_row($data);
        }
        echo json_encode(array("data" => $result));
    }

    //show add/edit category modal
    function category_modal_form($type) {
        $this->access_only_allowed_members();

        validate_submitted_data(array(
            "id" => "numeric"
        ));

        $id = $this->input->post('id');
        $view_data['model_info'] = $this->Sell_model->get_one($id);
        $view_data['type'] = $type;
        $this->load->view('sell/categories/modal_form', $view_data);
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
        $save_id = $this->Sell_model->save($data, $id);
        if ($save_id) {
            echo json_encode(array("success" => true, "data" => $this->_category_row_data($save_id), 'id' => $save_id, 'message' => lang('record_saved')));
        } else {
            echo json_encode(array("success" => false, 'message' => lang('error_occurred')));
        }
    }
    //delete/undo a category 
    function delete_category() {
        $this->access_only_allowed_members();

        validate_submitted_data(array(
            "id" => "required|numeric"
        ));

        $id = $this->input->post('id');
        if ($this->input->post('undo')) {
            if ($this->Sell_model->delete($id, true)) {
                echo json_encode(array("success" => true, "data" => $this->_category_row_data($id), "message" => lang('record_undone')));
            } else {
                echo json_encode(array("success" => false, lang('error_occurred')));
            }
        } else {
            if ($this->Sell_model->delete($id)) {
                echo json_encode(array("success" => true, 'message' => lang('record_deleted')));
            } else {
                echo json_encode(array("success" => false, 'message' => lang('record_cannot_be_deleted')));
            }
        }
    }

    //prepare categories list data
    function all_transaction($type) {
        $this->access_only_allowed_members();

        $list_data = $this->Sell_model->all_transaction($type)->result();
        $result = array();
        foreach ($list_data as $data) {
            $result[] = $this->_make_transaction_row($data);
        }
        echo json_encode(array("data" => $result));
    }
	function all_cash($type) {
        $this->access_only_allowed_members();

        $list_data = $this->Sell_model->cash($type)->result();
        $result = array();
        foreach ($list_data as $data) {
            $result[] = $this->_make_category_row($data);
        }
        echo json_encode(array("data" => $result));
    }
	function all_credit($type) {
        $this->access_only_allowed_members();

        $list_data = $this->Sell_model->credit($type)->result();
        $result = array();
        foreach ($list_data as $data) {
            $result[] = $this->_make_category_row($data);
        }
        echo json_encode(array("data" => $result));
    }

    //get a row of category row
    private function _category_row_data($id) {
        $options = array("id" => $id);
        $data = $this->Sell_model->get_details($options)->row();
        return $this->_make_category_row($data);
    }

    //make a row of category row
    private function _make_category_row($data) {
		$price=$data->price ? to_currency($data->price, $data->currency_symbol) : "-";
	    $date=explode(' ',$data->start_date);
        $statuses = array('open' => 'پرداخت نشده !' , 'payed'=>'پرداخت شده' , 'sent'=>'ارسال شده', 'delivered'=>'تحویل داده شد');
		
		$status = $statuses[$data->status];
		
		return array(
            $data->title,
			$data->merchant,
            $date[1].' - '.$date[0],
            number_format($data->price).' تومان',
            $data->CashIinstallments,
            $status,
            /*js_anchor("<i class='fa fa-times fa-fw'></i>", array('title' => lang('delete_category'), "class" => "delete", "data-id" => $data->id, "data-action-url" => get_uri("help/delete_category"), "data-action" => "delete"))*/
			modal_anchor(get_uri("sell/edit_status_modal_form/" . $data->id."/".$data->status), "<i class='fa fa-pencil'></i>", array("class" => "edit", "title" => "جزییات"))
        );
    }

	function edit_status_modal_form($id , $current_status){
		$view_data['id'] = $id;
		$view_data['current_status'] = $current_status;
		$view_data['statuses'] = array('open' => 'پرداخت نشده !' , 'payed'=>'پرداخت شده' , 'sent'=>'ارسال شده', 'delivered'=>'تحویل داده شد');
		$this->load->view('sell/client/edit_status_modal_form' , $view_data);
	}


	private function _make_transaction_row($data) {
		if($data->status==1){$active='فعال';}else{$active='غیرفعال';}
		$price=$data->price ? to_currency($data->price, $data->currency_symbol) : "-";
        return array(
            $data->title,
            $data->start_date,
            $price,
            $data->merchant,
            $data->CashIinstallments,
            js_anchor("<i class='fa fa-times fa-fw'></i>", array('title' => lang('delete_category'), "class" => "delete", "data-id" => $data->id, "data-action-url" => get_uri("help/delete_category"), "data-action" => "delete"))
        );
    }
	function change_status(){
		$id = $this->input->post('id');
		$status = $this->input->post('status');
		$this->Sell_model->db->where(array('id'=>$id));
		$result = $this->Sell_model->db->update("orders" , array('status'=>$status));
	
		if ($result) {
			$data = $this->Sell_model->get_where("orders", array('id'=>$id))->row();
            echo json_encode(array("success" => true, "data" => $this->_make_category_row($data), 'id' => $id, 'message' => lang('record_saved')));
        } else {
            echo json_encode(array("success" => false, 'message' => lang('error_occurred')));
        }
	}

}