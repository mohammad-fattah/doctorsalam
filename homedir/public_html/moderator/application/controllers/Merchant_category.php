<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Merchant_category extends MY_Controller {

    function __construct() {
        parent::__construct();
        //$this->access_only_admin();
        $this->load->model('Merchant_category_model');
    }

    function index() {
        $this->template->rander("merchant_category/index");
    }

    /* load team add/edit modal */

    function modal_form() {
        validate_submitted_data(array(
            "id" => "numeric"
        ));
        
        $team_members = $this->Users_model->get_all_where(array("deleted" => 0, "user_type" => "staff"))->result();
        $members_dropdown = array();

        foreach ($team_members as $team_member) {
            $members_dropdown[] = array("id" => $team_member->id, "text" => $team_member->first_name . " " . $team_member->last_name);
        }

        $view_data['members_dropdown'] = json_encode($members_dropdown);
        $view_data['model_info'] = $this->Merchant_category_model->get_one($this->input->post('id'));
        $this->load->view('merchant_category/modal_form', $view_data);
    }

    /* add/edit a team */

    function save() {

        validate_submitted_data(array(
            "title" => "required",
            "en_name" => "required"
        ));

        $id = $this->input->post('id');
        $data = array(
            "title" => $this->input->post('title'),
            "en_name" => $this->input->post('en_name'),
			"club"=>$this->login_user->club_name,
        );

        $save_id = $this->Merchant_category_model->save($data , $id);
        
        if ($save_id) {
            echo json_encode(array("success" => true, "data" => $this->_row_data($save_id), 'id' => $save_id, 'message' => lang('record_saved')));
        } else {
            echo json_encode(array("success" => false, 'message' => lang('error_occurred')));
        }
    }

    /* delete/undo a team */

    function delete($id) {
        validate_submitted_data(array(
            "id" => "required|numeric"
        ));

            if ($this->Merchant_category_model->delete($id)) {
                echo json_encode(array("success" => true, 'message' => lang('record_deleted')));
            } else {
                echo json_encode(array("success" => false, 'message' => lang('record_cannot_be_deleted')));
            }
    }

    /* list of team prepared for datatable */

    function list_data() {
        $list_data = $this->Merchant_category_model->get_details(array("club" => $this->login_user->club_name));
        $result = array();
        foreach ($list_data as $data) {
            if(!$data->deleted)
                $result[] = $this->_make_row($data);
        }
        echo json_encode(array("data" => $result));
        
    }

    /* reaturn a row of team list table */

    private function _row_data($id) {
        $options = array("id" => $id);
        $data = $this->Merchant_category_model->get_details($options);
        return $this->_make_row($data[0]);
    }

    /* prepare a row of team list table */

    private function _make_row($data) {
        return array(
		    $data->title,
		    $data->en_name,
            modal_anchor(get_uri("merchant_category/modal_form"), "<i class='fa fa-pencil'></i>", array("class" => "edit", "title" => "ویرایش دسته", "data-post-id" => $data->id))
            . js_anchor("<i class='fa fa-times fa-fw'></i>", array('title' => lang('delete_team'), "class" => "delete", "data-id" => $data->id, "data-action-url" => get_uri("merchant_category/delete/".$data->id), "data-action" => "delete"))
        );
    }

    function members_list() {
        $view_data['team_members'] = $this->Users_model->get_team_members($this->input->post('members'))->result();
        $this->load->view('merchant_category/members_list', $view_data);
    }

}

/* End of file team.php */
/* Location: ./application/controllers/team.php */