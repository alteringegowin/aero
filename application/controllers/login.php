<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {

    protected $tpl;

    function __construct() {
        parent::__construct();
        $this->load->library('ion_auth');
        $this->tpl['themes'] = base_url('themes/bootstrap/') . '/';
    }

    public function index() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run()) {
            if ($this->ion_auth->login($this->input->post('username'), $this->input->post('password'))) {
                $user = $this->ion_auth->user()->row();
                $user_data['fullname'] = $user->fullname;
                $user_data['username'] = $user->username;
                $this->session->set_userdata('user_data', $user_data);
                if ($this->ion_auth->in_group('airlines')) {
                    $this->session->set_userdata('group', 'airlines');
                    $row = $this->db->get_where('airlines_users', array('user_id' => $this->session->userdata('user_id')))->row();
                    if (!isset($row->airlines_id)) {
                        redirect('logout');
                    }
                    $this->session->set_userdata('airlines_id', $row->airlines_id);
                    redirect('dashboard');
                } elseif ($this->ion_auth->in_group('ciu')) {
                    $this->session->set_userdata('group', 'ciu');
                    redirect('dashboard');
                } else {
                    $this->session->set_userdata('group', 'administrator');
                    redirect('dashboard');
                }
            } else {
                $this->tpl['error'] = $this->ion_auth->errors();
            }
        }

        $this->tpl['content'] = $this->load->view('login/index', $this->tpl, true);
        $this->load->view('body', $this->tpl);
    }

    function _successfull_login() {
        
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */