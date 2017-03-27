<?php
require 'includes/functions.php';
include_once 'config.php';
	
    // $a = new NewLetters;

$db = new DbConn;
            // prepare sql and bind parameters
            $stmt = $db->conn->prepare("SELECT * FROM customers WHERE startdate < date('now', '-2 days')");
            $stmt->execute();
            $row = $stmt->fetch();
            var_dump($row->fetchAll(PDO::FETCH_COLUMN|PDO::FETCH_GROUP));

    		$response = $a->createLetters();
    echo $response;
?>