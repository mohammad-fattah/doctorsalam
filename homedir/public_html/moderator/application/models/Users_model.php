<?php

class Users_model extends Crud_model {

    private $table = null;

    function __construct() {
        $this->table = 'users';
        parent::__construct($this->table);
    }

    function authenticate($email, $password) {
        $this->db->select("id,user_type");
        $result = $this->db->get_where($this->table, array('phone'=>$email,'password'=>md5($password),'status'=>'active','deleted'=>'0','disable_login'=>'0',));
        //$result = $this->db->get_where($this->table, "phone = '$email' AND password = '". md5($password)."' AND status = 'active' AND deleted = 0 AND disable_login = 0");
          if ($result->num_rows() == 1) {
            $user_info = $result->row();
            $this->session->set_userdata('user_id', $user_info->id);
            return true;
          }
    }

    function login_user_id() {
        $login_user_id = $this->session->user_id;
        return $login_user_id ? $login_user_id : false;
    }

    function sign_out() {
        $this->session->sess_destroy();
        redirect('signin');
    }
    function create_account($options = array()) {
		$users = $this->db->dbprefix('users');
		$cards = $this->db->dbprefix('cards');
		$first_name = get_array_value($options, "first_name");
		$last_name = get_array_value($options, "last_name");
		$password = get_array_value($options, "password");
		$melli_code = get_array_value($options, "melli_code");
		$created_at = get_array_value($options, "created_at");
		$phone = get_array_value($options, "phone");
		$user_key=md5(uniqid(rand(), true));
		$sql="insert into $users(first_name,last_name,password,melli_code,created_at,phone,email,user_key) values('$first_name','$last_name','$password','$melli_code','$created_at','$phone','$phone','$user_key')";
		$card_sql="insert into $cards(user_key,`type`,status) values('$user_key','credit','deactive')";
		$this->db->query($sql);
        $result = $this->db->get_where($this->table, "user_key = '$user_key' ");
        $user_info = $result->row();
		
		$this->session->set_userdata('user_id', $user_info->id);
		redirect('signup/product');
	}
	function add_new_card($userkey) {
		$cards = $this->db->dbprefix('cards');
		$user_key = $userkey;
		$card_number='1413'.rand(1000,9999).rand(1000,9999).rand(1000,9999);
		$card_sql="insert into $cards(user_key,`type`,card_number,status) values('$user_key','credit','$card_number','deactive')";
		$this->db->query($card_sql);
	}
    function get_details($options = array()) {
        $users_table = $this->db->dbprefix('users');

        $where = "";
        $id = get_array_value($options, "id");
        $status = get_array_value($options, "status");
        $user_type = get_array_value($options, "user_type");
        $user_key = get_array_value($options, "user_key");
        $exclude_user_id = get_array_value($options, "exclude_user_id");

        if ($id) {
            $where .= " AND $users_table.id=$id";
        }
        if ($status === "active") {
            $where .= " AND $users_table.status='active'";
        } else if ($status === "inactive") {
            $where .= " AND $users_table.status='inactive'";
        }
		if ($user_type) {
          $where .= " AND $users_table.user_type='$user_type'";
        }
        if($user_type == 'broker'){
		 if ($user_key) {
            $where .= " AND $users_table.broker_id='$user_key'";
         }
		}
        if ($exclude_user_id) {
            $where .= " AND $users_table.id!=$exclude_user_id";
        }
        
		$sql = "SELECT * FROM $users_table WHERE $users_table.deleted=0 $where";
        return $this->db->query($sql);
    }
	function get_details_limit($options = array()) {
        $users_table = $this->db->dbprefix('users');

        $where = "";
        $id = get_array_value($options, "id");
        $status = get_array_value($options, "status");
        $user_type = get_array_value($options, "user_type");
        $user_key = get_array_value($options, "user_key");

        if ($id) {
            $where .= " AND $users_table.id=$id";
        }
        if ($status === "active") {
            $where .= " AND $users_table.status='active'";
        } else if ($status === "inactive") {
            $where .= " AND $users_table.status='inactive'";
        }

        /*if ($user_type) {
            $where .= " AND $users_table.user_type='$user_type'";
        }
		if ($user_key) {
            $where .= " AND $users_table.user_key='$user_key'";
        }*/
		
        if($user_type == 'broker'){
         if ($user_type) {
            //$where .= " AND $users_table.user_type='$user_type'";
         }
		 if ($user_key) {
            $where .= " AND $users_table.broker_id='$user_key'";
         }
		}
        
		$sql = "SELECT * FROM $users_table WHERE $users_table.deleted=0 $where ORDER BY created_at LIMIT 0,5 ";
        return $this->db->query($sql);
    }

	
    function is_email_exists($email, $id = 0) {
        $result = $this->get_all_where(array("email" => $email, "deleted" => 0));
        if ($result->num_rows() && $result->row()->id != $id) {
            return $result->row();
        } else {
            return false;
        }
    }
	function is_melli_code_exists($melli_code) {
        $result = $this->get_all_where(array("melli_code" => $melli_code, "deleted" => 0));
        if ($result->num_rows()) {
            return true;
        } else {
            return false;
        }
    }
	function is_phone_exists($phone) {
        $result = $this->get_all_where(array("phone" => $phone, "deleted" => 0));
        if ($result->num_rows()) {
            return true;
        } else {
            return false;
        }
    }

	function merchant_test($id,$terminal_id,$price,$user_key) {
	 $factor=rand(10000,10000000);
	 $title='خرید پوز';
	 if(!$terminal_id){
	  if($id){
	   $sql = "SELECT *,(select CONCAT(first_name,' ',last_name) from users WHERE terminals.agent=users.user_key COLLATE utf8_unicode_ci) as agent_name,(select CONCAT(first_name,' ',last_name) from users where terminals.broker=users.user_key COLLATE utf8_unicode_ci) as broker_name,(select job_title from users where terminals.club=users.user_key COLLATE utf8_unicode_ci ) as club_name FROM `terminals` WHERE merchant='$id'";
	  }else{
	   $sql = "SELECT * FROM `users` WHERE user_type='merchant'";
	  }
	 }else{
	  $one=$this->db->query("SELECT agent,broker,club FROM `terminals` WHERE merchant='$id'")->result();
	  foreach ($one as $per) {
		$broker=$per->broker;
		$agent=$per->agent;
		$club=$per->club;
	  }
	  $sql = "SELECT (select percent from sharing WHERE `sharing`.`customer`='agent') as agent,(select percent from sharing WHERE `sharing`.`customer`='broker') as broker,(select percent from sharing WHERE `sharing`.`customer`='club') as club FROM `terminals`";
	  $view_data=$this->db->query($sql)->result();
	  foreach ($view_data as $per) {
		$brokering=$per->broker;
		$agenting=$per->agent;
		$clubing=$per->club;
	  }
	  $amount_broker=($brokering*$price)/100;
	  $amount_agent=($agenting*$price)/100;
	  $amount_club=($clubing*$price)/100;
	  $qq = "INSERT INTo `orders`(merchant_id,terminal,price,user_key,CashIinstallments,factor,title) VALUES('$id','$terminal_id','$price','$user_key','نقد','$factor','$title')";
      $this->db->query($qq);
	  $date=date('Y-m-d H:i:s');
	  $this->db->query("INSERT INTo `wallet`(amount,id_sell,`for`,username,extant,`date`)
      SELECT '$amount_broker','$id','کارمزد پوز','$broker',extant+'$amount_broker','$date' FROM wallet WHERE username='$broker' AND wallet_type='cash' ORDER BY id DESC LIMIT 0,1");
	  $this->db->query("INSERT INTo `wallet`(amount,id_sell,`for`,username,extant,`date`)
      SELECT '$amount_agent','$id','کارمزد پوز','$agent',extant+'$amount_agent','$date' FROM wallet WHERE username='$agent' AND wallet_type='cash' ORDER BY id DESC LIMIT 0,1");
	  $this->db->query("INSERT INTo `wallet`(amount,id_sell,`for`,username,extant,`date`)
      SELECT '$amount_club','$id','کارمزد پوز','$club',extant+'$amount_club','$date' FROM wallet WHERE username='$club' AND wallet_type='cash' ORDER BY id DESC LIMIT 0,1");
	  //$this->db->query("INSERT INTo `wallet`(amount,id_sell,`for`,username) VALUES('$amount_broker','$id','خرید از پوز','$broker')");
	  //$this->db->query("INSERT INTo `wallet`(amount,id_sell,`for`,username) VALUES('$amount_agent','$id','خرید از پوز','$agent')");
	  //$this->db->query("INSERT INTo `wallet`(amount,id_sell,`for`,username) VALUES('$amount_club','$id','خرید از پوز','$club')");
     
      $sql = "SELECT * FROM `orders` WHERE merchant_id='$id'";	  
	 }
	 return $this->db->query($sql);
    }
	function staff_dashboard_count() { 
	 $aa="SET sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''))";
	 $this->db->query($aa);
	 $sql="SELECT count(id) AS count,status FROM `orders` WHERE deleted='0' group by status";
     return $this->db->query($sql);
    }
	function staff_client_dashboard_count() { 
	 $sql="SELECT count(id) AS count FROM `users` WHERE user_type='client' AND deleted='0'";
     return $this->db->query($sql);
    }
	function staff_ticket_dashboard_count() {
     $sql="SELECT count(id) AS count FROM `tickets` WHERE deleted='0'";
     return $this->db->query($sql);
    }
	function staff_reminder_dashboard_count() { 
	 $sql="SELECT count(id) AS count FROM `reminder` WHERE deleted='0' ";
     return $this->db->query($sql);
    }
	function staff_dashboard_transaction($usertype) {
		
        $sql = "SELECT *,(SELECT CONCAT(first_name,' ',last_name) FROM `users` WHERE `users`.user_key=projects.user_key) as fname,(SELECT CONCAT(first_name,' ',last_name,'@',club_name) FROM `users` WHERE users.id=projects.merchant_id) as m_name,(SELECT CONCAT(first_name,' ',last_name) FROM `users` WHERE users.id=projects.merchant_id) as m_name FROM `orders` WHERE user_key IN (SELECT user_key FROM `users` WHERE club_name='$usertype') ORDER BY id DESC LIMIT 0,5";
        return $this->db->query($sql);
    }
	function staff_dashboard_merchant($usertype) {
		
        $sql = "SELECT * FROM `users` WHERE user_type='merchant' ORDER BY point DESC LIMIT 0,5";
        return $this->db->query($sql);
    }
	function staff_dashboard_client($usertype) {
		
        $sql = "SELECT * FROM `users` WHERE user_type='client' ORDER BY point DESC LIMIT 0,5";
        return $this->db->query($sql);
    }

    function client_dashboard_count($username) {
		
        $sql = "SELECT (SELECT extant FROM wallet WHERE username='$username' AND wallet_type='cash' ORDER BY id DESC LIMIT 0,1) AS extant,(SELECT count(id) FROM `client_point` WHERE `username`='$username') AS count_client,(SELECT extant FROM wallet WHERE username='$username' AND wallet_type='credit' ORDER BY id DESC LIMIT 0,1) AS wallet_credit FROM `users` LIMIT 0,1";
        return $this->db->query($sql);
    }
	function client_dashboard_transaction($username) {
		
        $sql = "SELECT * FROM `orders` WHERE user_key='$username' ORDER BY id DESC LIMIT 0,5";
        return $this->db->query($sql);
    }
	function client_dashboard_merchant() {
		
        $sql = "SELECT * FROM `users` WHERE user_type='merchant' ORDER BY point DESC LIMIT 0,5";
        return $this->db->query($sql);
    }
    function broker_dashboard_count($username) {
		
        $sql = "SELECT (SELECT extant FROM wallet WHERE username='$username' ORDER BY id DESC LIMIT 0,1) AS extant,(SELECT count(id) FROM `users` WHERE `user_type`='broker') AS count_client,(SELECT count(id) FROM `orders`) AS count_order FROM `users`";
        return $this->db->query($sql);
    }
	function get_job_info($user_id) {
        parent::use_table("team_member_job_info");
        return parent::get_one_where(array("user_id" => $user_id));
    }

    function save_job_info($data) {
        parent::use_table("team_member_job_info");

        //check if job info already exists
        $where = array("user_id" => get_array_value($data, "user_id"));
        $exists = parent::get_one_where($where);
        if ($exists->user_id) {
            //job info found. update the record
            return parent::update_where($data, $where);
        } else {
            //insert new one
            return parent::save($data);
        }
    }

    function get_team_members($member_ids = "") {
        $users_table = $this->db->dbprefix('users');
        $sql = "SELECT $users_table.*
        FROM $users_table
        WHERE $users_table.deleted=0 AND $users_table.user_type='staff' AND FIND_IN_SET($users_table.id, '$member_ids')
        ORDER BY $users_table.first_name";
        return $this->db->query($sql);
    }

    function get_access_info($user_id = 0) {
        $users_table = $this->db->dbprefix('users');
        $roles_table = $this->db->dbprefix('roles');

        $sql = "SELECT $users_table.id, $users_table.user_type, $users_table.user_key, $users_table.is_admin,$users_table.role_id,$users_table.email,$users_table.first_name, $users_table.last_name,$users_table.job_title, $users_table.image,$roles_table.title as role_title,$roles_table.permissions
        FROM $users_table
        LEFT JOIN $roles_table ON $roles_table.id = $users_table.role_id AND $roles_table.deleted = 0
        WHERE $users_table.deleted=0 AND $users_table.id=$user_id";
        return $this->db->query($sql)->row();
    }

    function get_team_members_and_clients($user_type = "", $user_ids = "", $exlclude_user = 0) {

        $users_table = $this->db->dbprefix('users');
        $clients_table = $this->db->dbprefix('clients');


        $where = "";
        if ($user_type) {
            $where.= " AND $users_table.user_type='$user_type'";
        }

        if ($user_ids) {
            $where.= "  AND FIND_IN_SET($users_table.id, '$user_ids')";
        }

        if ($exlclude_user) {
            $where.= " AND $users_table.id !=$exlclude_user";
        }

        $sql = "SELECT $users_table.id, $users_table.user_type, $users_table.first_name, $users_table.last_name, $clients_table.company_name
        FROM $users_table
        LEFT JOIN $clients_table ON $clients_table.deleted=0
        WHERE $users_table.deleted=0 AND $users_table.status='active' $where
        ORDER BY $users_table.user_type, $users_table.first_name ASC";
        return $this->db->query($sql);
    }

    /* return comma separated list of user names */

    function user_group_names($user_ids = "") {
        $users_table = $this->db->dbprefix('users');

        $sql = "SELECT GROUP_CONCAT(' ', $users_table.first_name, ' ', $users_table.last_name) AS user_group_name
        FROM $users_table
        WHERE FIND_IN_SET($users_table.id, '$user_ids')";
        return $this->db->query($sql)->row();
    }
    function get_broker_merchant($options = array()) {
        $users_table = $this->db->dbprefix('users');

        $where = "";
        $id = get_array_value($options, "id");
        $broker_id = get_array_value($options, "broker_id");
        $status = get_array_value($options, "status");
        $user_type = get_array_value($options, "user_type");
        $exclude_user_id = get_array_value($options, "exclude_user_id");

        if ($id) {
            $where .= " AND $users_table.id=$id";
        }

        if ($user_type) {
            $where .= " AND $users_table.user_type='merchant'";
        }
        if ($exclude_user_id) {
            $where .= " AND $users_table.id!=$exclude_user_id";
        }
		if ($broker_id) {
            $where .= " AND $users_table.broker_id='$broker_id'";
        }
        
		$sql = "SELECT *,(SELECT porsant FROM `terminals` WHERE `terminals`.merchant=`users`.id) AS percent FROM $users_table WHERE $users_table.deleted=0 $where ORDER BY $users_table.id";
        return $this->db->query($sql);
    }
	function get_agent_merchant($options = array()) {
        $users_table = $this->db->dbprefix('users');

        $where = "";
        $id = get_array_value($options, "id");
        $broker_id = get_array_value($options, "broker_id");
        $status = get_array_value($options, "status");
        $user_type = get_array_value($options, "user_type");
        $exclude_user_id = get_array_value($options, "exclude_user_id");

        if ($id) {
            $where .= " AND $users_table.id=$id";
        }

        if ($user_type) {
            $where .= " AND $users_table.user_type='merchant'";
        }
        if ($exclude_user_id) {
            $where .= " AND $users_table.id!=$exclude_user_id";
        }
		if ($broker_id) {
            $where .= " AND $users_table.agent_id='$broker_id'";
        }
        
		$sql = "SELECT *,(SELECT porsant FROM `terminals` WHERE `terminals`.merchant=`users`.id) AS percent FROM $users_table WHERE $users_table.deleted=0 $where ORDER BY $users_table.id";
        return $this->db->query($sql);
    }
    function get_broker_client($options = array()) {
        $users_table = $this->db->dbprefix('users');
        $broker_id = get_array_value($options, "broker_id");
        $where = "";
        $id = get_array_value($options, "id");
        $status = get_array_value($options, "status");
        $user_type = get_array_value($options, "user_type");
        $exclude_user_id = get_array_value($options, "exclude_user_id");

        if ($id) {
            $where .= " AND $users_table.id=$id";
        }

        if ($user_type) {
            $where .= " AND $users_table.user_type='client'";
        }
        if ($exclude_user_id) {
            $where .= " AND $users_table.id!=$exclude_user_id";
        }
        if ($broker_id) {
            $where .= " AND $users_table.broker_id='$broker_id'";
        }
		$sql = "SELECT * FROM $users_table WHERE $users_table.deleted=0 $where ORDER BY $users_table.first_name";
        return $this->db->query($sql);
    }
	function get_agent_client($options = array()) {
        $users_table = $this->db->dbprefix('users');
        $broker_id = get_array_value($options, "agent_id");
        $where = "";
        $id = get_array_value($options, "id");
        $status = get_array_value($options, "status");
        $user_type = get_array_value($options, "user_type");
        $exclude_user_id = get_array_value($options, "exclude_user_id");

        if ($id) {
            $where .= " AND $users_table.id=$id";
        }

        if ($user_type) {
            $where .= " AND $users_table.user_type='client'";
        }
        if ($exclude_user_id) {
            $where .= " AND $users_table.id!=$exclude_user_id";
        }
        if ($broker_id) {
            $where .= " AND $users_table.agent_id='$broker_id'";
        }
		$sql = "SELECT * FROM $users_table WHERE $users_table.deleted=0 $where ORDER BY $users_table.first_name";
        return $this->db->query($sql);
    }
	function get_broker_agent($options = array()) {
        $users_table = $this->db->dbprefix('users');
        $broker_id = get_array_value($options, "agent_id");
        $where = "";
        $id = get_array_value($options, "id");
        $status = get_array_value($options, "status");
        $user_type = get_array_value($options, "user_type");
        $exclude_user_id = get_array_value($options, "exclude_user_id");

        if ($id) {
            $where .= " AND $users_table.id=$id";
        }

        if ($user_type) {
            $where .= " AND $users_table.user_type='broker'";
        }
        if ($exclude_user_id) {
            $where .= " AND $users_table.id!=$exclude_user_id";
        }
        if ($broker_id) {
            $where .= " AND $users_table.agent_id='$broker_id'";
        }
		$sql = "SELECT * FROM $users_table WHERE $users_table.deleted=0 $where ORDER BY $users_table.first_name";
        return $this->db->query($sql);
    }

}
