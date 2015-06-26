<?php

$app->get('/shift', function () use ($app) {

    // authenticate before do anything
    if ( !authenticate($app->request->params('apiKey')) ) {
        $app->status(403);
        echo json_encode('You are not allowed to see this page.');
        return;
    }
    
    // get request parameters
    $eventId = $app->request->get('event');
    $select = $app->request->get('select');

    // construct query
    $shifts = ShiftsQuery::create();
    if($eventId) { $shifts = $shifts->filterByEvent($eventId); }
    if($select) { $shifts = $shifts->select($select); }

    // execute query
    $shifts = $shifts->find();

    // return
    echo $shifts->toJSON();
});

$app->get('/shift/signups', function () use ($app) {

    // authenticate before do anything
    if ( !authenticate($app->request->params('apiKey')) ) {
        $app->status(403);
        echo json_encode('You are not allowed to see this page.');
        return;
    }

    // check required params
    if(IS_NULL($app->request->get('shift'))) {
        $app->status(406); 
        echo json_encode('You need to specify a shift.');
        return; 
    }
    
    // get request parameters
    $shiftId = $app->request->get('shift');
    $select = $app->request->get('select');

    // construct query
    $shifts = ShiftsQuery::create()
        ->useSignupsQuery()
        ->endUse()
        ->filterById($shiftId);

    if($select) { $shifts = $shifts->select($select); }

    // execute query
    $shifts = $shifts->find();

    // return
    echo $shifts->toJSON();

    // echo $shifts->toString();
});