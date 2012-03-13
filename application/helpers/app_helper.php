<?php

function xdebug($var) {
    echo '<pre>' . print_r($var, 1) . '</pre>';
}

function create_pagination($segment, $total, $limit, $uri_segment) {
    $CI = & get_instance();
    $CI->load->library('pagination');
    /*
      <div class="pagination">
      <ul>
      <li class="prev disabled"><a href="#">&larr; Previous</a></li>
      <li class="active"><a href="#">1</a></li>
      <li><a href="#">2</a></li>
      <li><a href="#">3</a></li>
      <li><a href="#">4</a></li>
      <li><a href="#">5</a></li>
      <li class="next"><a href="#">Next &rarr; </a></li>
      </ul>
      </div >
     * 
     */
    $config['full_tag_open'] = '<div class="pagination"><ul>';
    $config['full_tag_close'] = '</ul></div >';
    $config['first_link'] = 'First';
    $config['first_tag_open'] = '<li>';
    $config['first_tag_close'] = '</li>';
    $config['last_link'] = 'Last';
    $config['last_tag_open'] = '<li>';
    $config['last_tag_close'] = '</li>';
    $config['next_link'] = '&gt;';
    $config['next_tag_open'] = '<li>';
    $config['next_tag_close'] = '</li>';
    $config['prev_link'] = '&lt;';
    $config['prev_tag_open'] = '<li>';
    $config['prev_tag_close'] = '</li>';
    $config['cur_tag_open'] = '<li class="active"><a href="' . current_url() . '">';
    $config['cur_tag_close'] = '</a></li>';
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';
    $config['base_url'] = site_url($segment);
    $config['total_rows'] = $total;
    $config['per_page'] = $limit;
    $config['uri_segment'] = $uri_segment;

    $CI->pagination->initialize($config);

    return $CI->pagination->create_links();
}

function get_current_class($match, $segment=1) {
    $ci = & get_instance();
    $segment = $ci->uri->segment($segment, 'home');
    return $segment == $match ? 'active' : '';
}

function get_slug($title, $table, $field) {
    $ci = & get_instance();
    $title = strtolower($title);
    $url_title = url_title($title);
    $flag = TRUE;
    $i = 1;
    while ($flag) {
        $ci->db->where($field, $url_title);
        $ada = $ci->db->get($table)->row();
        if ($ada) {
            $title = increment_string($title);
            $url_title = url_title($title);
        } else {
            $flag = false;
        }
    }
    return $url_title;
}

/**
 * IMPORTED FROM WORDPRESS
 * @param type $string
 * @param type $array 
 */
function wp_parse_str($string, &$array) {
    parse_str($string, $array);
    if (get_magic_quotes_gpc())
        $array = stripslashes_deep($array);
}

function wp_parse_args($args, $defaults = '') {
    if (is_object($args))
        $r = get_object_vars($args);
    elseif (is_array($args))
        $r = & $args;
    else
        wp_parse_str($args, $r);

    if (is_array($defaults))
        return array_merge($defaults, $r);
    return $r;
}

function the_breadcrumbs($breadcrumbs = array(), $divider='&raquo;') {
    $total = count($breadcrumbs);
    $str = '<ul class="breadcrumb">';
    for ($i = 0; $i < $total; $i++) {
        if ($i < $total - 1) {
            $str .= '<li>';
            $str .= $breadcrumbs[$i];
            $str .= '<span class="divider">' . $divider . '</span>';
            $str .= '</li>';
        } else {

            $str .= '<li class="active"><strong>';
            $str .= $breadcrumbs[$i];
            $str .= '</strong></li>';
        }
    }
    $str .= '</ul>';
    echo $str;
}

function the_dd_tanggal($def='') {

    $def = set_value('tanggal');
    $options[''] = 'Date';
    for ($i = 1; $i < 32; $i++) {
        $options[$i] = $i;
    }
    echo form_dropdown('tanggal', $options, $def, 'class="span1" placeholder=".span1"');
}

function the_dd_bulan($def='') {

    $def = set_value('bulan');
    $options[''] = 'Month';
    $options['01'] = 'January';
    $options['02'] = 'February';
    $options['03'] = 'March';
    $options['04'] = 'April';
    $options['05'] = 'May';
    $options['06'] = 'June';
    $options['07'] = 'July';
    $options['08'] = 'August';
    $options['09'] = 'September';
    $options['10'] = 'October';
    $options['11'] = 'November';
    $options['12'] = 'December';
    echo form_dropdown('bulan', $options, $def, 'class="span2"');
}

function the_dd_tahun($def='') {
    $def = set_value('tahun');
    $options[''] = 'Year';
    $tahun = date('Y');
    for ($i = $tahun; $i < $tahun + 2; $i++) {
        $options[$i] = $i;
    }
    echo form_dropdown('tahun', $options, $def, 'class="span1"');
}

function generate_param_insert($param='db') {
    
}

function generate_param_validation() {
    $post = $this->input->post(NULL, true);
    foreach ($post as $k => $v) {
        echo '$this->form_validation->set_rules(\'' . $k . '\', \'' . humanize($k) . '\', \'trim|required\')';
    }
}

function the_voucher($r, $id, $return=false) {
    $str = sprintf($r . "-%08d", $id);
    if ($return) {
        return $str;
    } else {
        echo $str;
    }
}

function the_print($link) {
    echo '<a rel="tooltip" data-original-title="print this voucher" class="btn btn-small" href="javascript:void(0);" onclick="window.open(\'' . $link . '\', \'_blank\');"><i class="icon-print"></i></a>';
}

function the_delete_passanger($link) {
    echo '<a rel="tooltip" data-original-title="delete this voucher" class="btn btn-small btn-danger deleteButton" href="' . $link . '" onclick="return confirm(\'Are You Sure?\')"><i class="icon-remove-sign icon-white"></i></a>';
}

function the_user($id) {
    $ci = get_instance();
    $ci->load->library('ion_auth');
    $r = $ci->ion_auth->user($id);
    echo $r->row()->fullname;
}

function the_airlines($airlines_id) {

    $ci = get_instance();
    $row = $ci->db->get_where('airlines', array('id' => $airlines_id))->row();
    echo isset($row->airlines_name) ? $row->airlines_name : '-';
}

function create_log($user_id, $text) {
    $d['user_id'] = $user_id;
    $d['created_at'] = date('Y-m-d H:i:s');
    $d['log_text'] = $text;
    $ci = get_instance();
    $ci->db->insert('logs', $d);
}

function document_button_title($attachments, $r, $k) {
    if (isset($attachments[$r->id][$k])) {
        if ($attachments[$r->id][$k]->offline_mode) {
            return 'via offline';
        } else {
            return 'via uploaded';
        }
    } else {
        return 'not set';
    }
}

function document_button_class($attachments, $r, $k) {
    if (isset($attachments[$r->id][$k])) {
        if ($attachments[$r->id][$k]->offline_mode) {
            return 'warning';
        } else {
            return 'success';
        }
    } else {
        return 'danger';
    }
}