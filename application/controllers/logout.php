<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Logout extends CI_Controller {

    protected $tpl;

    function __construct() {
        parent::__construct();
        $this->tpl['themes'] = base_url('themes/bootstrap/') . '/';
        $this->load->library('ion_auth');
    }

    public function index() {
        $this->ion_auth->logout();
        redirect('dashboard');
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */