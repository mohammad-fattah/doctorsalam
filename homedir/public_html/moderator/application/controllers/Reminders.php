<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Reminders extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model("Reminders_model");
    }

    function index() {
        $this->template->rander("reminders/index");
    }

	function reminder_modal_form(){
		$users = $this->Reminders_model->db->get_where('users' , array('user_type'=>'client'))->result();
		foreach($users as $user){
			$users_dropdown[$user->user_key] = $user->first_name." ".$user->last_name; 
		}
		$view_data['users_dropdown'] = $users_dropdown;
		
		$companies = $this->Reminders_model->db->get('company')->result();
		foreach($companies as $company){
			$companies_dropdown[$company->id] = $company->name; 
		}
		$view_data['company_dropdown'] = $companies_dropdown;
		
		$insurances = $this->Reminders_model->db->get('insurance')->result();
		foreach($insurances as $insurance){
			$insurances_dropdown[$insurance->name] = $insurance->name; 
		}
		$view_data['insurance_type_dropdown'] = $insurances_dropdown;		
		
		$this->load->view('reminders/reminder_modal_form' , $view_data);
	}
	
	function add_reminder(){
		$data = array(
			'username' => $this->input->post('username'),
			'date' => $this->input->post('datepicker'),
			'insurance_type' => $this->input->post('insurance_type'),
			'company' => $this->input->post('company'),
			'status' => $this->input->post('status'),	
		);
		
		$company = $this->Reminders_model->db->get_where('company' , array('id'=>$data['company']))->row();
		
		$data['company'] = $company->name;
		$data['pic'] = $company->logo;
	
		$result = $this->Reminders_model->db->insert('reminder' , array('username' => $data['username'] , 'date'=>$data['date'] , 'company'=>$data['company'] ,'pic' => $data['pic'], 'status' => $data['status'], 'insurance_type'=>$data['insurance_type']));

        $save_data = $this->Reminders_model->db->get_where('reminder' , $data);
        if ($save_data) {
            // echo json_encode(array("success" => true, "data" => $this->reminder_category_row_data($save_data), 'id' => $save_data->id, 'message' => lang('record_saved')));
            redirect('/reminders');

        } 
            else {
            echo json_encode(array("success" => false, 'message' => $save_data));

        }
		
	}

	function reminder_category_row_data($data){
		$user = $this->Reminders_model->db->get_where('users',array('user_key'=>$data->username))->row();
		$username = $user->first_name." ".$user->last_name;
		$status = $data->status == 1 ? "فعال" : "غیرفعال";
		// $dd=explode('-',$data->date);
		// $time=explode(' ',$data->date);
        // $created_at=$this->Date_model->gregorian_to_jalali($dd[0],$dd[1],$dd[2],'/');
		$created_at=$data->date;
		$icon = '<img src="'.$data->pic.'" style="width:40px" />';
		return array(
			$icon,
			$data->company,
			$username,
			$data->insurance_type,
			$created_at,
			$status,
			js_anchor("<i class='fa fa-times fa-fw'></i>", array('title' => lang('delete_category'), "class" => "delete", "data-id" => $data->id, "data-action-url" => get_uri("reminders/delete_reminder/".$data->id), "data-action" => "delete"))
		);
	}
    function delete_reminder($id){
        if ($this->Reminders_model->delete($id)) {
            echo json_encode(array("success" => true, 'message' => lang('record_deleted')));
        } else {
            echo json_encode(array("success" => false, 'message' => lang('record_cannot_be_deleted')));
        }
	}
    function reminder_list_data(){
		if($this->login_user->user_type =='broker'){
		 $list_data = $this->db->get_where('reminder' , array('deleted'=>0,"broker"=>$this->login_user->user_key))->result();	
		}else{
		 $list_data = $this->db->get_where('reminder' , array('deleted'=>0))->result();
		}
		$result = array();
        foreach ($list_data as $data) {
            $result[] = $this->reminder_category_row_data($data);
        }
        echo json_encode(array("data" => $result));
	}
	
	function action()
    {
        $this->load->library("excel");
        $object = new PHPExcel();

        $object->setActiveSheetIndex(0);

        $table_columns = array("نام و نام خانوادگی", "رشته بیمه", "شرکت", "استان محل سکونت کاربر", "شهر", "شماره تماس","تاریخ سررسید");

        $column = 0;

        foreach($table_columns as $field)
        {
            $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
            $column++;
        }

        $reminder_data = $this->db->get_where("reminder",array("deleted"=>"0","status"=>"1"))->result();

        $excel_row = 2;

        foreach($reminder_data as $row)
        {
			$name = $this->db->get_where("users",array("user_key"=>$row->username))->row();
            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $name->first_name.' '.$name->last_name);
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->insurance_type);
            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->company);
            $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $name->state);
            $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $name->city);
            $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $name->phone);
            $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $row->date);
            $excel_row++;
        }

        $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Reminder-'.date("Y/m/d").'.xls"');
        $object_writer->save('php://output');
    }
	
}