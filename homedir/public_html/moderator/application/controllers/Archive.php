<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Archive extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model("Archive_model");
        $this->load->model("Date_model");
    }

    function index() {
        $this->template->rander("archive/index");
    }

	function modal_form(){
		$this->load->view('archive/modal_form' , $view_data);
	}
	function general_info($id) {
        $view_data['info'] = $this->db->get_where("insurance_archive",array("id"=>$id))->row();
		$view_data['status']=array("1" => "غیر فعال" , "0" => "فعال" );
        $this->load->view("archive/general_info", $view_data);
    }
	function insurance($id) {
		$view_data['id'] = $id;
        $this->load->view("archive/insurance",$view_data);
    }
	function add_archive(){
		$data = array(
			'name' => $this->input->post('name'),
			'color' => $this->input->post('color'),
			'create_date' => $this->input->post('create_date'),
			'comment' => $this->input->post('comment'),
			'status' => $this->input->post('status'),	
		);
	
		$result = $this->db->insert('insurance_archive' , $data);

        if ($result) {
            echo json_encode(array("success" => true, 'message' => lang('record_saved')));

        } 
            else {
            echo json_encode(array("success" => false, 'message' => "مشکلی پیش آمده !"));

        }
		
	}
	function save_general_info($id) {
        //$this->update_only_allowed_members($user_id);
        validate_submitted_data(array(
            "name" => "required",
            "color" => "required",
            "create_date" => "required",
        ));

        $user_data = array(
            "name" => $this->input->post('name'),
            "color" => $this->input->post('color'),
            "create_date" => $this->input->post('create_date'),
            "comment" => $this->input->post('comment'),
			"status" => $this->input->post('status')
        );
//echo $id;
        $this->db->where("id",$id);
		$save_id = $this->db->update('insurance_archive' , $user_data);

        if ($save_id) {
            echo json_encode(array("success" => true, 'message' => lang('record_updated')));
        } else {
            echo json_encode(array("success" => false, 'message' => lang('error_occurred')));
        }
    }

	function all_transaction($id) {
        $list_data = $this->db->get_where("orders",array("archive"=>$id))->result();
        $result = array();
        $i=1;
        foreach ($list_data as $data) {
            $result[] = $this->_make_transaction_row($data,$i);
			$i++;
        }
        echo json_encode(array("data" => $result));
    }
	
    private function _make_transaction_row($data,$i) {
		$dd=explode('-',$data->start_date);
		$time=explode(' ',$data->start_date);
		$date=$this->Date_model->gregorian_to_jalali($dd[0],$dd[1],$dd[2],'/');
		if($data->broker_id){
		  $broker_name=$this->db->get_where('users' , array('skype'=>$data->broker_id))->row();
		  $broker_name=$broker_name->first_name.' '.$broker_name->last_name;
		}else{
		  $broker_name='ندارد';
		}
        return array(
		    $i,
            $data->title,
            $date.' ساعت : '.$time[1],
            number_format($data->price).' تومان',
			$broker_name,
            $data->CashIinstallments,
            $data->status,
            anchor(get_uri("order/view/" . $data->id), "<i class='fa fa-pencil'></i>", array("class" => "edit", "title" => "جزییات")).js_anchor("<i class='fa fa-times fa-fw'></i>", array('title' => lang('delete_category'), "class" => "delete", "data-id" => $data->id, "data-action-url" => get_uri("order/delete/".$data->id), "data-action" => "delete"))
        );
    }
    
	function insurance_archive_category_row_data($data){
		if($data->deleted == 0){
		 $deleted = 'فعال';
		}else{
		 $deleted = 'عیر فعال';	
		}
		return array(
			$data->name,
			'<div style="height:100%;width:100%;color:#fff;background-color:'.$data->color.'">رنگ</div>',
			$data->create_date,
			$data->comment,
			$deleted,
			anchor(get_uri("archive/view/" . $data->id), "<i class='fa fa-pencil'></i>", array("class" => "edit", "title" => "جزییات")).js_anchor("<i class='fa fa-times fa-fw'></i>", array('title' => lang('delete_category'), "class" => "delete", "data-id" => $data->id, "data-action-url" => get_uri("archive/delete_archive/".$data->id), "data-action" => "delete"))
		);
	}
    function delete_archive($id){
        if ($this->Archive_model->delete($id)) {
            echo json_encode(array("success" => true, 'message' => lang('record_deleted')));
        } else {
            echo json_encode(array("success" => false, 'message' => lang('record_cannot_be_deleted')));
        }
	}
    function list_data(){
		$list_data = $this->db->get_where('insurance_archive' , array('deleted'=>0))->result();
		$result = array();
        foreach ($list_data as $data) {
            $result[] = $this->insurance_archive_category_row_data($data);
        }
        echo json_encode(array("data" => $result));
	}
	
	function action()
    {
        //$this->load->model("archive_model");
        $data["insurance_archive_data"] = $this->archive_model->fetch_data();        
        //$this->load->model("archive_model");
        $this->load->library("excel");
        $object = new PHPExcel();

        $object->setActiveSheetIndex(0);

        $table_columns = array("username", "insurance_type", "company", "name", "phone");

        $column = 0;

        foreach($table_columns as $field)
        {
            $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
            $column++;
        }

        $insurance_archive_data = $this->archive_model->fetch_data();

        $excel_row = 2;

        foreach($insurance_archive_data as $row)
        {
            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row->username);
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->insurance_type);
            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->company);
            $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row->name);
            $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row->phone);
            $excel_row++;
        }

        $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="insurance_archive Data.xls"');
        $object_writer->save('php://output');
    }
	function view($id = 0) {
        if ($id) {
			$view_data['id'] = $id;
			$this->template->rander("archive/view" , $view_data);
		} else {
			show_404();
		}
	}
}