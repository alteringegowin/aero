<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    protected $tpl;
    protected $group;

    function __construct() {
        parent::__construct();
        $this->load->library('ion_auth');
        $this->load->model('log_model');

        $login = $this->ion_auth->logged_in();
        if (!$login) {
            redirect('login');
        }
        
        $this->group = $this->session->userdata('group');
        $this->load->helper('flight');
        $this->tpl['themes'] = base_url('themes/bootstrap/') . '/';
    }

    function index() {
        $v = $this->group;
        $this->$v();
        /**
          $this->group = $this->session->userdata('group');
          $this->tpl['content'] = $this->load->view('dashboard/' . $this->group, $this->tpl, true);
          $this->load->view('body', $this->tpl);
         * 
         */
    }

    function airlines() {
        $group = $this->ion_auth->in_group('airlines');
        $this->tpl['user_data'] = $this->session->userdata('user_data');
        $this->tpl['content'] = $this->load->view('dashboard/airlines', $this->tpl, true);
        $this->load->view('body', $this->tpl);
    }

    function ciu() {
        $group = $this->ion_auth->in_group('ciu');
        $logs = $this->log_model->get_log(3, 10);
        
        
        $this->db->order_by('id');
        $dbairlines = $this->db->get('airlines')->result();

        $this->load->model('statistic_model');
        $pie = $this->statistic_model->all_voucher_pie();
        $pie_type = $this->statistic_model->pie_voucher_type();

        $this->tpl['pie'] = $pie;
        $this->tpl['pie_type'] = $pie_type;
        $this->tpl['logs'] = $logs;
        $this->tpl['dbairlines'] = $dbairlines;
        $this->tpl['user_data'] = $this->session->userdata('user_data');
        $this->tpl['content'] = $this->load->view('dashboard/ciu', $this->tpl, true);
        $this->load->view('body', $this->tpl);
    }

}
