<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Document extends CI_Controller {

    protected $tpl;

    function __construct() {
        parent::__construct();
        $this->tpl['themes'] = base_url('themes/bootstrap/') . '/';
        $this->load->helper('flight');
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
        $this->session->set_userdata('back_url', current_url());
        $limit = 10;
        $vouchers = $this->voucher_model->get_voucher_by_airlines($this->airlines_id, $offset);
        $pagination = create_pagination('release/index', $vouchers['total'], $limit, 3);
        $doc_upload_type = config_item('doc_upload_type');
        $doc_upload_type_icon = config_item('doc_upload_type_icon');
        $attachments = array();
        foreach ($vouchers['data'] as $r) {
            $attachments[$r->id] = $this->voucher_model->get_attachment($r->id);
        }

        $this->tpl['doc_upload_type'] = $doc_upload_type;
        $this->tpl['doc_upload_type_icon'] = $doc_upload_type_icon;
        $this->tpl['vouchers'] = $vouchers;
        $this->tpl['attachments'] = $attachments;
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
            if ($this->session->userdata('back_url')) {
                redirect($this->session->userdata('back_url'));
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
        $config['allowed_types'] = 'pdf|csv|doc|docx|xls|xlsx|txt|jpg|gif|png|jpeg|ppt|pptx|zip|tar';
        $config['max_size'] = '2000';
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
        if ($this->input->is_ajax_request()) {
            echo 1;
        } else {
            if ($this->session->userdata('back_url')) {
                redirect($this->session->userdata('back_url'));
            }
            redirect('document/add/' . $voucher_id);
        }
    }

    function setting_offline($voucher_id, $type) {
        $db['voucher_id'] = $voucher_id;
        $db['attachment_type'] = $type;
        $this->db->where($db);
        $ada = $this->db->get('attachments')->row();
        if ($ada) {
            $db['offline_mode'] = 1;
            $this->db->where('voucher_id', $voucher_id);
            $this->db->where('attachment_type', $type);
            $this->db->update('attachments', $db);
        } else {
            $db['offline_mode'] = 1;
            $this->db->insert('attachments', $db);
        }
        if ($this->input->is_ajax_request()) {
            echo 1;
        } else {
            if ($this->session->userdata('back_url')) {
                redirect($this->session->userdata('back_url'));
            }
            redirect('document/add/' . $voucher_id);
        }
    }

}
