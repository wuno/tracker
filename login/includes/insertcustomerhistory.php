<?php
class InsertCustomerHistory extends DbConn
{
    public function insertCustomerDetails($user_id, $customer_id, $temp_id, $type)
    {
        try {

            $db = new DbConn;
            // prepare sql and bind parameters
            $stmt = $db->conn->prepare("INSERT INTO track_history (user_id, customer_id, temp_id, time_stamp, type)
            VALUES (:user_id, :customer_id, :temp_id, now(), :type)");
            $stmt->bindParam(':user_id', $user_id);
            $stmt->bindParam(':customer_id', $customer_id);
            $stmt->bindParam(':temp_id', $temp_id);
            $stmt->bindParam(':type', $type);            
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
