<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Release extends CI_Controller
{

    protected $tpl;

    function __construct()
    {
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

    function index($offset=0)
    {
        $limit = 10;
        $vouchers = $this->voucher_model->get_voucher_by_airlines($this->airlines_id, $offset);
        $pagination = create_pagination('release/index', $vouchers['total'], $limit, 3);

        $this->tpl['vouchers'] = $vouchers;
        $this->tpl['pagination'] = $pagination;
        $this->tpl['content'] = $this->load->view('release/index', $this->tpl, true);
        $this->load->view('body', $this->tpl);
    }

    function print_voucer_all($voucher_id)
    {
        $this->load->helper('text');
        $log_text = anchor('ciu/detail/' . $voucher_id, ' print a voucher ');
        $this->log_model->save_log(3, $this->session->userdata('user_id'), $log_text);


        $log_text = anchor('release/detail/' . $voucher_id, ' print a voucher ');
        $this->log_model->save_log(2, $this->session->userdata('user_id'), $log_text);
        $this->voucher_model->set_print_voucher($voucher_id);


        if ($this->airlines_id == 3) {

            $this->load->library('Airasia_pdf');
            $this->airasia_pdf->AliasNbPages();
            $this->airasia_pdf->SetMargins(0.5, 0.5);

            $vouchers = $this->passenger_model->get_passengers($voucher_id, 'print');
            
            foreach ($vouchers as $r) {
                $this->airasia_pdf->AddPage();
                $this->airasia_pdf->guide();
                
                $this->airasia_pdf->SetFont('Times', '', 10);
                $this->airasia_pdf->loadData($r);
                $this->airasia_pdf->atas();
                $this->airasia_pdf->data();
                $this->airasia_pdf->ln();
                $this->airasia_pdf->ln();
                $this->airasia_pdf->notes();
            }

            $this->airasia_pdf->Output('pdf.pdf', 'I');
        } elseif ($this->airlines_id == 1) {
            $vouchers = $this->passenger_model->get_passengers_garuda($voucher_id, 'print');
            $this->checkpdf($voucher_id, $vouchers);
        } else {
            $vouchers = $this->passenger_model->get_passengers($voucher_id, 'print');
            $this->checkpdf($voucher_id, $vouchers);
        }
    }

    function print_list($voucher_id)
    {

        $flight = $this->voucher_model->get($voucher_id);
        $passengers = $this->passenger_model->get_passengers($voucher_id);

        $this->tpl['flight'] = $flight;
        $this->breadcrumbs[] = anchor('flight', 'Voucher');
        $this->breadcrumbs[] = $flight->flight_number . ' on ' . $flight->flight_date;

        $this->tpl['breadcrumbs'] = $this->breadcrumbs;
        $this->tpl['passengers'] = $passengers;
        $this->tpl['content'] = $this->load->view('release/print_list', $this->tpl);
    }

    function detail($voucher_id)
    {
        $flight = $this->voucher_model->get($voucher_id);
        $passengers = $this->passenger_model->get_passengers($voucher_id);

        $this->tpl['flight'] = $flight;
        $this->breadcrumbs[] = anchor('release', 'Release');
        $this->breadcrumbs[] = $flight->flight_number . ' on ' . $flight->flight_date;

        $this->tpl['breadcrumbs'] = $this->breadcrumbs;
        $this->tpl['passengers'] = $passengers;
        $this->tpl['content'] = $this->load->view('release/detail', $this->tpl, true);
        $this->load->view('body', $this->tpl);
    }

    function checkpdf($voucher_id, $data)
    {

        $this->db->where('id', $this->airlines_id);
        $airlines = $this->db->get('airlines')->row();

        $this->load->library('Other_pdf');
        $this->other_pdf->AliasNbPages();
        $this->other_pdf->SetMargins(0.5, 0.5);
        $this->other_pdf->set_Logo($airlines->airlines_logo);

        $vouchers = $data;
        $i = 4;
        $this->other_pdf->AddPage();
        foreach ($vouchers as $r) {
            if (!$i) {
                $i = 3;
                $this->other_pdf->AddPage();
            } else {
                $i--;
            }
            //
            //$this->other_pdf->guide();
            $this->other_pdf->SetFont('Times', '', 11);
            $this->other_pdf->loadData($r);
            $this->other_pdf->atas();
            $this->other_pdf->data();
            $this->other_pdf->ln();
            $this->other_pdf->ln();
            $this->other_pdf->notes();
            $this->other_pdf->ln();
            $this->other_pdf->marker();
            $this->other_pdf->ln();
        }

        $this->other_pdf->Output('pdf.pdf', 'I');
    }

}
