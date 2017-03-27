<?php
require 'includes/functions.php';
include_once 'config.php';

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$street = $_POST['street'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip = $_POST['zip'];

// Validation rules
//         Tries inserting into database and add response to variable
if (isset($email)) {
        
        if (!filter_var($email, FILTER_VALIDATE_EMAIL) == true) {

        echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Please provide a valid email address.</div><div id="returnVal" style="display:none;">false</div>';

        } else {
        $a = new NewCustomerForm;

        $response = $a->createCustomer($fname, $lname, $email, $phone, $street, $city, $state, $zip);

        }
        //Success
        if ($response == 'true') {

            echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Customer has been entered into the database</div><div id="returnVal" style="display:none;">true</div>';

        } else {
            //Failure 
            mySqlErrors($response);
        }
};
