<?php

class DeleteCustomerFile extends DbConn
{
    public function deletecustomerfile1($user_id,$customer_id,$temp_id)
    {
        try {

            $db = new DbConn;          
            // prepare sql and bind parameters
            $stmt = $db->conn->prepare("UPDATE `temp_history` SET flag_delete = 1 , user_id= :userid WHERE customer_id=:custid AND temp_id  = :tempid");
        $stmt->bindParam(':userid', $user_id);
		 $stmt->bindParam(':custid', $customer_id);
		  $stmt->bindParam(':tempid', $temp_id);
            $stmt->execute();
			
			$result = $stmt->rowCount();
			//print_r($result);
		//	echo "<br>";
			$response = $result;
            $err = '';

        } catch (PDOException $e) {
            $err = "Error: " . $e->getMessage();
        }
        //Determines returned value ('true' or error code)
        if ($err == '') {
            $success = $response;
        } else {
            $success = $err;
        };
        return $success;
    }
}
