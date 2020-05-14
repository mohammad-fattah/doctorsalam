<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Insurance_payment extends MY_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index($type) {
		$view_data['type']=$type;
        $this->template->rander("insurance_payment/index",$view_data);
    }

    function list_data($type) {
	    $list_data = $this->db->get_where('insurance_payment' , array('deleted'=> '0','insurance'=>$type))->result();
        $result = array();
		$id=1;
        foreach ($list_data as $data) {
            $result[] = $this->_make_row($data,$id,$type);
			$id++;
        }
        echo json_encode(array("data" => $result));
    }
	
	private function _make_row($data,$id,$type) {
        $row_data = array(
		    $id,
            $data->insurance,
			$data->title,
			$data->company,
			modal_anchor(get_uri("insurance_payment/modal_form/".$type.'/'.$data->id), "<i class='fa fa-pencil'></i>", array("class" => "edit", "title" => lang('edit_category'), "data-post-id" => $data->id)).js_anchor("<i class='fa fa-times fa-fw'></i>", array('title' => lang('delete_category'), "class" => "delete", "data-id" => $data->id, "data-action-url" => get_uri("insurance_payment/delete/".$data->id), "data-action" => "delete"))
        );
        return $row_data;
    }
    function delete($id) {
        $this->db->where('insurance_payment',array("id"=>$id));
		if ($this->db->update('insurance_payment' , array('deleted'=>1))) {
			echo json_encode(array("success" => true, 'message' => lang('record_deleted')));
		} else {
			echo json_encode(array("success" => false, 'message' => lang('record_cannot_be_deleted')));
		}
	
    }
    function modal_form($type,$id) {
		$view_data['staff_dropdown'] = $this->_get_staff_dropdown();
		$view_data['dependent'] = $this->dependent_dropdown($type);
		$view_data['company_dropdown'] = $this->_get_company_dropdown();
		
		$drop_down_default = array();
		$drop_down_default['1'] = 'نقد';
		$drop_down_default['2'] = 'اقساط';
		$drop_down_default['3'] = 'بدون پرداخت';
		$view_data['default']=$drop_down_default;
		
		$drop_down_size = array();
		$drop_down_size['8'] = 'بزرگ';
		$drop_down_size['4'] = 'کوچک';
		$view_data['size']=$drop_down_size;

		$view_data['parameter_type']=$drop_down_parameter_type;
		if($id){
		 $view_data['model_info']=$this->db->get_where('insurance_payment',array("id"=>$id))->row();
		 //$id=10;
		}
		$view_data['id']=$id;
        $this->load->view('insurance/modal_form_payment', $view_data);
	}
    function _get_company_dropdown(){
		$companies = $this->db->get_where('company' , array('deleted'=>0))->result();
		$drop_down = array();
		foreach($companies as $company){
		  $drop_down[$company->en_name] = $company->name;
		}	
		return $drop_down;
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
		$staff = $this->db->get_where('insurance_payment',array("insurance"=>$type))->result();
		$drop_down = array();
		$drop_down[''] ='وابسته نیست';
		foreach($staff as $agent){
			$drop_down[$agent->id] = $agent->name;
		}
		
		return $drop_down;
	}
    function add_parameter() {
        $cover_data = array(
            "type" => $this->input->post('type'),
            "insurance" => $this->input->post('insurance'),
            "name" => $this->input->post('name'),
            "priority" => $this->input->post('priority'),
            "default" => $this->input->post('default'),
            "main_sub" => $this->input->post('main_sub'),
            "element_name" => $this->input->post('element_name'),
            "size" => $this->input->post('size'),
            "dependent" => $this->input->post('dependent'),
            "parameter_type" => $this->input->post('parameter_type'),
        );
		
        $result = $this->db->insert('insurance_payment',$cover_data);
        
		$cover_data["deleted"] = 0;
		$saved_data = $this->db->get_where('insurance_payment' , $cover_data)->row();
        
		if ($saved_data) {
            echo json_encode(array("success" => true, "data" => $this->_make_row($saved_data), 'id' => $saved_data->id, 'message' => lang('record_saved')));
			//echo json_encode(array("success" => true, 'message' => 'با موفقیت ثبت شد'));
        } else {
            echo json_encode(array("success" => false, 'message' => $user_id));
        }
    }
}