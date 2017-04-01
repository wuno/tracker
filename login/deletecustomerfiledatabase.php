<?php
//DO NOT ECHO ANYTHING ON THIS PAGE OTHER THAN RESPONSE
//'true' triggers login success
ob_start();
include 'config.php';
require 'includes/functions.php';

if(isset($_REQUEST['email']) && isset($_REQUEST['user_id']) && isset($_REQUEST['customer_id']) && isset($_REQUEST['temp_id'])){
	$user_id = $_REQUEST['user_id'];
	$customer_id =$_REQUEST['customer_id'];
	$temp_id =$_REQUEST['temp_id'];
	$email =$_REQUEST['email'];
	//echo $user_id.$customer_id.$temp_id;
	// create instance of customer's that need to be created
$a = new DeleteCustomerFile;
 // obtain response from customers in database that have met timing requirment
$response = $a->deletecustomerfile1($user_id,$customer_id,$temp_id);
if($response){
	
	if(unlink("pdf/".$email."_".$temp_id.".pdf")){
		echo "file deleted";
	}else{
		echo "File missing or already deleted";
	}
}else{
echo "File Already Deleted";
	
}

}else{
	echo "param missing user_id,customer_id,temp_id";
}

	
 ?>
