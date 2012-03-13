<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Auth extends CI_Controller {

    protected $tpl;

    function __construct() {
        parent::__construct();
        $this->load->library('ion_auth');
    }

    function create() {
        $username = 'maunder';
        $password = 'password';
        $email = '';
        $additional_data = array('fullname'=>'TRANS AVIATION MAUNDER');
        $this->ion_auth->register($username, $password, $email, $additional_data);
    }

}
