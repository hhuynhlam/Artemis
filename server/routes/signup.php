<?php
use Propel\Runtime\Propel;

$app->get('/signup/user', function () use ($app) {

    // authenticate before do anything
    if ( !authenticate($app->request->params('apiKey')) ) {
        $app->status(403);
        echo json_encode('You are not allowed to see this page.');
        return;
    }

    // check required params
    if(is_null($app->request->get('id'))) {
        $app->status(406); 
        echo json_encode('You need to specify an id.');
        return; 
    }
    
    // get request parameters
    $userId = $app->request->get('id');

    // construct query
    $signups = SignupsQuery::create()
        ->useEventsQuery()
            ->orderByDate('asc')
        ->endUse()
        ->useShiftsQuery()
        ->endUse()
        ->filterByUser($userId)
        ->addAsColumn('StartTime', 'shifts.start_time')
        ->addAsColumn('EndTime', 'shifts.end_time')
        ->addAsColumn('Name', 'events.name')
        ->addAsColumn('Date', 'events.date')
        ->select(array('Event', 'User', 'Shift', 'Timestamp'))
        ->orderByTimestamp('asc');

    // execute and return
    returnDataJSON($signups->find()->toJSON(), 'Signupss');
});