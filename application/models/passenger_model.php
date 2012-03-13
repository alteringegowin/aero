<?php

class Passenger_Model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_passengers($voucher_id, $mode='all') {
        if ($mode == 'print') {
            $print_sql = " AND passenger_name <> '' AND passenger_ticket <> ''";
        } else {
            $print_sql = '';
        }
        $sql = "
            SELECT
            *,ap.id
            FROM aero_passengers ap
                LEFT JOIN aero_vouchers av ON av.id=ap.voucher_id
                
            WHERE ap.voucher_id=? 
            $print_sql 
            ORDER BY av.voucher_created_at DESC
            
            ";
        $res = $this->db->query($sql, array($voucher_id))->result();
        return $res;
    }

}

