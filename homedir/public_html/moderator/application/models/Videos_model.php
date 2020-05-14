<?php 
class Videos_model extends Crud_model {

    private $table = null;

    function __construct() {
        $this->table = 'videos';
        parent::__construct($this->table);
    }


// video model

    function get_details($options = array()) {
        $videos_table = $this->db->dbprefix('videos');

        $where = "";
        $id = get_array_value($options, "id");
        if ($id) {
            $where .= " AND $videos_table.id=$id";
        }

        $type = get_array_value($options, "video_slug");
        if ($type) {
            $where .= " AND $videos_table.video_slug='$type'";
        }

        $sql = "SELECT *
        FROM $videos_table          
        WHERE $videos_table.deleted=0 $where";
        return $this->db->query($sql);
    }
        function save_video($options = array()){
            $videos_table = $this->db->dbprefix('videos');


            $title = get_array_value($options, "title");
            $description = get_array_value($options, "description");
            $url_flv = get_array_value($options, "url_flv");

            // $this->db->where();
            // $this->db->update('videos', array(
            //     'title' => $title, 
            //     'description' => $description, 
            //     'url_flv' => $url_flv , 
            // );)

        }




    function get_videos_of_a_category($category_id) {
        $help_articles_table = $this->db->dbprefix('videos');

        $sql = "SELECT $help_articles_table.id, $help_articles_table.title
        FROM $help_articles_table
     
        WHERE $help_articles_table.deleted=0 AND $help_articles_table.status='active' AND $help_articles_table.category_id=$category_id
        ORDER BY $help_articles_table.total_views DESC, $help_articles_table.title ASC";

        return $this->db->query($sql);
    }

    function increas_page_view($id) {
        $help_articles_table = $this->db->dbprefix('videos');

        $sql = "UPDATE $help_articles_table
        SET total_views = total_views+1 
        WHERE $help_articles_table.id=$id";

        return $this->db->query($sql);
    }

    function get_suggestions($type, $search) {
        $help_articles_table = $this->db->dbprefix('videos');
        $help_categories_table = $this->db->dbprefix('help_categories');

        $sql = "SELECT $help_articles_table.id, $help_articles_table.title
        FROM $help_articles_table
        LEFT JOIN $help_categories_table ON $help_categories_table.id=$help_articles_table.category_id   
        WHERE $help_articles_table.deleted=0 AND $help_articles_table.status='active' AND $help_categories_table.deleted=0 AND $help_categories_table.status='active' AND $help_categories_table.type='$type'
            AND $help_articles_table.title LIKE '%$search%'
        ORDER BY $help_articles_table.title ASC
        LIMIT 0, 10";

        $result = $this->db->query($sql)->result();

        $result_array = array();
        foreach ($result as $value) {
            $result_array[] = array("value" => $value->id, "label" => $value->title);
        }

        return $result_array;
    }

}
