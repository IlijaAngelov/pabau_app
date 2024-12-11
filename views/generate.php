<?php
require_once "../vendor/autoload.php";
require_once __DIR__ . '/generatePDF.php';

$winner = $_GET['winner'];
$pdf = new generatePDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
$txt = "Congratulations $winner";
$pdf->MultiCell(210,200,$txt,0,'C');
$certificatePath = 'certificates/'.$winner.'.pdf';
$pdf->Output('D', $certificatePath);
