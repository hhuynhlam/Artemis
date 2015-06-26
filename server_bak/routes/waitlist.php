<?php

$app->get('/waitlist', function () use ($app) {
    
    // authenticate before do anything
    if ( !authenticate($app->request->params('apiKey')) ) {
        $app->status(403);
        echo json_encode('You are not allowed to see this page.');
        return;
    }

    // connect to db
    require_once('_db.php');

    // get request parameters
    $params = $app->request->get();
    $between = '';
    $where = array();

    foreach($params as $key => $value) {
        if ($key == 'apiKey') {
            continue;
        }

        $where[$key] = $value;
    }
    
    $results = $db->query( db_select('waitlist as w JOIN members as m ON w.user = m.id', 
        'm.id, m.first_name, m.last_name', 
        $where, null, 'timestamp ASC', null, null ) );
    echo parseJsonFromSQL($results);
});

$app->post('/waitlist/add', function () use ($app) {
    
    // authenticate before do anything
    if ( !authenticate($app->request->params('apiKey')) ) {
        $app->status(403);
        echo json_encode('You are not allowed to see this page.');
        return;
    }

    // connect to db
    require_once('_db.php');

    $user = $app->request->params('user');
    $shift = $app->request->params('shift');
    $event = $app->request->params('event');
    $timestamp = $app->request->params('timestamp');

    // get request parameters
    $columns = ['user', 'shift', 'event', 'timestamp'];
    $values= [$user, $shift, $event, $timestamp];

    $results = $db->query( db_insert('waitlist', $columns, $values) );

    if ($results == 1) {
        $where = array(); $where['shift'] = $shift;
        $results = $db->query( db_select('waitlist as w JOIN members as m ON w.user = m.id', 
            'm.id, m.first_name, m.last_name', 
            $where, null, 'timestamp ASC', null, null ) );
        echo parseJsonFromSQL($results);
    } else {
        $app->status(500);
        echo json_encode('1');
    }

    //echo db_insert('signups', $columns, $values);
});

$app->post('/waitlist/delete', function () use ($app) {
    
    // authenticate before do anything
    if ( !authenticate($app->request->params('apiKey')) ) {
        $app->status(403);
        echo json_encode('You are not allowed to see this page.');
        return;
    }

    // connect to db
    require_once('_db.php');
    
    // get request parameters
    $user = $app->request->params('user');
    $shift = $app->request->params('shift');
    $event = $app->request->params('event');

    $where = [
        "user" => $user,
        "shift" => $shift,
        "event" => $event
    ];

    $results = $db->query( db_delete('waitlist', $where) );
    
    if ($results == 1) {
        $where = array(); $where['shift'] = $shift;
        $results = $db->query( db_select('waitlist as w JOIN members as m ON w.user = m.id', 
            'm.id, m.first_name, m.last_name', 
            $where, null, 'timestamp ASC', null, null ) );
        echo parseJsonFromSQL($results);
    } else {
        $app->status(500);
        echo json_encode('1');
    }
});

?>