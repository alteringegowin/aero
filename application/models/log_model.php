<?php

class Log_Model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_log($group_id, $limit=10, $offset=0) {
        $this->db->order_by('created_at DESC');
        $this->db->join('users', 'users.id=logs.user_id', 'LEFT');
        $this->db->join('airlines_users', 'users.id=airlines_users.user_id', 'LEFT');
        $this->db->join('airlines', 'airlines.id=airlines_users.airlines_id', 'LEFT');
        $this->db->limit($limit, $offset);
        $this->db->where('group_id', $group_id);
        $res['data'] = $this->db->get('logs')->result();
        $this->db->where('group_id', $group_id);
        $res['total'] = $this->db->get('logs')->num_rows();
        return $res;
    }

    function save_log($type, $user_id, $text) {
        $db['group_id'] = $type;
        $db['user_id'] = $user_id;
        $db['log_text'] = $text;
        $db['created_at'] = date('Y-m-d H:i:s');
        $this->db->insert('logs', $db);
    }

}