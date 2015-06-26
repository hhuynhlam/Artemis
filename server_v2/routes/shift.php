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
    if(!is_null($eventId)) { $shifts = $shifts->filterByEvent($eventId); }
    if(!is_null($select)) { $shifts = $shifts->select($select); }

    // execute query
    returnDataJSON($shifts->find()->toJSON(), 'Shiftss');

    // echo $shifts->toString();
});

$app->get('/shift/signups', function () use ($app) {

    // authenticate before do anything
    if ( !authenticate($app->request->params('apiKey')) ) {
        $app->status(403);
        echo json_encode('You are not allowed to see this page.');
        return;
    }

    // check required params
    if(is_null($app->request->get('shift'))) {
        $app->status(406); 
        echo json_encode('You need to specify a shift.');
        return; 
    }
    
    // get request parameters
    $shiftId = $app->request->get('shift');

    // construct query
    $signups = SignupsQuery::create()
        ->useMembersQuery()
        ->endUse()
        ->filterByShift($shiftId)
        ->addAsColumn('first_name', 'members.first_name')
        ->addAsColumn('last_name', 'members.last_name')
        ->select(array('driver', 'user'));

    // execute and return
    returnDataJSON($signups->find()->toJSON(), 'Signupss');
});