<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Graph extends CI_Controller {

    protected $tpl;

    function __construct() {
        parent::__construct();
        $this->load->library('ion_auth');
        $this->load->model('voucher_model');
        $this->load->model('log_model');
        $this->load->model('passenger_model');
        $this->tpl['themes'] = base_url('themes/bootstrap/') . '/';
        $this->load->helper('ciu');

        $login = $this->ion_auth->logged_in();
        $group = $this->ion_auth->in_group('ciu');
        if (!($login && $group)) {
            redirect('login');
        }
        $this->tpl['js'] = 'ciu';


        $this->tpl['user_data'] = $this->session->userdata('user_data');
    }

    function all_airlines() {
        $this->load->model('statistic_model');
        $by_airlines = $this->statistic_model->all_flight_monthly_year();
        $monthly = $this->statistic_model->all_flight_monthly();
        $weekly = $this->statistic_model->all_flight_weekly();
        $daily = $this->statistic_model->all_flight_daily();

        $this->tpl['by_airlines'] = $by_airlines;
        $this->tpl['monthly'] = $monthly;
        $this->tpl['weekly'] = $weekly;
        $this->tpl['daily'] = $daily;
        $this->tpl['content'] = $this->load->view('graph/all_airlines', $this->tpl, true);
        $this->load->view('body', $this->tpl);
    }

    function per_airlines($airlines_id=1) {
        $this->load->model('statistic_model');
        $monthly = $this->statistic_model->by_airlines_monthly($airlines_id);
        $daily = $this->statistic_model->by_airlines_daily($airlines_id);


        $this->tpl['monthly'] = $monthly;
        $this->tpl['daily'] = $daily;

        $this->tpl['content'] = $this->load->view('graph/by_airlines', $this->tpl, true);
        $this->load->view('body', $this->tpl);
    }

}