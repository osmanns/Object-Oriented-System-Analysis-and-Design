<?php

require 'fpdf/fpdf.php';

$pdf = new FPDF('P','mm','A4');
$pdf->AddPage();
$pdf->SetFont('Arial','B',20);

// agreement
$pdf->Cell(58,8,'ABBS',0,0);
$pdf->Write(5, 'AASsdfsdfSD');
$pdf->Output();

?>