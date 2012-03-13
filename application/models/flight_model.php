<?php

class Flight_Model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get($flight_id) {
        return $this->db->get_where('flights', array('id' => $flight_id))->row();
    }

    function update_status($flight_id, $status) {
        $db['flight_status'] = $status;
        $this->db->where('id', $flight_id);
        $this->db->update('flights', $db);
    }

}