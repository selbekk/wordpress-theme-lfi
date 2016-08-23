<?php
// Make sure the request method is POST
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    http_response_code(405);
    echo 'Hell no.';
    die();
}

$type = $_POST['type'];

if($type != 'signup' && $type != 'contact') {
    http_response_code(400);
    echo 'Go away please.';
    die();
}

if ($type == 'contact') {
    $subject = 'Melding fra '. $_POST['name'] .' via LFI.no';
} else if ($type == 'signup') {
    $subject = 'Registrering på treningssenteret via LFI.no';
}

// Super awesome ninja trick.
$msg = nl2br($_POST['message']);

// Set up mail metadata
//$to = 'post@lfi.no';
$to = 'selbeezy@gmail.com'; // TODO: REMOVE, DEMO!
$headers = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
$headers .= 'From: '. $_POST['name'] .' <'. $_POST['email'] .'>' . "\r\n";

$body = '';
foreach ($_POST as $key => $value) {
    if($key == 'type') continue; // Skip the type
    $body .= "<strong>$key</strong>: $value<br />";
}

// Create the HTML mail
$html = '<!DOCTYPE html><html>'.
        '<head>'.
            '<style>body{font-family: sans-serif; font-size: 110%; color: #222222; }</style>'.
        '</head><body>'.
        '<p>'.
            $body .
        '</p>'.
        '</body></html>';

$is_success = mail( $to, $subject, $html, $headers );

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
