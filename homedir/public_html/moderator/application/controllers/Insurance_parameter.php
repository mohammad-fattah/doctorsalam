<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Insurance_parameter extends MY_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index($type) {
		$view_data['type']=$type;
        $this->template->rander("sub_specialty/index",$view_data);
    }

    function list_data($type) {
	    $list_data = $this->db->get_where('sub_specialty' , array('deleted'=>0,'specialty'=>$type))->result();
        $result = array();
		$id=1;
        foreach ($list_data as $data) {
            $result[] = $this->_make_row($data,$id,$type);
			$id++;
        }
        echo json_encode(array("data" => $result));
    }
	
	private function _make_row($data,$id,$type) {
		if($data->default==0){
		 $default='ندارد';	
		}else{
		 $default='دارد';	
		}
		if($data->main_sub==0){
		 $main_sub='فرعی';	
		}else{
		 $main_sub='اصلی';	
		}
        $row_data = array(
		    $id,
			$data->name,
			$data->priority,
			$default,
			$main_sub,
			modal_anchor(get_uri("sub_specialty/modal_form/".$type.'/'.$data->id), "<i class='fa fa-pencil'></i>", array("class" => "edit", "title" => lang('edit_category'), "data-post-id" => $data->id)).js_anchor("<i class='fa fa-times fa-fw'></i>", array('title' => lang('delete_category'), "class" => "delete", "data-id" => $data->id, "data-action-url" => get_uri("sub_specialty/delete/".$data->id), "data-action" => "delete")).anchor(get_uri("insurance/sub_specialty_val/".$data->insurance.'/'.$data->id), "<i class='fa fa-plus'></i>", array("class" => "edit", "title" => "افزودن مقدار", "data-target" => "#tab-vehicle-info", "role" => "presentation"))
        );
		
        return $row_data;
    }

	    //delete/undo a category 
    function delete($id) {
        $this->db->where('id',$id);
		if ($this->db->update('sub_specialty' , array('deleted'=>1))) {
			echo json_encode(array("success" => true, 'message' => lang('record_deleted')));
		} else {
			echo json_encode(array("success" => false, 'message' => lang('record_cannot_be_deleted')));
		}
	
    }
    function modal_form($type,$id = 0) {
		if($id){
		 $view_data['model_info']=$this->db->get_where('sub_specialty',array("id"=>$id))->row();
		}
		$view_data['id']=$id;
		$view_data['specialty']=$type;
        $this->load->view('specialty/modal_form_parameter', $view_data);
	}

	function _get_staff_dropdown(){
		$staff = $this->db->get_where('insurance',array("status"=>"1"))->result();
		$drop_down = array();
		foreach($staff as $agent){
			$drop_down[$agent->site_link] = $agent->name;
		}
		
		return $drop_down;
	}
	function dependent_dropdown($type){
		$staff = $this->db->get_where('sub_specialty',array("specialty"=>$type))->result();
		$drop_down = array();
		$drop_down[''] ='وابسته نیست';
		foreach($staff as $agent){
			$drop_down[$agent->id] = $agent->name;
		}
		
		return $drop_down;
	}
    function add_parameter() {
        $cover_data = array(
            "specialty" => $this->input->post('specialty'),
            "name" => $this->input->post('name'),
            "element_name" => $this->input->post('element_name'),
        );
		
        $result = $this->db->insert('sub_specialty',$cover_data);
        
		$cover_data["deleted"] = 0;
		$saved_data = $this->db->get_where('sub_specialty' , $cover_data)->row();
        
		if ($saved_data) {
            echo json_encode(array("success" => true, "data" => $this->_make_row($saved_data), 'id' => $saved_data->id, 'message' => lang('record_saved')));
			//echo json_encode(array("success" => true, 'message' => 'با موفقیت ثبت شد'));
        } else {
            echo json_encode(array("success" => false, 'message' => $user_id));
        }
    }
}