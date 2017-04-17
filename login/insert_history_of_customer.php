<?php
//DO NOT ECHO ANYTHING ON THIS PAGE OTHER THAN RESPONSE
//'true' triggers login success
ob_start();
include 'config.php';
require 'includes/functions.php';

if(isset($_REQUEST['user_id']) && isset($_REQUEST['customer_id']) && isset($_REQUEST['temp_id']) && isset($_REQUEST['type'])){
	$user_id = $_REQUEST['user_id'];
	$customer_id =$_REQUEST['customer_id'];
	$temp_id =$_REQUEST['temp_id'];
	$type =$_REQUEST['type'];
	//echo $user_id.$customer_id.$temp_id;
	// create instance of customer's that need to be created
$a = new InsertCustomerHistory;
 // obtain response from customers in database that have met timing requirment
$response = $a->insertCustomerDetails($user_id,$customer_id,$temp_id,$type);
if($response){
	
	
		echo "Record Inserted";
	
}else{
echo $response;
}
	


}else{
	echo "param missing user_id,customer_id,temp_id,type";
}

	
 ?>
