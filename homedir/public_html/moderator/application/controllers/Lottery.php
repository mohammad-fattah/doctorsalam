<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Lottery extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model("Lottery_model");
		$this->load->model("Date_model");
    }

    //show help page
    function index() {
        $this->template->rander("lottery/index");
    }

    //show add/edit category modal
    function modal_form($type) {
        validate_submitted_data(array(
            "id" => "numeric"
        ));

        $id = $this->input->post('id');
        $view_data['model_info'] = $this->Lottery_model->get_one($id);
        $view_data['type'] = $type;
        $this->load->view('lottery/modal_form', $view_data);
    }

    //save category
    function save_lottery() {
        $data = array(
            "title" => $this->input->post('title'),
            "start_date" => $this->input->post('start_date'),
            "end_date" => $this->input->post('end_date'),
            "prize" => $this->input->post('prize'),
            "lowest_score" => $this->input->post('lowest_score'),
            "prize" => $this->input->post('url'),
            "status" => $this->input->post('status'),
        );
        $save_id = $this->Lottery_model->save($data);
        if ($save_id) {
            echo json_encode(array("success" => true, 'message' => lang('record_saved')));
        } else {
            echo json_encode(array("success" => false, 'message' => lang('error_occurred')));
        }
    }
    //delete/undo a category 
    function delete_category($id) {
        if ($this->input->post('undo')) {
            if ($this->Lottery_model->delete($id, true)) {
                echo json_encode(array("success" => true,"message" => lang('record_undone')));
            } else {
                echo json_encode(array("success" => false, lang('error_occurred')));
            }
        } else {
            if ($this->Lottery_model->delete($id)) {
                echo json_encode(array("success" => true, 'message' => lang('record_deleted')));
            } else {
                echo json_encode(array("success" => false, 'message' => lang('record_cannot_be_deleted')));
            }
        }
    }

    //prepare categories list data
    function list_data() {
        $list_data = $this->Lottery_model->db->get_where('lottery', array('deleted'=>'0'))->result();
        $result = array();
		$i=1;
        foreach ($list_data as $data) {
            $result[] = $this->_make_category_row($data,$i);
			$i++;
        }
        echo json_encode(array("data" => $result));
    }
    //make a row of category row
    private function _make_category_row($data,$i) {
		if($data->status==1){$active='فعال';}else{$active='غیرفعال';}
		/*$dd=explode('-',$data->start_date);
		$time=explode('-',$data->end_date);
		$start_date=$this->Date_model->gregorian_to_jalali($dd[0],$dd[1],$dd[2],'/');
		$end_date=$this->Date_model->gregorian_to_jalali($time[0],$time[1],$time[2],'/');*/
        return array(
		    $i,
            $data->title,
            $data->start_date,
            $data->end_date,
            $active,
            js_anchor("<i class='fa fa-times fa-fw'></i>", array('title' => lang('delete_category'), "class" => "delete", "data-id" => $data->id, "data-action-url" => get_uri("lottery/delete_category/".$data->id), "data-action" => "delete"))
        );
    }

}