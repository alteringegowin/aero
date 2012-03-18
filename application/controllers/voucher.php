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
        $this->form_validation->set_rules('Telex', 'Attachment Telex', 'callback__attach_file_telex');
        $this->form_validation->set_rules('manifest', 'Attachment Manifest', 'callback__attach_file_manifest');
        $this->form_validation->set_rules('movement', 'Attachment Movement', 'callback__attach_file_movement');

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
                    $dbattach['attachment_file'] = $v;
                    $dbattach['offline_mode'] = 0;
                    $this->db->insert('attachments', $dbattach);
                }
            }

            $this->session->unset_userdata('attachments');

            $log_text = anchor('ciu/detail/' . $voucher_id, ' request voucher ' . $post['flight_number']);
            $this->log_model->save_log(3, $this->session->userdata('user_id'), $log_text);


            $log_text = anchor('release/detail/' . $voucher_id, ' request voucher ' . $post['flight_number']);
            $this->log_model->save_log(2, $this->session->userdata('user_id'), $log_text);


            redirect('voucher');
        }
        $this->db->order_by('kode');
        $res = $this->db->get('bandara')->result();
        foreach ($res as $r) {
            $ddbandara[$r->kode] = $r->kode;
        }

        $this->session->unset_userdata('attachments');

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
        if ($_FILES['telex']['name']) {
            $config['upload_path'] = './attachments/';
            $config['allowed_types'] = 'pdf|csv|doc|docx|xls|xlsx|txt|jpg|gif|png|jpeg|ppt|pptx|zip|tar';
            $config['max_size'] = '2000';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('telex')) {
                $error = 'Telex file Error:' . $this->upload->display_errors();
                $this->form_validation->set_message('_attach_file_telex', $error);
                return FALSE;
            } else {
                $attachments = array();
                $data = $this->upload->data();
                $attachments[1] = $data['file_name'];
                $this->session->set_userdata('attachments', $attachments);
                return true;
            }
        } else {
            return true;
        }
    }

    function _attach_files_manifest()
    {
        if ($_FILES['manifest']['name']) {
            $config['upload_path'] = './attachments/';
            $config['allowed_types'] = 'pdf|csv|doc|docx|xls|xlsx|txt|jpg|gif|png|jpeg|ppt|pptx|zip|tar';
            $config['max_size'] = '2000';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('manifest')) {
                $error = 'Manifest file Error:' . $this->upload->display_errors();
                $this->form_validation->set_message('_attach_files_manifest', $error);
                return FALSE;
            } else {
                $attachments = array();
                $data = $this->upload->data();
                $attachments[2] = $data['file_name'];
                $this->session->set_userdata('attachments', $attachments);
                return true;
            }
        } else {
            return true;
        }
    }

    function _attach_files_movement()
    {
        if ($_FILES['movement']['name']) {
            $config['upload_path'] = './attachments/';
            $config['allowed_types'] = 'pdf|csv|doc|docx|xls|xlsx|txt|jpg|gif|png|jpeg|ppt|pptx|zip|tar';
            $config['max_size'] = '2000';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('movement')) {
                $error = 'Movement file Error:' . $this->upload->display_errors();
                $this->form_validation->set_message('_attach_files_movement', $error);
                return FALSE;
            } else {
                $attachments = array();
                $data = $this->upload->data();
                $attachments[3] = $data['file_name'];
                $this->session->set_userdata('attachments', $attachments);
                return true;
            }
        } else {
            return true;
        }
    }

    /*
      function _upload_data() {
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
      while (($data = fgetcsv($fopen, 1000, ";")) !== FALSE) {
      if (count($data) == 7) {
      if ($i) {
      $this->db->where('passenger_ticket', $data[2]);
      $row = $this->db->get('vouchers')->row();
      if ($row) {
      $sudah_ada++;
      } else {
      $sukses++;
      $db['flight_id'] = $this->uri->segment(3, 0);
      $db['passenger_name'] = $data[1];
      $db['passenger_ticket'] = $data[2];
      $db['passenger_booking'] = $data[3];
      $db['passenger_fr'] = $data[4];
      $db['passenger_remark'] = $data[5];
      $db['passenger_date'] = $data[6];
      $this->db->where('voucher_code', $data[0]);
      $this->db->update('vouchers', $db);
      }
      }
      }
      $i++;
      }
      $session['sudah_ada'] = $sudah_ada;
      $session['sukses'] = $sukses;
      $session['total'] = $i - 1;
      $this->session->set_userdata('statistic_upload', $session);
      return TRUE;
      }
      }
     * 
     */

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
            $this->form_validation->set_message('_selisih', 'STD dan ETD Lebih Dari 4 jam');
            return FALSE;
        } elseif ($total < 1) {
            $this->form_validation->set_message('_selisih', 'ETD lebih awal daripada STD');
            return FALSE;
        } else {
            return true;
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
