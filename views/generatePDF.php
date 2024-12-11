<?php
require_once '../config/fpdf186/fpdf.php';

error_reporting(E_ALL); ini_set('display_errors',1);

class generatePDF extends FPDF
{
    function Header(): void
    {
        $this->Image('images/cert.png',40,60,150, 150);
        $this->setFont('Arial','B',16);
        $this->Cell(80);
        $this->Cell(30, 10, 'CERTIFICATE', 0, 0, 'C');
        $this->Ln(20);
    }

    function Footer(): void
    {
        $this->SetY(-15);
        $this->setFont('Arial','I',8);
        $this->Cell(0,10, 'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }
}
