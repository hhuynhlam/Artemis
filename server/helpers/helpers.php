<?php

function authenticate($apiKey) {
	if ($apiKey == 'A197638E4B52E74DCA5A2E58A8172') {
		return true;
	}

	else {
		return false;
	}
}

function returnDataJSON($result, $name) {
    echo json_encode(json_decode($result)->$name);
}

function sendEmail($to, $from, $subject, $message) {
    if(is_null($from)){ $from = 'APO Rho Rho<no-reply@aporhorho.com>'; }

    // Always set content-type when sending HTML email
    // $headers = 'MIME-Version: 1.0' . '\r\n';
    // $headers .= 'Content-type:text/html;charset=UTF-8' . '\r\n';

    // More headers
    $headers .= 'From: ' . $from . '\r\n';

    if(is_array($to)) { $to = implode(', ', $to); }

    // send email
    $result = mail($to, $subject, $message, $headers);
    return $result;
}