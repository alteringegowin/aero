<?php

require_once APPPATH . 'third_party/fpdf/fpdf.php';

class Other_pdf extends FPDF
{

    protected $width;
    protected $height;
    protected $dbdata;
    protected $logo;

    function __construct()
    {
        $this->FPDF('P', 'cm', 'A4');

        $this->width = 1.65;
        $this->height = 0.5;
    }

    function loadData($data)
    {
        $this->dbdata = $data;
    }

    function guide()
    {

        for ($i = 0; $i < 12; $i++) {
            $this->cell($this->width, $this->height, $i + 1, 1, 0);
        }
        $this->ln();
    }

    function set_logo($t)
    {
        $this->logo = str_replace('.png', '-bw.png', $t);
    }

    function atas()
    {
        $x = $this->GetX() + $this->width * 4;
        $y = $this->GetY();
        $this->SetFont('Times', 'B', 9);
        $this->cell($this->width * 4, $this->height, 'VOUCHER', 0, 1);

        $this->SetFont('Times', 'B', 14);
        $this->cell($this->width * 4, $this->height * 2, 'KM77', 0, 1);

        $this->SetY($y);
        $this->SetX($x);
        $this->SetFont('Times', '', 8);
        $this->cell($this->width * 8, $this->height, 'Code Voucher', 0, 1, 'R');

        $this->SetX($x);
        $this->SetFont('Times', 'B', 14);
        $this->cell($this->width * 8, $this->height, $this->dbdata->voucher_code, 0, 1, 'R');

        $this->SetX($x);
        $this->SetFont('Times', '', 9);
        $this->cell($this->width * 8, $this->height, 'Date Create: ' . date('d M Y', strtotime($this->dbdata->voucher_created_at)) . ' - Valid Until: ' . date('d M Y', strtotime(date("Y-m-d", strtotime($this->dbdata->voucher_created_at)) . " +30 DAYS")), 0, 1, 'R');

        $this->ln();
    }

    function data()
    {
        $w = $this->width;
        $w2 = $this->width * 2;
        $this->SetFont('Times', 'B', 8);
        $this->cell($w2, $this->height, 'Nama', 1, 0);
        $this->cell($w2, $this->height, 'Ticket Number/PNR', 1, 0);
        $this->cell($w, $this->height, 'Price(IDR)', 1, 0);
        $this->cell($w2, $this->height, 'Departure City', 1, 0);
        $this->cell($w2, $this->height, 'Arrival City', 1, 0);
        $this->cell($w, $this->height, 'Reason', 1, 0);
        $this->cell($w2, $this->height, 'Issued By', 1, 0);

        $this->ln();

        $this->cell($w2, $this->height, character_limiter($this->dbdata->passenger_name,15,'.'), 1, 0);
        $this->cell($w2, $this->height, $this->dbdata->passenger_ticket, 1, 0, 'R');
        $this->cell($w, $this->height, number_format($this->dbdata->price), 1, 0, 'R');
        $this->cell($w2, $this->height, $this->dbdata->departure_city, 1, 0);
        $this->cell($w2, $this->height, $this->dbdata->arrival_city, 1, 0);
        $this->cell($w, $this->height, $this->dbdata->delay_reason, 1, 0);
        $this->cell($w2, $this->height, $this->dbdata->fullname, 1, 0);
        $this->SetFont('Times', '', 10);
    }

    function marker()
    {
        $this->ln();
        $this->cell(0, $this->height, '', 'T', 0);
        $this->ln();
    }

    function notes()
    {

        $notes = "Notes
a. Voucher berlaku selama 30 hari.
b. Penukaran Voucher dapat dilakukan di Bank Mandiri terdekat dengan membawa identitas diri yang masih berlaku";
        $this->cell($this->width * 3, $this->height, 'Signature Passanger', 0, 0);

        $this->SetFont('Times', 'b', 8);
        $x = $this->GetX() + $this->width * 7;
        $y = $this->GetY();
        $this->MultiCell($this->width * 5, 0.35, $notes, 0, 'L');
        $this->SetFont('Times', '', 10);

        //$this->SetY($y);
        //$this->SetX($x);

        $this->Image('themes/bootstrap/img/' . $this->logo, $x, $y, $this->width * 2);
    }

}
