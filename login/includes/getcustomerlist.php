<?php

class GetCustomerList extends DbConn
{
    public function getCustomerList()
    {
        try {

            $db = new DbConn;          
            // prepare sql and bind parameters
            $stmt = $db->conn->prepare("SELECT * FROM `temp_history`,customers,temps WHERE flag_delete = 0 AND user_id = 0 AND temp_history.temp_id = temps.id and temp_history.customer_id = customers.id");
       
            $stmt->execute();
			
			
			$cust = array();
			$result = array();
			 //$result = $stmt->fetch(PDO::FETCH_ASSOC);
			
			foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
				
				
				$cust["id"] = $row["id"];
				$cust["customer_id"] = $row["customer_id"];	
				$cust["temp_id"] = $row["temp_id"];	
				$cust["email"] = $row["email"];
				$cust["fname"] = $row["fname"];	
				$cust["lname"] = $row["lname"];	
					$cust["phone"] = $row["phone"];	
					$cust["template_heading"] = $row["name"];	
						$cust["template_link"] = $row["template"];	
							$cust["pdf_file_path"] = $row["file_path"];	
							array_push($result,$cust);
			}
			
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
