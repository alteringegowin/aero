<?php

class Printing extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->load->library('Airasia_pdf');
        $this->airasia_pdf->AliasNbPages();
        $this->airasia_pdf->SetMargins(0.5, 0.5);
        $this->airasia_pdf->AddPage();
        //$this->airasia_pdf->guide();
        $this->airasia_pdf->SetFont('Times', '', 10);
        $this->airasia_pdf->atas();
        $this->airasia_pdf->data();
        $this->airasia_pdf->ln();
        $this->airasia_pdf->data();
        $this->airasia_pdf->ln();
        $this->airasia_pdf->ln();
        $this->airasia_pdf->notes();

        $this->airasia_pdf->Output('pdf.pdf', 'I');
    }

}