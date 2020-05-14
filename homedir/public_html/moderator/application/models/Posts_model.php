<?php

class Posts_model extends Crud_model {
    private $table = null;
    function __construct() {
        $this->table = 'posts';
        parent::__construct($this->table);
    }
    public function get_details($id = 1)
    {
        // $this->db->select('created_by, created_for, created_at, description, unique_id');
        $this->db->select('*');
        $this->db->from('posts');
        // if (isset('soure_id')){
        //     $array = array('unique_id' => $id, 'id' => 'soure_id');
        // }else{
            $array = array('unique_id' => $id);
        // }
        $this->db->where($array);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function get_posts_details_for_chat($options = array())
    {
        $posts_table = $this->db->dbprefix('posts');
        $users_table = $this->db->dbprefix('users');
        $where = "";
        $sql = "SELECT *
        FROM $posts_table 
        WHERE $posts_table.deleted=0
        group by $posts_table.unique_id";
        return $this->db->query($sql);
    }

    function count_new_posts() {
        $now = get_current_utc_time("Y-m-d");
        $posts_table = $this->db->dbprefix('posts');
        $sql = "SELECT COUNT($posts_table.id) AS total
        FROM $posts_table
        WHERE $posts_table.deleted=0 AND $posts_table.post_id=0 AND DATE($posts_table.created_at)='$now'";
        return $this->db->query($sql)->row()->total;
    }

        function unique_id_get_details() {
            $this->db->select('unique_id');
            $this->db->distinct();
            $this->db->from('posts');        
            $query = $this->db->get();     
            return $query->result_array();
    }

}
