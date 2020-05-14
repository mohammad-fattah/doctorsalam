<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Insurance_cover extends MY_Controller {

    function __construct() {
        parent::__construct();
		$this->load->model('Insurance_cover_model');
    }

    public function index($type) {
		$view_data['type']=$type;
        $this->template->rander("insurance_cover/index",$view_data);
    }

    function list_data($type) {
       
	    $list_data = $this->Insurance_cover_model->db->get_where('insurance_cover' , array('deleted'=>0,'staff_id'=>$type))->result();
        $result = array();
		$i=1;
        foreach ($list_data as $data) {
            $result[] = $this->_make_row($data,$i);
			$i++;
        }
        echo json_encode(array("data" => $result));
    }
	
	private function _make_row($data,$i) {
		
        if($data->type == 'percentage'){
		 $type = $data->value.$type.' درصد';	
		}else{
		 $type = number_format($data->value.$type).' تومان';
		}
        $row_data = array(
		    $i,
			$data->company,
			$data->insurance_cover,
            $type,
			modal_anchor(get_uri("insurance/insurance_cover_form/".$data->staff_id.'/'.$data->id), "<i class='fa fa-pencil'></i>", array("class" => "edit", "title" => lang('edit_category'), "data-post-id" => $data->id)).js_anchor("<i class='fa fa-times fa-fw'></i>", array('title' => lang('delete_category'), "class" => "delete", "data-id" => $data->id, "data-action-url" => get_uri("insurance_cover/delete/".$data->id), "data-action" => "delete"))
        );
		
        return $row_data;
    }

	    //delete/undo a category 
    function delete($id) {
        $this->Insurance_cover_model->db->where('id',$id);
		if ($this->Insurance_cover_model->db->update('insurance_cover' , array('deleted'=>1))) {
			echo json_encode(array("success" => true, 'message' => lang('record_deleted')));
		} else {
			echo json_encode(array("success" => false, 'message' => lang('record_cannot_be_deleted')));
		}
	
    }

    function modal_form() {
        
		$view_data['staff_dropdown'] = $this->_get_staff_dropdown();

        $this->load->view('insurance_cover/modal_form', $view_data);
    
	}

	function _get_staff_dropdown(){
		$staff = $this->Insurance_cover_model->db->get_where('insurance')->result();
		$drop_down = array();
		foreach($staff as $agent){
			$drop_down[$agent->site_link] = $agent->name;
		}
		
		return $drop_down;
	}

    function add_cover() {
        $cover_data = array(
            "insurance_cover" => $this->input->post('cover'),
            "staff_id" => $this->input->post('staff_id'),
            "value" => $this->input->post('percent'),
            "type" => "percentage",
        );
		
        $result = $this->Insurance_cover_model->db->insert('insurance_cover',$cover_data);
        
		$cover_data["deleted"] = 0;
		$saved_data = $this->Insurance_cover_model->db->get_where('insurance_cover' , $cover_data)->row();
        
		if ($saved_data) {
            echo json_encode(array("success" => true, "data" => $this->_make_row($saved_data), 'id' => $saved_data->id, 'message' => lang('record_saved')));
			//echo json_encode(array("success" => true, 'message' => 'با موفقیت ثبت شد'));
        } else {
            echo json_encode(array("success" => false, 'message' => $user_id));
        }
    }
}