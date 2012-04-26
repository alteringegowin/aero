<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    protected $tpl;
    protected $group;

    function __construct()
    {
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

    function index()
    {
        $v = $this->group;
        $this->$v();
        /**
          $this->group = $this->session->userdata('group');
          $this->tpl['content'] = $this->load->view('dashboard/' . $this->group, $this->tpl, true);
          $this->load->view('body', $this->tpl);
         * 
         */
    }

    function airlines_download_three_day()
    {

        $this->load->model('statistic_model');
        $group = $this->ion_auth->in_group('airlines');

        $graph_harian = $this->statistic_model->airlines_dashboard($this->session->userdata('airlines_id'), '1 MONTH');
        xdebug($graph_harian);

        $this->load->library('table');

        $data = array(
            array('Name', 'Color', 'Size'),
            array('Fred', 'Blue', 'Small'),
            array('Mary', 'Red', 'Large'),
            array('John', 'Green', 'Medium')
        );

        echo $this->table->generate($data);
    }

    function airlines()
    {
        $this->load->model('statistic_model');
        $group = $this->ion_auth->in_group('airlines');

        $graph_harian = $this->statistic_model->airlines_dashboard($this->session->userdata('airlines_id'));
        $graph_mingguan = $this->statistic_model->airlines_dashboard($this->session->userdata('airlines_id'), '1 WEEK');
        $graph_bulanan = $this->statistic_model->airlines_dashboard($this->session->userdata('airlines_id'), '1 MONTH');




        $this->tpl['is_graph_dashboard'] = 1;
        $this->tpl['graph_harian'] = $graph_harian;
        $this->tpl['graph_mingguan'] = $graph_mingguan;
        $this->tpl['graph_bulanan'] = $graph_bulanan;
        $this->tpl['user_data'] = $this->session->userdata('user_data');
        $this->tpl['content'] = $this->load->view('dashboard/airlines', $this->tpl, true);
        $this->load->view('body', $this->tpl);
    }

    function ciu()
    {
        $group = $this->ion_auth->in_group('ciu');
        $logs = $this->log_model->get_log(3, 10);


        $this->db->order_by('id');
        $dbairlines = $this->db->get('airlines')->result();

        $this->tpl['logs'] = $logs;
        $this->tpl['dbairlines'] = $dbairlines;
        $this->tpl['user_data'] = $this->session->userdata('user_data');
        $this->tpl['content'] = $this->load->view('dashboard/ciu', $this->tpl, true);
        $this->load->view('body', $this->tpl);
    }

}
