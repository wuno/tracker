<?php
// Show all errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


// for working with database
require 'includes/functions.php';
// configuration for database
include_once 'config.php';
if(isset($_REQUEST['customer_id'])){
	$customer_id = $_REQUEST['customer_id'];
// create instance of customer's that need to be created
$a = new GetCustomer;
 // obtain response of customer details here
$response = $a->getCustomerDetails($customer_id);
echo json_encode($response);
}else{
	echo "param missing customer_id";
}
?>
