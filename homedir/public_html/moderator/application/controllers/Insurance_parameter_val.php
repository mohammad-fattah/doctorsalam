<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Insurance_parameter_val extends MY_Controller {

    function __construct() {
        parent::__construct();
		$this->load->model('Insurance_cover_model');
    }

    public function index($type) {
		$view_data['type']=$type;
        $this->template->rander("insurance_parameter_val/index",$view_data);
    }

    function list_data($type) {
	    $list_data = $this->db->get_where('insurance_parameter_val' , array('status'=>'active','insurance_parameter'=>$type))->result();
        $result = array();
		$id=1;
        foreach ($list_data as $data) {
			$title_val='نیست';
			if($data->id_val > 0){
			 $title_val = $this->db->get_where('insurance_parameter_val' , array('status'=>'active','id'=>$data->id_val))->row()->title;
			}
			$result[] = $this->_make_row($data,$id,$title_val);
			$id++;
        }
        echo json_encode(array("data" => $result));
    }
	
	private function _make_row($data,$id,$title_val) {
		if($data->status=='active'){
		 $status='فعال';	
		}else{
		 $status='غیرفعال';	
		}
        $row_data = array(
		    $id,
			$data->title,
			$title_val,
			$data->orderby,
			$status,
			modal_anchor(get_uri("insurance_parameter_val/modal_form_price/".$type.'/'.$data->id), "<i class='fa fa-pencil'></i>", array("class" => "edit", "title" => lang('edit_category'), "data-post-id" => $data->id)).js_anchor("<i class='fa fa-times fa-fw'></i>", array('title' => lang('delete_category'), "class" => "delete", "data-id" => $data->id, "data-action-url" => get_uri("insurance_parameter_val/delete/".$data->id), "data-action" => "delete"))
        );
		
        return $row_data;
    }
	function modal_form_price($type,$id) {
		$view_data['staff_dropdown'] = $this->_get_staff_dropdown();
		$view_data['insurance_parameter_price_olv'] = $this->insurance_parameter_price_olv();
		$view_data['dependent'] = $this->dependent_dropdown($type);
		$view_data['company_dropdown'] = $this->_get_company_dropdown();

		$drop_down_default = array();
		$drop_down_default['*'] = '*';
		$drop_down_default['+'] = '+';
		$drop_down_default['/'] = '/';
		$drop_down_default['-'] = '-';
		$drop_down_default['%'] = '%';
		$view_data['per_value']=$drop_down_default;
		
		$drop_down_size = array();
		$drop_down_size['cash'] = 'نقد';
		$drop_down_size['percentage'] = 'درصد';
		$drop_down_size['formula'] = 'فرمول';
		$view_data['type_value']=$drop_down_size;

		if($id){
		 $view_data['model_info']=$this->db->get_where('insurance_parameter_price',array("id"=>$id))->row();
		 //$id=10;
		}
		$view_data['id']=$id;
        $this->load->view('insurance/modal_form_price', $view_data);
	}
	function insurance_parameter_price_olv(){
		$staff = $this->db->order_by('priority', 'ASC')->get_where('insurance_parameter_price',array("deleted"=>"0"))->result();
		$drop_down = array();
		$g=0;
		$drop_down[''] = ' - ندارد';
		foreach($staff as $agent){
			if($agent->priority !== $g){
			 $drop_down[$agent->id] = $agent->priority;
			 $g = $agent->priority;
			}
		}
		
		return $drop_down;
	}
    function _get_company_dropdown(){
		$companies = $this->db->get_where('company' , array('deleted'=>0))->result();
		$drop_down = array();
		foreach($companies as $company){
		  $drop_down[$company->en_name] = $company->name;
		}	
		return $drop_down;
	}
    function delete($id) {
        $this->db->where('id',$id);
		if ($this->db->update('insurance_parameter_val' , array('deleted'=>1))) {
			echo json_encode(array("success" => true, 'message' => lang('record_deleted')));
		} else {
			echo json_encode(array("success" => false, 'message' => lang('record_cannot_be_deleted')));
		}
	
    }
    function modal_form($type,$id) {

		$drop_down_size = array();
		$drop_down_size['8'] = 'بزرگ';
		$drop_down_size['4'] = 'کوچک';
		$view_data['id']=$id;
		$view_data['type']=$type;
		$view_data['size']=$drop_down_size;
		$view_data['dependent'] = $this->dependent_dropdown($type);
        $this->load->view('insurance/modal_form_parameter_val', $view_data);
	}
    function dependent_dropdown($type){
		$staff = $this->db->get_where('insurance_parameter_val',array("insurance"=>$type))->result();
		$drop_down = array();
		$drop_down[''] ='وابسته نیست';
		foreach($staff as $agent){
			$drop_down[$agent->id] = $agent->title;
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
    function add_parameter_val() {
        $cover_data = array(
            "title" => $this->input->post('title'),
			"orderby" => $this->input->post('orderby'),
            "insurance" => $this->input->post('type'),
            "insurance_parameter" => $this->input->post('id'),
            "id_val" => $this->input->post('id_val'),
        );
		echo json_encode(array("success" => true, 'message' => 'با موفقیت ثبت شد'));
        $result = $this->db->insert('insurance_parameter_val',$cover_data);
        
		/*$cover_data["deleted"] = 0;
		$saved_data = $this->db->get_where('insurance_parameter_val' , $cover_data)->row();*/
        
		/*if ($result) {
			echo json_encode(array("success" => true, 'message' => 'با موفقیت ثبت شد'));
        } else {
            echo json_encode(array("success" => false, 'message' => $user_id));
        }*/
    }
}