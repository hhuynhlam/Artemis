<?php
use Propel\Runtime\Propel;

$app->get('/waitlist', function () use ($app) {

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
    $signups = WaitlistQuery::create()
        ->useMembersQuery()
        ->endUse()
        ->filterByShift($shiftId)
        ->addAsColumn('first_name', 'members.first_name')
        ->addAsColumn('last_name', 'members.last_name')
        ->addAsColumn('id', 'members.id')
        ->select('timestamp')
        ->orderByTimestamp('asc');

    // execute and return
    returnDataJSON($signups->find()->toJSON(), 'Waitlists');
});

$app->post('/waitlist/add', function () use ($app) {

    // authenticate before do anything
    if ( !authenticate($app->request->params('apiKey')) ) {
        $app->status(403);
        echo json_encode('You are not allowed to see this page.');
        return;
    }

    // check required params
    if (is_null($app->request->post('user')) || 
        is_null($app->request->post('shift')) || 
        is_null($app->request->post('event')) || 
        is_null($app->request->post('timestamp'))) 
    {
        $app->status(406); 
        echo json_encode('You need to specify a user, shift, event and timestamp.');
        return; 
    }
    
    // get request parameters
    $userId = $app->request->post('user');
    $shiftId = $app->request->post('shift');
    $eventId = $app->request->post('event');
    $timestamp = $app->request->post('timestamp');

    // begin insertion
    $con = Propel::getConnection();
    $sql =  'INSERT INTO `waitlist` (`user`, `shift`, `event`, `timestamp`)'
            .' VALUES (' . $userId . ', ' . $shiftId . ', ' . $eventId . ', ' . $timestamp . ')';
    $stmt = $con->prepare($sql);
    $stmt->execute();

    // return updated waitlist
    $signups = WaitlistQuery::create()
        ->useMembersQuery()
        ->endUse()
        ->filterByShift($shiftId)
        ->addAsColumn('first_name', 'members.first_name')
        ->addAsColumn('last_name', 'members.last_name')
        ->addAsColumn('id', 'members.id')
        ->select('timestamp')
        ->orderByTimestamp('asc');

    // execute and return
    returnDataJSON($signups->find()->toJSON(), 'Waitlists');
});

$app->post('/waitlist/delete', function () use ($app) {

    // authenticate before do anything
    if ( !authenticate($app->request->params('apiKey')) ) {
        $app->status(403);
        echo json_encode('You are not allowed to see this page.');
        return;
    }

    // check required params
    if (is_null($app->request->post('user')) || 
        is_null($app->request->post('shift')) || 
        is_null($app->request->post('event'))) 
    {
        $app->status(406); 
        echo json_encode('You need to specify a user, shift and event.');
        return; 
    }
    
    // get request parameters
    $userId = $app->request->post('user');
    $shiftId = $app->request->post('shift');
    $eventId = $app->request->post('event');

    // remove
    $signup = WaitlistQuery::create()
        ->filterByUser($userId)
        ->filterByShift($shiftId)
        ->filterByEvent($eventId)
        ->delete();

    // return updated waitlist
    $signups = WaitlistQuery::create()
        ->useMembersQuery()
        ->endUse()
        ->filterByShift($shiftId)
        ->addAsColumn('first_name', 'members.first_name')
        ->addAsColumn('last_name', 'members.last_name')
        ->addAsColumn('id', 'members.id')
        ->select('timestamp')
        ->orderByTimestamp('asc');

    // execute and return
    returnDataJSON($signups->find()->toJSON(), 'Waitlists');
});