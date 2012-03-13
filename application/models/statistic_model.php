<?php

class Statistic_Model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function all_voucher_pie() {
        $sql = "
        SELECT
            aa.id,
            aa.airlines_name,
            count(ap.id) as total_pax
        FROM aero_passengers ap
            LEFT JOIN aero_vouchers av ON av.id=ap.voucher_id
            LEFT JOIN aero_airlines aa ON aa.id=av.airlines_id
        GROUP BY aa.id,aa.airlines_name
        ";
        $res = $this->db->query($sql)->result();
        return $res;
    }

    function pie_voucher_type() {
        $sql = "

            SELECT
            av.voucher_type,count(ap.id) as total_pax
            FROM aero_passengers ap
                LEFT JOIN aero_vouchers av ON av.id=ap.voucher_id
                LEFT JOIN aero_airlines aa ON aa.id=av.airlines_id
            GROUP BY av.voucher_type
        ";
        $res = $this->db->query($sql)->result();
        return $res;
    }

    function all_flight_monthly_year($year='') {
        $year = $year ? $year : date('Y');

        $this->db->order_by('id');
        $airlines = $this->db->get('airlines')->result();

        $sql = "
        SELECT
            aa.id,
            aa.airlines_name,
            count(ap.id) as total_pax,
            YEAR(voucher_created_at) as dyear
        FROM aero_passengers ap
            LEFT JOIN aero_vouchers av ON av.id=ap.voucher_id
            LEFT JOIN aero_airlines aa ON aa.id=av.airlines_id
        GROUP BY dyear,aa.id,aa.airlines_name
        ORDER BY dyear ASC
        ";
        $res = $this->db->query($sql, array($year))->result();
        $d = array();
        $tahun = array();
        foreach ($res as $r) {
            $d[$r->dyear][$r->id] = $r->total_pax;
            $tahun[$r->dyear] = true;
        }

        $ss[] = "'string','year'";
        foreach ($airlines as $r) {
            $ss[] = sprintf("'number','" . $r->airlines_name . "'");
        }

        $str = array();
        foreach ($tahun as $k => $v) {
            $json = array();
            $json[] = sprintf("'%d'", $k);
            foreach ($airlines as $a) {
                $json[] = isset($d[$k][$a->id]) ? $d[$k][$a->id] : 0;
            }
            $str[] = '[' . implode(',', $json) . ']';
        }
        $ret['column'] = $ss;
        $ret['data'] = implode(',', $str);
        return $ret;
    }

    function all_flight_monthly($year='') {
        $year = $year ? $year : date('Y');

        $this->db->order_by('id');
        $airlines = $this->db->get('airlines')->result();

        $sql = "
        SELECT
            aa.id,
            aa.airlines_name,
            count(ap.id) as total_pax,
            MONTHNAME(voucher_created_at) as dmonth,
            MONTH(voucher_created_at) as dsmonth,
            YEAR(voucher_created_at) as dyear
        FROM aero_passengers ap
            LEFT JOIN aero_vouchers av ON av.id=ap.voucher_id
            LEFT JOIN aero_airlines aa ON aa.id=av.airlines_id
        WHERE YEAR(voucher_created_at) = ?
        GROUP BY dyear,dmonth,dsmonth,aa.id,aa.airlines_name 
        ORDER BY dsmonth ASC
        ";
        $res = $this->db->query($sql, array($year))->result();
        $d = array();
        $bulan = array();
        foreach ($res as $r) {
            $d[$r->dmonth][$r->id] = $r->total_pax;
            $bulan[$r->dmonth] = true;
        }

        $ss[] = "'string','month'";
        foreach ($airlines as $r) {
            $ss[] = sprintf("'number','" . $r->airlines_name . "'");
        }

        $str = array();
        foreach ($bulan as $k => $v) {
            $json = array();
            $json[] = sprintf("'%s'", $k);
            foreach ($airlines as $a) {
                $json[] = isset($d[$k][$a->id]) ? $d[$k][$a->id] : 0;
            }
            $str[] = '[' . implode(',', $json) . ']';
        }
        $ret['column'] = $ss;
        $ret['data'] = implode(',', $str);
        return $ret;
    }

    function all_flight_weekly($year='', $month='') {
        $year = $year ? $year : date('Y');
        $month = $month ? $month : date('m');

        $this->db->order_by('id');
        $airlines = $this->db->get('airlines')->result();

        $sql = "
        SELECT
            aa.id,
            aa.airlines_name,
            count(ap.id) as total_pax,
            WEEK(voucher_created_at) as dweekly
        FROM aero_passengers ap
            LEFT JOIN aero_vouchers av ON av.id=ap.voucher_id
            LEFT JOIN aero_airlines aa ON aa.id=av.airlines_id
        WHERE 
         voucher_created_at BETWEEN SYSDATE() - INTERVAL 30 DAY AND SYSDATE()
        GROUP BY dweekly,aa.id,aa.airlines_name 
        ORDER BY dweekly ASC
        ";
        $res = $this->db->query($sql, array($year, $month))->result();
        $d = array();
        $bulan = array();
        foreach ($res as $r) {
            $d[$r->dweekly][$r->id] = $r->total_pax;
            $bulan[$r->dweekly] = true;
        }


        $ss[] = "'string','month'";
        foreach ($airlines as $r) {
            $ss[] = sprintf("'number','" . $r->airlines_name . "'");
        }

        $str = array();
        foreach ($bulan as $k => $v) {
            $json = array();
            $json[] = sprintf("'week %s'", $k);
            foreach ($airlines as $a) {
                $json[] = isset($d[$k][$a->id]) ? $d[$k][$a->id] : 0;
            }
            $str[] = '[' . implode(',', $json) . ']';
        }
        $ret['column'] = $ss;
        $ret['data'] = implode(',', $str);
        return $ret;
    }

    function all_flight_daily($year='', $month='') {
        $year = $year ? $year : date('Y');
        $month = $month ? $month : date('m');

        $max_date = date('t', mktime(0, 0, 0, $month, 1, $year));


        $this->db->order_by('id');
        $airlines = $this->db->get('airlines')->result();

        $sql = "
        SELECT
            aa.id,
            aa.airlines_name,
            count(ap.id) as total_pax,
            DAY(voucher_created_at) as dweekly
        FROM aero_passengers ap
            LEFT JOIN aero_vouchers av ON av.id=ap.voucher_id
            LEFT JOIN aero_airlines aa ON aa.id=av.airlines_id
        WHERE 
         voucher_created_at BETWEEN SYSDATE() - INTERVAL 30 DAY AND SYSDATE()
        GROUP BY dweekly,aa.id,aa.airlines_name 
        ORDER BY dweekly ASC
        ";
        $res = $this->db->query($sql, array($year, $month))->result();
        $d = array();
        $bulan = array();
        foreach ($res as $r) {
            $d[$r->dweekly][$r->id] = $r->total_pax;
        }

        $ss[] = "'string','day'";
        foreach ($airlines as $r) {
            $ss[] = sprintf("'number','" . $r->airlines_name . "'");
        }

        $str = array();
        //foreach ($bulan as $k => $v) {
        for ($i = 1; $i <= $max_date; $i++) {
            $json = array();
            $json[] = sprintf("'%02d'", $i);
            foreach ($airlines as $a) {
                $json[] = isset($d[$i][$a->id]) ? $d[$i][$a->id] : 0;
            }
            $str[] = '[' . implode(',', $json) . ']';
        }
        $ret['column'] = $ss;
        $ret['data'] = implode(',', $str);
        return $ret;
    }

    function by_airlines_monthly($airlines_id, $tahun= '') {
        $tahun = $tahun ? $tahun : date('Y');
        $sql = "
        SELECT
            count(ap.id) as total_pax,
            MONTH(voucher_created_at) as bulan
        FROM aero_passengers ap
            LEFT JOIN aero_vouchers av ON av.id=ap.voucher_id
            LEFT JOIN aero_airlines aa ON aa.id=av.airlines_id
        WHERE 
            aa.id = ? 
            AND YEAR(voucher_created_at) = ?
        GROUP BY bulan
        ORDER BY bulan ASC
        ";
        $res = $this->db->query($sql, array($airlines_id, $tahun))->result();
        $d = array();
        foreach ($res as $r) {
            $d[$r->bulan] = $r->total_pax;
        }
        $str = array();
        for ($i = 1; $i < 13; $i++) {
            $c = isset($d[$i]) ? $d[$i] : 0;
            $str[] = sprintf("['%s',%d]", date('F', mktime(0, 0, 0, $i, 1, date('Y'))), $c);
        }
        $ret['data'] = implode(',', $str);
        return $ret;
    }

    function by_airlines_daily($airlines_id, $tahun='', $bulan= '') {
        $tahun = $tahun ? $tahun : date('Y');
        $bulan = $bulan ? $bulan : date('m');
        $bulan = (int) $bulan;
        $bulan = 2;


        $max_date = date('t', mktime(0, 0, 0, $bulan, 1, $tahun));

        $sql = "
        SELECT
            count(ap.id) as total_pax,
            DAY(voucher_created_at) as hari
        FROM aero_passengers ap
            LEFT JOIN aero_vouchers av ON av.id=ap.voucher_id
            LEFT JOIN aero_airlines aa ON aa.id=av.airlines_id
        WHERE 
            aa.id = ? 
            AND YEAR(voucher_created_at) = ?
            AND MONTH(voucher_created_at) = ?
        GROUP BY hari
        ORDER BY hari ASC
        ";
        $res = $this->db->query($sql, array($airlines_id, $tahun, $bulan))->result();
        $d = array();
        foreach ($res as $r) {
            $d[$r->hari] = $r->total_pax;
        }
        $str = array();
        for ($i = 1; $i <= $max_date; $i++) {
            $c = isset($d[$i]) ? $d[$i] : 0;
            $str[] = sprintf("['%d',%d]", $i, $c);
        }
        $ret['data'] = implode(',', $str);
        return $ret;
    }

}
