<?php
// Show all errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


// for working with database
require 'includes/functions.php';
// configuration for database
include_once 'config.php';

// create instance of customer's that need to be created
$a = new GetCustomerList;
 // obtain response from customers in database that have met timing requirment
$response = $a->getCustomerList();
echo json_encode($response);
?>
