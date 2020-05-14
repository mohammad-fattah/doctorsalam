<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Validation extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model("Rating_model");
		$this->load->model("Date_model");
    }

    //show help page
    function index() {
        $this->template->rander("validation/index");
    }

	function checks($API_id = 0){
		$view_data['id'] = $API_id;
		$this->template->rander("validation/categories/checks" , $view_data);
	}

    //show article
    function view($id = 0) {
        if (!$id || !is_numeric($id)) {
            show_404();
        }

        $model_info = $this->Help_articles_model->get_details(array("id" => $id))->row();

        if (!$model_info) {
            show_404();
        }

        $this->Help_articles_model->increas_page_view($id);

        $view_data['selected_category_id'] = $model_info->category_id;
        $view_data['type'] = $model_info->type;
        $view_data['categories'] = $this->Rating_model->get_details(array("type" => $model_info->type))->result();
        $view_data['page_type'] = "article_view";

        $view_data['article_info'] = $model_info;

        $this->template->rander('validation/articles/view_page', $view_data);
    }

    //get search suggestion for autocomplete
    function get_article_suggestion() {
        $search = $this->input->post("search");
        if ($search) {
            $result = $this->Help_articles_model->get_suggestions("help", $search);

            echo json_encode($result);
        }
    }

    //show help category
    function category($id) {
        if (!$id || !is_numeric($id)) {
            show_404();
        }

        $category_info = $this->Rating_model->get_one($id);
        if (!$category_info || !$category_info->id) {
            show_404();
        }

        $view_data['page_type'] = "articles_list_view";
        $view_data['type'] = $category_info->type;
        $view_data['selected_category_id'] = $category_info->id;
        $view_data['categories'] = $this->Rating_model->get_details(array("type" => $category_info->type))->result();

        $view_data["articles"] = $this->Help_articles_model->get_articles_of_a_category($id)->result();
        $view_data["category_info"] = $category_info;

        $this->template->rander("validation/articles/view_page", $view_data);
    }
	function market($id) {
        if (!$id || !is_numeric($id)) {
            show_404();
        }

        $category_info = $this->Rating_model->get_one($id);
        if (!$category_info || !$category_info->id) {
            show_404();
        }

        $view_data['page_type'] = "articles_list_view";
        $view_data['type'] = $category_info->type;
        $view_data['selected_category_id'] = $category_info->id;
        $view_data['categories'] = $this->Rating_model->get_details(array("type" => $category_info->type))->result();

        $view_data["articles"] = $this->Help_articles_model->get_articles_of_a_category($id)->result();
        $view_data["category_info"] = $category_info;

        $this->template->rander("validation/market/view_page", $view_data);
    }

    //show help articles list
    function help_articles() {
        $this->access_only_allowed_members();

        $view_data["type"] = "help";
        $this->template->rander("validation/articles/index", $view_data);
    }

    //show knowledge base articles list
    function knowledge_base_articles() {
        $this->access_only_allowed_members();

        $view_data["type"] = "knowledge_base";
        $this->template->rander("validation/articles/index", $view_data);
    }

    //show help articles list
    function categories() {
        $this->access_only_allowed_members();

        $view_data["type"] = "help";
        $this->template->rander("validation/categories/index", $view_data);
    }

    //show knowledge base articles list
    function knowledge_base_categories() {
        $this->access_only_allowed_members();

        $view_data["type"] = "knowledge_base";
        $this->template->rander("validation/categories/index", $view_data);
    }

    //show add/edit category modal
    function category_modal_form($id = 0) {
		if($id){
			$view_data['model_info'] = $this->Rating_model->db->get_where('validation' , array('id'=>$id))->row();
        }
		$view_data['id'] = $id;
        $this->load->view('validation/categories/modal_form', $view_data);
    }

    //save category
    function save_category() {
        $id = $this->input->post('id');
		$length = 16;
		$API_Key =  substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
        $data = array(
            "username" => $this->input->post('username'),
            "password" => $this->input->post('password'),
            "status" => $this->input->post('status'),
        );
		
		if ($this->Rating_model->db->get_where('validation' , array('username'=>$data['username']))->num_rows()>0) {
            echo json_encode(array("success" => false, 'message' => "نام کاربری قبلا ثبت شده است !"));
            exit();
        }
		
		if($id){
			$this->Rating_model->db->where('id',$id);
			$save_id = $this->Rating_model->db->update('validation' , $data);
		}else{
			$data['API_Key'] = $API_Key;
			$save_id = $this->Rating_model->db->insert('validation' , $data);
        }
		
		$saved_data = $this->Rating_model->db->get_where('validation' , array('username'=>$data['username'] , 'password'=>$data['password']))->row();
		
		if ($save_id) {
            echo json_encode(array("success" => true, "data" => $this->_make_category_row($saved_data), 'id' => $saved_data->id, 'message' => lang('record_saved')));
        } else {
            echo json_encode(array("success" => false, 'message' => lang('error_occurred')));
        }
    }
    //delete/undo a category 
    function delete_category($id = 0) {
        	$this->Rating_model->db->where('id' , $id);
		if ($this->Rating_model->db->update('validation' , array('deleted'=>1))) {
			echo json_encode(array("success" => true, 'message' => lang('record_deleted')));
		} else {
			echo json_encode(array("success" => false, 'message' => lang('record_cannot_be_deleted')));
		}
	
    }

    //prepare categories list data
    function list_validation() {
        $list_data = $this->Rating_model->db->get_where('validation',array('deleted'=>0))->result();
        $result = array();
        foreach ($list_data as $data) {
            $result[] = $this->_make_category_row($data);
        }
        echo json_encode(array("data" => $result));
    }
	
	function list_checks($id = 0){
        $list_data = $this->Rating_model->db->get_where('checks',array('deleted'=>0 , 'API_id'=>$id))->result();
        $result = array();
        foreach ($list_data as $data) {
            $result[] = $this->_make_category_row_checks($data);
        }
        echo json_encode(array("data" => $result));		
	}
	
    //get a row of category row
    private function _category_row_data($id) {
        $options = array("id" => $id);
        $data = $this->Rating_model->get_details($options)->row();
        return $this->_make_category_row($data);
    }

	function _make_category_row_checks($data){
		if($data->status==1){$active='<span style="color:yellowgreen">تایید شده</span>';}else{$active='<span style="color:orange">تایید نشده</span>';}
		if($data->payed==1){$payed='<span style="color:yellowgreen">پرداخت شده</span>';}else{$payed ='<span style="color:orange">پرداخت نشده</span>';}
		$pic = "<a href='".base_url().$data->pic."'>مشاهده تصویر چک</a>";
		$dd=explode('-',$data->date);
		$tt=explode(' ',$data->date);
		$date=$this->Date_model->gregorian_to_jalali($dd[0],$dd[1],$dd[2],'/');
		$time = $tt[1];
		return array(
            $time."  ".$date,
            number_format($data->price)." تومان",
            $pic,
			$payed,
		    $active."   <a href='".get_uri('validation/change_check_status/'.$data->id.'/'.$data->API_id)."'><i class='fa fa-pencil'></i></a>",
		);
	}

	function change_check_status($id , $API_id){
		$oldStatus = $this->Rating_model->db->get_where('checks' , array('id'=>$id))->row()->status;
		if($oldStatus == 1){$newStatus = 0;}elseif($oldStatus == 0){$newStatus = 1;}
		$this->Rating_model->db->where('id',$id);
		$this->Rating_model->db->update('checks' , array('status'=>$newStatus));
		$this->checks($API_id);
	}

    //make a row of category row
    private function _make_category_row($data) {
		//.anchor(get_uri("validation/checks/".$data->id), "<i class='fa fa-credit-card'></i>", array("class" => "edit", "title" => 'مشاهده چک ها'))
		if($data->status==1){$active='فعال';}else{$active='غیرفعال';}
		return array(
            $data->username,
            $data->API_Key,
            $data->created_at,
		    $active,
			modal_anchor(get_uri("validation/category_modal_form/".$data->id), "<i class='fa fa-pencil'></i>", array("class" => "edit", "title" => 'ویرایش'))
            .js_anchor("<i class='fa fa-times fa-fw'></i>", array('title' => "حذف", "class" => "delete", "data-id" => $data->id, "data-action-url" => get_uri("validation/delete_category/".$data->id), "data-action" => "delete-confirmation"))
        );
    }

    //show add/edit article form
    function article_form($type, $id = 0) {
        $this->access_only_allowed_members();

        $view_data['model_info'] = $this->Help_articles_model->get_one($id);
        $view_data['type'] = $type;
        $view_data['categories_dropdown'] = $this->Rating_model->get_dropdown_list(array("title"), "id", array("type" => $type));
        $this->template->rander('validation/articles/form', $view_data);
    }

    //save article
    function save_article() {
        $this->access_only_allowed_members();

        validate_submitted_data(array(
            "id" => "numeric",
            "title" => "required",
            "category_id" => "numeric|required"
        ));

        $id = $this->input->post('id');
        $type = $this->input->post('type');
        $data = array(
            "title" => $this->input->post('title'),
            "description" => decode_ajax_post_data($this->input->post('description')),
            "category_id" => $this->input->post('category_id'),
            "status" => $this->input->post('status')
        );

        if (!$id) {
            $data["created_by"] = $this->login_user->id;
            $data["created_at"] = get_my_local_time();
        }


        $save_id = $this->Help_articles_model->save($data, $id);
        if ($save_id) {
            $this->session->set_flashdata("success_message", lang('record_saved'));
            redirect(get_uri("help/article_form/" . $type . "/" . $save_id));
        } else {
            $this->session->set_flashdata("error_message", lang('error_occurred'));
            redirect(get_uri("help/article_form/" . $type));
        }
    }

    //delete/undo an article 
    function delete_article($id = 0) {
	
    }

    //prepare article list data
    function articles_list_data($type) {
        $this->access_only_allowed_members();

        $list_data = $this->Help_articles_model->get_details(array("type" => $type))->result();
        $result = array();
        foreach ($list_data as $data) {
            $result[] = $this->_make_article_row($data);
        }
        echo json_encode(array("data" => $result));
    }

    //get a row of article row
    private function _article_row_data($id) {
        $options = array("id" => $id);
        $data = $this->Help_articles_model->get_details($options)->row();
        return $this->_make_article_row($data);
    }

    //make a row of article row
    private function _make_article_row($data) {
        return array(
            anchor(get_uri("help/view/" . $data->id), $data->title),
            $data->category_title,
            lang($data->status),
            $data->total_views,
            anchor(get_uri("help/article_form/" . $data->type . "/" . $data->id), "<i class='fa fa-pencil'></i>", array("class" => "edit", "title" => lang('edit_article')))
            . js_anchor("<i class='fa fa-times fa-fw'></i>", array('title' => lang('delete_article'), "class" => "delete", "data-id" => $data->id, "data-action-url" => get_uri("help/delete_article"), "data-action" => "delete"))
        );
    }

}

/* End of file help.php */
/* Location: ./application/controllers/help.php */