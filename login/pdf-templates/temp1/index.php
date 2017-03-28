<?php
// include autoloader
require_once 'dompdf/autoload.inc.php';
// reference the Dompdf namespace
use Dompdf\Dompdf;
$email = "vhghgvhg";
// read html page into a string
$temp1 = file_get_contents('pdf-templates/temp1/doc.php');
// add html string to the dompdf handle
$pdf_content= $temp1;

// instantiate and use the dompdf class
$dompdf = new Dompdf();
$dompdf->set_option('isHtml5ParserEnabled', true);
$dompdf->set_option('defaultFont', 'Courier');

// pass html to dompdf object
$dompdf->loadHtml($pdf_content);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'letter');

?>