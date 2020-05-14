<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Videos extends MY_Controller {

    function __construct() {
        parent::__construct();
        //$this->access_only_team_members();
        $this->init_permission_checker("help_and_knowledge_base");
        
        // $this->load->model("Help_categories_model");
        $this->load->model("Videos_model");
    }

    //show help page
    function index() {
        $this->check_module_availability("module_help");

        $type = "videos";

        $view_data["categories"] = $this->Help_categories_model->get_details(array("type" => $type, "only_active_categories" => true))->result();
        $view_data["type"] = $type;
        $this->template->rander("help_and_knowledge_base/index", $view_data);
    }
    function save_video(){
        $this->load->helper('string');
        $id = $this->input->post('id');
        $type = $this->input->post('type');
        $config['upload_path'] = 'files/videos';
        $config['allowed_types'] = 'mp4|flv|mkv|avi|3gp|webm|gif|jpeg|tiff|png|jpg';
        $config['max_size']     = '10240';
        $video_name = random_string('numeric', 5);
        $config['file_name'] = $video_name;
        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('userfile'))
            {
                $this->session->set_flashdata("error_message", lang('error_occurred'));
                echo json_encode(array("success" => false, 'message' => "خطا در آپلود ویدئو"));
            }
            else
            {   
                $data = array('upload_data' => $this->upload->data());
                $video['video_title'] = $this->input->post('title');
                $video['description'] = $this->input->post('description');
                $video['url_flv'] = site_url('files/videos/').$this->upload->data('file_name');
                $video['yt_length'] = $this->input->post('yt_length');
                // $video['category'] = $this->input->post('category');
                $video['status'] = $this->input->post('status');
                $video['video_slug'] = $this->input->post('video_slug');                
                // *****************************************************************
                // // // poster upload                
                $poster_name = random_string('numeric', 5);
                $config['file_name'] = $poster_name;
                $this->load->library('upload', $config);
                if ( ! $this->upload->do_upload('user_poster_file'))
                    {
                    $this->session->set_flashdata("error_message", lang('title'));
                    echo json_encode(array("success" => false, 'message' => "خطا در آپلود  پوستر"));
                        echo "<pre>";
                        print_r($_FILES);
                        print_r(data());
                    }
                    else
                    {

                        $video['yt_thumb'] = site_url('files/videos/').$this->upload->data('file_name');
                        
                }
                // // // end poster upload
                // *******************************************************************
                $this->load->model('Videos_model');
                $this->Videos_model->save($video);
                redirect(site_url('videos/help_articles'));
                echo json_encode(array("success" => true, 'message' => " ویدئو با موفقیت ثبت شد. "));
            }
    }

    //show article
    function view($id = 0) {
        if (!$id || !is_numeric($id)) {
            show_404();
        }

        $model_info = $this->Videos_model->get_details(array("id" => $id))->row();

        if (!$model_info) {
            show_404();
        }

        $this->Videos_model->increas_page_view($id);

        $view_data['selected_category_id'] = $model_info->category_id;
        $view_data['type'] = $model_info->type;
        // $view_data['categories'] = $this->Help_categories_model->get_details(array("type" => $model_info->type))->result();
        $view_data['page_type'] = "article_view";

        $view_data['article_info'] = $model_info;

        $this->template->rander('help_and_knowledge_base/tv/view_page', $view_data);
    }

    //get search suggestion for autocomplete
    function get_article_suggestion() {
        $search = $this->input->post("search");
        if ($search) {
            $result = $this->Videos_model->get_suggestions("videos", $search);

            echo json_encode($result);
        }
    }

    //show help category
    function category($id) {
        if (!$id || !is_numeric($id)) {
            show_404();
        }

        $category_info = $this->Help_categories_model->get_one($id);
        if (!$category_info || !$category_info->id) {
            show_404();
        }

        // $view_data['page_type'] = "articles_list_view";
        $view_data['page_type'] = "videos_list_view";
        $view_data['type'] = $category_info->type;
        $view_data['selected_category_id'] = $category_info->id;
        $view_data['categories'] = $this->Help_categories_model->get_details(array("type" => $category_info->type))->result();

        $view_data["videos"] = $this->Videos_model->get_videos_of_a_category($id)->result();
        $view_data["category_info"] = $category_info;

        $this->template->rander("help_and_knowledge_base/tv/view_page", $view_data);
    }

    //show help articles list
    function help_articles() {
        $this->access_only_allowed_members();
        $view_data["type"] = "videos";
        $this->template->rander("help_and_knowledge_base/tv/index", $view_data);
    }


    //show knowledge base articles list
    function knowledge_base_articles() {
        $this->access_only_allowed_members();

        $view_data["type"] = "knowledge_base";
        $this->template->rander("help_and_knowledge_base/tv/index", $view_data);
    }

    //show help articles list
    function help_categories() {
        $this->access_only_allowed_members();

        $view_data["type"] = "help";
        $this->template->rander("help_and_knowledge_base/categories/index", $view_data);
    }

    //show knowledge base articles list
    function knowledge_base_categories() {
        $this->access_only_allowed_members();

        $view_data["type"] = "knowledge_base";
        $this->template->rander("help_and_knowledge_base/categories/index", $view_data);
    }

    //show add/edit category modal
    function category_modal_form($type) {
        $this->access_only_allowed_members();

        validate_submitted_data(array(
            "id" => "numeric"
        ));

        $id = $this->input->post('id');
        $view_data['model_info'] = $this->Help_categories_model->get_one($id);
        $view_data['type'] = $type;
        $this->load->view('help_and_knowledge_base/categories/modal_form', $view_data);
    }

    //save category
    function save_category() {
        $this->access_only_allowed_members();

        validate_submitted_data(array(
            "id" => "numeric",
            "title" => "required",
            "type" => "required"
        ));

        $id = $this->input->post('id');
        $data = array(
            "title" => $this->input->post('title'),
            "description" => $this->input->post('description'),
            "type" => $this->input->post('type'),
            "sort" => $this->input->post('sort'),
            "status" => $this->input->post('status')
        );
        $save_id = $this->Help_categories_model->save($data, $id);
        if ($save_id) {
            echo json_encode(array("success" => true, "data" => $this->_category_row_data($save_id), 'id' => $save_id, 'message' => lang('record_saved')));
        } else {
            echo json_encode(array("success" => false, 'message' => lang('error_occurred')));
        }
    }

    //delete/undo a category 
    function delete_category() {
        $this->access_only_allowed_members();

        validate_submitted_data(array(
            "id" => "required|numeric"
        ));

        $id = $this->input->post('id');
        if ($this->input->post('undo')) {
            if ($this->Help_categories_model->delete($id, true)) {
                echo json_encode(array("success" => true, "data" => $this->_category_row_data($id), "message" => lang('record_undone')));
            } else {
                echo json_encode(array("success" => false, lang('error_occurred')));
            }
        } else {
            if ($this->Help_categories_model->delete($id)) {
                echo json_encode(array("success" => true, 'message' => lang('record_deleted')));
            } else {
                echo json_encode(array("success" => false, 'message' => lang('record_cannot_be_deleted')));
            }
        }
    }

    //prepare categories list data
    function categories_list_data($type) {
        $this->access_only_allowed_members();

        $list_data = $this->Help_categories_model->get_details(array("type" => $type))->result();
        $result = array();
        foreach ($list_data as $data) {
            $result[] = $this->_make_category_row($data);
        }
        echo json_encode(array("data" => $result));
    }

    //get a row of category row
    private function _category_row_data($id) {
        $options = array("id" => $id);
        $data = $this->Help_categories_model->get_details($options)->row();
        return $this->_make_category_row($data);
    }
    //make a row of category row
    private function _make_category_row($data) {
        return array(
            $data->title,
            $data->description ? $data->description : "-",
            lang($data->status),
            $data->sort,
            modal_anchor(get_uri("videos/category_modal_form/" . $data->type), "<i class='fa fa-pencil'></i>", array("class" => "edit", "title" => lang('edit_category'), "data-post-id" => $data->id))
            . js_anchor("<i class='fa fa-times fa-fw'></i>", array('title' => lang('delete_category'), "class" => "delete", "data-id" => $data->id, "data-action-url" => get_uri("help/delete_category"), "data-action" => "delete"))
        );
    }
    //make a row of article row
        private function _make_article_row($data, $i) {
        return array(
            // $data->id,
            $i,
            anchor(get_uri("videos/view/" . $data->id), $data->video_title),
            anchor(get_uri("videos/view/".$data->id),"<img src='$data->yt_thumb' class='fa fa-pencil' style='height:80px;border-radius:5px;border:2px solid #efefef'>"),            
            $data->site_views,
            anchor(get_uri("videos/article_form/" . $data->type . "/" . $data->id), "<i class='fa fa-pencil'></i>", array("class" => "edit", "title" => lang('edit_article')))
            . js_anchor("<i class='fa fa-times fa-fw'></i>", array('title' => lang('delete_article'), "class" => "delete", "data-id" => $data->id, "data-action-url" => get_uri("videos/delete_article"), "data-action" => "delete"))

        );
    }

    //show add/edit article form
    // function article_form($type, $id = 0) {
    //     $this->access_only_allowed_members();
    //     $view_data['model_info'] = $this->Videos_model->get_one($id);
    //     $view_data['type'] = $type;
    //     $view_data['categories_dropdown'] = $this->Videos_model->get_dropdown_list(array("title"), "id", array("type" => $type));
    //     $this->template->rander('help_and_knowledge_base/tv/form', $view_data);
    // }

    //     function help_articles(){
        function article_form(){

        // $this->template->load('tv/video');
        // $this->check_module_availability("module_help");
        // $model_info = $this->Videos_model->get_details(array("id" => $id))->row();

        $type = "help";

        $view_data["categories"] = $this->Videos_model->get_details(array("type" => $type, "only_active_categories" => true))->result();
        $view_data["type"] = $type;
        $this->template->rander("help_and_knowledge_base/tv/video", $view_data);
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


        $save_id = $this->Videos_model->save($data, $id);
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
            if ($this->Videos_model->delete($id, true)) {
                echo json_encode(array("success" => true, "data" => $this->_article_row_data($id), "message" => lang('record_undone')));
            } else {
                echo json_encode(array("success" => false, lang('error_occurred')));
            }
        } else {
            if ($this->Videos_model->delete($id)) {
                echo json_encode(array("success" => true, 'message' => lang('record_deleted')));
            } else {
                echo json_encode(array("success" => false, 'message' => lang('record_cannot_be_deleted')));
            }
        }
    }

    //prepare article list data
    function articles_list_data($type) {
        $this->access_only_allowed_members();

        $list_data = $this->Videos_model->get_details(array("type" => $type))->result();
        $result = array();
        $i=1;
        foreach ($list_data as $data) {
            $result[] = $this->_make_article_row($data,$i);
            $i++;
        }
        echo json_encode(array("data" => $result));
    }

    //get a row of article row
    private function _article_row_data($id) {
        $options = array("id" => $id);
        $data = $this->Videos_model->get_details($options)->row();
        return $this->_make_article_row($data,$i);
    }


// image upload
    //save article image 
    function save_article_image($user_id = 0) {
        //$this->update_only_allowed_members($user_id);

        //process the the file which has uploaded by dropzone
        $article_image = str_replace("~", ":", $this->input->post("article_image"));

        if ($article_image) {
            $article_image = move_temp_file("article.png", get_setting("article_image_path"), "", $article_image);
            $image_data = array("image" => $article_image);

            // $this->Users_model->save($image_data, $user_id);
            $this->Videos_model->save($image_data, $user_id);
            echo json_encode(array("success" => true, 'message' => lang('article_image_changed')));
        }

        //process the the file which has uploaded using manual file submit
        if ($_FILES) {
            $article_image_file = get_array_value($_FILES, "article_image_file");
            $image_file_name = get_array_value($article_image_file, "tmp_name");
            if ($image_file_name) {
                $article_image = move_temp_file("article.png", get_setting("article_image_path"), "", $image_file_name);
                $image_data = array("image" => $article_image);

                $this->Users_model->save($image_data, $user_id);
                echo json_encode(array("success" => true, 'message' => lang('article_image_changed')));
            }
        }
    }



// end image upload








}

/* End of file help.php */
/* Location: ./application/controllers/help.php */