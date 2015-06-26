<?php

$app->get('/event', function () use ($app) {

    // authenticate before do anything
    if ( !authenticate($app->request->params('apiKey')) ) {
        $app->status(403);
        echo json_encode('You are not allowed to see this page.');
        return;
    }

    // get request parameters
    $eventId = $app->request->get('id');
    $eventCode = $app->request->get('event_code');
    $startDate = $app->request->get('startDate');
    $endDate = $app->request->get('endDate');
    $limit = $app->request->get('limit');
    $offset = $app->request->get('offset');

    // construct query
    $events = EventsQuery::create()
        ->orderByDate('asc');

    if(!is_null($eventId)){ $events->filterById($eventId); }
    if(!is_null($eventCode)) { $events->where('events.event_code & ?', $eventCode ); }
    if(!is_null($startDate) || !is_null($endDate)){ $events->filterByDate(array("min" => $startDate, "max" => $endDate));}
    if(!is_null($limit)){ $events->limit($limit); }
    if(!is_null($offset)){ $events->offset($offset); }

    // execute and return
    returnDataJSON($events->find()->toJSON(), 'Eventss');
    
    // echo $events->toString();
});