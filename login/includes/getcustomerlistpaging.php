<?php

class GetCustomerListPaging extends DbConn
{
    public function getCustomerListPage($page,$size)
    {
		$prev=0;
		$next=0;
		if($page == 1)
			$prev = 1;
		else
		$prev = $page * $size - $size+1;
		
		$next = $prev + $size -1;
		//echo $prev.$next;
        try {

            $db = new DbConn;          
            // prepare sql and bind parameters
            $stmt = $db->conn->prepare("SELECT * from ( SELECT c.*,t.customer_id,t.temp_id,t.flag_delete,t.file_path,t.user_id,t.created_at, @count:=@count+1 AS `count`,(SELECT COUNT(*)/:size FROM temp_history)AS total_page FROM `temp_history` as t,`customers` as c, (SELECT @count:= 0) AS count WHERE t.customer_id=c.id) as tempTbl WHERE count BETWEEN :prev and :next");    
			$stmt->bindParam(':prev', $prev);
			$stmt->bindParam(':next', $next);	
			$stmt->bindParam(':size', $size);				
            $stmt->execute();
			//echo json_encode($stmt);
			$total_page = "";
			$final = array();
			$cust = array();
			$result = array();
			 //$result = $stmt->fetch(PDO::FETCH_ASSOC);			
			foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
				$cust["serial_id"] = $row["count"];
				$cust["customer_id"] = $row["customer_id"];	
				$cust["temp_id"] = $row["temp_id"];	
				$cust["cust_email"] = $row["email"];
				$cust["cust_fname"] = $row["fname"];	
				$cust["cust_lname"] = $row["lname"];	
				$cust["cust_phone"] = $row["phone"];
				$cust["cust_street"] = $row["street"];
				$cust["cust_city"] = $row["city"];
				$cust["cust_state"] = $row["state"];
				$cust["cust_zip"] = $row["zip"];
				$cust["pdf_file_path"] = $row["file_path"];	
				$cust["user_id"] = $row["user_id"];
				$cust["flag_delete"] = $row["flag_delete"];
				$total_page = $row["total_page"];
					array_push($result,$cust);
			}	
				$final["total_page"] = $total_page;
				$final["list"] = $result;
			$response = $final;
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
