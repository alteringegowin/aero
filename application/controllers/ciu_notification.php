<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ciu_notification extends CI_Controller {

    protected $tpl;

    function __construct() {
        parent::__construct();
        $this->load->library('ion_auth');
        $this->load->model('log_model');
        $this->tpl['themes'] = base_url('themes/bootstrap/') . '/';
        $this->load->helper('ciu');

        $login = $this->ion_auth->logged_in();
        $group = $this->ion_auth->in_group('ciu');
        if (!($login && $group)) {
            redirect('login');
        }
        $this->tpl['js'] = 'ciu';
    }

    function index($offset=0) {
        $limit = 10;
        $logs = $this->log_model->get_log(3, $limit, $offset);
        $pagination = create_pagination('ciu_notification/index', $logs['total'], $limit, 3);

        $this->tpl['logs'] = $logs;
        $this->tpl['pagination'] = $pagination;
        $this->tpl['content'] = $this->load->view('ciu_notification/index', $this->tpl, true);
        $this->load->view('body', $this->tpl);
    }

}
