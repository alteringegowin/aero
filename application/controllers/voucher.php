<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Voucher extends CI_Controller
{

    protected $tpl;
    protected $voucher_id;
    protected $airlines_id;

    function __construct()
    {
        parent::__construct();
        $this->tpl['themes'] = base_url('themes/bootstrap/') . '/';
        $this->load->helper('flight');
        $this->load->library('ion_auth');
        $login = $this->ion_auth->logged_in();
        $group = $this->ion_auth->in_group('airlines');
        if (!($login && $group)) {
            redirect('login');
        }
        $this->airlines_id = $this->session->userdata('airlines_id');

        $this->load->model('log_model');
        $this->load->model('flight_model');
        $this->load->model('voucher_model');
        $this->breadcrumbs[] = anchor('dashboard', 'Dashboard');
    }

    function index($offset=0)
    {
        redirect('voucher/add');
        $limit = 10;
        $vouchers = $this->voucher_model->get_voucher_by_airlines($this->airlines_id, $offset);
        $pagination = create_pagination('voucher/index', $vouchers['total'], $limit, 3);

        $this->tpl['vouchers'] = $vouchers;
        $this->tpl['pagination'] = $pagination;
        $this->tpl['content'] = $this->load->view('voucher/index', $this->tpl, true);
        $this->load->view('body', $this->tpl);
    }

    function add()
    {
        $this->load->helper('array');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('voucher_type', 'Voucher Type', 'trim|required');
        $this->form_validation->set_rules('flight_number', 'Flight Number', 'trim|required');
        $this->form_validation->set_rules('std', 'STD', 'trim|required|callback__selisih');
        $this->form_validation->set_rules('etd', 'ETD', 'trim|required');
        $this->form_validation->set_rules('departure_city', 'Departure City', 'trim|required');
        $this->form_validation->set_rules('arrival_city', 'Arrival City', 'trim|required');
        $this->form_validation->set_rules('delay_reason', 'Reason Of Delay', 'trim|required');
        $this->form_validation->set_rules('total_pax_delay', 'Total Pax Delay', 'trim|numeric');
        $this->form_validation->set_rules('total_pax_cancel', 'Total Pax Cancel', 'trim|numeric');
        $this->form_validation->set_rules('total_pax_reroute', 'Total Pax Re-route', 'trim|numeric');
        $this->form_validation->set_rules('total_pax_transfer', 'Total Pax Transfer', 'trim|numeric');
        $this->form_validation->set_rules('file-1', 'Attachment Telex', 'callback__attach_file_telex');

        if ($this->form_validation->run()) {

            $post = $this->input->post(NULL, true);
            $attachments = $this->session->userdata('attachments');

            $date = date('Y-m-d', strtotime($post['flight_date']));
            $dbflight['user_id'] = $this->session->userdata('user_id');
            $dbflight['flight_date'] = $date;
            $dbflight['airlines_id'] = $this->airlines_id;
            $dbflight['voucher_type'] = $post['voucher_type'];
            $dbflight['flight_number'] = $post['flight_number'];
            $dbflight['departure_city'] = $post['departure_city'];
            $dbflight['arrival_city'] = $post['arrival_city'];
            $dbflight['delay_reason'] = $post['delay_reason'];
            $dbflight['flight_std'] = $post['std'];
            $dbflight['flight_etd'] = $post['etd'];
            $dbflight['total_pax_delay'] = element('total_pax_delay', $post, 0);
            $dbflight['total_pax_transfer'] = element('total_pax_transfer', $post, 0);
            $dbflight['total_pax_reroute'] = element('total_pax_reroute', $post, 0);
            $dbflight['total_pax_cancelled'] = element('total_pax_cancel', $post, 0);
            $dbflight['voucher_created_at'] = date('Y-m-d H:i:s');
            $this->db->insert('vouchers', $dbflight);
            $voucher_id = $this->db->insert_id();

            $this->voucher_model->create_voucher('delay', element('total_pax_delay', $post, 0), $post['flight_number'], $voucher_id);
            $this->voucher_model->create_voucher('transfer', element('total_pax_transfer', $post, 0), $post['flight_number'], $voucher_id);
            $this->voucher_model->create_voucher('reroute', element('total_pax_reroute', $post, 0), $post['flight_number'], $voucher_id);
            $this->voucher_model->create_voucher('cancelled', element('total_pax_cancel', $post, 0), $post['flight_number'], $voucher_id);

            //attachments
            if ($attachments) {
                foreach ($attachments as $k => $v) {
                    $dbattach['voucher_id'] = $voucher_id;
                    $dbattach['attachment_type'] = $k;
                    $dbattach['attachment_file'] = $v['file_name'];
                    $dbattach['offline_mode'] = 0;
                    $this->db->insert('attachments', $dbattach);
                }
                $this->session->unset_userdata('attachments');
            }


            $log_text = anchor('ciu/detail/' . $voucher_id, ' request voucher ' . $post['flight_number']);
            $this->log_model->save_log(3, $this->session->userdata('user_id'), $log_text);


            $log_text = anchor('release/detail/' . $voucher_id, ' request voucher ' . $post['flight_number']);
            $this->log_model->save_log(2, $this->session->userdata('user_id'), $log_text);

            
            redirect('document');
        }
        $this->db->order_by('kode');
        $res = $this->db->get('bandara')->result();
        foreach ($res as $r) {
            $ddbandara[$r->kode] = $r->kode;
        }


        $this->db->order_by('code');
        $codes = $this->db->get('delay_codes')->result();
        $ddDelay = array();
        foreach ($codes as $c) {
            $ddDelay[$c->code] = $c->code . ' -' . $c->note;
        }

        $this->tpl['ddDelay'] = $ddDelay;
        $this->tpl['jam'] = range(0, 24);
        $this->tpl['menit'] = range(0, 59);
        $this->tpl['ddbandara'] = $ddbandara;
        $this->tpl['content'] = $this->load->view('voucher/add', $this->tpl, true);
        $this->load->view('body', $this->tpl);
    }

    function edit()
    {

        $this->tpl['content'] = $this->load->view('flight/edit', $this->tpl, true);
        $this->load->view('body', $this->tpl);
    }

    function import($flight_id)
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('userfile2', 'File Upload', 'callback__upload_data');
        if ($this->form_validation->run()) {
            $this->tpl['statistic_upload'] = $this->session->userdata('statistic_upload');
            $this->tpl['is_frozzen'] = true;
        }



        $flight = $this->db->get_where('flights', array('id' => $flight_id))->row();


        $this->breadcrumbs[] = anchor('flight', 'Voucher');
        $this->breadcrumbs[] = anchor('flight/detail/' . $flight_id, $flight->flight_number . ' on ' . $flight->flight_date);
        $this->breadcrumbs[] = 'Import Data Passanger';


        $this->tpl['breadcrumbs'] = $this->breadcrumbs;
        $this->tpl['flight'] = $flight;
        $this->tpl['content'] = $this->load->view('flight/import', $this->tpl, true);
        $this->load->view('body', $this->tpl);
    }

    function _attach_file_telex()
    {
        if ($_FILES) {
            $files = array();
            $msg = array();
            $config['upload_path'] = './attachments/';
            $config['allowed_types'] = '*';
            $config['max_size'] = '2000';

            $this->load->library('upload', $config);

            $errors = false;
            foreach ($_FILES as $k => $v) {
                if (!empty($v['name'])) {

                    if (!$this->upload->do_upload($k)) {
                        $msg[] = $this->upload->display_errors($v['name'] . ' ', '<br/>');
                        $errors = true;
                    } else {
                        $ks = str_replace('file-', '', $k);
                        $files[$ks] = $this->upload->data();
                    }
                }
            }

            if ($errors) {
                foreach ($files as $key => $file) {
                    @unlink($file['full_path']);
                }
                $error = implode('', $msg);
                $this->form_validation->set_message('_attach_file_telex', $error);
                return FALSE;
            } else {
                $this->session->set_userdata('attachments', $files);
                return true;
            }
        }
    }

    function _selisih()
    {
        $std = $this->input->post('std');
        $etd = $this->input->post('etd');

        $a_std = explode(':', $std);
        $a_etd = explode(':', $etd);

        $std_jam = intval($a_std[0]);
        $etd_jam = intval($a_etd[0]);
        $std_menit = intval($a_std[1]);
        $etd_menit = intval($a_etd[1]);

        $total_etd = ($etd_jam * 60) + $etd_menit;
        $total_std = ($std_jam * 60) + $std_menit;

        $total = $total_etd - $total_std;

        if ($total > (60 * 4)) {
            return true;
        } elseif ($total < 1) {
            $this->form_validation->set_message('_selisih', 'ETD lebih awal daripada STD');
            return FALSE;
        } else {
            $this->form_validation->set_message('_selisih', 'STD dan ETD Kurang Dari 4 jam');
            return FALSE;
        }
    }

    function download($flight_id)
    {
        $this->load->helper('download');
        $vouchers = $this->voucher_model->get_vouchers($flight_id);
        $str[] = 'VOUCHER;NAME;TICKET;BOOKING;FR;REMARK;DATE';
        foreach ($vouchers as $v) {
            $str[] = $v->voucher_code . ';;;;;';
        }

        $data = implode("\n", $str);
        force_download('VOUCHER.CSV', $data);
    }

}
