<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Price extends MY_Controller {

    function __construct() {
        parent::__construct();
		$this->load->model('Insurance_cover_model');
		$this->load->model("Date_model");
    }

    public function index($staff_id) {
        if($staff_id){
			$staff = $this->Insurance_cover_model->db->get_where('insurance' , array('site_link'=>$staff_id))->row();
			$view_data['insurance'] = $staff->name;
			$view_data['pic'] = $staff->pic;
			$view_data['staff_id'] = $staff_id;
			$this->template->rander("price/index" , $view_data);
		}
	}

    function list_data($staff_id) {
       $list_data = $this->Insurance_cover_model->db->get_where('insurance_price' , array('deleted'=>0 , 'insur_type'=>$staff_id))->result();
        $result = array();
		$i=1;
        foreach ($list_data as $data) {
            $result[] = $this->_make_row($data , $staff_id,$i);
			$i++;
        }
        echo json_encode(array("data" => $result));
    }
	
	private function _make_row($data , $staff_id,$i) {
        
		$row_data = array(
		    $i,
			$this->Insurance_cover_model->db->get_where('company' , array('en_name'=>$data->company))->row()->name,
			$this->Insurance_cover_model->db->get_where('insurance_type' , array('english_type'=>$data->type))->row()->type,
			$data->price,
			$data->fixed_premium,
        	modal_anchor(get_uri("price/price_modal_form/" . $staff_id."/".$data->id), "<i class='fa fa-pencil'></i>", array("class" => "edit", "title" => "ویرایش"))
			.js_anchor("<i class='fa fa-times fa-fw'></i>", array('title' => lang('delete_category'), "class" => "delete", "data-id" => $data->id, "data-action-url" => get_uri("cover/delete/".$data->id), "data-action" => "delete"))
        );
		
        return $row_data;
    }

	    //delete/undo a category 
    function delete($id) {
        $this->Insurance_cover_model->db->where('id',$id);
		if ($this->Insurance_cover_model->db->update('price' , array('deleted'=>1))) {
			echo json_encode(array("success" => true, 'message' => lang('record_deleted')));
		} else {
			echo json_encode(array("success" => false, 'message' => lang('record_cannot_be_deleted')));
		}
	
    }


    /* open new member modal */

    function price_modal_form($staff_id , $id = 0) {
		if($id){
		$view_data['price_info'] = $this->Insurance_cover_model->db->get_where('insurance_price' , array('id'=>$id))->row();
		}
		$view_data['id'] = $id;
		$view_data['cover_dropdown'] = $this->_get_cover_dropdown($staff_id);
		$view_data['company_dropdown'] = $this->_get_company_dropdown();
		$view_data['staff_id'] = $staff_id;
		
		$view_data['type_dropdown'] = $this->_get_type_dropdown($staff_id);
		
        $this->load->view('price/modal_form', $view_data);
    
	}

	function _get_cover_dropdown($staff_id){
		$covers = $this->Insurance_cover_model->db->get_where('insurance_cover' , array('staff_id'=>$staff_id ,'deleted'=>0))->result();
		$drop_down = array();
		foreach($covers as $cover){
			$drop_down[$cover->id] = $cover->insurance_cover;
		}
		
		return $drop_down;
	}

	function _get_type_dropdown($staff_id){
		$types = $this->Insurance_cover_model->db->get_where('insurance_type' , array('staff_id'=>$staff_id ,'deleted'=>0))->result();
		$drop_down = array();
		foreach($types as $type){
			$drop_down[$type->english_type] = $type->type;
		}
		
		return $drop_down;
	}
	
	function _get_company_dropdown(){
		$companies = $this->Insurance_cover_model->db->get_where('company' , array('deleted'=>0))->result();
		$drop_down = array();
		foreach($companies as $company){
		  $drop_down[$company->en_name] = $company->name;
		}	
		return $drop_down;
	}
    function add_price() {
		
		$id = $this->input->post('id_modal');
		
        $price_data = array(
            "insur_type" => $this->input->post('insure_id'),
			"company" => $this->input->post('company_id'),
			"price" => $this->input->post('price'),
			"type" => $this->input->post('type'),
			"fixed_premium" => $this->input->post('base_price'),
		);
		$price_update = array(
            "insur_type" => $this->input->post('insure_id'),
			"price" => $this->input->post('price'),
			"fixed_premium" => $this->input->post('base_price'),
		);
		
		if($id > 0){
			//$this->db->where('id', 2);
			$result = $this->Insurance_cover_model->db->update('insurance_price',$price_update,array('id' => $id));
			echo json_encode(array("success" => true,'message' => "با موفقیت ثبت شد .", 'id' => $id));
		}else{
			$result = $this->Insurance_cover_model->db->insert('insurance_price',$price_data);
			echo json_encode(array("success" => true,'message' => "با موفقیت ثبت شد .", 'id' => $id));
		}
    }
}