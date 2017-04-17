<?php
// Show all errors
ini_set('display_errors', 'On');

// DOMPDF include autoloader
require_once 'dompdf/autoload.inc.php';
// reference the Dompdf namespace
use Dompdf\Dompdf;

// for working with database
require 'includes/functions.php';
// configuration for database
include_once 'config.php';

// create instance of customer's that need to be created
$a = new SelectTempOne;
 // obtain response from customers in database that have met timing requirment
$response = $a->selectUserForOne();
echo json_encode($response);
	// loop through each row in the results and handle then pass to the pdf creation string
foreach($response as $i => $row) {
// Trying to reach template in but variable does not show up when rendered.
// $temp1 = file_get_contents('pdf-templates/temp1/doc.php');

// instantiate and use the dompdf class
$dompdf = new Dompdf();
// set strict html syntax checking options in DOMPDF
$dompdf->set_option('isHtml5ParserEnabled', true);
// set font option in DOMPDF
$dompdf->set_option('defaultFont', 'Courier');

// assign customer data to string
$cust_email = (string)$response[$i]['email'];
// statically typing template string to render email address of user
 $temp_id = $response[$i]['temp_id'];
 $fname = $response[$i]['fname'];
$temp1 = file_get_contents($response[$i]['template']);
// for replacing the email dynamicaly ;
$temp = str_replace(":email",$cust_email,$temp1);
 // pass html to dompdf object
$dompdf->load_html($temp);

// set option for the paper size and orientation
$dompdf->setPaper('A4', 'letter');

// Render the HTML as PDF
$dompdf->render();

//save the file to the server
$output = $dompdf->output();

$file_put = file_put_contents('pdf/'.$cust_email.'_'.$temp_id.'.pdf', $output);

print_r($file_put);

 /* $url = 'https://riverwalkdebt.com/tracker/login/pdf/'.$cust_email.'_'.$temp_id.'.pdf';
  $url_name = $cust_email.'_'.$temp_id.'.pdf';
  $m = new MailSenderDemo;
            $m->sendMailDemo($cust_email,$fname,$temp,$url,$url_name);*/
// Output the generated PDF to Browser
// $dompdf->stream();
// exit;
} // end of the for loop
?>
