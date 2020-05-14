<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sharing extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model("Sharing_model");
    }

    //show help page
    function index() {
        $this->check_module_availability("module_help");

        $type = "help";

        $view_data["categories"] = $this->Sharing_model->get_details(array("type" => $type, "only_active_categories" => true))->result();
        $view_data["type"] = $type;
        $this->template->rander("sharing/index", $view_data);
    }

    //show help category
    function category($id) {
        if (!$id || !is_numeric($id)) {
            show_404();
        }

        $category_info = $this->Sharing_model->get_one($id);
        if (!$category_info || !$category_info->id) {
            show_404();
        }

        $view_data['page_type'] = "articles_list_view";
        $view_data['type'] = $category_info->type;
        $view_data['selected_category_id'] = $category_info->id;
        $view_data['categories'] = $this->Sharing_model->get_details(array("type" => $category_info->type))->result();

        $view_data["articles"] = $this->Help_articles_model->get_articles_of_a_category($id)->result();
        $view_data["category_info"] = $category_info;

        $this->template->rander("sharing/articles/view_page", $view_data);
    }

    //show help articles list
    function categories() {
        //$this->access_only_allowed_members();

        $view_data["type"] = "help";
        $this->template->rander("sharing/categories/index", $view_data);
    }

    //show add/edit category modal
    function category_modal_form($type) {
        //$this->access_only_allowed_members();

        validate_submitted_data(array(
            "id" => "numeric"
        ));

        $id = $this->input->post('id');
        //$view_data['model_info'] = array("" => "-") + $this->Sharing_model->dropdown()->result();
		$leveler = $this->Sharing_model->dropdown()->result();
        $leveling = array();
        
        $view_data['model_info'] = $leveler;
		//$view_data['roles_dropdown'] = array("" => "-") + $this->Roles_model->dropdown()->result();
        $view_data['type'] = $type;
        $this->load->view('sharing/categories/modal_form', $view_data);
    }

    //save category
    function save_category() {
        //$this->access_only_allowed_members();
		$id="";
        $data = array(
            "level" => $this->input->post('level'),
            "percent" => $this->input->post('percent'),
            "customer" => $this->input->post('customer'),
            "club"=> $this->login_user->club_name,
            "status" => $this->input->post('status')
        );
        $save_id = $this->Sharing_model->save($data, $id);
        if ($save_id) {
            echo json_encode(array("success" => true, "data" => $this->_category_row_data($save_id), 'id' => $save_id, 'message' => lang('record_saved')));
        } else {
            echo json_encode(array("success" => false, 'message' => lang('error_occurred')));
        }
    }
    //delete/undo a category 
    function delete_category() {
        //$this->access_only_allowed_members();

        validate_submitted_data(array(
            "id" => "required|numeric"
        ));

        $id = $this->input->post('id');
        if ($this->input->post('undo')) {
            if ($this->Sharing_model->delete($id, true)) {
                echo json_encode(array("success" => true, "data" => $this->_category_row_data($id), "message" => lang('record_undone')));
            } else {
                echo json_encode(array("success" => false, lang('error_occurred')));
            }
        } else {
            if ($this->Sharing_model->delete($id)) {
                echo json_encode(array("success" => true, 'message' => lang('record_deleted')));
            } else {
                echo json_encode(array("success" => false, 'message' => lang('record_cannot_be_deleted')));
            }
        }
    }

    //prepare categories list data
    function categories_list_data($type) {
        //$this->access_only_allowed_members();

        $list_data = $this->Sharing_model->get_details($this->login_user->club_name)->result();
        $result = array();
        foreach ($list_data as $data) {
            $result[] = $this->_make_category_row($data);
        }
        echo json_encode(array("data" => $result));
    }

    //get a row of category row
    private function _category_row_data($id) {
        $options = array("id" => $id);
        $data = $this->Sharing_model->get_details($options)->row();
        return $this->_make_category_row($data);
    }

    //make a row of category row
    private function _make_category_row($data) {
		if($data->status==1){$active='فعال';}else{$active='غیرفعال';}
		if($data->customer=='club'){$score_type='باشگاه';}
		else if($data->customer=='sav'){$score_type='شرکت بیمیتک';}
		else if($data->customer=='agent'){$score_type='نماینده';}
		else if($data->customer=='psp'){$score_type='پی اس پی';}
		else if($data->customer=='broker'){$score_type='بازاریاب';}
        return array(
		    $data->level,
            $score_type,
            $data->percent,
            $active,
			anchor(get_uri("sharing/modal_form/" . $data->type . "/" . $data->id), "<i class='fa fa-pencil'></i>", array("class" => "edit", "title" => lang('edit_article')))
             .js_anchor("<i class='fa fa-times fa-fw'></i>", array('title' => lang('delete_category'), "class" => "delete", "data-id" => $data->id, "data-action-url" => get_uri("sharing/delete_category"), "data-action" => "delete"))
        );
    }

}