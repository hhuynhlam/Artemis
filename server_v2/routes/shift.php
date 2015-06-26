<?php

$app->get('/shift', function () use ($app) {

    // authenticate before do anything
    if ( !authenticate($app->request->params('apiKey')) ) {
        $app->status(403);
        echo json_encode('You are not allowed to see this page.');
        return;
    }
    
    // get request parameters
    $params = $app->request->get();

    $shifts = new Shift();
});