<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Company extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model("Company_model");
        $this->load->model("Settings_model");
    }
    function index() {
        $this->template->rander("company/index");
    }
    //show add/edit category modal
    function category_modal_form($type) {
        $id = $this->input->post('id');
        $view_data['model_info'] = $this->Company_model->get_one($id);
        $view_data['type'] = $type;
        $this->load->view('company/modal_form', $view_data);
    }

    //save category
    function save_category() {
        $id = $this->input->post('id');
        $data = array(
            "name" => $this->input->post('name'),
            "en_name" => $this->input->post('en_name'),
            "emtiaz" => $this->input->post('emtiaz'),
            "sayar" => $this->input->post('sayar'),
            "pasokh" => $this->input->post('pasokh'),
            "tavangari" => $this->input->post('tavangari'),
            "khesarat" => $this->input->post('khesarat'),
            "rezayat" => $this->input->post('rezayat'),
            "market" => $this->input->post('market'),
            "sort" => $this->input->post('sort'),
            
        );
		if($id){
		  $this->Company_model->db->where(array('id'=>$id));
		  $save_id = $this->db->update('company' , $data);
		}else{
		  echo $save_id = $this->db->insert('company' , $data);	
		}
        if ($save_id) {
            echo json_encode(array("success" => true, "data" => $this->_category_row_data($save_id), 'id' => $save_id, 'message' => lang('record_saved')));
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
            if ($this->Company_model->delete($id, true)) {
                echo json_encode(array("success" => true, "data" => $this->_category_row_data($id), "message" => lang('record_undone')));
            } else {
                echo json_encode(array("success" => false, lang('error_occurred')));
            }
        } else {
            if ($this->Company_model->delete($id)) {
                echo json_encode(array("success" => true, 'message' => lang('record_deleted')));
            } else {
                echo json_encode(array("success" => false, 'message' => lang('record_cannot_be_deleted')));
            }
        }
    }
	function active_company() {
        validate_submitted_data(array(
            "id" => "required|numeric"
        ));
        $id = $this->input->post('id');
        if ($this->input->post('undo')) {
            if ($this->Company_model->updated(array("deleted"=>"1","id"=>$id))) {
                echo json_encode(array("success" => true, "data" => $this->_category_row_data($id), "message" => lang('record_undone')));
            } else {
                echo json_encode(array("success" => false, lang('error_occurred')));
            }
        } else {
            if ($this->Company_model->updated(array("deleted"=>"0","id"=>$id))) {
                echo json_encode(array("success" => true, 'message' => lang('record_deleted')));
            } else {
                echo json_encode(array("success" => false, 'message' => lang('record_cannot_be_deleted')));
            }
        }
    }
    function general_info($id) {
        $view_data['info'] = $this->db->get_where("company",array("id"=>$id))->row();
        $this->load->view("company/general_info", $view_data);
    }
	function view($id = 0) {
      $view_data['info'] = $this->db->get_where("company",array("id" => $id))->row();
      $this->template->rander("company/view", $view_data);
    }
    function save_profile_image($user_id = 0) {
        $profile_image = str_replace("~", ":", $this->input->post("profile_image"));

        if ($profile_image) {
            $profile_image = move_temp_file("avatar.png", get_setting("profile_image_path"), "", $profile_image);

            $image_data = array("logo" => '/moderator/files/profile_images/'.$profile_image);

            //$this->Insurance_model->save($image_data, $user_id);
			$this->db->where('id' , $user_id);
			$this->db->update('company', $image_data);
            echo json_encode(array("success" => true, 'message' => lang('profile_image_changed')));
        }

        //process the the file which has uploaded using manual file submit
        if ($_FILES) {
            $profile_image_file = get_array_value($_FILES, "profile_image_file");
            $image_file_name = get_array_value($profile_image_file, "tmp_name");
            if ($image_file_name) {
                $profile_image = move_temp_file("avatar.png", get_setting("profile_image_path"), "", $image_file_name);
                $image_data = array("logo" => '/moderator/files/profile_images/'.$profile_image);
                ///$this->Insurance_model->save($image_data, $user_id);
				$this->db->where('id' , $user_id);
			    $this->db->update('company', $image_data);
                echo json_encode(array("success" => true, 'message' => lang('profile_image_changed')));
            }
        }
    }
    //prepare categories list data
    function company_list_data($type) {
        $list_data = $this->Company_model->db->get_where('company')->result();
        $result = array();
		$i=1;
        foreach ($list_data as $data) {
            $result[] = $this->_make_row($data,$i);
			$i++;
        }
        echo json_encode(array("data" => $result));
    }

    //get a row of category row
    private function _category_row_data($id) {
        $options = array("id" => $id);
        $data = $this->Company_model->get_details($options)->row();
        return $this->_make_row($data);
    }

    //make a row of category row
    private function _make_row($data,$i) {
		$allow_company = explode(',',get_setting('allow_company'));
		if($data->deleted=='0'){
		 $active='فعال';
		 $btn=js_anchor("<i class='fa fa-times fa-fw'></i>", array('title' => lang('delete'), "class" => "delete", "data-id" => $data->id, "data-action-url" => "company/delete_category/".$data->id, "data-action" => "delete-confirmation"));
		}else{
		 $active='غیرفعال';
		 $btn=js_anchor("<i class='fa fa-times fa-fw'></i>", array('title' => "ویرایش", "class" => "edit", "data-id" => $data->id, "data-action-url" => "company/active_company/".$data->id));
		}
		if($allow_company[0]=='all'){
		  $edit=anchor(get_uri("company/view/" . $data->id), "<i class='fa fa-pencil'></i>", array("class" => "edit", "title" => lang('edit')));
		}else{
		  for($j = 0; $j < count($allow_company); $j++){
		   if($data->en_name == $allow_company[$j]){
		    $edit=anchor(get_uri("company/view/" . $data->id), "<i class='fa fa-pencil'></i>", array("class" => "edit", "title" => lang('edit')));
		   }
		  }	
		}
		
        return array(
		    $i,
            '<img src="'.$data->logo.'" style="height:50px" />',
            $data->name,
            $data->en_name,
            $active,
            $data->sort,
            $edit.$btn
			
        );
    }
}