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
        is_null($app->request->post('from')) || 
        is_null($app->request->post('subject')) || 
        is_null($app->request->post('message'))) 
    {
        $app->status(406); 
        echo json_encode('You need to specify to, subject and message.');
        return; 
    }

    // post request parameters
    $to = $app->request->post('to');
    $from = $app->request->post('from');
    $subject = $app->request->post('subject');
    $message = $app->request->post('message');

    // send email
    $result = sendEmail($to, $from, $subject, $message);

    // check status
    if($result) { 
        $app->status(200); 
        echo json_encode('Email sent success.');
    }
    else { $app->status(500); }

});

$app->post('/sms/test', function () use ($app) {

    // authenticate before do anything
    if ( !authenticate($app->request->params('apiKey')) ) {
        $app->status(403);
        echo json_encode('You are not allowed to see this page.');
        return;
    }

    // check required params
    if(is_null($app->request->post('to'))) {
        $app->status(406); 
        echo json_encode('You need to specify to address.');
        return; 
    }

    // post request parameters
    $to = $app->request->post('to');

    // send email
    $result = sendEmail($to, null, 'Test SMS', 'Yippe! SMS works!');

    // check status
    if($result) { 
        $app->status(200); 
        echo json_encode('SMS test sent success.');
    }
    else { $app->status(500); }

});