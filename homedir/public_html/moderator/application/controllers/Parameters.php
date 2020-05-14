<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Parameters extends MY_Controller {

    function __construct() {
        parent::__construct();
		$this->load->model('Parameters_model');
		$this->load->model('Insurance_cover_model');
    }
    function index() {
        $this->template->rander("parameters/index");
    }
	function vehicle_third() {
		$view_data['type'] = 'thirdparty';
		$view_data['name'] = 'وسایل نقلیه ثالث';
        $this->template->rander("parameters/index",$view_data);
    }
	function vehicle_body() {
		$view_data['type'] = 'body';
		$view_data['name'] = 'وسایل نقلیه بدنه';
        $this->template->rander("parameters/index",$view_data);
    }
	function area_third() {
		$view_data['type'] = 'thirdparty';
		$view_data['name'] = 'مناطق تحت پوشش ثالث';
        $this->template->rander("parameters/area",$view_data);
    }
	function area_body() {
		$view_data['type'] = 'body';
		$view_data['name'] = 'مناطق تحت پوشش بدنه';
        $this->template->rander("parameters/area",$view_data);
    }
	function area_fire() {
		$view_data['type'] = 'fire';
		$view_data['name'] = 'مناطق تحت پوشش آتش سوزی';
        $this->template->rander("parameters/area",$view_data);
    }
	function area_life() {
		$view_data['type'] = 'life';
		$view_data['name'] = 'مناطق تحت پوشش عمر';
        $this->template->rander("parameters/area",$view_data);
    }
	function modal_form_area($type) {
		$view_data['type'] = $type;
		$view_data['company_dropdown'] = $this->_get_company_dropdown();
		$this->load->view('parameters/modal_form_area', $view_data);
    }
	function save_state() {
		
		$id = $this->input->post('id');
		
        $price_data = array(
            "state" => $this->input->post('state'),
            "company_id" => $this->input->post('company_id'),
			"status" => $this->input->post('status'),
		);
		
		if($id){
			$result = $this->Insurance_cover_model->db->update('insure_area',$price_data);
			echo json_encode(array("success" => true,'message' => "با موفقیت ثبت شد.", 'id' => $id));
		}else{
			$result = $this->Insurance_cover_model->db->insert('insure_area',$price_data);
			echo json_encode(array("success" => true,'message' => "با موفقیت ثبت شد.", 'id' => $id));
		}
    }
	function _get_company_dropdown(){
		$companies = $this->Insurance_cover_model->db->get_where('company' , array('deleted'=>0))->result();
		$drop_down = array();
		foreach($companies as $company){
			$drop_down[$company->en_name] = $company->name;
		}
		
		return $drop_down;
	}
	function get_vehicle_type($type) {
		$view_data['type'] = $type;
		$list_data = $this->Parameters_model->get_vehicle_type($view_data);
        $result = array();
		$id=1;
        foreach ($list_data as $data) {
            $result[] = $this->_make_rowvehicle_type($data,$id,$type);
			$id++;
        }
        echo json_encode(array("data" => $result));
    }
	function get_area($type) {
		$view_data['type'] = $type;
		$list_data = $this->Parameters_model->get_area($view_data);
        $result = array();
		$id=1;
        foreach ($list_data as $data) {
            $result[] = $this->_make_area($data,$id);
			$id++;
        }
        echo json_encode(array("data" => $result));
    }
	function body() {
		$view_data['type'] = 'body';
		$view_data['name'] = 'بیمه بدنه';
        $this->template->rander("parameters/type",$view_data);
    }
	function fire() {
		$view_data['type'] = 'fire';
		$view_data['name'] = 'بیمه آتش سوزی';
        $this->template->rander("parameters/type",$view_data);
    }
	function life() {
		$view_data['type'] = 'life';
		$view_data['name'] = 'بیمه عمر';
        $this->template->rander("parameters/type",$view_data);
    }
	function health() {
		$view_data['type'] = 'health';
		$view_data['name'] = 'بیمه درمان';
        $this->template->rander("parameters/type",$view_data);
    }
	function travel() {
		$view_data['type'] = 'travel';
		$view_data['name'] = 'بیمه مسافرتی';
        $this->template->rander("parameters/type",$view_data);
    }
	function changeState($id,$page){
		$status = $this->Parameters_model->db->get_where('insure_area' , array('id'=>$id))->row()->status;
		if($status == "deactive"){$status = "active";}else{$status = "deactive";}
		$this->Parameters_model->db->where('id' , $id);
		$result = $this->Parameters_model->db->update('insure_area', array('status'=>$status));
		$message = $result ? "وضعیت تغییر  یافت." : "خطا در انجام عملیات";
		if($page=='thirdparty'){
		 redirect('parameters/area_third');
		}else if($page=='body'){
		 redirect('parameters/area_body');	
		}else if($page=='fire'){
		 redirect('parameters/area_fire');	
		}else if($page=='life'){
		 redirect('parameters/area_life');	
		}else if($page=='health'){
		 redirect('parameters/area_health');	
		}else if($page=='travel'){
		 redirect('parameters/area_travel');	
		}
	}
	function changeStateVehicle($id,$page){
		$status = $this->Parameters_model->db->get_where('insure_type' , array('id'=>$id))->row()->status;
		if($status == "deactive"){$status = "active";}else{$status = "deactive";}
		$this->Parameters_model->db->where('id' , $id);
		$result = $this->Parameters_model->db->update('insure_type', array('status'=>$status));
		$message = $result ? "وضعیت تغییر  یافت." : "خطا در انجام عملیات";
		if($page=='thirdparty'){
		 redirect('parameters/vehicle_third');
		}else if($page=='body'){
		 redirect('parameters/vehicle_body');	
		}
	}
	private function _make_rowvehicle_type($data,$id,$type) {
		if($data->status=='active'){
	   $status='<span style="color:#0c0">فعال است</span> | <a style="color:#f00" href='.get_uri("parameters/changeStateVehicle/".$data->id.'/'.$type).'>غیر فعال شود ؟</a>';
	  }else{
	   $status='<span style="color:#f00">غیر فعال است</span> | <a style="color:#0c0" href='.get_uri("parameters/changeStateVehicle/".$data->id.'/'.$type).'>فعال شود !</a>';	
	  }
        return array(
		    $id,
		    '<img src="'.$data->pic.'" style="height:40px" />',
		    $data->title,
		    $data->type,
		    $status,
			'<a style="color:#333;font-family:fontsans" href="../vehicle/'.$type.'/'.$data->type.'" class="">مشاهده جزییات <i class="fa fa-angle-double-right"></i></a>',
        );
    }
	private function _make_area($data,$id) {
		$status=$data->status =='active' ? 'فعال' : 'غیرفعال';
		if($data->insure_type =='thirdparty'):
		 $insure_type='شخص ثالث';
		elseif($data->insure_type =='body'):
		 $insure_type='بدنه';
		elseif($data->insure_type =='fire'):
		 $insure_type='آتش سوزی';
		elseif($data->insure_type =='life'):
		 $insure_type='عمر';
		elseif($data->insure_type =='travel'):
		 $insure_type='مسافرتی';
		elseif($data->insure_type =='health'):
		 $insure_type='درمان';
		endif;
		
		if($data->status=='active'){
		 $active='فعال';
		 $btn='<a href='.get_uri("parameters/changeState/".$data->id.'/'.$data->insure_type).' title="غیرفعال شود" data-title="غیرفعال شود" ><i class="glyphicon glyphicon-trash" style="color:red;margin:0 auto;top:3px"></i></a>';
		}else{
		 $active='غیرفعال';
		 $btn='<a href='.get_uri("parameters/changeState/".$data->id.'/'.$data->insure_type).'><i class="glyphicon glyphicon-ok" style="color:green" title="فعال شود"></i></a>';
		}
		
        return array(
		    $id,
		    $data->state,
		    $insure_type,
		    $data->company,
			$status,
			$btn
        );
    }
	function delete_area($id){
		
	}
}