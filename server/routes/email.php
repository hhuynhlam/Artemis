<?php

$app->post('/email', function () use ($app) {

    // authenticate before do anything
    if ( !authenticate($app->request->params('apiKey')) ) {
        $app->status(403);
        echo json_encode('You are not allowed to see this page.');
        return;
    }

    // check required params
    if(is_null($app->request->post('to')) || 
        is_null($app->request->post('subject')) || 
        is_null($app->request->post('message'))) 
    {
        $app->status(406); 
        echo json_encode('You need to specify to, subject and message.');
        return; 
    }

    // post request parameters
    $to = $app->request->post('to');
    $subject = $app->request->post('subject');
    $message = $app->request->post('message');

    // Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    // More headers
    $headers .= "From: APO Rho Rho <webmaster@no-reply.com>" . "\r\n";
    // $headers .= "Cc: myboss@example.com" . "\r\n";

    if(is_array($to)) { $to = implode(", ", $to); }

    // send email
    $result = mail($to, $subject, $message, $headers);

    // check status
    if($result) { $app->status(200); }
    else { $app->status(500); }

});