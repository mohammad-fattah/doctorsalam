<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Off extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model("Off_categories_model");
		$this->load->model("Date_model");
    }

    //show help page
    function index() {
        $this->template->rander("off/index");
    }

    //show add/edit category modal
    function modal_form($type) {
        validate_submitted_data(array(
            "id" => "numeric"
        ));

        $id = $this->input->post('id');
		$view_data['staff_dropdown'] = $this->_get_staff_dropdown();
		$view_data['company_dropdown'] = $this->_get_company_dropdown();
        $view_data['model_info'] = $this->Off_categories_model->get_one($id);
        $view_data['type'] = $type;
        $this->load->view('off/modal_form', $view_data);
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
		$staff = $this->Off_categories_model->db->get_where('insurance')->result();
		$drop_down = array();
		foreach($staff as $agent){
			$drop_down[$agent->site_link] = $agent->name;
		}
		return $drop_down;
	}
    //save category
    function save_off() {
        $data = array(
            "code" => $this->input->post('code'),
            //"company" => $this->input->post('company'),
            "start_date" => $this->input->post('start_date'),
            "end_date" => $this->input->post('end_date'),
            "status" => $this->input->post('status'),
            "title" => $this->input->post('title'),
            "number" => $this->input->post('number'),
            "price" => $this->input->post('price'),
            "price_type" => $this->input->post('price_type'),
            "insurance" => $this->input->post('insurance'),
        );
        $save_id = $this->Off_categories_model->db->insert('off',$data);
        if ($save_id) {
            echo json_encode(array("success" => true,  'message' => lang('record_saved')));
        } else {
            echo json_encode(array("success" => false, 'message' => lang('error_occurred')));
        }
    }
    //delete/undo a category 
    function delete_category() {
        

        validate_submitted_data(array(
            "id" => "required|numeric"
        ));

        $id = $this->input->post('id');
        if ($this->input->post('undo')) {
            if ($this->Off_categories_model->delete($id, true)) {
                echo json_encode(array("success" => true, "data" => $this->row_data($id), "message" => lang('record_undone')));
            } else {
                echo json_encode(array("success" => false, lang('error_occurred')));
            }
        } else {
            if ($this->Off_categories_model->delete($id)) {
                echo json_encode(array("success" => true, 'message' => lang('record_deleted')));
            } else {
                echo json_encode(array("success" => false, 'message' => lang('record_cannot_be_deleted')));
            }
        }
    }

    //prepare categories list data
    function list_data($type) {
        $list_data = $this->Off_categories_model->get_details(array("type" => $type))->result();
        $result = array();
		$i=1;
        foreach ($list_data as $data) {
            $result[] = $this->_make_row($data,$i);
			$i++;
        }
        echo json_encode(array("data" => $result));
    }

    //get a row of category row
    private function row_data($id) {
        $options = array("id" => $id);
        $data = $this->Off_categories_model->get_details($options)->row();
        return $this->_make_row($data);
    }

    //make a row of category row
    private function _make_row($data,$i) {
		if($data->status==1){$active='فعال';}else{$active='غیرفعال';}
		
		$dd=explode('-',$data->start_date);
		$sdate=$this->Date_model->gregorian_to_jalali($dd[0],$dd[1],$dd[2],'/');
		
		$ddd=explode('-',$data->end_date);
		$edate=$this->Date_model->gregorian_to_jalali($dd[0],$dd[1],$dd[2],'/');
		
		if($data->insurance=='thirdparty'){
		 $insurance='شخص ثالث';
		}elseif($data->insurance=='body'){
		 $insurance='بدنه';	
		}elseif($data->insurance=='fire'){
		 $insurance='آتش سوزی';	
		}elseif($data->insurance=='life'){
		 $insurance='عمر';	
		}elseif($data->insurance=='health'){
		 $insurance='درمان';	
		}elseif($data->insurance=='pet'){
		 $insurance='حیوانات خانگی';	
		}
		
		if($data->status=='active'){
		 $active='فعال';
		 $btn='<a href='.get_uri("off/changeState/".$data->id).' title="غیرفعال شود" data-title="غیرفعال شود" ><i class="glyphicon glyphicon-trash" style="color:red;margin:0 auto;top:3px"></i></a>';
		}else{
		 $active='غیرفعال';
		 $btn='<a href='.get_uri("off/changeState/".$data->id).'><i class="glyphicon glyphicon-ok" style="color:green" title="فعال شود"></i></a>';
		}
		
        return array(
		    $i,
            'کد : '.$data->code.'<br />'.$data->title,
            $data->start_date,
            $data->end_date,
            $insurance,
            $data->number,
            $active,
            $btn
        );
    }
    function changeState($id){
		$status = $this->Off_categories_model->db->get_where('off' , array('id'=>$id))->row()->status;
		if($status == "deactive"){$status = "active";}else{$status = "deactive";}
		$this->Off_categories_model->db->where('id' , $id);
		$result = $this->Off_categories_model->db->update('off', array('status'=>$status));
		$message = $result ? "وضعیت تغییر  یافت." : "خطا در انجام عملیات";
		redirect('off');
	}
}