<?php
require_once '../assets/php/classes/classRelatorio.php';
$relat = new Relatorio();
$relat->setunidadeAtendimento($_POST['unidadeAtendimento']);
$stmt = $relat->viewUnidade();

include 'pdf-php/src/Cezpdf.php'; // Or use 'vendor/autoload.php' when installed through composer

// Initialize a ROS PDF class object using DIN-A4, with background color gray
$pdf = new Cezpdf('a4', 'portrait', 'color', [1, 1, 1]);
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

$tabela = '<table class="table table-striped" cellspacing="0" cellpadding="0">';

$pdf->ezText($tabela, $size);

while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {

	$pdf->ezText("<tbody>
	                     <tr>
	                        <td> Unidade de Atendimento: " . $row->unidadeAtendimento . "</td>
	                        <td> Especialidade: " . $row->especialidade . "</td>
	                        <td> Profissional: " . $row->profissional . "</td>
	                        <td> Data: " . $row->data . "</td>
	                        <td> Leito/Sala: " . $row->leito . "</td>
	                     </tr>");

}

$pdf->ezText("</table>", $size);

// Output the pdf as stream, but uncompress
$pdf->ezStream(['compress' => 0]);
?>
