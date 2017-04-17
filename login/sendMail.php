<?php
require 'includes/functions.php';
include_once 'config.php';
$to = "vk.bkbiet@gmail.com";
$subject = "HTML email";

$message = "
<html>
<head>
<title>$to</title>
</head>
<body>
<p>This email contains HTML Tags!</p>
<table>
<tr>
<th>Firstname</th>
<th>Lastname</th>
</tr>
<tr>
<td>John</td>
<td>Doe</td>
</tr>
</table>
</body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <webmaster@example.com>' . "\r\n";
$headers .= 'Cc: myboss@example.com' . "\r\n";
   $m = new MailSender;
            $m->sendMail($to, $subject, $message, 'Active');

//$sentMail = mail($to,$subject,$message,$headers);
print_r(json_encode($m));
?>