<?php

$app->post('/email', function () use ($app) {

    // authenticate before do anything
    if ( !authenticate($app->request->params('apiKey')) ) {
        $app->status(403);
        echo json_encode('You are not allowed to see this page.');
        return;
    }

    // post request parameters
    $to = $app->request->post('to');
    $subject = $app->request->post('subject');
    $message = $app->request->post('message');

    $headers = "From: APO Rho Rho <webmaster@no-reply.com>";

    if(is_array($to)) { $to = implode(",", $to); }

    echo $to;
    // // send email
    // $result = mail($to, $subject, $message, $headers);
    
    // // check status
    // if($result) { $app->status(200); }
    // else { $app->status(500); }

});