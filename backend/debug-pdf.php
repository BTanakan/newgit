<?php

    include_once('../config.php')
    require('fpdf183/fpdf.php');

    $pdf = new FPDF();

    $pdf->AddPage();

    $pdf->SetFont('Arial', 'b', 16);

    $pdf->Cell(55, 5, 'Blot-Express' ,0,0);
    $pdf->Cell(58, 5, '',0,0);
    $pdf->Cell(25, 5, '',0,0);
    $pdf->Cell(52, 5, 'Date : ',1,1);


    $pdf->Cell(55, 5, '',0,0);
    $pdf->Cell(58, 5, '',0,1);

    $pdf->Line(10, 25, 200, 25);

    $pdf->Ln(10);

    $pdf->Line(10, 40, 200, 40);
    
    $pdf->Cell(55, 5, 'Customer name : .....',0,0);
    $pdf->Ln(10);
    $pdf->Ln(10);
    $pdf->Cell(58, 5, 'Track id: ',0,1);
    $pdf->Ln(10);
    $pdf->Cell(58, 5, 'Receiver name: ....',0,1);
    $pdf->Ln(20);
    $pdf->Cell(58, 5, 'Price name: ....',0,1);
    $pdf->Line(10, 110, 200,110);
    $pdf->Ln(20);
    $pdf->Cell(58, 5, 'Sender name: ....',0,1);





    $pdf->Output();
?>