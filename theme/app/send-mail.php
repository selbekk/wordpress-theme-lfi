<?php

// Make sure the request method is POST
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    http_response_code(405);
    echo "Hell no.";
    die();
}

// Save input as variables
$name = $_POST['name'];
$email = $_POST['email'];
$msg = $_POST['msg'];

// Super awesome ninja trick.
$msg = nl2br($msg);

// Set up mail metadata
$to = 'selbeezy@gmail.com';
$subject = "Melding fra $name via LFI.no";
$headers = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-Type: text/html; charset=utf-8' . "\r\n";

// Create the HTML mail
$body = '<!DOCTYPE html><html>'.
        '<head>'.
            '<style>body{font-family: sans-serif; font-size: 110%; color: #222222; }</style>'.
        '</head><body>'.
            '<h2>'. $subject .'</h2>'.
            '<p><strong>Navn:</strong> '. $name .'<br />'.
            '<strong>E-mail:</strong> <a href="mailto:'. $email .'">'. $email . '</a><br />'.
            '</p>'.
            '<p>'. $msg .'</p>'.
        '</body></html>';

$is_success = mail( $to, $subject, $body, $headers );

if($is_success) {
    http_response_code(200);
    echo "Mail sent.";
}
else {
    http_response_code(500);
    echo "Could not send mail.";
}
die();
?>
