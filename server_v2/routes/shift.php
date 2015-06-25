<?php

$app->get('/shift', function () use ($app) {
    echo 'in shift';
    
    // authenticate before do anything
    if ( !authenticate($app->request->params('apiKey')) ) {
        $app->status(403);
        echo json_encode('You are not allowed to see this page.');
        return;
    }

    // connect to db
    require_once(__ROOT__.'/src/Shifts.php'); 
    echo 'required shifts';

    // get request parameters
    $params = $app->request->get();
    echo 'everything working so far...';
});

?>