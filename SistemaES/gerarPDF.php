<?php
require_once '../assets/php/classes/classRelatorio.php';
$relat = new Relatorio();
$relat->setunidadeAtendimento($_POST['unidadeAtendimento']);
$stmt = $relat->viewUnidade();

include 'pdf-php/src/Cezpdf.php'; // Or use 'vendor/autoload.php' when installed through composer

// Initialize a ROS PDF class object using DIN-A4, with background color gray
$pdf = new Cezpdf('a4', 'portrait', 'color', [0.8, 0.8, 0.8]);
// Set pdf Bleedbox
$pdf->ezSetMargins(20, 20, 20, 20);
// Use one of the pdf core fonts
$mainFont = 'Times-Roman';
// Select the font
$pdf->selectFont($mainFont);
// Define the font size
$size = 12;
// Modified to use the local file if it can
$pdf->openHere('Fit');

while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {

// Output some colored text by using text directives and justify it to the right of the document
	//$pdf->ezText("PDF with some <c:color:1,0,0>blue</c:color> <c:color:0,1,0>red</c:color> and <c:color:0,0,1>green</c:color> colours", $size, ['justification' => 'right']);
	$pdf->ezText($row->unidadeAtendimento);
}
;

// Output the pdf as stream, but uncompress
$pdf->ezStream(['compress' => 0]);
?>
