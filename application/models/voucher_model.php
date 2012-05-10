<?php

class Voucher_Model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    protected function get_default_price($type)
    {
        $res = $this->db
            ->get_where('configurations', array('param' => 'voucher_price_' . $type))
            ->row();
        $price = isset($res->value) ? $res->value : 0;
        return $price;
    }

    function get_next_voucher($flight_number)
    {
        $this->db->select_max('next_voucher_key');
        $this->db->like('voucher_code', $flight_number);
        $this->db->order_by('id DESC');
        $this->db->limit(1);
        $obj_last_voucer = $this->db->get('passengers')->row();
        $next_voucer = isset($obj_last_voucer->next_voucher_key) ? $obj_last_voucer->next_voucher_key : 2;
        return $next_voucer;
    }

    function generate_vouchers($type, $total, $flight_number, $voucher_id)
    {
        switch ($type) {
            case 'delay':
                $type_code = '01';
                break;
            case 'transfer':
                $type_code = '02';
                break;
            case 'reroute':
                $type_code = '04';
                break;
            default:
            case 'cancelled':
                $type_code = '03';
                break;
        }
        $price = $this->get_default_price($type);
        $header = $flight_number . '-' . date('ymd') . '-' . $type_code . $voucher_id;
        for ($i = 1; $i <= $total; $i++) {
            $dbvoucher = array();
            $voucher_code = sprintf($header . '-' . "%04d", $i);
            $dbvoucher['voucher_id'] = $voucher_id;
            $dbvoucher['voucher_code'] = $voucher_code;
            $dbvoucher['price'] = $price;
            $dbvoucher['voucher_type'] = $type;
            $this->db->insert('passengers', $dbvoucher);
        }
    }

    function create_voucher($type='', $total, $flight_number, $voucher_id)
    {

        $this->db->where('id', $voucher_id);
        $master_voucher = $this->db->get('vouchers')->row();

        $price = $this->get_default_price($type);
        $next_voucher = $this->get_next_voucher($flight_number);
        switch ($type) {
            case 'delay':
                $type_code = '01';
                break;
            case 'transfer':
                $type_code = '02';
                break;
            case 'reroute':
                $type_code = '04';
                break;
            default:
            case 'cancelled':
                $type_code = '03';
                break;
        }

        $header = $flight_number . '-' . $master_voucher->departure_city . '-' . $master_voucher->arrival_city . '-' . $type_code . $master_voucher->delay_reason;
        for ($i = 0; $i < $total; $i++) {
            $voucher_code = $header . '-' . sprintf("%012d", $next_voucher - 1);
            $dbvoucher['voucher_id'] = $voucher_id;
            $dbvoucher['voucher_code'] = $voucher_code;
            $dbvoucher['price'] = $price;
            $dbvoucher['voucher_type'] = $type;
            $dbvoucher['next_voucher_key'] = $next_voucher;
            $this->db->insert('passengers', $dbvoucher);
            $next_voucher++;
        }
    }

    function get($voucher_id)
    {
        $this->db->select('vouchers.*');
        $this->db->select('airlines.airlines_name');
        $this->db->select('users.fullname');
        $this->db->join('airlines', 'airlines.id=vouchers.airlines_id', 'LEFT');
        $this->db->join('users', 'users.id=vouchers.user_id', 'LEFT');
        return $this->db->get_where('vouchers', array('vouchers.id' => $voucher_id))->row();
    }

    function get_vouchers($voucher_id)
    {
        $this->db->where('id', $voucher_id);
        $vouchers = $this->db->get('vouchers')->result();
        return $vouchers;
    }

    function get_voucher_by_airlines($airlines_id, $offset=0, $limit=10)
    {

        $this->db->limit($limit, $offset);
        $this->db->where('airlines_id', $airlines_id);
        $this->db->order_by('voucher_created_at', 'DESC');
        $res['data'] = $this->db->get('vouchers')->result();

        $this->db->where('airlines_id', $airlines_id);
        $this->db->from('vouchers');
        $res['total'] = $this->db->count_all_results();
        return $res;
    }

    function gets_all($offset=0, $limit=10)
    {
        $this->db->select('vouchers.*');
        $this->db->select('airlines.airlines_name');
        $this->db->join('airlines', 'airlines.id=vouchers.airlines_id', 'LEFT');
        $this->db->limit($limit, $offset);
        $this->db->order_by('voucher_created_at DESC');
        $res['data'] = $this->db->get('vouchers')->result();
        $res['total'] = $this->db->count_all('vouchers');
        return $res;
    }

    function read_voucher($voucher_id)
    {
        $d['voucher_status'] = 1;
        $this->db->where('id', $voucher_id);
        $this->db->update('vouchers', $d);
    }

    function set_print_voucher($voucher_id)
    {
        $d['voucher_status'] = 2;
        $this->db->where('id', $voucher_id);
        $this->db->update('vouchers', $d);
    }

    function get_attachment($voucher_id)
    {
        $r = $this->db->get_where('attachments', array('voucher_id' => $voucher_id))->result();
        $d = array();
        foreach ($r as $x) {
            $d[$x->attachment_type] = $x;
        }
        return $d;
    }

}