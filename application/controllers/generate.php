<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Auth extends CI_Controller {

    protected $tpl;

    function __construct() {
        parent::__construct();
        $this->load->library('ion_auth');
    }

    function generate_voucher() {

        $airlines_id = 1;


        $date = date('Y-m-d', strtotime($post['flight_date']));
        $dbflight['user_id'] = $this->session->userdata('user_id');
        $dbflight['flight_date'] = $date;
        $dbflight['airlines_id'] = $airlines_id;
        $dbflight['voucher_type'] = $post['voucher_type'];
        $dbflight['flight_number'] = $post['flight_number'];
        $dbflight['departure_city'] = $post['departure_city'];
        $dbflight['arrival_city'] = $post['arrival_city'];
        $dbflight['delay_reason'] = $post['delay_reason'];
        $dbflight['flight_std'] = $post['std'];
        $dbflight['flight_etd'] = $post['etd'];
        $dbflight['total_pax_delay'] = element('total_pax_delay', $post, 0);
        $dbflight['total_pax_transfer'] = element('total_pax_transfer', $post, 0);
        $dbflight['total_pax_cancelled'] = element('total_pax_cancel', $post, 0);
        $dbflight['voucher_created_at'] = date('Y-m-d H:i:s');
        $dbflight['attachment'] = $this->session->userdata('attachment_files');
        $this->db->insert('vouchers', $dbflight);
        $voucher_id = $this->db->insert_id();

        $this->voucher_model->create_voucher('delay', element('total_pax_delay', $post, 0), $post['flight_number'], $voucher_id);
        $this->voucher_model->create_voucher('transfer', element('total_pax_transfer', $post, 0), $post['flight_number'], $voucher_id);
        $this->voucher_model->create_voucher('cancelled', element('total_pax_cancel', $post, 0), $post['flight_number'], $voucher_id);
        $this->session->unset_userdata('attachment_files');

        $linklog = anchor('release/detail/' . $voucher_id, $post['flight_number']);
        create_log($this->session->userdata('user_id'), 'request voucher ' . $linklog);
    }

}