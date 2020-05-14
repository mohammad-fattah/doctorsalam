<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User_cards extends MY_Controller {

    function __construct() {
        parent::__construct();
       // $this->access_only_team_members();
        //$this->init_permission_checker("user_cards");
        $this->load->model("User_cards_model");
        $this->load->model("Users_model");
        $this->load->model("Card_model");
		
    }

    //show help page
    function index($user_key) {
        $this->check_module_availability("module_help");
		$type = "help";

        $view_data["categories"] = $this->User_cards_model->get_details(array("type" => $type, "only_active_categories" => true))->result();
        $view_data["user_key"] = $user_key;
        $this->load->view("user_cards/index", $view_data);
    }
    //show article
    function view($id = 0) {
        if (!$id || !is_numeric($id)) {
            show_404();
        }

        $model_info = $this->Help_articles_model->get_details(array("id" => $id))->row();

        if (!$model_info) {
            show_404();
        }

        $this->Help_articles_model->increas_page_view($id);

        $view_data['selected_category_id'] = $model_info->category_id;
        $view_data['type'] = $model_info->type;
        $view_data['categories'] = $this->User_cards_model->get_details(array("type" => $model_info->type))->result();
        $view_data['page_type'] = "article_view";

        $view_data['article_info'] = $model_info;

        $this->template->rander('user_cards/articles/view_page', $view_data);
    }

    //show help category
    function category($id) {
        if (!$id || !is_numeric($id)) {
            show_404();
        }

        $category_info = $this->User_cards_model->get_one($id);
        if (!$category_info || !$category_info->id) {
            show_404();
        }

        $view_data['page_type'] = "articles_list_view";
        $view_data['type'] = $category_info->type;
        $view_data['selected_category_id'] = $category_info->id;
        $view_data['categories'] = $this->User_cards_model->get_details(array("type" => $category_info->type))->result();

        $view_data["articles"] = $this->Help_articles_model->get_articles_of_a_category($id)->result();
        $view_data["category_info"] = $category_info;

        $this->template->rander("user_cards/articles/view_page", $view_data);
    }
	
    //show help articles list
    function categories() {
        //$this->access_only_allowed_members();

        $view_data["type"] = "help";
        $this->template->rander("user_cards/categories/bank_index", $view_data);
    }

    //show add/edit category modal
    function category_modal_form($user_key) {
        //$this->access_only_allowed_members();

        validate_submitted_data(array(
            "id" => "numeric"
        ));

		$view_data["currency_dropdown"] = $this->get_currency_dropdown_select2_data();
		$view_data['banks_dropdown'] = $this->get_banks_dropdown();
        $view_data['model_info'] = $this->User_cards_model->get_one($id);
        $view_data['user_key'] = $user_key;
        $this->load->view('user_cards/modal_form', $view_data);
    }
	function get_banks_dropdown(){
		$banks = $this->Card_model->db->get('banks')->result();
		$dropdown = array();
		foreach($banks as $bank){
			$dropdown[$bank->name] = $bank->name;
		}
		return $dropdown;
	}
    function get_currency_dropdown_select2_data() {
        $currency = array(array("id" => "", "text" => "-"));
        $currency[] = array("id" => "1", "text" => "yek");
        $currency[] = array("id" => "2", "text" => "do");
        return $currency;
    }
    
    //save category
    function save_category() {
        
        //$this->access_only_allowed_members();
        
        $data = array(
            "card_name" => $this->input->post('card_name'),
            "card_number" => $this->input->post('card_number'),
            "status" => $this->input->post('status'),
            "id" => $this->input->post('id'),
            "user_key" => $this->input->post('user_key'),
        );
        
        $save_id = $this->User_cards_model->save($data);
        
        if ($save_id) {
            echo json_encode(array("success" => true, "data" => $this->_category_row_data($save_id), 'id' => $save_id, 'message' => lang('record_saved')));
        } else {
            echo json_encode(array("success" => false, 'message' => lang('error_occurred')));
        }
        
    }
    
    //delete/undo a category 
    function delete_category($id) {
        if ($this->User_cards_model->delete_card($id)) {
            echo json_encode(array("success" => true, 'message' => lang('record_deleted')));
        } else {
            echo json_encode(array("success" => false, 'message' => lang('record_cannot_be_deleted')));
        }
        
    }

    //prepare categories list data
    function categories_list_data($user_key) {
        //$this->access_only_allowed_members();

        $list_data = $this->User_cards_model->get_details(array('user_key'=>$user_key))->result();
        $result = array();
        foreach ($list_data as $data) {
            $result[] = $this->_make_category_row($data);
        }
        echo json_encode(array("data" => $result));
    }
	function client_list($type) {
        //$this->access_only_allowed_members();

        $list_data = $this->User_cards_model->get_client(array("type" => $type))->result();
        $result = array();
        foreach ($list_data as $data) {
            $result[] = $this->_make_category_row($data);
        }
        echo json_encode(array("data" => $result));
    }
	function client_bank_list($user_id) {
        //$this->access_only_allowed_members();

        $list_data = $this->User_cards_model->get_client_bank($user_id)->result();
        $result = array();
        foreach ($list_data as $data) {
            $result[] = $this->_make_category_row($data);
        }
        echo json_encode(array("data" => $result));
    }
	function client_credit_list($user_id) {
        //$this->access_only_allowed_members();

        $list_data = $this->User_cards_model->get_client_bank($user_id)->result();
        $result = array();
        foreach ($list_data as $data) {
            $result[] = $this->_make_category_row($data);
        }
        echo json_encode(array("data" => $result));
    }

    //get a row of category row
    private function _category_row_data($id) {
        $options = array("id" => $id);
        $data = $this->User_cards_model->get_details($options)->row();
        return $this->_make_category_row($data);
    }
    
    //make a row of category row
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
    function send_to_psp($card,$user_key) {
		//$id = $this->input->post('id');
        $options = array(
            "user_key" => $user_key,
        );
		$view_data['card']=$card;
        $view_data['model_info'] = $this->Users_model->get_details($options)->row();
        $this->load->view('user_cards/send_to_psp', $view_data);
    }
}

/* End of file help.php */
/* Location: ./application/controllers/help.php */