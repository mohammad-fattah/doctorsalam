<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Insurance_off extends MY_Controller {

    function __construct() {
        parent::__construct();
		$this->load->model('Insurance_off_model');
    }

    public function index($type) {
		$view_data['type']=$type;
        $this->template->rander("insurance_off/index",$view_data);
    }

    function list_data($type) {
       
	    $list_data = $this->Insurance_off_model->db->get_where('insurance_off' , array('deleted'=>0,'staff_id'=>$type))->result();
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
			$data->insurance_off,
            $type,
			$data->display =='yes' ? 'نمایش دارد' : 'نمایش ندارد',
			modal_anchor(get_uri("insurance_off/modal_form/".$data->staff_id.'/'.$data->id), "<i class='fa fa-pencil'></i>", array("class" => "edit", "title" => lang('edit_category'), "data-post-id" => $data->id)).js_anchor("<i class='fa fa-times fa-fw'></i>", array('title' => lang('delete_category'), "class" => "delete", "data-id" => $data->id, "data-action-url" => get_uri("insurance_off/delete/".$data->id), "data-action" => "delete"))
        );
		
        return $row_data;
		
    }

	    //delete/undo a category 
    function delete($id) {
        $this->Insurance_off_model->db->where('id',$id);
		if ($this->Insurance_off_model->db->update('insurance_off' , array('deleted'=>1))) {
			echo json_encode(array("success" => true, 'message' => lang('record_deleted')));
		} else {
			echo json_encode(array("success" => false, 'message' => lang('record_cannot_be_deleted')));
		}
	
    }


    /* open new member modal */

    function modal_form($type,$id) {
		/*$view_data['staff_dropdown'] = $this->_get_staff_dropdown();
        $this->load->view('insurance_off/modal_form', $view_data);*/
        $view_data['id'] = $id;
		$view_data['type'] = $type;
		$view_data['model_info'] = $this->Insurance_off_model->get_one($id);
		$view_data['staff_dropdown'] = $this->_get_staff_dropdown();
		$view_data['company_dropdown'] = $this->_get_company_dropdown();
        $this->load->view('insurance_off/modal_form', $view_data);
	}
    function _get_company_dropdown(){
		$companies = $this->Insurance_off_model->db->get_where('company' , array('deleted'=>0))->result();
		$drop_down = array();
		foreach($companies as $company){
		  $drop_down[$company->en_name] = $company->name;
		}	
		return $drop_down;
	}
	function _get_staff_dropdown(){
		$staff = $this->Insurance_off_model->db->get_where('insurance')->result();
		$drop_down = array();
		foreach($staff as $agent){
			$drop_down[$agent->site_link] = $agent->name;
		}
		
		return $drop_down;
	}

    /* save new member */

    function add_cover($type,$id) {
        $cover_data = array(
            "insurance_off" => $this->input->post('insurance_off'),
            "staff_id" => $type,
            "value" => $this->input->post('value'),
            "display" => $this->input->post('display'),
			"company" => $this->input->post('company'),
        );
		if($id){
		 $this->Insurance_off_model->db->where('id' , $id);
		 $this->Insurance_off_model->db->update('insurance_off',$cover_data);
         echo json_encode(array("success" => true, 'message' => lang('record_updated')));	
	    }else{
         $result = $this->Insurance_off_model->db->insert('insurance_off',$cover_data);
		 echo json_encode(array("success" => true, 'message' => lang('record_updated')));
		}
    }


}