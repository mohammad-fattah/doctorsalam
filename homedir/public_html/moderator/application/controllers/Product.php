<?php

if (!defined('BASEPATH'))

    exit('No direct script access allowed');

class Product extends MY_Controller {

    function __construct() {

        parent::__construct();

        //$this->access_only_team_members();

        $this->init_permission_checker("help_and_knowledge_base");

        $this->load->model("Product_model");

        //$this->load->model("market");

        $this->load->model("Help_articles_model");

    }

    //show help page

    function index() {

        $this->check_module_availability("module_help");

        if ($this->login_user->user_type == "merchant") {
            $user = $this->login_user->id;
        } else {
            $user = "";
        }

        $view_data["categories"] = $this->Product_model->get_details(array("type" => $type, "only_active_categories" => true))->result();

        $view_data["user"] = $user;

        $this->template->rander("product/index", $view_data);

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

        $view_data['categories'] = $this->Product_model->get_details(array("type" => $model_info->type))->result();

        $view_data['page_type'] = "article_view";

        $view_data['article_info'] = $model_info;

        $this->template->rander('product/articles/view_page', $view_data);

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

        $category_info = $this->Product_model->get_one($id);

        if (!$category_info || !$category_info->id) {

            show_404();

        }

        $view_data['page_type'] = "articles_list_view";

        $view_data['type'] = $category_info->type;

        $view_data['selected_category_id'] = $category_info->id;

        $view_data['categories'] = $this->Product_model->get_details(array("type" => $category_info->type))->result();

        $view_data["articles"] = $this->Help_articles_model->get_articles_of_a_category($id)->result();

        $view_data["category_info"] = $category_info;

        $this->template->rander("product/articles/view_page", $view_data);

    }

    function market($id) {

        if (!$id || !is_numeric($id)) {

            show_404();

        }

        $category_info = $this->Product_model->get_one($id);

        if (!$category_info || !$category_info->id) {

            show_404();

        }

        $view_data['page_type'] = "articles_list_view";

        $view_data['type'] = $category_info->type;

        $view_data['selected_category_id'] = $category_info->id;

        $view_data['categories'] = $this->Product_model->get_details(array("type" => $category_info->type))->result();

        $view_data["articles"] = $this->Help_articles_model->get_articles_of_a_category($id)->result();

        $view_data["category_info"] = $category_info;

        $this->template->rander("product/market/view_page", $view_data);

    }

    //show help articles list

    function help_articles() {
        $view_data["type"] = "help";

        $this->template->rander("product/articles/index", $view_data);

    }
    //show help articles list

    function categories() {
        $view_data["type"] = "help";

        $this->template->rander("product/categories/index", $view_data);

    }

    //show knowledge base articles list

    function knowledge_base_categories() {
        $view_data["type"] = "knowledge_base";

        $this->template->rander("product/categories/index", $view_data);

    }

    //show add/edit category modal

    function add_product($merchant, $id) {

        //$view_data['model_info'] = $this->Product_model->get_one($id);

        $view_data['merchant'] = $merchant;

        $this->load->view('product/modal_form', $view_data);

    }

    //save category

    function save_product($id) {

        //$this->access_only_allowed_members();

        $data = array(

            "store_key" => $this->input->post('merchant'),

            "name" => $this->input->post('name'),

            "price" => $this->input->post('price'),

            "stock" => $this->input->post('stock'),

            "brand" => $this->input->post('brand'),

            "privilege" => $this->input->post('privilege'),

            "status" => $this->input->post('status'),

        );

        $saved_data = $this->Product_model->save($data, $id)->row();

        if ($saved_data) {

            echo json_encode(array("success" => true, "data" => $saved_data, "id" => $save_id->id, 'message' => lang('record_saved')));

        } else {

            echo json_encode(array("success" => false, "message" => lang('error_occurred')));

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

            if ($this->Product_model->delete($id, true)) {

                echo json_encode(array("success" => true, "data" => $this->_category_row_data($id), "message" => lang('record_undone')));

            } else {

                echo json_encode(array("success" => false, lang('error_occurred')));

            }

        } else {

            if ($this->Product_model->delete($id)) {

                echo json_encode(array("success" => true, 'message' => lang('record_deleted')));

            } else {

                echo json_encode(array("success" => false, 'message' => lang('record_cannot_be_deleted')));

            }

        }

    }

    //prepare categories list data
    function merchant_product_list_data($merchant_id) {

        //$this->access_only_allowed_members();

        $list_data = $this->Product_model->get_merchant_details($merchant_id)->result();

        $result = array();

        foreach($list_data as $data) {

            $special = $this->Product_model->db->get_where('product_discounts', array('product_key' => $data->id, 'status' => 'special_off'))->num_rows();

            if ($special > 0) {
                $special_off = 'special_off';
            } else {
                $special_off = array();
            }

            $result[] = $this->_make_category_row($data, $special_off);

        }

        echo json_encode(array("data" => $result));

    }

    function categories_list_data($type) {
        $list_data = $this->Product_model->get_details(array("store_key" => $type))->result();
        $result = array();
        foreach($list_data as $data) {
            $special = $this->Product_model->db->get_where('product_discounts', array('product_key' => $data->id, 'status' => 'special_off'))->num_rows();
            if ($special > 0) {
                $special_off = 'special_off';
            } else {
                $special_off = array();
            }
            $result[] = $this->_make_category_row($data, $special_off);
        }
        echo json_encode(array("data" => $result));
    }
	
	function picture_list($product_key) {
        $list_data = $this->Product_model->get_details_pic($product_key)->result();
        $result = array();
        foreach($list_data as $data) {
            $result[] = $this->_make_category_row_pic($data);
        }
        echo json_encode(array("data" => $result));
    }
	function discounts_list($product_key) {
        $list_data = $this->Product_model->get_details_discounts($product_key)->result();
        $result = array();
        foreach($list_data as $data) {
            $result[] = $this->_make_category_row_discounts($data);
        }
        echo json_encode(array("data" => $result));
    }

    //get a row of category row

    private
    function _category_row_data($id) {

        $options = array("id" => $id);

        $data = $this->Product_model->get_details($options)->result();

        return $this->_make_category_row($data);

    }

    //make a row of category row

    private function _make_category_row($data, $special = array()) {

        $special_off = modal_anchor(get_uri("product/special_off_modal_form/".$data->id), "<i class='glyphicon glyphicon-plus' style='color:blue'></i>", array("title" => "ثبت تخفیف ویژه"));

        if ($data->status == "able") {
            $active = 'فعال';
        } else if ($data->status == "disable") {
            $active = 'غیرفعال';
        }
        if ($special == 'special_off') {
            $special_off = "<i class='glyphicon glyphicon-ok' style='color:green'></i>";
        }

        return array(

            $data->id,
            $data->name,

            $data->store_key,

            $data->price,

            $data->stock,

            $data->sold_number,

            $active,

            $special_off,

            anchor(get_uri("product/product_complete_data/".$data->id), "<i class='fa fa-pencil'></i>", array("class" => "edit", "title" => lang('edit_category'), "data-post-id" => $data->id))

            .js_anchor("<i class='fa fa-times fa-fw'></i>", array('title' => lang('delete_category'), "class" => "delete", "data-id" => $data->id, "data-action-url" => get_uri("product/delete_category/".$data->id), "data-action" => "delete"))

        );

    }
    private function _make_category_row_pic($data) {
        return array(
            $data->id,
            '<img src="'.$data->pic_path.'" style="width:100px" />',
            js_anchor("<i class='fa fa-times fa-fw'></i>", array('title' => lang('delete_category'), "class" => "delete", "data-id" => $data->id, "data-action-url" => get_uri("product/delete_category/".$data->id), "data-action" => "delete"))
        );
    }
	private function _make_category_row_tag($data) {
        return array(
            $data->id,
            $data->tag,
            js_anchor("<i class='fa fa-times fa-fw'></i>", array('title' => lang('delete_category'), "class" => "delete", "data-id" => $data->id, "data-action-url" => get_uri("product/delete_category/".$data->id), "data-action" => "delete"))
        );
    }
	private function _make_category_row_discounts($data) {
		if($data->status=='active'){$status='فعال';}else{$status='غیرفعال';}
        return array(
            $data->id,
            $data->release_date,
            $data->end_date,
            $data->percent,
            $status,
            js_anchor("<i class='fa fa-times fa-fw'></i>", array('title' => lang('delete_category'), "class" => "delete", "data-id" => $data->id, "data-action-url" => get_uri("product/delete_category/".$data->id), "data-action" => "delete"))
        );
    }
    //show add/edit article form

    function article_form($type, $id = 0) {
        $view_data['model_info'] = $this->Help_articles_model->get_one($id);

        $view_data['type'] = $type;

        $view_data['categories_dropdown'] = $this->Product_model->get_dropdown_list(array("title"), "id", array("type" => $type));

        $this->template->rander('product/articles/form', $view_data);

    }

    //save article

    function save_article() {
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

            redirect(get_uri("help/article_form/".$type.
                "/".$save_id));

        } else {

            $this->session->set_flashdata("error_message", lang('error_occurred'));

            redirect(get_uri("help/article_form/".$type));

        }

    }

    //delete/undo an article 

    function delete_article() {
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
        $list_data = $this->Help_articles_model->get_details(array("type" => $type))->result();

        $result = array();

        foreach($list_data as $data) {

            $result[] = $this->_make_article_row($data);

        }

        echo json_encode(array("data" => $result));

    }

    //get a row of article row

    private
    function _article_row_data($id) {

        $options = array("id" => $id);

        $data = $this->Help_articles_model->get_details($options)->row();

        return $this->_make_article_row($data);

    }

    //make a row of article row

    private
    function _make_article_row($data) {

        return array(

            anchor(get_uri("help/view/".$data->id), $data->title),

            $data->category_title,

            lang($data->status),

            $data->total_views,

            anchor(get_uri("help/article_form/".$data->type.
                "/".$data->id), "<i class='fa fa-pencil'></i>", array("class" => "edit", "title" => lang('edit_article')))

            .js_anchor("<i class='fa fa-times fa-fw'></i>", array('title' => lang('delete_article'), "class" => "delete", "data-id" => $data->id, "data-action-url" => get_uri("help/delete_article"), "data-action" => "delete"))

        );

    }

    /* load client details view */

    function product_complete_data($product_id = 0, $tab = "") {

        //$this->access_only_allowed_members();

        if ($product_id) {

            $options = array("id" => $product_id);

            //$product_info = $this->Product_model->get_details($options);

            $view_data['product_id'] = $product_id;

            $view_data["tab"] = $tab;

            $this->template->rander("product/categories/view", $view_data);

        } else {
            show_404();
        }
    }

    function product_info($product_id = 0) {

        if ($product_id) {

            $view_data['model_info'] = $this->Product_model->get_details(array('id' => $product_id))->row();

            //$view_data["custom_fields"] = $this->Custom_fields_model->get_combined_details("clients", $client_id, $this->login_user->is_admin, $this->login_user->user_type)->result();

            $view_data['label_column'] = "col-md-2";

            $view_data['field_column'] = "col-md-10";

            $this->load->view('product/categories/product_info', $view_data);

        }

    }

    function product_coms($product_id = 0) {

        if ($product_id) {

            $view_data['model_info'] = $this->Product_model->get_comments_details($product_id)->row();

            $view_data['label_column'] = "col-md-2";

            $view_data['field_column'] = "col-md-10";

            $view_data['id'] = $product_id;

            $this->load->view('product/categories/product_coms', $view_data);

        }

    }

    function product_specs($product_id) {

        if ($product_id) {

            $view_data['model_info'] = array('product_key' => $product_id);

            $this->load->view('product/categories/product_specs', $view_data);

        }
    }

    function specs_list_data($product_id) {
        $list_data = $this->Product_model->get_comments_details($product_id)->row();

        $result = array();

        $specs = json_decode($list_data->specifics);

        foreach($specs as $spec) {
            $result[] = _make_spec_row($spec);
        }

        echo json_encode(array("data" => $result));

    }

    private function _make_spec_row($data) {

        return array(

            $data['title'],

            $data['subject'],

            array('title' => lang('delete_category'), "class" => "delete", "data-id" => $data->id, "data-action-url" => get_uri("help/delete_category"), "data-action" => "delete"),

        );

    }

    function save_specs($product_id = 0) {

        $list_data = $this->Product_model->get_comments_details($product_id)->row();

        $data = json_decode($list_data->specifics);

        $data[] = array('title' => $this->input->post('title'), 'subject' => $this->input->post('subject'));

        $encoded_data = array('specs' => json_encode($data));

        $result = $this->Product_model->save_specs_comments($encoded_data, $product_id);

    }

    function product_discounts($product_id) {
        if ($product_id) {

            $view_data['id'] = $product_id;

            $this->load->view('product/categories/product_discounts', $view_data);

        }
    }

    function save_discounts($product_id) {

        if ($product_id) {

            $data = array(
                'percent' => $this->input->post('percent'),
                'release_date' => $this->input->post('release_date'),
                'end_date' => $this->input->post('end_date'),
            );

            $result = $this->Product_model->save_discounts($data, $product_id);
			echo json_encode(array("success" => true, "data" => "", "id" => 1, 'message' => lang('record_saved')));
        }
    }

    function save_special_off($product_id) {

        if ($product_id) {

            $data = array(
                'percent' => $this->input->post('percent'),
                'release_date' => $this->input->post('release_date'),
                'end_date' => $this->input->post('end_date'),
            );

            if ($this->input->post('special_off')) {
                $data['status'] = "special_off";
            }

            $result = $this->Product_model->save_discounts($data, $product_id);

            if ($result) {
                echo json_encode(array("success" => true, "data" => "", "id" => 1, 'message' => lang('record_saved')));
            } else {
                echo json_encode(array("success" => false, "message" => lang('error_occurred')));
            }

        }
    }

    function product_tags($product_id) {
        if ($product_id) {
            $view_data['id'] = $product_id;
            $this->load->view('product/categories/product_tags', $view_data);
        }
    }

    function save_tags($product_id) {
        if ($product_id) {
            $data = array(
                'tag' => $this->input->post('tag'),
            );

            $result = $this->Product_model->save_tags($data, $product_id);
			if ($result) {
                echo json_encode(array("success" => true, "data" => "", "id" => 1, 'message' => lang('record_saved')));
            } else {
                echo json_encode(array("success" => false, "message" => lang('error_occurred')));
            }
        }
    }
    function tags_list($product_key) {
        $list_data = $this->Product_model->get_details_tags($product_key)->result();
        $result = array();
        foreach($list_data as $data) {
            $result[] = $this->_make_category_row_tag($data);
        }
        echo json_encode(array("data" => $result));
    }
    function product_pics($product_id) {
        if ($product_id) {

            $view_data['model_info'] = array('product_key' => $product_id);

            $this->load->view('product/categories/product_pics', $view_data);

        }
    }

    function product_pics_save($product_id) {

        if (!is_dir("./files/product/p".$product_id."/")) mkdir("./files/product/p".$product_id."/", 0777, TRUE);
        $config['upload_path'] = "./files/product/p".$product_id."/";
        $config['allowed_types'] = 'gif|jpg|png';
        $this->load->library('upload', $config);
        if ($this->upload->do_upload("file")) {
            $data = array('upload_data' => $this->upload->data());
            $result = $this->Product_model->save_pics($product_id, "/files/product/p".$product_id."/".$data['upload_data']['file_name']);
			echo json_encode(array("success" => true, "data" => 1, 'id' => 1, 'message' => lang('record_saved')));
        }
		else{
		    echo json_encode(array("success" => false, "message" => lang('error_occurred')));	
		}
    }

    //show add/edit category modal

    function pics_modal_form($id) {
        $view_data['model_info'] = array('product_key' => $id);
        $this->load->view('product/categories/pics_modal_form', $view_data);
    }

    function save_comments($product_id) {
        if ($product_id) {
            $data = array('summerized' => $this->input->post('summerized'),'complete' => $this->input->post('complete'));
            $this->Product_model->save_specs_comments($data, $product_id);
			echo json_encode(array("success" => true, "data" => 1, 'id' => 1, 'message' => lang('record_saved')));
        }
    }

    //show add/edit special_off modal

    function special_off_modal_form($id) {

        //$this->access_only_allowed_members();

        $view_data['model_info'] = $this->Product_model->get_one($id);

        $this->load->view('product/categories/special_off_modal_form', $view_data);

    }

    function all_special_off_list() {

        $type = "help";

        $view_data["categories"] = $this->Product_model->get_details(array("type" => $type, "only_active_categories" => true))->result();

        $view_data["type"] = $type;

        $this->template->rander("product/categories/all_special_off_list", $view_data);

    }

    //get special_off products list

    function special_off_list_data($type) {

        //$this->access_only_allowed_members();

        $list_data = $this->Product_model->get_details(array("type" => $type))->result();

        $result = array();

        foreach($list_data as $data) {

            $special = $this->Product_model->db->get_where('product_discounts', array('product_key' => $data->id, 'status' => 'special_off'))->row();

            if ($special->status == "special_off") {
                $result[] = $this->_make_category_row_special_off($data, $special);
            }
        }

        echo json_encode(array("data" => $result));

    }

    private
    function _make_category_row_special_off($data, $special) {

        if ($data->status == "able") {
            $active = 'فعال';
        } else if ($data->status == "disable") {
            $active = 'غیرفعال';
        }

        return array(

            $data->name,

            $data->price,

            $data->stock,

            $data->sold_number,

            $active,

            $special->release_date,

            $special->end_date,

            js_anchor("<i class='fa fa-times fa-fw'></i>", array('title' => lang('delete_category'), "class" => "delete", "data-id" => $data->id, "data-action-url" => get_uri("product/delete_special_off/".$data->id), "data-action" => "delete"))

        );

    }

    function delete_special_off($product_key) {

        if ($product_key) {

            $this->Product_model->db->where(array('product_key' => $product_key, 'status' => 'special_off'));
            $result = $this->Product_model->db->delete('product_discounts');

            if ($result) {

                echo json_encode(array("success" => true, "data" => "", "message" => "محصول از لیست فروش ویژه خارج شد&nbsp&nbsp&nbsp"));

            } else {

                echo json_encode(array("success" => false, lang('error_occurred')));

            }

        }

    }

}

/* End of file help.php */

/* Location: ./application/controllers/help.php */