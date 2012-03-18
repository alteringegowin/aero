<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * NOTICE OF LICENSE
 * 
 * Licensed under the Academic Free License version 3.0
 * 
 * This source file is subject to the Academic Free License (AFL 3.0) that is
 * bundled with this package in the files license_afl.txt / license_afl.rst.
 * It is also available through the world wide web at this URL:
 * http://opensource.org/licenses/AFL-3.0
 * If you did not receive a copy of the license and are unable to obtain it
 * through the world wide web, please send an email to
 * licensing@ellislab.com so we can send you a copy immediately.
 *
 * @package		CodeIgniter
 * @author		EllisLab Dev Team
 * @copyright	Copyright (c) 2008 - 2011, EllisLab, Inc. (http://ellislab.com/)
 * @license		http://opensource.org/licenses/AFL-3.0 Academic Free License (AFL 3.0)
 * @link		http://codeigniter.com
 * @since		Version 1.0
 * @filesource
 */
class Welcome extends CI_Controller
{

    public function delay()
    {
        $this->load->helper('array');
        $row = array();
        if (($handle = fopen("delay.csv", "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
                $row[$data[0]] = $data[1];
            }
            fclose($handle);
        }

        for ($i = 0; $i < 100; $i++) {
            $d['code'] = sprintf("%02d", $i);
            $d['note'] = element($i, $row, '');
            $this->db->insert('delay_codes', $d);
        }
    }

    function adduser()
    {
        //garuda12
        //express12
        //airasia12
//        $this->load->library('ion_auth');
//        $user_id = $this->ion_auth->register('sky1', 'sky12', 'sky1@gmail.com', array(), array(2));
//
//        $db['airlines_id'] = 5;
//        $db['user_id'] = $user_id;
//        $this->db->insert('airlines_users',$db);
//        
//        $user_id = $this->ion_auth->register('sky2', 'sky12', 'sky2@gmail.com', array(), array(2));
//        $db['airlines_id'] = 5;
//        $db['user_id'] = $user_id;
//        $this->db->insert('airlines_users',$db);
//        
        $this->load->library('ion_auth');
        $user_id = $this->ion_auth->register('ciu', 'ciupassword', 'ciu@gmail.com', array(), array(3));
    }

}

/* End of file welcome.php */
    /* Location: ./application/controllers/welcome.php */