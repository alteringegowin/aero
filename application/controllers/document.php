<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Document extends CI_Controller {

    protected $tpl;

    function __construct() {
        parent::__construct();
        $this->tpl['themes'] = base_url('themes/bootstrap/') . '/';
        $this->load->helper('release');
        $this->load->library('ion_auth');
        $login = $this->ion_auth->logged_in();
        $group = $this->ion_auth->in_group('airlines');
        if (!($login && $group)) {
            redirect('login');
        }
        $this->airlines_id = $this->session->userdata('airlines_id');
        $this->load->model('passenger_model');
        $this->load->model('voucher_model');
        $this->load->model('log_model');
        $this->breadcrumbs[] = anchor('dashboard', 'Dashboard');
    }

    function index($offset=0) {
        $limit = 10;
        $vouchers = $this->voucher_model->get_voucher_by_airlines($this->airlines_id, $offset);
        $pagination = create_pagination('release/index', $vouchers['total'], $limit, 3);

        $this->tpl['vouchers'] = $vouchers;
        $this->tpl['pagination'] = $pagination;
        $this->tpl['content'] = $this->load->view('document/index', $this->tpl, true);
        $this->load->view('body', $this->tpl);
    }


    function print_list($voucher_id) {

        $flight = $this->voucher_model->get($voucher_id);
        $passengers = $this->passenger_model->get_passengers($voucher_id);

        $this->tpl['flight'] = $flight;
        $this->breadcrumbs[] = anchor('flight', 'Voucher');
        $this->breadcrumbs[] = $flight->flight_number . ' on ' . $flight->flight_date;

        $this->tpl['breadcrumbs'] = $this->breadcrumbs;
        $this->tpl['passengers'] = $passengers;
        $this->tpl['content'] = $this->load->view('release/print_list', $this->tpl);
    }

    function detail($voucher_id) {
        $flight = $this->voucher_model->get($voucher_id);
        $passengers = $this->passenger_model->get_passengers($voucher_id);

        $this->tpl['flight'] = $flight;
        $this->breadcrumbs[] = anchor('flight', 'Voucher');
        $this->breadcrumbs[] = $flight->flight_number . ' on ' . $flight->flight_date;

        $this->tpl['breadcrumbs'] = $this->breadcrumbs;
        $this->tpl['passengers'] = $passengers;
        $this->tpl['content'] = $this->load->view('release/detail', $this->tpl, true);
        $this->load->view('body', $this->tpl);
    }

    function add($voucher_id='') {
        $this->load->helper('array');

        $upload_type = config_item('doc_upload_type');
        $flight = $this->voucher_model->get($voucher_id);
        $attachments = $this->voucher_model->get_attachment($voucher_id);


        $this->tpl['flight'] = $flight;
        $this->tpl['attachments'] = $attachments;
        $this->tpl['upload_type'] = $upload_type;
        $this->tpl['content'] = $this->load->view('document/add', $this->tpl, true);
        $this->load->view('body', $this->tpl);
    }

    function upload($voucher_id, $type) {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('voucher_id', 'File', 'callback__upload_file');
        if ($this->form_validation->run()) {
            $upload = $this->session->userdata('upload_data');
            $db['voucher_id'] = $voucher_id;
            $db['attachment_type'] = $type;
            $this->db->where($db);
            $ada = $this->db->get('attachments')->row();
            if ($ada) {
                $db['attachment_file'] = $upload['file_name'];
                $db['offline_mode'] = 0;
                $this->db->where('voucher_id', $voucher_id);
                $this->db->where('attachment_type', $type);
                $this->db->update('attachments', $db);
            } else {
                $db['attachment_file'] = $upload['file_name'];
                $db['offline_mode'] = 0;
                $this->db->insert('attachments', $db);
            }
            redirect('document/add/' . $voucher_id);
        }




        $upload_type = config_item('doc_upload_type');
        $flight = $this->voucher_model->get($voucher_id);

        $this->tpl['upload_type'] = $upload_type;
        $this->tpl['type'] = $type;
        $this->tpl['flight'] = $flight;
        $this->tpl['content'] = $this->load->view('document/upload', $this->tpl, true);
        $this->load->view('body', $this->tpl);
    }

    function _upload_file() {
        $config['upload_path'] = './attachments/';
        $config['allowed_types'] = 'csv|doc|docx|xls|xlsx|txt|jpg|gif|png|jpeg|ppt|pptx|zip|tar';
        $config['allowed_types'] = 'csv';
        $config['max_size'] = '1000';
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload()) {
            $error = $this->upload->display_errors();
            $this->form_validation->set_message('_upload_file', $error);
            return FALSE;
        } else {
            $data = $this->upload->data();
            $this->session->set_userdata('upload_data', $data);
            return TRUE;
        }
    }

    function set_offline($voucher_id) {
        $db['voucher_id'] = $voucher_id;
        $db['attachment_type'] = $this->input->post('type', 1);
        $this->db->where($db);
        $ada = $this->db->get('attachments')->row();
        if ($ada) {
            $db['offline_mode'] = $this->input->post('status', 1);
            $this->db->where('voucher_id', $voucher_id);
            $this->db->where('attachment_type', $this->input->post('type', 1));
            $this->db->update('attachments', $db);
        } else {
            $db['offline_mode'] = $this->input->post('status', 1);
            $this->db->insert('attachments', $db);
        }
        echo 1;
    }

}
