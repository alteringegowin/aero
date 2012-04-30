<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ciu extends CI_Controller
{

    protected $tpl;

    function __construct()
    {
        parent::__construct();
        $this->load->library('ion_auth');
        $this->load->model('voucher_model');
        $this->load->model('log_model');
        $this->load->model('passenger_model');
        $this->tpl['themes'] = base_url('themes/bootstrap/') . '/';
        $this->load->helper('ciu');

        $login = $this->ion_auth->logged_in();
        $group = $this->ion_auth->in_group('ciu');
        if (!($login && $group)) {
            redirect('login');
        }
        $this->tpl['js'] = 'ciu';
    }

    function index($offset=0)
    {
        $limit = 10;
        $vouchers = $this->voucher_model->gets_all($offset, $limit);

        $pagination = create_pagination('ciu/index', $vouchers['total'], $limit, 3);
        $this->tpl['vouchers'] = $vouchers;
        $this->tpl['pagination'] = $pagination;
        $this->tpl['content'] = $this->load->view('ciu/index', $this->tpl, true);
        $this->load->view('body', $this->tpl);
    }

    function detail($voucher_id)
    {
        $this->load->helper('form');

        $flight = $this->voucher_model->get($voucher_id);
        if (!$flight->voucher_status) {
            $this->voucher_model->read_voucher($voucher_id);
        }

        $passengers = $this->passenger_model->get_passengers($voucher_id);
        $documents = $this->voucher_model->get_attachment($voucher_id);
        $doc_type = config_item('doc_upload_type');


        $this->tpl['doc_type'] = $doc_type;
        $this->tpl['documents'] = $documents;
        $this->tpl['flight'] = $flight;
        $this->breadcrumbs[] = anchor('flight', 'Voucher');
        $this->breadcrumbs[] = $flight->flight_number . ' on ' . $flight->flight_date;

        $this->tpl['breadcrumbs'] = $this->breadcrumbs;
        $this->tpl['passengers'] = $passengers;
        $this->tpl['content'] = $this->load->view('ciu/detail', $this->tpl, true);
        $this->load->view('body', $this->tpl);
    }

    function verification($flight_id, $status)
    {
        $db['voucher_verified'] = $status;
        $this->db->where('id', $flight_id);
        $this->db->update('vouchers', $db);
        redirect('ciu/detail/' . $flight_id);
    }

    function attachment($voucher_id, $type)
    {
        $this->db->where('voucher_id', $voucher_id);
        $this->db->where('attachment_type', $type);
        $file = $this->db->get('attachments')->row();
        if ($file) {
            $this->load->helper('download');
            $data = file_get_contents("./attachments/" . $file->attachment_file); // Read the file's contents
            $name = $file->attachment_file;

            force_download($name, $data);
        } else {
            show_404();
        }
    }

    function import($voucher_id)
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('userfile2', 'File Upload', 'callback__upload_data');
        if ($this->form_validation->run()) {
            $this->db->where('id', $voucher_id);
            $this->db->set('voucher_status', 3);
            $this->db->update('vouchers');

            $log_text = anchor('ciu/detail/' . $voucher_id, ' import data pasenger ');
            $this->log_model->save_log(3, $this->session->userdata('user_id'), $log_text);


            $log_text = anchor('release/detail/' . $voucher_id, ' import data pasenger ');
            $this->log_model->save_log(2, $this->session->userdata('user_id'), $log_text);

            $this->tpl['is_frozzen'] = true;
        }

        $flight = $this->voucher_model->get($voucher_id);
        if (!$flight->voucher_status) {
            $this->voucher_model->read_voucher($voucher_id);
        }

        $passengers = $this->passenger_model->get_passengers($voucher_id);



        $this->tpl['flight'] = $flight;
        $this->breadcrumbs[] = anchor('ciu', 'Progress Monitoring');
        $this->breadcrumbs[] = anchor('ciu/detail/' . $flight->id, $flight->flight_number . ' on ' . $flight->flight_date);
        $this->breadcrumbs[] = 'Import';


        $this->tpl['breadcrumbs'] = $this->breadcrumbs;
        $this->tpl['passengers'] = $passengers;
        $this->tpl['content'] = $this->load->view('ciu/import', $this->tpl, true);
        $this->load->view('body', $this->tpl);
    }

    function ajax_manifest($id)
    {

        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'name', 'trim|required');
        $this->form_validation->set_rules('ticket', 'ticket', 'trim|required');
        if ($this->form_validation->run()) {
            $db['passenger_name'] = $this->input->post('name', 1);
            $db['passenger_ticket'] = $this->input->post('ticket', 1);
            $db['passanger_remark'] = $this->input->post('remark', 1);
            $this->db->where('id', $id);
            $this->db->update('passengers', $db);
            $json['success'] = true;
            $json['data'] = true;
        } else {
            $json['success'] = false;
            $json['data'] = validation_errors('<br>', '.');
        }
        echo json_encode($json);
    }

    function _upload_data()
    {
        $this->load->helper('array');
        $config['upload_path'] = './uploads/passanger/';
        $config['allowed_types'] = '*';
        $config['max_size'] = '0';

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload()) {
            $error = $this->upload->display_errors();
            $this->form_validation->set_message('_upload_data', $error);
            return FALSE;
        } else {
            $data = $this->upload->data();

            include APPPATH . 'third_party/PHPExcel.php';

            $objReader = PHPExcel_IOFactory::createReader('Excel5');
            $objReader->setReadDataOnly(true);
            $objPHPExcel = $objReader->load($data['full_path']);
            $objWorksheet = $objPHPExcel->getActiveSheet();

            $highestRow = $objWorksheet->getHighestRow();
            $sheetData = $objPHPExcel->getActiveSheet()->rangeToArray('A2:E' . $highestRow, '', false, false, false);
            foreach ($sheetData as $data) {
                $db = array();
                $db['passenger_name'] = element(2, $data, '');
                $db['passenger_ticket'] = element(3, $data, '');
                $db['passanger_remark'] = element(4, $data, '');
                $this->db->where('voucher_code', $data[0]);
                $this->db->where('voucher_id', $this->uri->segment(3, 0));
                $this->db->update('passengers', $db);
            }

            return TRUE;
        }
    }

    function download($voucher_id)
    {
        $this->load->helper('download');
        $this->load->helper('file');
        $passengers = $this->passenger_model->get_passengers($voucher_id);

        include APPPATH . 'third_party/PHPExcel.php';

        $objPHPExcel = new PHPExcel();
        $objPHPExcel->getDefaultStyle()->getFont()->setSize(8);
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, "Excel5");


        $objSheet = $objPHPExcel->getActiveSheet();

        $objSheet->getStyle('A1:E1')->getFont()->setBold(true)->setSize(12);
        $objSheet->getCell('A1')->setValue('VOUCHER CODE');
        $objSheet->getCell('B1')->setValue('PRICE');
        $objSheet->getCell('C1')->setValue('NAME');
        $objSheet->getCell('D1')->setValue('TICKET');
        $objSheet->getCell('E1')->setValue('REMARK');

        $i = 1;
        foreach ($passengers as $v) {
            $i++;
            $objSheet->getCell('A' . $i)->setValue($v->voucher_code);
            $objSheet->getCell('B' . $i)->setValue($v->price);
        }


        $objSheet->getColumnDimension('A')->setAutoSize(true);
        $objSheet->getColumnDimension('B')->setAutoSize(true);
        $objSheet->getColumnDimension('C')->setAutoSize(true);
        $objSheet->getColumnDimension('D')->setAutoSize(true);

        // write the file
        // We'll be outputting an excel file
        header('Content-type: application/vnd.ms-excel');
        header('Content-Disposition: attachment; filename="file.xls"');

        $objWriter->save('php://output');
    }

    function readxls($file)
    {


        die;
    }

    function writexls()
    {
        // include PHPExcel

        include APPPATH . 'third_party/PHPExcel.php';
        $objPHPExcel = new PHPExcel;
        $objPHPExcel->getDefaultStyle()->getFont()->setName('Calibri');
        $objPHPExcel->getDefaultStyle()->getFont()->setSize(8);
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, "Excel5");
        /**
         * Define current and number format. 
         */
// currency format, &euro; with < 0 being in red color
        $currencyFormat = '#,#0.## \€;[Red]-#,#0.## \€';
// number format, with thousands seperator and two decimal points.
        $numberFormat = '#,#0.##;[Red]-#,#0.##';

// writer will create the first sheet for us, let's get it
        $objSheet = $objPHPExcel->getActiveSheet();
// rename the sheet
        $objSheet->setTitle('My sales report');

// let's bold and size the header font and write the header
// as you can see, we can specify a range of cells, like here: cells from A1 to A4
        $objSheet->getStyle('A1:D1')->getFont()->setBold(true)->setSize(12);


// we could get this data from database, but for simplicty, let's just write it
        $objSheet->getCell('A2')->setValue('Motherboard');
        $objSheet->getCell('B2')->setValue(10);
        $objSheet->getCell('C2')->setValue(5);
        $objSheet->getCell('D2')->setValue('=SUM(B2:C2)');

        $objSheet->getCell('A3')->setValue('Processor');
        $objSheet->getCell('B3')->setValue(6);
        $objSheet->getCell('C3')->setValue(3);
        $objSheet->getCell('D3')->setValue('=SUM(B3:C3)');

        $objSheet->getCell('A4')->setValue('Memory');
        $objSheet->getCell('B4')->setValue(10);
        $objSheet->getCell('C4')->setValue(2.5);
        $objSheet->getCell('D4')->setValue('=SUM(B4:C4)');

        $objSheet->getCell('A5')->setValue('TOTAL');
        $objSheet->getCell('B5')->setValue('=SUM(B2:B4)');
        $objSheet->getCell('C5')->setValue('-');
        $objSheet->getCell('D5')->setValue('=SUM(D2:D4)');

// bold and resize the font of the last row
        $objSheet->getStyle('A5:D5')->getFont()->setBold(true)->setSize(12);

// set number and currency format to columns
        $objSheet->getStyle('B2:B5')->getNumberFormat()->setFormatCode($numberFormat);
        $objSheet->getStyle('C2:D5')->getNumberFormat()->setFormatCode($currencyFormat);

// create some borders
// first, create the whole grid around the table
        $objSheet->getStyle('A1:D5')->getBorders()->
            getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
// create medium border around the table
        $objSheet->getStyle('A1:D5')->getBorders()->
            getOutline()->setBorderStyle(PHPExcel_Style_Border::BORDER_MEDIUM);
// create a double border above total line
        $objSheet->getStyle('A5:D5')->getBorders()->
            getTop()->setBorderStyle(PHPExcel_Style_Border::BORDER_DOUBLE);
// create a medium border on the header line
        $objSheet->getStyle('A1:D1')->getBorders()->
            getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_MEDIUM);

// autosize the columns
        $objSheet->getColumnDimension('A')->setAutoSize(true);
        $objSheet->getColumnDimension('B')->setAutoSize(true);
        $objSheet->getColumnDimension('C')->setAutoSize(true);
        $objSheet->getColumnDimension('D')->setAutoSize(true);

// write the file
        $objWriter->save('attachments/test.xlsx');
    }

}
