<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Terminals extends MY_Controller {

    function __construct() {
        parent::__construct();
        //$this->access_only_team_members();
        $this->init_permission_checker("help_and_knowledge_base");
        
        $this->load->model("Terminals_categories_model");
        //$this->load->model("market");
        $this->load->model("Help_articles_model");
        $this->load->model("Psp_model");
    }

    //show help page
    function index() {
        $this->check_module_availability("module_help");

        if($this->login_user->user_type == "merchant"){$type = $this->login_user->id;}
		else{$type = "";}

        $view_data["categories"] = $this->Terminals_categories_model->get_details(array("type" => $type, "only_active_categories" => true))->result();
        $view_data["type"] = $type;
        $this->template->rander("terminals/index", $view_data);
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
        $view_data['categories'] = $this->Terminals_categories_model->get_details(array("type" => $model_info->type))->result();
        $view_data['page_type'] = "article_view";

        $view_data['article_info'] = $model_info;
        $view_data['id'] = $id;

        $this->template->rander('terminals/articles/view_page', $view_data);
    }

    //get search suggestion for autocomplete
    function get_article_suggestion() {
        $search = $this->input->post("search");
        if ($search) {
            $result = $this->Help_articles_model->get_suggestions("help", $search);

            echo json_encode($result);
        }
    }

    private function _get_psp_dropdown() {
        $psp_dropdown = array();
        $psps = $this->Psp_model->db->get_where('psp' , array("deleted" => "0"))->result();
        foreach ($psps as $psp) {
            $psp_dropdown[$psp->id] = $psp->title;
        }
        return $psp_dropdown;
    }
	private function _get_broker_dropdown() {
        $broker_dropdown = array();
        $psps = $this->Users_model->db->get_where('users' , array("user_type" => "broker"))->result();
        foreach ($psps as $psp) {
            $broker_dropdown[$psp->user_key] = $psp->first_name.' '.$psp->last_name;
        }
        return $broker_dropdown;
    }
	private function _get_agent_dropdown() {
        $broker_dropdown = array();
        $psps = $this->Users_model->db->get_where('users' , array("user_type" => "agent"))->result();
        foreach ($psps as $psp) {
            $broker_dropdown[$psp->user_key] = $psp->first_name.' '.$psp->last_name;
        }
        return $broker_dropdown;
    }
    private function _get_club_dropdown() {
        $broker_dropdown = array();
        $psps = $this->Users_model->db->get_where('users' , array("user_type" => "club"))->result();
        foreach ($psps as $psp) {
            $broker_dropdown[$psp->club_name] = $psp->job_title;
        }
        return $broker_dropdown;
    }
    //show help category
    function category($id) {
        if (!$id || !is_numeric($id)) {
            show_404();
        }

        $category_info = $this->Terminals_categories_model->get_one($id);
        if (!$category_info || !$category_info->id) {
            show_404();
        }

        $view_data['page_type'] = "articles_list_view";
        $view_data['type'] = $category_info->type;
        $view_data['selected_category_id'] = $category_info->id;
        $view_data['categories'] = $this->Terminals_categories_model->get_details(array("type" => $category_info->type))->result();

        $view_data["articles"] = $this->Help_articles_model->get_articles_of_a_category($id)->result();
        $view_data["category_info"] = $category_info;

        $this->template->rander("terminals/articles/view_page", $view_data);
    }

    //show help articles list
    function help_articles() {
        $this->access_only_allowed_members();

        $view_data["type"] = "help";
        $this->template->rander("terminals/articles/index", $view_data);
    }

    //show knowledge base articles list
    function knowledge_base_articles() {
        $this->access_only_allowed_members();

        $view_data["type"] = "knowledge_base";
        $this->template->rander("terminals/articles/index", $view_data);
    }

    //show help articles list
    function categories() {
        $this->access_only_allowed_members();

        $view_data["type"] = "help";
        $this->template->rander("terminals/categories/index", $view_data);
    }

    //show knowledge base articles list
    function knowledge_base_categories() {
        $this->access_only_allowed_members();

        $view_data["type"] = "knowledge_base";
        $this->template->rander("terminals/categories/index", $view_data);
    }


    //show add/edit category modal
    function category_modal_form($id = 0 , $merchant_id = 0) {
        //$this->access_only_allowed_members();

        validate_submitted_data(array(
            "id" => "numeric"
        ));

        
        if($id){
            $view_data['model_info'] = $this->Terminals_categories_model->get_one($id)->row();
        }
        $view_data['type'] = $id;
        $view_data['merchant_id'] = $merchant_id;
        $view_data['psp_dropdown'] = array(''=>'-') + $this->_get_psp_dropdown();
        $view_data['broker_dropdown'] = array(''=>'-') + $this->_get_broker_dropdown();
        $view_data['agent_dropdown'] = array(''=>'-') + $this->_get_agent_dropdown();
        $view_data['club_dropdown'] = array(''=>'-') + $this->_get_club_dropdown();
        $this->load->view('terminals/categories/modal_form', $view_data);
    }
        
    //save category
    function save_category() {
        //$this->access_only_allowed_members();
        $data = array(
            "title" => $this->input->post('title'),
            "terminal_id" => $this->input->post('terminal_id'),
            "psp" => $this->input->post('psp'),
            "state" => $this->input->post('state'),
            "city" => $this->input->post('city'),
            "off_bank" => $this->input->post('off_bank'),
            "off_no_bank" => $this->input->post('off_no_bank'),
            "porsant" => $this->input->post('porsant'),
            "broker" => $this->input->post('broker'),
            "agent" => $this->input->post('agent'),
            "club" => $this->input->post('club'),
            "address" => $this->input->post('address'),
            "merchant" => $this->input->post('merchant'),
            "type" => $this->input->post('type'),
            "status" => $this->input->post('status')
        );
        $id = $this->input->post('id');
        $save_id = $this->Terminals_categories_model->save($data , $id);
        if ($save_id) {
            echo json_encode(array("success" => true, "data" => $this->_category_row_data($save_id), 'id' => $save_id->id, 'message' => lang('record_saved')));
        } else {
            echo json_encode(array("success" => false, 'message' => lang('error_occurred')));
        }
    }
    //delete/undo a category 
    function delete_category() {
        //$this->access_only_allowed_members();

        validate_submitted_data(array(
            "id" => "required|numeric"
        ));

        $id = $this->input->post('id');
        if ($this->input->post('undo')) {
            if ($this->Terminals_categories_model->delete($id, true)) {
                echo json_encode(array("success" => true, "data" => $this->_category_row_data($id), "message" => lang('record_undone')));
            } else {
                echo json_encode(array("success" => false, lang('error_occurred')));
            }
        } else {
            if ($this->Terminals_categories_model->delete($id)) {
                echo json_encode(array("success" => true, 'message' => lang('record_deleted')));
            } else {
                echo json_encode(array("success" => false, 'message' => lang('record_cannot_be_deleted')));
            }
        }
    }

    //prepare categories list data
    function categories_list_data($merchant_id) {
        //$this->access_only_allowed_members();

        $list_data = $this->Terminals_categories_model->get_details(array("merchant" => $merchant_id))->result();
        $result = array();
        foreach ($list_data as $data) {
            $result[] = $this->_make_category_row($data , $merchant_id);
        }
        echo json_encode(array("data" => $result));
    }

    //get a row of category row
    private function _category_row_data($data) {
        return $this->_make_category_row($data);
    }

    //make a row of category row
    private function _make_category_row($data , $merchant_id = 0) {

        $special_off = modal_anchor(get_uri("terminals/special_off_modal_form/" .$data->id), "<i class='glyphicon glyphicon-plus' style='color:blue'></i>", array("title" => "ثبت تخفیف ویژه"));
		if($data->special_off != 0){$special_off = "<i class='glyphicon glyphicon-ok' style='color:green'></i>";}

		$psps = $this->db->get_where('psp' , array('id' => $data->psp))->row();
		$psp = $psps->title;
		
		if($data->status==1){$active='فعال';}else{$active='غیرفعال';}
        return array(
            $data->title,
            $data->terminal_id,
            $psp,
            $active,
            $special_off,
			/*anchor(get_uri("terminals/modal_form/" . $data->type . "/" . $data->id), "<i class='fa fa-pencil'></i>", array("class" => "edit", "title" => lang('edit')))*/
			modal_anchor(get_uri("terminals/category_modal_form/".$data->id."/".$merchant_id), "<i class='fa fa-pencil'></i>", array("class" => "edit", "title" => lang('edit_client'), "data-post-id" => $data->id))
            /*. js_anchor("<i class='fa fa-times fa-fw'></i>", array('title' => lang('delete_category'), "class" => "delete", "data-id" => $data->id, "data-action-url" => get_uri("terminals/delete_category/".$data->id), "data-action" => "delete"))*/

        );
    }
    
    
    function all_special_off_list(){
        
        $view_data["categories"] = $this->Terminals_categories_model->get_details(array("type" => $type))->result();
		
        $view_data["id"] = $this->login_user->id;

        $this->template->rander("terminals/categories/all_special_off_list", $view_data);


    }
    
    
    function special_off_list_data($id) {


        //$this->access_only_allowed_members();


        $list_data = $this->Terminals_categories_model->get_details(array('merchant'=>$id))->result();
        
        
        $result = array();


        foreach ($list_data as $data) {

            if( $data->special_off > 0 ){
                $result[] = $this->_make_category_row_special_off($data);
            }
        }


        echo json_encode(array("data" => $result));


    }

    
    function special_off_modal_form($id) {


        //$this->access_only_allowed_members();

        $view_data['model_info'] = $this->Terminals_categories_model->get_one($id)->row();

        $this->load->view('terminals/categories/special_off_modal_form', $view_data);


    }

    private function _make_category_row_special_off($data) {
            
        
		if($data->status==1){$active='فعال';}else{$active='غیرفعال';}
        return array(
            $data->title,
            $data->terminal_id,
            $data->psp,
            $active,
            $data->release_date,
            $data->end_date,
			js_anchor("<i class='fa fa-times fa-fw'></i>", array('title' => lang('delete_category'), "class" => "delete", "data-id" => $data->id, "data-action-url" => get_uri("terminals/delete_special_off/".$data->id), "data-action" => "delete"))
    
    );
    }
	//******************************************
	    
        function delete_special_off($terminal_id){
            
            if($terminal_id){
                
                $this->Terminals_categories_model->db->where(array('id'=>$terminal_id));
                $result = $this->Terminals_categories_model->db->update('terminals' , array('special_off'=>0));
                
                if($result){
                
                    echo json_encode(array("success" => true, "data" =>"", "message" => "محصول از لیست فروش ویژه خارج شد&nbsp&nbsp&nbsp"));
    
                } else {
    
                    echo json_encode(array("success" => false, lang('error_occurred')));
    
                }
                
            }
            
        }


	
	
	
	//****************************************

     function save_special_off($terminal_id){
        
        if($terminal_id){
            
            $data = array(
                'special_off' => $this->input->post('percent'),
                'release_date' => $this->input->post('release_date'),
                'end_date' => $this->input->post('end_date'),
                );
                
            $this->Terminals_categories_model->db->where(array('id' => $terminal_id));
            $result = $this->Terminals_categories_model->db->update('terminals',$data);
            
            if ($result) {

                echo json_encode(array("success" => true, "data" =>"" , "id" =>1 , 'message' => lang('record_saved')));

            } else {
    
                echo json_encode(array("success" => false, "message" => lang('error_occurred')));
    
            }

        }
    }

    //show add/edit article form
    function article_form($type, $id = 0) {
        $this->access_only_allowed_members();

        $view_data['model_info'] = $this->Help_articles_model->get_one($id);
        $view_data['type'] = $type;
        $view_data['categories_dropdown'] = $this->Terminals_categories_model->get_dropdown_list(array("title"), "id", array("type" => $type));
        $this->template->rander('terminals/articles/form', $view_data);
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
    function delete_article() {
        $this->access_only_allowed_members();

        validate_submitted_data(array(
            "id" => "required|numeric"
        ));

        $id = $this->input->post('id');
        if ($this->input->post('undo')) {
            if ($this->Help_articles_model->delete($id, true)) {
                echo json_encode(array("success" => true, "data" => $this->_article_row_data($id), "message" => lang('record_undone')));
            } else {
                echo json_encode(array("success" => false, lang('error_occurred')));
            }
        } else {
            if ($this->Help_articles_model->delete($id)) {
                echo json_encode(array("success" => true, 'message' => lang('record_deleted')));
            } else {
                echo json_encode(array("success" => false, 'message' => lang('record_cannot_be_deleted')));
            }
        }
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