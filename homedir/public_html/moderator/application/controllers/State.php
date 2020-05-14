<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class State extends MY_Controller {
    function __construct() {
        parent::__construct();
    }
    function index() {
       $this->template->rander('state/index');
    }  
	function list_data($type) {
	    $list_data = $this->db->get_where('state' , array('deleted'=>0,'status'=>'active'))->result();
        $result = array();
		$id=1;
        foreach ($list_data as $data) {
            $result[] = $this->_make_row($data,$id,$type);
			$id++;
        }
        echo json_encode(array("data" => $result));
    }
	private function _make_row($data,$id,$type) {
        $status='غیر فعال';
		if($data->status =='active'){
		 $status='فعال';
		}
		$row_data = array(
		    $id,
			$data->title,
			$status,
			modal_anchor(get_uri("state/modal_form/".$type.'/'.$data->id), "<i class='fa fa-pencil'></i>", array("class" => "edit", "title" => lang('edit_category'), "data-post-id" => $data->id)).js_anchor("<i class='fa fa-times fa-fw'></i>", array('title' => lang('delete_category'), "class" => "delete", "data-id" => $data->id, "data-action-url" => get_uri("state/delete/".$data->id), "data-action" => "delete")).anchor(get_uri("state/city/".$data->id), "<i class='fa fa-plus'></i>", array("class" => "edit", "title" => "افزودن مقدار", "data-target" => "#tab-vehicle-info", "role" => "presentation"))
        );
		
        return $row_data;
    }
	function modal_form($type,$id = 0) {
		$drop_down_parameter_type = array();
		$view_data['parameter_type']=$drop_down_parameter_type;
		if($id){
		 $view_data['model_info']=$this->db->get_where('insurance_parameter',array("id"=>$id))->row();
		 //$id=10;
		}
		$view_data['id']=$id;
        $this->load->view('insurance/modal_form_parameter', $view_data);
	}
	public function city($id) {
		$view_data['id'] = $id;
        $this->template->rander("state/city",$view_data);
    }
	function list_data_city($id) {
	    $list_data = $this->db->get_where('city' , array('deleted'=>0,'state'=>$id))->result();
        $result = array();
		$id=1;
        foreach ($list_data as $data) {
            $result[] = $this->_make_row_city($data,$id,$type);
			$id++;
        }
        echo json_encode(array("data" => $result));
    }
	private function _make_row_city($data,$id,$type) {
        $status='غیر فعال';
		if($data->deleted =='0'){
		 $status='فعال';
		}
		$row_data = array(
		    $id,
			$data->name,
			$status,
			modal_anchor(get_uri("state/modal_form/".$type.'/'.$data->id), "<i class='fa fa-pencil'></i>", array("class" => "edit", "title" => lang('edit_category'), "data-post-id" => $data->id)).js_anchor("<i class='fa fa-times fa-fw'></i>", array('title' => lang('delete_category'), "class" => "delete", "data-id" => $data->id, "data-action-url" => get_uri("state/delete/".$data->id), "data-action" => "delete")).anchor(get_uri("state/city/".$data->id), "<i class='fa fa-plus'></i>", array("class" => "edit", "title" => "افزودن مقدار", "data-target" => "#tab-vehicle-info", "role" => "presentation"))
        );
		
        return $row_data;
    }
}