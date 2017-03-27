<?php
// Show all errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
// DOMPDF include autoloader
		require_once 'dompdf/autoload.inc.php';
		// reference the Dompdf namespace
		use Dompdf\Dompdf;
class SelectTempOne extends DbConn
{
    public function selectUserForOne()
    {
        try {

            $db = new DbConn;          
            // prepare sql and bind parameters
            $stmt = $db->conn->prepare("SELECT id, email ,DATEDIFF(now(),startdate) as datediff FROM `customers`");
       
            $stmt->execute();
			
			
			$cust = array();
			$result = array();
			 //$result = $stmt->fetch(PDO::FETCH_ASSOC);
			
			foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
				$cust["id"] = $row["id"];
				$cust["email"] = $row["email"];
				$cust["cust_age"] = $row["datediff"];	
				
				$cust_age = $cust["cust_age"];
				$cust_email = $cust["email"];
				$cust_id = $cust["id"];
				
				
				
				if($cust_age = 1 && $cust_age < 2)	{	
					// Check if cust_age is between 1 or 2 then send template with id 1				
				 $cust["template"] = $this->getHtmlTemplate($cust_id,$cust_email,"1");

				} else if ($cust_age=10 && $cust_age<11){
					// Check if cust_age is between 10 or 11 then send template with id 2
					$cust["template"] = $this->getHtmlTemplate($cust_id,$cust_email,"2");
				} else if ($cust_age=20 && $cust_age<21){
					// Check if cust_age is between 20 or 21 then send template with id 3
					$cust["template"] = $this->getHtmlTemplate($cust_id,$cust_email,"3");
				}


				/* And So on .....  here 3rd param will tell template which we want to send 
				*in function getHtmlTemplate
				* input param is customer_id , customer_email, template_id 
				* this will determine if the template is already send to this customer or not 
				* if it is already sent it will return already sent
				* otherwise it will return some long string with customer email id with template information
				* after this we need to work on sending pdf template in sendmail function written in 2nd last funnction .
				*/
			
				
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
	private function checkIfTemplateAlreadySent($email,$temp_id){
		 try {

            $db = new DbConn;          
            // prepare sql and bind parameters
            $stmt = $db->conn->prepare("SELECT * from temp_history WHERE temp_history.customer_id IN (SELECT id from customers where email = :email) AND temp_history.temp_id = :myid  ");
			$stmt->bindParam(':email', $email);
			$stmt->bindParam(':myid', $temp_id);
            $stmt->execute();
			
			
			 //$result = $stmt->fetch(PDO::FETCH_ASSOC);
			
			$result = $stmt->rowCount();
			
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
	private function getHtmlTemplate($customer_id,$email,$temp_id){
		 try {
			$result = array();
			 if($this->checkIfTemplateAlreadySent($email,$temp_id)){
				 $result = "Already Sent";
			 }else{
				$db = new DbConn;          
				// prepare sql and bind parameters
				$stmt = $db->conn->prepare("SELECT name ,template FROM `temps` where id =  :myid ");
				$stmt->bindParam(':myid', $temp_id);
				$stmt->execute();
				
				
				
				
				 //$result = $stmt->fetch(PDO::FETCH_ASSOC);
				
				foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
					$cust["name"] = $row["name"];
					$cust["template"] = $row["template"];				
					
					$result = 	$this->sendEmailTo($customer_id,$temp_id,$email,$cust["template"]);
				}
							
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
	
	private function sendEmailTo($customer_id,$temp_id,$email,$template){
		/*TODO
		 send here mail to the above mail with the template provided after the mail is succesfully sent it will be saved in our database history so 
		 that same template is not sent again to that particular user once again 
		*/
		$cust_email  = $email;
		
		// instantiate and use the dompdf class
			$dompdf = new Dompdf();
			// set strict html syntax checking options in DOMPDF
			$dompdf->set_option('isHtml5ParserEnabled', true);
			// set font option in DOMPDF
			$dompdf->set_option('defaultFont', 'Courier');

			$dompdf->load_html($template);

			// set option for the paper size and orientation
			$dompdf->setPaper('A4', 'letter');

			// Render the HTML as PDF
			$dompdf->render();

			//save the file to the server
			$output = $dompdf->output();
			file_put_contents('pdf/'.$email.$temp_id.'.pdf', $output);

		
		$inserted = $this->insertSentEmailToDatabase($temp_id,$customer_id);
			return "iserted = ".$inserted. " send mail to ".$email . " <br>With template ". $template;
	}
	
	
	private function insertSentEmailToDatabase($temp_id,$customer_id){
		 try {

            $db = new DbConn;          
            // prepare sql and bind parameters
            $stmt = $db->conn->prepare("INSERT into temp_history (customer_id,temp_id) values(:cusid,:tempid)");
			$stmt->bindParam(':cusid', $customer_id);
			$stmt->bindParam(':tempid', $temp_id);
            $stmt->execute();
			$result = $stmt->rowCount();
			
			
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
