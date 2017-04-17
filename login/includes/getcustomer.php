<?php

class GetCustomer extends DbConn
{
    public function getCustomerDetails($customer_id)
    {
        try {

            $db = new DbConn;          
            // prepare sql and bind parameters
            $stmt = $db->conn->prepare("SELECT * FROM `customers` where id = :customer_id");
			$stmt->bindParam(':customer_id', $customer_id);
            $stmt->execute();
			
			
			$cust = array();
			$result = array();
			 //$result = $stmt->fetch(PDO::FETCH_ASSOC);			
			foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
				$cust["id"] = $row["id"];
				$cust["registered_on"] = $row["startdate"];	
				
				$cust["email"] = $row["email"];
				$cust["fname"] = $row["fname"];	
				$cust["lname"] = $row["lname"];	
				$cust["phone"] = $row["phone"];	
				$cust["street"] = $row["street"];	
				$cust["city"] = $row["city"];	
				$cust["state"] = $row["state"];	
				$cust["zip"] = $row["zip"];
			}		
			array_push($result,$cust);			
			$response = $cust;
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
