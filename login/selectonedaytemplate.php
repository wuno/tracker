<?php
// Show all errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

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
$temp1 = <<< HTML
	<!DOCTYPE html>
<html>

<head>
    <title>Template 1</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
        body {
    font-family: 'Open Sans';
}

#pdf_header,
#pdf_container {
    padding: 5px;
}

#pdf_header {
    margin: 10px auto 0px;
    border-bottom: none;
}

table {
    width: 700px;
    padding: 5px;
}

#pdf_container {
    margin: 0px auto;
}

.rpt_title {
    background: #99CCFF;
}

.center {
    text-align: center;
    margin: 0 auto;
}

.bold {
    font-weight: bold;
}

.sign-header {
    background: blue;
    color: #fff;
}

    </style>
</head>

<body>
    <div id="pdf_header">
        <table>
            <tr>
                <td>August 9, 2016</td>
            </tr>
        </table>
        <table>
            <tr>
                <td>Lloyd Nolan McClendon</td>
            </tr>
            <tr>
                <td>3301 Sadler Street</td>
            </tr>
            <tr>
                <td>Houston, TX 77093</td>
            </tr>
        </table>
        <table>
            <tr>
                <td>$cust_email</td>
            </tr>
        </table>
        <table>
            <tr>
                <td>
                    <p>Lorem Ipsom Dolor Niche Polish Fotue Misgate Poliwon Lorem Ipsom Dolor Niche Polish. Lorem Ipsom Dolor Niche Polish Fotue Misgate Poliwon Lorem Ipsom Dolor Niche Polish.</p>
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <td class="center bold">Bureau</td>
                <td class="center bold">Total Accounts Disputed</td>
                <td class="center bold">Accurate Accounts Verified</td>
                <td class="center bold">Inaccurate Accounts Deleted/Updated</td>
            </tr>
            <tr>
                <td>Experian</td>
                <td class="center">9</td>
                <td class="center">9</td>
                <td class="center">9</td>
            </tr>
            <tr>
                <td>Equifax</td>
                <td class="center">9</td>
                <td class="center">9</td>
                <td class="center">9</td>
            </tr>
            <tr>
                <td>TransUnion</td>
                <td class="center">9</td>
                <td class="center">9</td>
                <td class="center">9</td>
            </tr>
        </table>
        <table>
            <tr>
                <td>
                    <p>Sincerely,</p>
                </td>
            </tr>
            <tr>
                <td>Company Service Department</td>
            </tr>
            <tr>
                <td>Company Name</td>
            </tr>
            <tr>
                <td>888.web.wuno</td>
            </tr>
        </table>
        <table>
            <tr class="sign-header">
                <td>Signautre Image Here</td>
            </tr>
            <tr>
                <td><img src="pdf-templates/temp1/sign.jpg" alt="signature image"></td>
            </tr>
        </table>
    </div>
</body>

</html>
HTML;

 // pass html to dompdf object
$dompdf->loadHtml($temp1);

// set option for the paper size and orientation
$dompdf->setPaper('A4', 'letter');

// Render the HTML as PDF
$dompdf->render();

//save the file to the server
$output = $dompdf->output();
file_put_contents('pdf/'.$response[$i]['email'].'.pdf', $output);

// Output the generated PDF to Browser
// $dompdf->stream();
// exit;
} // end of the for loop
?>
