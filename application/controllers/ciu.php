<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ciu extends CI_Controller
{

    protected $tpl;

    function __construct()
    {
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

    function index($offset=0)
    {
        $limit = 10;
        $vouchers = $this->voucher_model->gets_all($offset, $limit);

        $pagination = create_pagination('ciu/index', $vouchers['total'], $limit, 3);
        $this->tpl['vouchers'] = $vouchers;
        $this->tpl['pagination'] = $pagination;
        $this->tpl['content'] = $this->load->view('ciu/index', $this->tpl, true);
        $this->load->view('body', $this->tpl);
    }

    function detail($voucher_id)
    {
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

    function verification($flight_id, $status)
    {
        $db['voucher_verified'] = $status;
        $this->db->where('id', $flight_id);
        $this->db->update('vouchers', $db);
        redirect('ciu/detail/' . $flight_id);
    }

    function attachment($voucher_id, $type)
    {
        $this->db->where('voucher_id', $voucher_id);
        $this->db->where('attachment_type', $type);
        $file = $this->db->get('attachments')->row();
        if ($file) {
            $this->load->helper('download');
            $data = file_get_contents("./attachments/" . $file->attachment_file); // Read the file's contents
            $name = $file->attachment_file;

            force_download($name, $data);
        } else {
            show_404();
        }
    }

    function import($voucher_id)
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('userfile2', 'File Upload', 'callback__upload_data');
        if ($this->form_validation->run()) {

            $log_text = anchor('ciu/detail/' . $voucher_id, ' import data pasenger ');
            $this->log_model->save_log(3, $this->session->userdata('user_id'), $log_text);


            $log_text = anchor('release/detail/' . $voucher_id, ' import data pasenger ');
            $this->log_model->save_log(2, $this->session->userdata('user_id'), $log_text);

            $this->tpl['is_frozzen'] = true;
        }

        $flight = $this->voucher_model->get($voucher_id);
        if (!$flight->voucher_status) {
            $this->voucher_model->read_voucher($voucher_id);
        }

        $passengers = $this->passenger_model->get_passengers($voucher_id);



        $this->tpl['flight'] = $flight;
        $this->breadcrumbs[] = anchor('ciu', 'Progress Monitoring');
        $this->breadcrumbs[] = anchor('ciu/detail/' . $flight->id, $flight->flight_number . ' on ' . $flight->flight_date);
        $this->breadcrumbs[] = 'Import';


        $this->tpl['breadcrumbs'] = $this->breadcrumbs;
        $this->tpl['passengers'] = $passengers;
        $this->tpl['content'] = $this->load->view('ciu/import', $this->tpl, true);
        $this->load->view('body', $this->tpl);
    }
    
    
    function ajax_manifest($id)
    {

        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'name', 'trim|required');
        $this->form_validation->set_rules('ticket', 'ticket', 'trim|required');
        if ($this->form_validation->run()) {
            $db['passenger_name'] = $this->input->post('name', 1);
            $db['passenger_ticket'] = $this->input->post('ticket', 1);
            $db['passanger_remark'] = $this->input->post('remark', 1);
            $this->db->where('id', $id);
            $this->db->update('passengers', $db);
            $json['success'] = true;
            $json['data'] = true;
        } else {
            $json['success'] = false;
            $json['data'] = validation_errors('<br>', '.');
        }
        echo json_encode($json);
    }

    function _upload_data()
    {
        $config['upload_path'] = './uploads/passanger/';
        $config['allowed_types'] = 'csv';
        $config['allowed_types'] = 'csv';
        $config['max_size'] = '1000';

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload()) {
            $error = $this->upload->display_errors();
            $this->form_validation->set_message('_upload_data', $error);
            return FALSE;
        } else {
            $data = $this->upload->data();
            $fopen = fopen($data['full_path'], 'r');
            $i = 0;
            $sudah_ada = 0;
            $sukses = 0;
            $i = 0;
            while (($data = fgetcsv($fopen, 1000, ";")) !== FALSE) {
                if ($i) {
                    if (count($data) == 5) {
                        if (isset($data[0]) && $data[0]) {
                            $db['passenger_name'] = $data[2];
                            $db['passenger_ticket'] = $data[3];
                            $db['passanger_remark'] = $data[4];
                            $this->db->where('voucher_code', $data[0]);
                            $this->db->where('voucher_id', $this->uri->segment(3, 0));
                            $this->db->update('passengers', $db);
                        }
                    }
                }
                $i++;
            }
            return TRUE;
        }
    }

    function download($voucher_id)
    {
        $this->load->helper('download');
        $passengers = $this->passenger_model->get_passengers($voucher_id);
        $str[] = 'VOUCHER;PRICE;NAME;TICKET;REMARK';
        foreach ($passengers as $v) {
            $str[] = $v->voucher_code . ';' . $v->price . ';;;;';
        }

        $data = implode("\n", $str);
        force_download('VOUCHER.CSV', $data);
    }

}
