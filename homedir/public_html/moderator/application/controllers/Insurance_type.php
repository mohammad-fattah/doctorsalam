<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Insurance_type extends MY_Controller {

    function __construct() {
        parent::__construct();
		$this->load->model('Insurance_cover_model');
    }

    public function index($type) {
		$view_data['type']=$type;
        $this->template->rander("insurance_type/index",$view_data);
    }

    function list_data($type) {
	    $list_data = $this->Insurance_cover_model->db->get_where('insurance_type' , array('deleted'=>0,'staff_id'=>$type))->result();
        $result = array();
		$id=1;
        foreach ($list_data as $data) {
            $result[] = $this->_make_row($data,$id);
			$id++;
        }
        echo json_encode(array("data" => $result));
    }
	
	private function _make_row($data,$id) {
        if($data->staff_id=='body'){
		  $insure_type='بدنه';
		}else if($data->staff_id=='thirdparty'){
		  $insure_type='شخص ثالث';
		}else if($data->staff_id=='fire'){
		  $insure_type='آتش سوزی';
		}else if($data->staff_id=='life'){
		  $insure_type='عمر';
		}else if($data->staff_id=='health'){
		  $insure_type='درمان';
		}else if($data->staff_id=='travel'){
		  $insure_type='مسافرتی';
		}
        $row_data = array(
		    $id,
			$insure_type,
            $data->type,
			$data->english_type,
			js_anchor("<i class='fa fa-times fa-fw'></i>", array('title' => lang('delete_category'), "class" => "delete", "data-id" => $data->id, "data-action-url" => get_uri("cover/delete/".$data->id), "data-action" => "delete"))
        );
		
        return $row_data;
    }

	    //delete/undo a category 
    function delete($id) {
        $this->Insurance_cover_model->db->where('id',$id);
		if ($this->Insurance_cover_model->db->update('insurance_type' , array('deleted'=>1))) {
			echo json_encode(array("success" => true, 'message' => lang('record_deleted')));
		} else {
			echo json_encode(array("success" => false, 'message' => lang('record_cannot_be_deleted')));
		}
	
    }


    /* open new member modal */

    function modal_form() {
        
		$view_data['staff_dropdown'] = $this->_get_staff_dropdown();

        $this->load->view('insurance_type/modal_form', $view_data);
    
	}

	function _get_staff_dropdown(){
		$staff = $this->Insurance_cover_model->db->get_where('insurance')->result();
		$drop_down = array();
		foreach($staff as $agent){
			$drop_down[$agent->site_link] = $agent->name;
		}
		
		return $drop_down;
	}

    /* save new member */

    function add_type() {
        $cover_data = array(
            "type" => $this->input->post('type'),
            "english_type" => $this->input->post('english_type'),
            "staff_id" => $this->input->post('staff_id'),
        );
		
        $result = $this->Insurance_cover_model->db->insert('insurance_type',$cover_data);
        
		$cover_data["deleted"] = 0;
		$saved_data = $this->Insurance_cover_model->db->get_where('insurance_type' , $cover_data)->row();
        
		if ($saved_data) {
            echo json_encode(array("success" => true, "data" => $this->_make_row($saved_data), 'id' => $saved_data->id, 'message' => lang('record_saved')));
        } else {
            echo json_encode(array("success" => false, 'message' => $user_id));
        }
    }


}

/* End of file team_member.php */
/* Location: ./application/controllers/team_member.php */