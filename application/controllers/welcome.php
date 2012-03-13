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
class Welcome extends CI_Controller {

    public function index() {
        $row = 1;
        if (($handle = fopen("data.csv", "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                if (count($data) == 2) {
                    $s = explode('-', $data[0]);
                    $db = array();
                    if (strlen(trim($s[0])) == 3) {
                        $this->db->where('kode', trim($s[0]));
                        $row = $this->db->get('bandara')->result();

                        $db['kode'] = trim($s[0]);
                        $db['bandara'] = trim($s[1] . ' ' . $data[1]);
                        if ($row) {

                            $this->db->where('kode', trim($s[0]));
                            $this->db->update('bandara', $db);
                        } else {
                            $db['kode'] = trim($s[0]);
                            $db['bandara'] = trim($s[1] . ' ' . $data[1]);
                            $this->db->insert('bandara', $db);
                        }
                    }
                }
            }
            fclose($handle);
        }
    }

}

/* End of file welcome.php */
    /* Location: ./application/controllers/welcome.php */