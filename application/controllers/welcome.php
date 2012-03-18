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
        $this->load->helper('file');
        $dir = get_dir_file_info('attachments', TRUE);
        foreach ($dir as $k => $v) {
            xdebug($k . ' ===== ' . get_mime_by_extension($v['server_path']));
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