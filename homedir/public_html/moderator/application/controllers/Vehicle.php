<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Vehicle extends MY_Controller {

    function __construct() {
        parent::__construct();
        //$this->access_only_admin();
        $this->load->model('Vehicle_model');
    }
    function index() {
        $this->template->rander("vehicle/index");
    }
	function thirdparty($type) {
	 $view_data['insure']='thirdparty';
	 $view_data['type']=$type;
     $this->template->rander("vehicle/index",$view_data);
    }
	function body($type) {
     $view_data['insure']='body';
     $view_data['type']=$type;
     $this->template->rander("vehicle/index",$view_data);
    }
    /* load team add/edit modal */
    function modal_form() {
        validate_submitted_data(array(
            "id" => "numeric"
        ));
        
        $team_members = $this->Users_model->get_all_where(array("deleted" => 0, "user_type" => "staff"))->result();
        $members_dropdown = array();

        foreach ($team_members as $team_member) {
            $members_dropdown[] = array("id" => $team_member->id, "text" => $team_member->first_name . " " . $team_member->last_name);
        }

        $view_data['members_dropdown'] = json_encode($members_dropdown);
        $view_data['model_info'] = $this->Vehicle_model->get_one($this->input->post('id'));
        $this->load->view('vehicle/modal_form', $view_data);
    }

    /* add/edit a team */

    function save() {

        validate_submitted_data(array(
            "title" => "required",
            "en_name" => "required"
        ));

        $id = $this->input->post('id');
        $data = array(
            "title" => $this->input->post('title'),
            "en_name" => $this->input->post('en_name'),
        );

        $save_id = $this->Vehicle_model->save($data , $id);
        
        if ($save_id) {
            echo json_encode(array("success" => true, "data" => $this->_row_data($save_id), 'id' => $save_id, 'message' => lang('record_saved')));
        } else {
            echo json_encode(array("success" => false, 'message' => lang('error_occurred')));
        }
    }

    /* delete/undo a team */

    function delete($id) {
        
        if ($this->Vehicle_model->db->delete($id)) {
            echo json_encode(array("success" => true, 'message' => lang('record_deleted')));
        } else {
            echo json_encode(array("success" => false, 'message' => lang('record_cannot_be_deleted')));
        }
        
    }

    /* list of team prepared for datatable */

    function list_data($insure,$type) {
		//$list_data = $this->Vehicle_model->db->get_where('car' , array('type'=>$type,'insure'=>$insure))->result();
		$list_data = $this->Vehicle_model->db->get_where('car' , " type LIKE '%$type%' AND insure='$insure' ")->result();
		$result = array();
		$i=1;
        foreach ($list_data as $data) {
            $result[] = $this->_make_row($data,$i);
			$i++;
        }
        echo json_encode(array("data" => $result));
    }

    private function _row_data($id) {
        $options = array("id" => $id);
        $data = $this->Vehicle_model->get_details($options);
        return $this->_make_row($data[0]);
    }

    /* prepare a row of team list table */

    private function _make_row($data,$i) {
	  if($data->type=='motor'){
	   $type="موتور سیکلت";	
	  }else if($data->type=='personal'){
	   $type="شخصی";
	  }else if($data->type=='personal,taxiin,taxiout,agancy'){
	   $type="شخصی , تاکسی درون شهری و برون شهری , آژانس";
	  }else if($data->type=='truck'){
	   $type="بارکش";
	  }else if($data->type=='autocar'){
	   $type="اتوکار";
	  }else{
	   $type="نامعلوم";	
	  }
	  if($data->status=='active'){
	   $status='<span style="color:#0c0">فعال است</span> | <a style="color:#f00" href='.get_uri("vehicle/changeState/".$data->id.'/'.$data->type).'>غیر فعال شود ؟</a>';
	  }else{
	   $status='<span style="color:#f00">غیر فعال است</span> | <a style="color:#0c0" href='.get_uri("vehicle/changeState/".$data->id.'/'.$data->type).'>فعال شود !</a>';	
	  }
      return array(
	    $i,
		$data->name,
		$type,
		$status
      );
    }
    function members_list() {
        $view_data['team_members'] = $this->Users_model->get_team_members($this->input->post('members'))->result();
        $this->load->view('vehicle/members_list', $view_data);
    }
    function changeState($id,$page){
		$status = $this->Vehicle_model->db->get_where('car' , array('id'=>$id))->row()->status;
		if($status == "deactive"){$status = "active";}else{$status = "deactive";}
		$this->Vehicle_model->db->where('id' , $id);
		$result = $this->Vehicle_model->db->update('car', array('status'=>$status));
		$message = $result ? "وضعیت تغییر  یافت." : "خطا در انجام عملیات";
		redirect('vehicle');
	}
}