<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Insurance_document extends MY_Controller {

    function __construct() {
        parent::__construct();
		$this->load->model('Insurance_cover_model');
    }

    public function index($type) {
		$view_data['type']=$type;
        $this->template->rander("insurance_document/index",$view_data);
    }

    function list_data($type) {
	    $list_data = $this->db->get_where('insurance_document' , array('deleted'=>0,'insurance'=>$type))->result();
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
		 $default='نیست';	
		}else{
		 $default='هست';	
		}
        $row_data = array(
		    $id,
            $data->type,
			$data->name,
			$data->priority,
			$data->size,
			$default,
			modal_anchor(get_uri("insurance_document/modal_form/".$type.'/'.$data->id), "<i class='fa fa-pencil'></i>", array("class" => "edit", "title" => lang('edit_category'), "data-post-id" => $data->id)).js_anchor("<i class='fa fa-times fa-fw'></i>", array('title' => lang('delete_category'), "class" => "delete", "data-id" => $data->id, "data-action-url" => get_uri("insurance_document/delete/".$data->id), "data-action" => "delete"))
        );
		
        return $row_data;
    }

	    //delete/undo a category 
    function delete($id) {
        $this->db->where('id',$id);
		if ($this->db->update('insurance_document' , array('deleted'=>1))) {
			echo json_encode(array("success" => true, 'message' => lang('record_deleted')));
		} else {
			echo json_encode(array("success" => false, 'message' => lang('record_cannot_be_deleted')));
		}
	
    }
    function modal_form($type,$id) {
		$view_data['staff_dropdown'] = $this->_get_staff_dropdown();
		$drop_down = array();
		$drop_down['select'] = 'دراپ دون لیست';
		$drop_down['text'] = 'نوشته';
		$drop_down['number'] = 'عددی';
		$drop_down['button'] = 'دکمه';
		$drop_down['datepicker'] = 'تقویم';
		$drop_down['switch'] = 'سوییچ';
		$view_data['insurance_document']=$drop_down;
		
		$drop_down_default = array();
		$drop_down_default['1'] = 'هست';
		$drop_down_default['0'] = 'نیست';
		$view_data['default']=$drop_down_default;
		
		$drop_down_size = array();
		$drop_down_size['8'] = 'بزرگ';
		$drop_down_size['4'] = 'کوچک';
		$drop_down_size['2'] = 'خیلی کوچک';
		$view_data['size']=$drop_down_size;
		
		if($id){
		 $view_data['model_info']=$this->db->get_where('insurance_document',array("id"=>$id))->row();
		 //$id=10;
		}
		$view_data['id']=$id;
        $this->load->view('insurance/modal_form_document', $view_data);
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
		$staff = $this->db->get_where('insurance_document',array("insurance"=>$type))->result();
		$drop_down = array();
		foreach($staff as $agent){
			$drop_down[$agent->id] = $agent->name;
		}
		
		return $drop_down;
	}
    function add_document() {
        $cover_data = array(
            "type" => $this->input->post('type'),
            "insurance" => $this->input->post('insurance'),
            "name" => $this->input->post('name'),
            "priority" => $this->input->post('priority'),
            "default" => $this->input->post('default'),
            "element_name" => $this->input->post('element_name'),
            "size" => $this->input->post('size'),
        );
		
        $result = $this->db->insert('insurance_document',$cover_data);
        
		$cover_data["deleted"] = 0;
		$saved_data = $this->db->get_where('insurance_document' , $cover_data)->row();
        
		if ($saved_data) {
            echo json_encode(array("success" => true, "data" => $this->_make_row($saved_data), 'id' => $saved_data->id, 'message' => lang('record_saved')));
			//echo json_encode(array("success" => true, 'message' => 'با موفقیت ثبت شد'));
        } else {
            echo json_encode(array("success" => false, 'message' => $user_id));
        }
    }
}