<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Rating extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model("Rating_model");
    }
    function index() {
        $view_data["categories"] = $this->Rating_model->get_details()->result();
        $this->template->rander("rating/index", $view_data);
    }
    //show add/edit category modal
    function modal_form() {
        validate_submitted_data(array(
            "id" => "numeric"
        ));
        $id = $this->input->post('id');
        $view_data['model_info'] = $this->Rating_model->get_one($id);
        $this->load->view('rating/modal_form', $view_data);
    }

    //save category
    function save_rating() {
		$id="";
        $data = array(
            "title" => $this->input->post('title'),
            "comment" => $this->input->post('comment'),
            "lowest_score" => $this->input->post('lowest_score'),
            "price_score" => $this->input->post('price_score'),
            "score_type" => $this->input->post('score_type'),
            "status" => $this->input->post('status'),
            "color" => $this->input->post('color')
        );
        $save_id = $this->Rating_model->save($data, $id);
        if ($save_id) {
            echo json_encode(array("success" => true, "data" => $this->row_data($save_id), 'id' => $save_id, 'message' => lang('record_saved')));
        } else {
            echo json_encode(array("success" => false, 'message' => lang('error_occurred')));
        }
    }
    //delete/undo a category 
    function delete_rating() {
        $this->access_only_allowed_members();

        validate_submitted_data(array(
            "id" => "required|numeric"
        ));

        $id = $this->input->post('id');
        if ($this->input->post('undo')) {
            if ($this->Rating_model->delete($id, true)) {
                echo json_encode(array("success" => true, "data" => $this->row_data($id), "message" => lang('record_undone')));
            } else {
                echo json_encode(array("success" => false, lang('error_occurred')));
            }
        } else {
            if ($this->Rating_model->delete($id)) {
                echo json_encode(array("success" => true, 'message' => lang('record_deleted')));
            } else {
                echo json_encode(array("success" => false, 'message' => lang('record_cannot_be_deleted')));
            }
        }
    }

    //prepare categories list data
    function list_rating() {
        //$this->access_only_allowed_members();

        $list_data = $this->Rating_model->get_details()->result();
        $result = array();
        foreach ($list_data as $data) {
            $result[] = $this->make_row($data);
        }
        echo json_encode(array("data" => $result));
    }

    //get a row of category row
    private function row_data($id) {
        $options = array("id" => $id);
        $data = $this->Rating_model->get_details($options)->row();
        return $this->make_row($data);
    }

    //make a row of category row
    private function make_row($data) {
		if($data->status==1){$active='فعال';}else{$active='غیرفعال';}
		if($data->score_type=='client'){$score_type='مشتری';}else{$score_type='مشتری';}
		/*if($data->score_type=='staff'){$score_type='مدیر سیستم';}else{$score_type='مدیر سیستم';}
		if($data->score_type=='agent'){$score_type='نماینده (باشگاه)';}else{$score_type='نماینده (باشگاه)';}
		if($data->score_type=='merchant'){$score_type='پذیرنده';}else{$score_type='پذیرنده';}
		if($data->score_type=='broker'){$score_type='بازاریاب';}else{$score_type='بازاریاب';}*/
        return array(
            $data->title,
            $data->lowest_score,
            $score_type,
            $active,
			anchor(get_uri("rating/modal_form/" . $data->type . "/" . $data->id), "<i class='fa fa-pencil'></i>", array("class" => "edit", "title" => lang('edit_article')))
             .js_anchor("<i class='fa fa-times fa-fw'></i>", array('title' => lang('delete_rating'), "class" => "delete", "data-id" => $data->id, "data-action-url" => get_uri("rating/delete_rating"), "data-action" => "delete"))
        );
    }  
}