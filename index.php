<?php
ini_set("display_errors", "1");
error_reporting(E_ALL);

use setasign\Fpdi;

require_once __DIR__ . '/fpdf/fpdf/fpdf.php';
require_once __DIR__ . '/fpdf/fpdi/src/autoload.php';

$sourceFile = 'pdf.pdf';
$outputFile = 'final-output.pdf';
$pdf = new Fpdi\Fpdi;

$pageCount = $pdf->setSourceFile($sourceFile); //the original file

for ($i=1, $j=1; $i<=$pageCount, $j<=$pageCount; $i++, $j++) {

    $orientation = 'L';

    $tpage = $pdf->importPage($i);
    $size = $pdf->getTemplateSize($tpage);

    
    $pdf->AddPage($orientation, '', 90);
    $pdf->useTemplate($tpage, null, -195, 300);

    $lpage = $pdf->importPage($j);
    $size2 = $pdf->getTemplateSize($lpage);

    $pdf->AddPage($orientation, '', 90);
    $pdf->useTemplate($lpage, null, 5 ,300);
}

$pdf->Output($outputFile, "F");

$pdf->Output();



