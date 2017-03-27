<?php
require '../includes/functions.php';
include_once 'config.php';

class NewLetters extends DbConn
{
    public function createLetters()
    {
        try {

            $db = new DbConn;
            // prepare sql and bind parameters
            $stmt = $db->conn->prepare("SELECT * FROM customers WHERE startdate < date('now', '-2 days')");
            $stmt->execute();
            $row = $stmt->fetch();
            var_dump($row->fetchAll(PDO::FETCH_COLUMN|PDO::FETCH_GROUP));

            $err = '';

        } catch (PDOException $e) {

            $err = "Error: " . $e->getMessage();

        }
        //Determines returned value ('true' or error code)
        if ($err == '') {

            $success = 'true';

        } else {

            $success = $err;

        };

        return $sucess;

    }
}
