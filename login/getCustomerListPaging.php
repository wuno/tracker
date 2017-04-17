<?php
// Show all errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


// for working with database
require 'includes/functions.php';
// configuration for database
include_once 'config.php';
if(isset($_REQUEST['page_no']) && isset($_REQUEST['page_size'])){
	$page_no = $_REQUEST['page_no'];
	$page_size = $_REQUEST['page_size'];
// create instance of customer's that need to be created
$a = new GetCustomerListPaging;
 // obtain response of customer details here
$response = $a->getCustomerListPage($page_no,$page_size);
echo json_encode($response);
}else{
	echo "param missing page_no,page_size";
}
?>
