<?php
class NewCustomerForm extends DbConn
{
    public function createCustomer($fname, $lname, $email, $phone, $street, $city, $state, $zip)
    {
        try {

            $db = new DbConn;
            // prepare sql and bind parameters
            $stmt = $db->conn->prepare("INSERT INTO customers (fname, lname, email, phone, street, city, state, zip)
            VALUES (:fname, :lname, :email, :phone, :street, :city, :state, :zip)");
            $stmt->bindParam(':fname', $fname);
            $stmt->bindParam(':lname', $lname);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':phone', $phone);
            $stmt->bindParam(':street', $street);
            $stmt->bindParam(':city', $city);
            $stmt->bindParam(':state', $state);
            $stmt->bindParam(':zip', $zip);
            $stmt->execute();

            $err = '';

        } catch (PDOException $e) {

            $err = "Error: " . $e->getMessage();
//print_r( $err);
        }
        //Determines returned value ('true' or error code)
        if ($err == '') {

            $success = 'true';

        } else {

            $success = $err;

        };

        return $success;

    }
}
