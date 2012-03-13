<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ciu extends CI_Controller {

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
    }

    function index($offset=0) {
        $limit = 10;
        $vouchers = $this->voucher_model->gets_all($offset, $limit);
        
        $pagination = create_pagination('ciu/index', $vouchers['total'], $limit, 3);
        $this->tpl['vouchers'] = $vouchers;
        $this->tpl['pagination'] = $pagination;
        $this->tpl['content'] = $this->load->view('ciu/index', $this->tpl, true);
        $this->load->view('body', $this->tpl);
    }

    function detail($voucher_id) {
        $this->load->helper('form');

        $flight = $this->voucher_model->get($voucher_id);
        if (!$flight->voucher_status) {
            $this->voucher_model->read_voucher($voucher_id);
        }

        $passengers = $this->passenger_model->get_passengers($voucher_id);
        $documents = $this->voucher_model->get_attachment($voucher_id);
        $doc_type = config_item('doc_upload_type');

        $this->tpl['doc_type'] = $doc_type;
        $this->tpl['documents'] = $documents;
        $this->tpl['flight'] = $flight;
        $this->breadcrumbs[] = anchor('flight', 'Voucher');
        $this->breadcrumbs[] = $flight->flight_number . ' on ' . $flight->flight_date;

        $this->tpl['breadcrumbs'] = $this->breadcrumbs;
        $this->tpl['passengers'] = $passengers;
        $this->tpl['content'] = $this->load->view('ciu/detail', $this->tpl, true);
        $this->load->view('body', $this->tpl);
    }

    function verification($flight_id, $status) {
        $db['voucher_verified'] = $status;
        $this->db->where('id', $flight_id);
        $this->db->update('vouchers', $db);
        redirect('ciu/detail/' . $flight_id);
    }

    function attachment($voucher_id, $type) {
        $this->db->where('voucher_id', $voucher_id);
        $this->db->where('attachment_type', $type);
        $file = $this->db->get('attachments')->row();
        if ($file) {
            $this->load->helper('download');
            $data = file_get_contents("./attachments/" . $file->attachment_file); // Read the file's contents
            $name = $file->attachment_file;

            force_download($name, $data);
        }else{
            show_404();
        }
    }

}
