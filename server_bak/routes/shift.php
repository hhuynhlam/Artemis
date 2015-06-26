<?php

$app->get('/shift', function () use ($app) {
    
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
        if ($key == 'apiKey' || $key == 'offset' || $key == 'limit' || $key == 'startDate' || $key == 'endDate') {
            continue;
        }

        $where[$key] = $value;
    }

    if ( !is_null($app->request->get('startDate')) && !is_null($app->request->get('endDate')) ) {
        $between = 'date BETWEEN ' . $app->request->get('startDate') . ' AND ' . $app->request->get('endDate');
    }
    
    $results = $db->query( db_select('shifts', '*', $where, null, 'start_time ASC, open_to ASC', null, null ) );
    echo parseJsonFromSQL($results);
    //echo db_select('shifts', $where, null, 'start_time ASC, open_to ASC', null, null );
});

$app->get('/shift/signups', function () use ($app) {
    
    // authenticate before do anything
    if ( !authenticate($app->request->params('apiKey')) ) {
        $app->status(403);
        echo json_encode('You are not allowed to see this page.');
        return;
    }

    // connect to db
    require_once('_db.php');

    // get request parameters
    $shift = $app->request->get("shift");
    
    $table = [
        "name" => "members",
        "alias" => "m"
    ];

    $join = [
        ["table" => "signups", "alias" => "su", "on" => "m.id = su.user"],
        ["table" => "shifts", "alias" => "sh", "on" => "su.shift = sh.id"]
    ];

    $where = "sh.id = " . $shift . " ORDER BY m.first_name ASC, m.last_name ASC ";

    $results = $db->query( db_select_join( $table, 'm.first_name, m.last_name, su.driver, su.user', $join, $where ) );
    echo parseJsonFromSQL($results);
    //echo db_select_join( $table, $join, $where );
});

$app->get('/shift/user/signups', function () use ($app) {
    
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
    $where = array();

    foreach($params as $key => $value) {
        if ($key == 'apiKey' || $key == 'offset' || $key == 'limit' || $key == 'startDate' || $key == 'endDate') {
            continue;
        }

        $where[$key] = $value;
    }
    
    $results = $db->query( db_select('signups', 'shift', $where, null, null, null, null ) );
    echo parseJsonFromSQL($results);
    //echo db_select('signups', '*', $where, null, null, null, null );
});

$app->post('/shift/user/signups/add', function () use ($app) {
    
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
    $driver = $app->request->params('driver');
    $timestamp = $app->request->params('timestamp');

    // get request parameters
    $columns = ['user', 'shift', 'event', 'driver', 'chair', 'credit', 'timestamp'];
    $values= [$user, $shift, $event, $driver, 0, 0, $timestamp];

    // check before adding
    $checkCap = parseArrayFromSQL($db->query('SELECT COUNT(user) as count, cap 
            FROM shifts as s
            LEFT JOIN signups as su on s.id = su.shift 
            WHERE s.id = ' . $shift))[0];

    if($checkCap['count'] < $checkCap['cap']) {
        $results = $db->query( db_insert('signups', $columns, $values) );

        if ($results == 1) {
            $results = $db->query('SELECT m.first_name, m.last_name, su.driver, su.user 
                FROM members as m 
                JOIN signups as su ON su.user = m.id 
                JOIN shifts as s ON s.id = su.shift 
                WHERE su.shift = ' . $shift);
            echo parseJsonFromSQL($results);
        } else {
            $app->status(500);
            echo json_encode('1');
        }

    } else {
        $app->status(500);
        echo json_encode('Cap has been reached.');
    }

    //echo db_insert('signups', $columns, $values);
});

$app->post('/shift/user/signups/delete', function () use ($app) {
    
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

    $results = $db->query( db_delete('signups', $where) );

    if ($results == 1) {
        $anotherWhere = ' shift = ' . $shift . ' AND event = ' . $event;
        $waitlist = parseArrayFromSQL($db->query('SELECT * FROM waitlist WHERE ' . $anotherWhere . ' ORDER BY timestamp ASC LIMIT 1 '));
        
        if(count($waitlist) != 0) {
            $waitlist = $waitlist[0]; $where['user'] = $waitlist['user'];
            $results = $db->query( db_delete('waitlist', $where) );
            $columns = ['user', 'shift', 'event', 'driver', 'chair', 'credit', 'timestamp'];
            $values= [$waitlist['user'], $waitlist['shift'], $waitlist['event'], 0, 0, 0, $waitlist['timestamp']];
            $results = $db->query( db_insert('signups', $columns, $values) );
        }

        $results = $db->query('SELECT m.first_name, m.last_name, su.driver, su.user 
            FROM members as m 
            JOIN signups as su ON su.user = m.id 
            JOIN shifts as s ON s.id = su.shift 
            WHERE su.shift = ' . $shift);
        echo parseJsonFromSQL($results);
    } else {
        $app->status(500);
        echo json_encode('1');
    }

    //echo db_delete('signups', $where);
});
?>