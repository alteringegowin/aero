<?php

require_once APPPATH . 'third_party/fpdf/fpdf.php';

class Airasia_pdf extends FPDF
{

    protected $width;
    protected $height;
    protected $dbdata;

    function __construct()
    {
        $this->FPDF('P', 'cm', array(7.8, 24.5));

        $this->width = 0.6;
        $this->height = 0.4;
    }

    function loadData($data)
    {
        $this->dbdata = $data;
    }

    function guide()
    {

        for ($i = 0; $i < 12; $i++) {
            //$this->cell($this->width, $this->height, $i + 1, 1, 0);
        }
        //$this->ln();
    }

    function atas()
    {
        $x = $this->GetX() + $this->width * 4;
        $y = $this->GetY();
        $this->SetFont('Times', 'B', 10);
        $this->cell($this->width * 4, $this->height, 'VOUCHER', 0, 1);

        $this->cell(0, $this->height * 2, 'KM77', 0, 1);
        $this->ln();
        $this->ln();
        $this->cell(0, $this->height, 'Code Voucher', 0, 1, 'R');
        $this->cell(0, $this->height, $this->dbdata->voucher_code, 0, 1, 'R');
        $this->ln();
        $this->SetFont('Times', '', 8);

        $this->cell(0, $this->height, 'Date Create: ' . date('d M Y', strtotime($this->dbdata->voucher_created_at)), 0, 1, 'R');
        $this->cell(0, $this->height, 'Valid Until: ' . date('d M Y', strtotime(date("Y-m-d", strtotime($this->dbdata->voucher_created_at)) . " +30 DAYS")), 0, 1, 'R');

        $this->ln();
    }

    function data()
    {
        $w = $this->width;
        $w2 = $this->width * 2;
        $this->SetFont('Times', 'B', 10);
        $this->ln();

        $this->cell($w2, $this->height, 'Name:', 0, 1);
        $this->SetFont('Times', '', 10);
        $this->cell($w2, $this->height, $this->dbdata->passenger_name, 0, 1);
        $this->ln();

        $this->SetFont('Times', 'B', 10);
        $this->cell($w2, $this->height, 'Ticket:', 0, 1);
        $this->SetFont('Times', '', 10);
        $this->cell($w2, $this->height, $this->dbdata->passenger_ticket, 0, 1);
        $this->ln();

        $this->SetFont('Times', 'B', 10);
        $this->cell($w2, $this->height, 'Price:', 0, 1);
        $this->SetFont('Times', '', 10);
        $this->cell($w, $this->height, number_format($this->dbdata->price), 0, 1);
        $this->ln();


        $this->SetFont('Times', 'B', 10);
        $this->cell($w2, $this->height, 'Departure:', 0, 1);
        $this->SetFont('Times', '', 10);
        $this->cell($w2, $this->height, $this->dbdata->departure_city . ' ' . $this->dbdata->arrival_city, 0, 1);
        $this->ln();


        $this->SetFont('Times', 'B', 10);
        $this->cell($w2, $this->height, 'Delay Reason:', 0, 1);
        $this->SetFont('Times', '', 10);
        $this->cell($w, $this->height, $this->dbdata->delay_reason, 0, 1);
        $this->ln();

        $this->SetFont('Times', '', 8);
        $this->cell($w2, $this->height, $this->dbdata->fullname, 0, 1);
    }

    function notes()
    {

        $notes = "Notes
a. Voucher berlaku selama 30 hari.
b. Penukaran Voucher dapat dilakukan di Bank Mandiri terdekat dengan membawa identitas diri yang masih berlaku";

        $this->SetFont('Times', '', 6);
        $this->MultiCell(0, 0.35, $notes, 1, 'L');
        $this->SetFont('Times', '', 10);

        $this->ln();
        $this->ln();
        $this->ln();

        $this->cell(0, $this->height, 'Signature Passanger', 0, 0);


        //$this->Image('themes/bootstrap/img/logo-airasia-bw.png', $x, $y, $this->width * 2);
    }

}
