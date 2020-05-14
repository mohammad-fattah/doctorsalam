<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Specialty extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model("Specialty_model");
    }
    function index() {
        $this->template->rander("specialty/index");
    }
	public function insurance_type($type) {
		$view_data['type']=$type;
        $this->load->view("specialty/insurance_type",$view_data);
    }
	public function insurance_parameter($type) {
		$view_data['type']=$type;
        $this->load->view("specialty/insurance_parameter",$view_data);
    }
	public function insurance_parameter_val($type,$id) {
		$view_data['type']=$type;
		$view_data['id']=$id;
        $this->template->rander("specialty/insurance_parameter_val",$view_data);
    }
	public function insurance_payment($type) {
		$view_data['type']=$type;
        $this->load->view("specialty/insurance_payment",$view_data);
    }
	public function insurance_document($type) {
		$view_data['type']=$type;
        $this->load->view("specialty/insurance_document",$view_data);
    }
	public function insurance_parameter_price($type) {
		$view_data['type']=$type;
        $this->load->view("specialty/insurance_parameter_price",$view_data);
    }
	public function insurance_area($type) {
		$view_data['type']=$type;
        $this->load->view("specialty/insurance_area",$view_data);
    }
	public function insurance_price($staff_id) {
		$staff = $this->db->get_where('insurance' , array('site_link'=>$staff_id))->row();
		$view_data['insurance'] = $staff->name;
		$view_data['pic'] = $staff->pic;
		$view_data['staff_id'] = $staff_id;
        $this->load->view("specialty/insurance_price",$view_data);
    }
	//veiw
	function view($id) {
		$staff = $this->db->get_where('insurance' , array('site_link'=>$id))->row();
		$view_data['pic'] = $staff->pic;
		$view_data['id'] = $id;
        $this->template->rander("specialty/view",$view_data);
    }
    //show add/edit category modal
    function modal_form($type = '') {
        validate_submitted_data(array(
            "id" => "numeric"
        ));

        $id = $this->input->post('id');
        $view_data['model_info'] = $this->Specialty_model->get_one($id);
        $view_data['type'] = $type;
        $this->load->view('specialty/modal_form', $view_data);
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
		$staff = $this->db->get_where('insurance')->result();
		$drop_down = array();
		foreach($staff as $agent){
			$drop_down[$agent->site_link] = $agent->name;
		}
		
		return $drop_down;
	}
	function changeState($id){
		$status = $this->db->get_where('insurance' , array('id'=>$id))->row()->status;
		if($status == "0"){$status = "1";}else{$status = "0";}
		$this->db->where('id' , $id);
		$result = $this->db->update('insurance', array('status'=>$status));
		$message = $result ? "وضعیت تغییر  یافت." : "خطا در انجام عملیات";
		redirect('specialty');
	}
    function general_info($id) {
		$view_data['info'] = $this->db->get_where('insurance' , array('site_link'=>$id))->row();
        $this->load->view("specialty/general_info",$view_data);
    }
	function save_general_info($id) {
        validate_submitted_data(array(
            "name" => "required",
            "site_link" => "required"
        ));

        $user_data = array(
            "name" => $this->input->post('name'),
            "site_link" => $this->input->post('site_link'),
            "sort" => $this->input->post('sort'),
            "status" => $this->input->post('status'),
            "tab_message" => $this->input->post('tab_message'),
            "message" => $this->input->post('message'),
            "off_code" => $this->input->post('off_code'),
        );

        $user_info_updated = $this->Specialty_model->save($user_data, $id);

        if ($user_info_updated) {
            echo json_encode(array("success" => true, 'message' => lang('record_updated')));
        } else {
            echo json_encode(array("success" => false, 'message' => lang('error_occurred')));
        }
    }
	function save_profile_image($user_id = 0) {
        $profile_image = str_replace("~", ":", $this->input->post("profile_image"));

        if ($profile_image) {
            $profile_image = move_temp_file("avatar.png", get_setting("profile_image_path"), "", $profile_image);

            $image_data = array("pic" => '/moderator/files/profile_images/'.$profile_image);

			$this->db->where('site_link' , $user_id);
			$this->db->update('insurance', $image_data);
            echo json_encode(array("success" => true, 'message' => lang('profile_image_changed')));
        }

        //process the the file which has uploaded using manual file submit
        if ($_FILES) {
            $profile_image_file = get_array_value($_FILES, "profile_image_file");
            $image_file_name = get_array_value($profile_image_file, "tmp_name");
            if ($image_file_name) {
                $profile_image = move_temp_file("avatar.png", get_setting("profile_image_path"), "", $image_file_name);
                $image_data = array("pic" => '/moderator/files/profile_images/'.$profile_image);
                $this->Specialty_model->save($image_data, $user_id);
                echo json_encode(array("success" => true, 'message' => lang('profile_image_changed')));
            }
        }
    }
	
    //save category
    function save() {
        $data = array(
            "name" => $this->input->post('name'),
            "site_link" => $this->input->post('site_link'),
            "sort" => $this->input->post('sort'),
            "status" => $this->input->post('status'),
            "mainsub" => $this->input->post('mainsub'),
        );
		$save_id = $this->Specialty_model->insert($data);
        if ($save_id) {
            echo json_encode(array("success" => true, "data" => $this->_category_row_data($save_id), 'id' => $save_id, 'message' => lang('record_saved')));
        } else {
            echo json_encode(array("success" => false, 'message' => lang('error_occurred')));
        }
    } 
    function delete_category() {
        

        validate_submitted_data(array(
            "id" => "required|numeric"
        ));

        $id = $this->input->post('id');
        if ($this->input->post('undo')) {
            if ($this->Specialty_model->delete($id, true)) {
                echo json_encode(array("success" => true, "data" => $this->_category_row_data($id), "message" => lang('record_undone')));
            } else {
                echo json_encode(array("success" => false, lang('error_occurred')));
            }
        } else {
            if ($this->Specialty_model->delete($id)) {
                echo json_encode(array("success" => true, 'message' => lang('record_deleted')));
            } else {
                echo json_encode(array("success" => false, 'message' => lang('record_cannot_be_deleted')));
            }
        }
    }

    //prepare categories list data
    function company_list_data($type = 0) {
        $list_data = $this->Specialty_model->get_details()->result();
        $result = array();
        foreach ($list_data as $data) {
            $result[] = $this->_make_category_row($data);
        }
        echo json_encode(array("data" => $result));
    }
	
	//
	function policy_list_data($type = 0) {
        $list_data = $this->Specialty_model->get_policy()->result();
        $result = array();
		$id=0;
        foreach ($list_data as $data) {
		  $id++;
          $result[] = $this->_make_policy_row($data,$id);
        }
        echo json_encode(array("data" => $result));
    }
    //get a row of category row
    private function _category_row_data($id) {
        $options = array("id" => $id);
        $data = $this->Specialty_model->get_details($options)->row();
        return $this->_make_category_row($data);
    }

    //make a row of category row
    private function _make_category_row($data) {
		if($data->status=="1"){$status='فعال';}else{$status='غیرفعال';}
        return array(
            $data->name,
            $data->en_name,
            $status,
            $data->sort,
            modal_anchor(get_uri("specialty/category_modal_form/" . $data->type), "<i class='fa fa-pencil'></i>", array("class" => "edit", "title" => lang('edit_category'), "data-post-id" => $data->id))
            . js_anchor("<i class='fa fa-times fa-fw'></i>", array('title' => lang('delete_category'), "class" => "delete", "data-id" => $data->id, "data-action-url" => get_uri("help/delete_category"), "data-action" => "delete"))
        );
    }
	private function _make_policy_row($data,$id){
		if($data->status=='1'){
		 $status='فعال';
		 $btn='<a href='.get_uri("specialty/changeState/".$data->id).' title="غیرفعال شود" data-title="غیرفعال شود" ><i class="glyphicon glyphicon-trash" style="color:red;margin:0 auto;top:3px"></i></a>';
		}else{
		 $status='غیرفعال';
		 $btn='<a href='.get_uri("specialty/changeState/".$data->id).'><i class="glyphicon glyphicon-ok" style="color:green" title="فعال شود"></i></a>';
		}
		
        return array(
            $id,
			'<img src="'.$data->pic.'" style="width:40px" />',
            $data->name,
            $status,
            $data->mainsub,
			$btn.anchor(get_uri("specialty/view/" . $data->site_link), "<i class='fa fa-pencil'></i>", array("class" => "edit", "title" => lang('edit'))),
        );
    }
}