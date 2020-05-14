<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Special extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model("Special_categories_model");
    }

    //show help page
    function index() {
        $this->check_module_availability("module_help");

        $type = "help";

        $view_data["categories"] = $this->Special_categories_model->get_details(array("type" => $type, "only_active_categories" => true))->result();
        $view_data["type"] = $type;
        $this->template->rander("special/index", $view_data);
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
        $view_data['categories'] = $this->Special_categories_model->get_details(array("type" => $model_info->type))->result();
        $view_data['page_type'] = "article_view";

        $view_data['article_info'] = $model_info;

        $this->template->rander('special/articles/view_page', $view_data);
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

        $category_info = $this->Special_categories_model->get_one($id);
        if (!$category_info || !$category_info->id) {
            show_404();
        }

        $view_data['page_type'] = "articles_list_view";
        $view_data['type'] = $category_info->type;
        $view_data['selected_category_id'] = $category_info->id;
        $view_data['categories'] = $this->Special_categories_model->get_details(array("type" => $category_info->type))->result();

        $view_data["articles"] = $this->Help_articles_model->get_articles_of_a_category($id)->result();
        $view_data["category_info"] = $category_info;

        $this->template->rander("special/articles/view_page", $view_data);
    }
	function market($id) {
        if (!$id || !is_numeric($id)) {
            show_404();
        }

        $category_info = $this->Special_categories_model->get_one($id);
        if (!$category_info || !$category_info->id) {
            show_404();
        }

        $view_data['page_type'] = "articles_list_view";
        $view_data['type'] = $category_info->type;
        $view_data['selected_category_id'] = $category_info->id;
        $view_data['categories'] = $this->Special_categories_model->get_details(array("type" => $category_info->type))->result();

        $view_data["articles"] = $this->Help_articles_model->get_articles_of_a_category($id)->result();
        $view_data["category_info"] = $category_info;

        $this->template->rander("special/market/view_page", $view_data);
    }

    //show help articles list
    function help_articles() {
        //$this->access_only_allowed_members();

        $view_data["type"] = "help";
        $this->template->rander("special/articles/index", $view_data);
    }

    //show knowledge base articles list
    function knowledge_base_articles() {
        //$this->access_only_allowed_members();

        $view_data["type"] = "knowledge_base";
        $this->template->rander("special/articles/index", $view_data);
    }

    //show help articles list
    function categories() {
        //$this->access_only_allowed_members();

        $view_data["type"] = "help";
        $this->template->rander("special/categories/index", $view_data);
    }

    //show knowledge base articles list
    function knowledge_base_categories() {
        //$this->access_only_allowed_members();

        $view_data["type"] = "knowledge_base";
        $this->template->rander("special/categories/index", $view_data);
    }

    //show add/edit category modal
    function category_modal_form($type) {
        //$this->access_only_allowed_members();

        validate_submitted_data(array(
            "id" => "numeric"
        ));

        $id = $this->input->post('id');
        $view_data['model_info'] = $this->Special_categories_model->get_one($id);
        $view_data['type'] = $type;
        $this->load->view('special/categories/modal_form', $view_data);
    }

    //save category
    function save_category() {
        //$this->access_only_allowed_members();
		
        $data = array(
            "title" => $this->input->post('title'),
            "start_date" => $this->input->post('start_date'),
            "end_date" => $this->input->post('end_date'),
            "prize" => $this->input->post('prize'),
            "comment" => $this->input->post('comment'),
            "club" => $this->login_user->club_name,
            "lowest_score" => $this->input->post('lowest_score'),
            "status" => $this->input->post('status')
        );
        $save_id = $this->Special_categories_model->save($data);
        //$save_id = $this->Special_categories_model->insert('special',$data);
        if ($save_id) {
            echo json_encode(array("success" => true, "data" => $this->_category_row_data($save_id), 'id' => $save_id, 'message' => lang('record_saved')));
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
            if ($this->Special_categories_model->delete($id, true)) {
                echo json_encode(array("success" => true, "data" => $this->_category_row_data($id), "message" => lang('record_undone')));
            } else {
                echo json_encode(array("success" => false, lang('error_occurred')));
            }
        } else {
            if ($this->Special_categories_model->delete($id)) {
                echo json_encode(array("success" => true, 'message' => lang('record_deleted')));
            } else {
                echo json_encode(array("success" => false, 'message' => lang('record_cannot_be_deleted')));
            }
        }
    }

    //prepare categories list data
    function categories_list_data($type) {
        //$this->access_only_allowed_members();

        $list_data = $this->Special_categories_model->get_details($this->login_user->club_name)->result();
        $result = array();
        foreach ($list_data as $data) {
            $result[] = $this->_make_category_row($data);
        }
        echo json_encode(array("data" => $result));
    }

    //get a row of category row
    private function _category_row_data($id) {
        $options = array("id" => $id);
        $data = $this->Special_categories_model->get_details($options)->row();
        return $this->_make_category_row($data);
    }

    //make a row of category row
    private function _make_category_row($data) {
		if($data->status==1){$active='فعال';}else{$active='غیرفعال';}
        return array(
            $data->title,
            $data->start_date,
            $data->end_date,
            $data->lowest_score,
            $active,
             js_anchor("<i class='fa fa-times fa-fw'></i>", array('title' => lang('delete_category'), "class" => "delete", "data-id" => $data->id, "data-action-url" => get_uri("help/delete_category"), "data-action" => "delete"))
        );
    }

    //show add/edit article form
    function article_form($type, $id = 0) {
        //$this->access_only_allowed_members();

        $view_data['model_info'] = $this->Help_articles_model->get_one($id);
        $view_data['type'] = $type;
        $view_data['categories_dropdown'] = $this->Special_categories_model->get_dropdown_list(array("title"), "id", array("type" => $type));
        $this->template->rander('special/articles/form', $view_data);
    }

    //save article
    function save_article() {
        //$this->access_only_allowed_members();

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
        //$this->access_only_allowed_members();

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
        //$this->access_only_allowed_members();

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