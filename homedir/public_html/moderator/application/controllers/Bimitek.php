<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Bimitek extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model("Order_model");
        $this->load->model("Date_model");
        $this->load->model("Users_model");
    }
	function index() {
		
    }
	function order() {
        $s='در حال رزرو,تایید نماینده,در حال صدور,صادر شده,در حال ارسال,تحویل داده شده,بایگانی شده,شروع رزرو,آپلود تصاویر,تکمیل رزرو,تکمیل مشخصات گیرنده,تایید صورتحساب,پرداخت صورتحساب,پرداخت غیرموفق صورتحساب';
		$label_suggestions = array(array("id" => "", "text" => "- وضعیت تخصص"),array("id" => "", "text" => "همه"));
        $labels = explode(",", $s);
        $temp_labels = array();

        foreach ($labels as $label) {
            if ($label && !in_array($label, $temp_labels)) {
                $temp_labels[] = $label;
                $label_suggestions[] = array("id" => $label, "text" => $label);
            }
        }
        $view_data['order_status_dropdown'] = json_encode($label_suggestions);
		
		$list_data = $this->db->get_where('insurance',array("deleted"=>"0"))->result();
        $temp_labels_insure = array();
		$company_suggestions = array(array("id" => "", "text" => "- نوع"),array("id" => "", "text" => "همه"));
        $i=1;
        foreach ($list_data as $data) {
            if ($data && !in_array($data, $temp_labels_insure)) {
                $temp_labels_insure[] = $data;
                $company_suggestions[] = array("id" => $data->site_link, "text" => $data->name);
            }
        }
		$view_data['company_dropdown'] = json_encode($company_suggestions);
		
        $this->template->rander("bimitek/order",$view_data);
    }
	function users() {
        $this->template->rander("bimitek/user");
    }
    function user_list_data() {
        $options = array(
            "status" => $this->input->post("status"),
            "user_type" => "client",
			//"user_type" => $this->login_user->user_type,
            //"user_key" => $this->login_user->user_key,
        );
        $list_data = $this->Users_model->get_details($options)->result();
        $result = array();
		$i=1;
        foreach ($list_data as $data) {
            $result[] = $this->user_make_row($data,$i);
			$i++;
        }
        echo json_encode(array("data" => $result));
    }
	private function user_make_row($data, $i) {
        if($data->status=='active'){$status='فعال';}else{$status='غیرفعال';}
        $row_data = array(
		    $i,
			$data->first_name.' '.$data->last_name,
            $data->phone,
            $data->melli_code,
            $data->state,
            $data->email,
            $status
        );
        $delete_link = "";
        $delete_link = anchor(get_uri("clients/view/" . $data->id), "<i class='fa fa-pencil'></i>", array("class" => "edit", "title" => lang('edit'))).js_anchor("<i class='fa fa-times fa-fw'></i>", array('title' => lang('delete_category'), "class" => "delete", "data-id" => $data->id, "data-action-url" => get_uri("clients/delete/".$data->id), "data-action" => "delete"));
        $row_data[] = $delete_link;

        return $row_data;
    }
    
	function client($user_id) {
        $this->template->rander("bimitek/client");	
    }
	function merchant($user_id) {
        $this->template->rander("bimitek/merchant");	
    }
	function client_cash_table($user_id) {
        $list_data = $this->Order_model->get_client_cash($user_id)->result();
        $result = array();
        foreach ($list_data as $data) {
            $result[] = $this->_make_category_row($data);
        }
        echo json_encode(array("data" => $result));
    }
	function client_credit($user_id) {
        $this->template->rander("bimitek/client/credit");	
    }
	function client_credit_table($user_id) {
        $list_data = $this->Order_model->get_client_credit($user_id)->result();
        $result = array();
        foreach ($list_data as $data) {
            $result[] = $this->_make_category_row($data);
        }
        echo json_encode(array("data" => $result));
    }

    //show add/edit category modal
    function category_modal_form($type) {
        validate_submitted_data(array(
            "id" => "numeric"
        ));

        $id = $this->input->post('id');
        $view_data['model_info'] = $this->Order_model->get_one($id);
        $view_data['type'] = $type;
        $this->load->view('bimitek/modal_form', $view_data);
    }
    //prepare categories list data
    function all_transaction() {
		$options = array(
            "status" => $this->input->post("status"),
            "insure_type" => $this->input->post("insure_type"),
            "user_type" => $this->login_user->user_type,
            "user_key" => $this->login_user->user_key,
            "deleted" => "0",
        );
        $list_data = $this->Order_model->all_transaction('',$options)->result();
        $result = array();
		$i=1;
        foreach ($list_data as $data) {
            $result[] = $this->_make_transaction_row($data,$i);
			$i++;
        }
        echo json_encode(array("data" => $result));
    }
	function all_transaction_limit() {
		$options = array(
            "user_type" => $this->login_user->user_type,
            "user_key" => $this->login_user->user_key,
            "deleted" => "0",
        );
		$list_data = $this->Order_model->all_transaction_limit($options)->result();
        $result = array();
		$i=1;
        foreach ($list_data as $data) {
            $result[] = $this->_make_transaction_row($data,$i);
			$i++;
        }
        echo json_encode(array("data" => $result));
    }
	function all_transaction_client($id) {
        $list_data = $this->Order_model->all_transaction_client($id)->result();
        $result = array();
        $i=1;
        foreach ($list_data as $data) {
            $result[] = $this->_make_transaction_row($data,$i);
			$i++;
        }
        echo json_encode(array("data" => $result));
    }
	function all_transaction_broker($id) {
        $id = $this->db->get_where('users',array("id"=>$id,"deleted"=>"0"))->row()->skype;
        $list_data = $this->db->get_where("orders",array("broker_id"=>$id,"deleted"=>"0"))->result();
        $result = array();
        $i=1;
        foreach ($list_data as $data) {
            $result[] = $this->_make_transaction_row_broker($data,$i);
			$i++;
        }
        echo json_encode(array("data" => $result));
    }
	function all_cash($type) {
        $list_data = $this->Order_model->cash($type)->result();
        $result = array();
        foreach ($list_data as $data) {
            $result[] = $this->_make_category_row($data);
        }
        echo json_encode(array("data" => $result));
    }
	function all_credit($type) {
        $list_data = $this->Order_model->credit($type)->result();
        $result = array();
        foreach ($list_data as $data) {
            $result[] = $this->_make_category_row($data);
        }
        echo json_encode(array("data" => $result));
    }

    //get a row of category row
    private function _category_row_data($id) {
        $options = array("id" => $id);
        $data = $this->Order_model->get_details($options)->row();
        return $this->_make_category_row($data);
    }

    //make a row of category row
    private function _make_category_row($data) {
		$price=$data->price ? to_currency($data->price, $data->currency_symbol) : "-";
	    $date=explode(' ',$data->start_date);
        $statuses = array('open' => 'پرداخت نشده !' , 'payed'=>'پرداخت شده' , 'sent'=>'ارسال شده', 'delivered'=>'تحویل داده شد');
		
		$status = $statuses[$data->status];
		
		return array(
            $data->title,
			$data->merchant,
            $date[1].' - '.$date[0],
            number_format($data->price).' تومان',
            $data->CashIinstallments,
            $status,
            /*js_anchor("<i class='fa fa-times fa-fw'></i>", array('title' => lang('delete_category'), "class" => "delete", "data-id" => $data->id, "data-action-url" => get_uri("help/delete_category"), "data-action" => "delete"))*/
			modal_anchor(get_uri("bimitek/edit_status_modal_form/" . $data->id."/".$data->status), "<i class='fa fa-pencil'></i>", array("class" => "edit", "title" => "جزییات"))
        );
    }

	function edit_status_modal_form($id , $current_status){
		$view_data['id'] = $id;
		$view_data['current_status'] = $current_status;
		$view_data['statuses'] = array('open' => 'پرداخت نشده !' , 'payed'=>'پرداخت شده' , 'sent'=>'ارسال شده', 'delivered'=>'تحویل داده شد');
		$this->load->view('bimitek/client/edit_status_modal_form' , $view_data);
	}


	private function _make_transaction_row($data,$i) {
		$dd=explode('-',$data->start_date);
		$time=explode(' ',$data->start_date);
		$date=$this->Date_model->gregorian_to_jalali($dd[0],$dd[1],$dd[2],'/');
        return array(
		    $i,
            $data->title,
            $date.' ساعت : '.$time[1],
            number_format($data->price).' تومان',
            $data->users_name,
            $data->CashIinstallments,
            $data->status,
            anchor(get_uri("bimitek/view/" . $data->id), "<i class='fa fa-pencil'></i>", array("class" => "edit", "title" => "جزییات")).js_anchor("<i class='fa fa-times fa-fw'></i>", array('title' => lang('delete_category'), "class" => "delete", "data-id" => $data->id, "data-action-url" => get_uri("bimitek/delete/".$data->id), "data-action" => "delete"))
        );
    }
	private function _make_transaction_row_broker($data,$i) {
		$dd=explode('-',$data->start_date);
		$time=explode(' ',$data->start_date);
		$date=$this->Date_model->gregorian_to_jalali($dd[0],$dd[1],$dd[2],'/');
		
        return array(
		    $i,
            $data->title,
            $data->factor,
            $date.' ساعت : '.$time[1],
            number_format($data->price).' تومان',
            $data->CashIinstallments,
            $data->status,
            anchor(get_uri("bimitek/view/" . $data->id), "<i class='fa fa-pencil'></i>", array("class" => "edit", "title" => "جزییات"))
        );
    }
	function delete() {
        validate_submitted_data(array(
            "id" => "required|numeric"
        ));

        $id = $this->input->post('id');
      
        if ($this->Order_model->delete($id)) {
            echo json_encode(array("success" => true, 'message' => lang('record_deleted')));
        } else {
            echo json_encode(array("success" => false, 'message' => lang('record_cannot_be_deleted')));
        }
    }

	function change_status(){
		$id = $this->input->post('id');
		$status = $this->input->post('status');
		$this->db->where(array('id'=>$id));
		$result = $this->db->update("orders" , array('status'=>$status));
	
		if ($result) {
			$data = $this->Order_model->get_where("orders", array('id'=>$id))->row();
            echo json_encode(array("success" => true, "data" => $this->_make_category_row($data), 'id' => $id, 'message' => lang('record_saved')));
        } else {
            echo json_encode(array("success" => false, 'message' => lang('error_occurred')));
        }
	}
	
    function view($id = 0) {
        if ($id) {
			$view_data['id'] = $id;
			$this->template->rander("bimitek/view" , $view_data);
		} else {
			show_404();
		}
	}
	function document_info($order_id) {
        if ($order_id) {
			$view_data['id'] = $order_id;
            $this->load->view("bimitek/document_info", $view_data);
        }
    }
	function sell_info($order_id) {
        if ($order_id) {
			$view_data['id'] = $order_id;
            $this->load->view("bimitek/sell_info", $view_data);
        }
    }
	function insure_info($order_id) {
        if ($order_id) {
			$view_data['id'] = $order_id;
            $this->load->view("bimitek/insure_info", $view_data);
        }
    }
	function status_info($order_id) {
	 $view_data['id'] = $order_id;
     $this->load->view("bimitek/status_info", $view_data);
    }
	
	function document_list_data($id) {
        $list_data = $this->db->get_where('order_files' , array('project_id'=>$id))->result();
        $result = array();
		$i=1;
        foreach ($list_data as $data) {
            $result[] = $this->document_make_row($data,$i);
			$i++;
        }
        echo json_encode(array("data" => $result));
    }
	function financial_list_data($id) {
        $list_data = $this->db->get_where('order_financial' , array('order_factor'=>$id))->result();
        $result = array();
		$i=1;
        foreach ($list_data as $data) {
            $result[] = $this->financial_make_row($data,$i);
			$i++;
        }
        echo json_encode(array("data" => $result));
    }
	function status_list_data($id) {
        $list_data = $this->db->get_where('order_time' , array('project_id'=>$id))->result();
        $result = array();
		$i=1;
        foreach ($list_data as $data) {
            $result[] = $this->status_make_row($data,$i);
			$i++;
        }
        echo json_encode(array("data" => $result));
    }
    
	private function document_make_row($data,$i) {
		$dd=explode('-',$data->created_at);
		$time=explode(' ',$data->created_at);
		$date=$this->Date_model->gregorian_to_jalali($dd[0],$dd[1],$dd[2],'/');
        $upload_date = $date;
		$link = "<a href='".$data->file_name."' target='_blank'>مشاهده فایل</a>";
		
		return array(
		 $i,
         $data->description,
		 $upload_date,
		 $link
        );
    }
	private function financial_make_row($data,$i) {
		$dd=explode('-',$data->due_date);
		$time=explode(' ',$data->due_date);
		$due_date=$this->Date_model->gregorian_to_jalali($dd[0],$dd[1],$dd[2],'/');
		if($data->status=='not_yet'){
		 $status='سر رسید نشده';
		}elseif($data->status=='unpaid'){
		 $status='پرداخت نشده';	
		}elseif($data->status=='paid'){
		 $status='پرداخت شده';	
		}
		return array(
		    $i,
            number_format($data->price),
            /*number_format($data->wage),
            number_format($data->wage*10),*/
            $due_date,
            $status,
			anchor(get_uri("bimitek/view/" . $data->id), "<i class='fa fa-pencil'></i>", array("class" => "edit", "title" => "جزییات"))
        );
    }
	private function status_make_row($data,$i) {
		$dd=explode('-',$data->start_time);
		$start_time_arr=explode(' ',$data->start_time);
		$start_time=$this->Date_model->gregorian_to_jalali($dd[0],$dd[1],$dd[2],'/');
		
		if($data->end_time){
		  $dd=explode('-',$data->end_time);
		  $end_time_arr=explode(' ',$data->end_time);
		  $end_time=$this->Date_model->gregorian_to_jalali($dd[0],$dd[1],$dd[2],'/');
		  $end_time=$end_time.' '.$end_time_arr[1];
		}else{
		  $end_time='نامشخص';
		}
		
		$user_data = $this->db->get_where('users' , array('user_key'=>$data->user_id))->row();
	    $user_name = $user_data->first_name." ".$user_data->last_name;
		
		if($data->status=='open'){
		  $status='در حال پیگیری';
		}else if($data->status=='approved'){
		  $status='انجام شده';	
		}
		
		return array(
		    $i,
            $user_name,
            $start_time.' '.$start_time_arr[1],
            $end_time,
            $data->note ? $data->note : 'ندارد',
            $status
        );
    }
	function general_info($order_id) {
        if ($order_id) {
            $view_data['bime_info'] = $this->db->get_where("orders" , array('id'=>$order_id))->row();
			$view_data['statuses'] =  $this->get_bime_statuses();
			
			$brokers =  $this->db->get_where('users' , array('user_type'=>'broker'))->result();
			$brokers_dropdown[0]='- انتخاب کنید';
			foreach($brokers as $broker){
			  $brokers_dropdown[$broker->user_key] = $broker->first_name." ".$broker->last_name; 
		    }
		    $view_data['brokers_dropdown'] = $brokers_dropdown;
			
			$archive =  $this->db->get_where('insurance_archive' , array('deleted'=>'0'))->result();
			$archive_dropdown[0]='- انتخاب کنید';
			foreach($archive as $broker){
			  $archive_dropdown[$broker->id] = $broker->name." - ".$broker->create_date; 
		    }
		    $view_data['archive_dropdown'] = $archive_dropdown;
			
			$agents =  $this->db->get_where('users' , array('user_type'=>'agent'))->result();
			$agents_dropdown[0]='- انتخاب کنید';
			foreach($agents as $agent){
			  $agents_dropdown[$agent->user_key] = $agent->first_name." ".$agent->last_name; 
		    }
		    $view_data['agents_dropdown'] = $agents_dropdown;
			
			$user_data = $this->db->get_where('users' , array('user_key'=>$view_data['bime_info']->user_key))->row();
			$view_data['bime_user'] = $user_data->first_name." ".$user_data->last_name;
			$dd = explode('-',$view_data['bime_info']->start_date);
			$time = explode(' ',$view_data['bime_info']->start_date);
			$date=$this->Date_model->gregorian_to_jalali($dd[0],$dd[1],$dd[2],'/');
			$view_data['bime_start_date'] = $date.' ساعت : '.$time[1];
			$this->load->view("bimitek/general_info", $view_data);
        }
    }
    function callAPI($method, $url,$data){
  $curl = curl_init();
  $url=$url.$data; 
  curl_setopt($curl, CURLOPT_URL, $url);
  $result = curl_exec($curl);
  if(!$result){die("Connection Failure");}
  curl_close($curl);
 }
	function save_general_info($order_id){
		$data = array(
			'title' => $this->input->post('title'),
			'status' => $this->input->post('status'),
			'price' => str_replace(',','',$this->input->post('price')),
			'broker_id' => $this->input->post('broker'),
			'agents_id' => $this->input->post('agents'),
			'reminder' => $this->input->post('reminder'),
			'archive' => $this->input->post('archive'),
		);
			//$k= 'https://api.kavenegar.com/v1/'.get_setting("api_kavenegar").'/verify/lookup.json?receptor='.$this->input->post('userphone').'&token='.$order_id.'&token2='.$this->input->post('status').'&token3='.get_setting("app_title").'&template=insurance-status';
			//$this->callAPI('GET', 'https://api.kavenegar.com/v1/'.get_setting("api_kavenegar").'/verify/lookup.json?','receptor='.$this->input->post('userphone').'&token='.$order_id.'&token2='.$this->input->post('status').'&token3='.get_setting("app_title").'&template=insurance-status');
		$this->db->where('id',$order_id);
		$result = $this->db->update("orders",$data);
		if($result){
			//'تغییرات ذخیره شد.'
			echo json_encode(array('success'=>true , 'message'=>lang('record_saved')));
		}else{
			echo json_encode(array('success'=>false , 'message'=>'خطا در ذخیره رخ داده است.'));
		}
		/*$this->callAPI('GET', 'https://api.kavenegar.com/v1/'.get_setting("api_kavenegar").'/verify/lookup.json?','receptor='.$this->input->post('userphone').'&token='.$order_id.'&token2='.$this->input->post('status').'&token3='.get_setting("app_title").'&template=insurance-status');*/
	}

	function get_bime_statuses(){
		return array(
			'شروع رزرو'=>'شروع رزرو',
			'آپلود تصاویر'=>'آپلود تصاویر',
			'تکمیل رزرو'=>'تکمیل رزرو',
			'تکمیل مشخصات گیرنده'=>'تکمیل مشخصات گیرنده',
			'تایید صورتحساب'=>'تایید صورتحساب',
			'پرداخت صورتحساب'=>'پرداخت صورتحساب',
			'پرداخت غیرموفق صورتحساب'=>'پرداخت غیرموفق صورتحساب',
			'در حال رزرو'=>'در حال رزرو',
			'تایید نماینده'=>'تایید نماینده',
			'در حال صدور'=>'در حال صدور',
			'صادر شده'=>'صادر شده',
			'در حال ارسال'=>'در حال ارسال',
			'تحویل داده شده'=>'تحویل داده شده',
			'بایگانی شده'=>'بایگانی شده',
		);
	}

    function action()
    {
        $this->load->library("excel");
        $object = new PHPExcel();

        $object->setActiveSheetIndex(0);

        $table_columns = array("نوع رزرو", "وضعیت رزرو", "قیمت", "فاکتور", "نام کاربر", "شماره تماس","شرکت");

        $column = 0;

        foreach($table_columns as $field)
        {
            $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
            $column++;
        }

        $reminder_data = $this->db->get_where("orders",array("deleted"=>"0"))->result();

        $excel_row = 2;

        foreach($reminder_data as $row)
        {
			$name = $this->db->get_where("users",array("user_key"=>$row->user_key))->row();
            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row->title);
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->status);
            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->price);
            $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row->factor);
            $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $name->first_name.' '.$name->last_name);
            $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $row->cellphone);
            $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $row->company);
            $excel_row++;
        }

        $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Orders-'.date("Y/m/d").'.xls"');
        $object_writer->save('php://output');
    }
}