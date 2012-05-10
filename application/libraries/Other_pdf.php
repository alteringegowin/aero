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
        $this->cell($this->width * 4, $this->height, 'VOUCHER', 0, 1);

        $this->cell($this->width * 4, $this->height, 'PM77', 0, 1);

        $this->SetY($y);
        $this->SetX($x);

        $this->cell($this->width * 8, $this->height, 'Code Voucher', 0, 1, 'R');
        
        $this->SetX($x);
        $this->SetFont('Times', 'B', 11);
        $this->cell($this->width * 8, $this->height, $this->dbdata->voucher_code, 0, 1, 'R');
        $this->SetFont('Times', '', 11);

        $this->SetX($x);
        $this->cell($this->width * 8, $this->height, 'Date Create: ' . date('d M Y', strtotime($this->dbdata->voucher_created_at)) . ' - Valid Until: ' . date('d M Y', strtotime(date("Y-m-d", strtotime($this->dbdata->voucher_created_at)) . " +30 DAYS")), 0, 1, 'R');

        $this->ln();
    }

    function data()
    {
        $wprice = 1.8;
        $w = $this->width;
        $w2 = $this->width * 2;
        $this->cell($w2, $this->height, 'Nama', 1, 0);
        $this->cell($w2, $this->height, 'Ticket Number/PNR', 1, 0);
        $this->cell($wprice, $this->height, 'Price(IDR)', 1, 0);
        $this->cell($w2, $this->height, 'Departure City', 1, 0);
        $this->cell($w2, $this->height, 'Arrival City', 1, 0);
        $this->cell($w, $this->height, 'Reason', 1, 0);
        $this->cell($w2, $this->height, 'Issued By', 1, 0);

        $this->ln();

        $this->cell($w2, $this->height, character_limiter($this->dbdata->passenger_name, 15, '.'), 1, 0);
        $this->cell($w2, $this->height, $this->dbdata->passenger_ticket, 1, 0, 'R');
        $this->cell($wprice, $this->height, number_format($this->dbdata->price), 1, 0, 'R');
        $this->cell($w2, $this->height, $this->dbdata->departure_city, 1, 0);
        $this->cell($w2, $this->height, $this->dbdata->arrival_city, 1, 0);
        $this->cell($w, $this->height, $this->dbdata->delay_reason, 1, 0);
        $this->cell($w2, $this->height, $this->dbdata->fullname, 1, 0);
    }

    function marker()
    {
        $this->ln();
        $this->cell(0, $this->height, '', 'T', 0);
        $this->ln();
    }

    function notes()
    {

        $notes = "
- Voucher berlaku selama 30 hari.
- Penukaran Voucher dapat dilakukan di Bank 
  Mandiri terdekat dengan membawa identitas 
  diri yang masih berlaku";
        $this->cell($this->width * 3, $this->height, 'Signature Passanger', 0, 0);

        $x = $this->GetX() + $this->width * 7;
        $y = $this->GetY();
        $this->MultiCell($this->width * 5, 0.35, $notes, 0, 'L');

        //$this->SetY($y);
        //$this->SetX($x);

        $this->Image('themes/bootstrap/img/' . $this->logo, $x, $y, $this->width * 2);
    }

}
