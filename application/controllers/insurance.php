<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Insurance extends CI_Controller {

    protected $tpl;
    protected $breadcrumbs;

    function __construct() {
        parent::__construct();
        $login = $this->session->userdata('is_login');
        if (!$login) {
            redirect('login');
        }
        $this->breadcrumbs[] = anchor('dashboard', 'Dashboard');
        $this->tpl['themes'] = base_url('themes/bootstrap/') . '/';
    }

    function index() {

        $this->tpl['content'] = $this->load->view('insurance/index', $this->tpl, true);
        $this->load->view('body', $this->tpl);
    }

    function search($type) {
        $q = $this->input->post('q', true);
        $key = md5($q);
        $this->session->set_userdata($key, $q);
        switch ($type) {
            default:
            case 'flight':
                redirect('insurance/search_by_flight/' . $key);
                break;
            case 'ticket':
                redirect('insurance/search_by_ticket/' . $key);
            case 'voucer':
                redirect('insurance/search_by_voucer/' . $key);
                break;
        }
    }

    function search_by_flight($key, $offset=0) {
        $limit = 1;
        $q = $this->session->userdata($key);
        if (!$q) {
            redirect('insurance');
        }
        $this->db->like('flight_number', $q);
        $this->db->order_by('flight_date', 'DESC');
        $this->db->limit($limit, $offset);
        $flights = $this->db->get('flights')->result();

        $this->db->like('flight_number', $q);
        $this->db->order_by('flight_date', 'DESC');
        $total = $this->db->get('flights')->num_rows();
        $pagination = create_pagination('insurance/search_by_flight/' . $key, $total, $limit, 4);

        $this->breadcrumbs[] = anchor('insurance', 'Insurance');
        $this->breadcrumbs[] = 'Search By Flight Code: ' . $q;

        $this->tpl['breadcrumbs'] = $this->breadcrumbs;
        $this->tpl['flights'] = $flights;
        $this->tpl['pagination'] = $pagination;
        $this->tpl['content'] = $this->load->view('insurance/search_by_flight', $this->tpl, true);
        $this->load->view('body', $this->tpl);
    }

    function search_by_ticket($key, $offset=0) {
        $limit = 10;
        $q = $this->session->userdata($key);
        if (!$q) {
            redirect('insurance');
        }
        $this->db->select('*,passangers.id as voucer_id');
        $this->db->like('passanger_ticket', $q);
        $this->db->order_by('flight_date', 'DESC');
        $this->db->limit($limit, $offset);
        $this->db->join('flights', 'flights.id=passangers.flight_id', 'LEFT');
        $tickets = $this->db->get('passangers')->result();

        $this->db->like('passanger_ticket', $q);
        $total = $this->db->get('passangers')->num_rows();
        $pagination = create_pagination('insurance/search_by_ticket/' . $key, $total, $limit, 4);

        $this->breadcrumbs[] = anchor('insurance', 'Insurance');
        $this->breadcrumbs[] = 'Search By Ticket: ' . $q;

        $this->tpl['breadcrumbs'] = $this->breadcrumbs;
        $this->tpl['tickets'] = $tickets;
        $this->tpl['pagination'] = $pagination;
        $this->tpl['content'] = $this->load->view('insurance/search_by_ticket', $this->tpl, true);
        $this->load->view('body', $this->tpl);
    }

    function search_by_voucer($key, $offset=0) {
        $limit = 10;
        $q = $this->session->userdata($key);
        if (!$q) {
            redirect('insurance');
        }
        $limit = 10;
        $q = $this->session->userdata($key);
        if (!$q) {
            redirect('insurance');
        }
        $sql = "concat( flight_number , ' - ', ".$this->db->dbprefix."passangers.id) LIKE  '%" . $this->db->escape_like_str($q) . "%'";
        $this->db->select('*,passangers.id as voucer_id');
        $this->db->where($sql);
        $this->db->order_by('flight_date', 'DESC');
        $this->db->limit($limit, $offset);
        $this->db->join('flights', 'flights.id=passangers.flight_id', 'LEFT');
        $tickets = $this->db->get('passangers')->result();

        $this->db->where($sql);
        $this->db->join('flights', 'flights.id=passangers.flight_id', 'LEFT');
        $total = $this->db->get('passangers')->num_rows();
        $pagination = create_pagination('insurance/search_by_ticket/' . $key, $total, $limit, 4);


        $this->breadcrumbs[] = anchor('insurance', 'Insurance');
        $this->breadcrumbs[] = 'Search By Ticket: ' . $q;

        $this->tpl['breadcrumbs'] = $this->breadcrumbs;
        $this->tpl['tickets'] = $tickets;
        $this->tpl['pagination'] = $pagination;
        $this->tpl['content'] = $this->load->view('insurance/search_by_voucer', $this->tpl, true);
        $this->load->view('body', $this->tpl);
    }

    function detail($flight_id) {
        $flight = $this->db->get_where('flights', array('id' => $flight_id))->row();
        $passangers = $this->db->get_where('passangers', array('flight_id' => $flight_id))->result();

        $this->tpl['flight'] = $flight;
        $this->breadcrumbs[] = anchor('insurance', 'Insurance');
        $this->breadcrumbs[] = $flight->flight_number . ' on ' . $flight->flight_date;

        $this->tpl['breadcrumbs'] = $this->breadcrumbs;
        $this->tpl['passangers'] = $passangers;
        $this->tpl['content'] = $this->load->view('insurance/detail', $this->tpl, true);
        $this->load->view('body', $this->tpl);
    }

}