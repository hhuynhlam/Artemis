<?php

$app->get('/signup', function () use ($app) {
    
    // authenticate before do anything
    if ( !authenticate($app->request->params('apiKey')) ) {
        $app->status(403);
        echo json_encode('You are not allowed to see this page.');
        return;
    }

    // connect to db
    require_once('_db.php');

    // get request parameters
    $params = $app->request->params();

    // if there are no parameters, query all
    if (count($params) == 0)
    {
        
        $results = $db->query( 'SELECT * FROM signups' );
        echo parseJsonFromSQL($results);

    } 

    // if there are parameters
    else 
    {
        // implode request parameters into query where clause
        $where = implode(' AND ', array_map(function ($v, $k) { 
            return sprintf('%s="%s"', $k, $v); 
        }, $params, array_keys($params)));

        // replace double quotes with single quotes (mySQL friendly-syntax)
        $where = stripslashes($where);
        $where = str_replace('"', '', $where);

        $results = $db->query( 'SELECT * FROM signups WHERE ' . $where );
        echo parseJsonFromSQL($results);
    } 
});

$app->get('/signup/user', function () use ($app) {
    
    // authenticate before do anything
    if ( !authenticate($app->request->params('apiKey')) ) {
        $app->status(403);
        echo json_encode('You are not allowed to see this page.');
        return;
    }

    // connect to db
    require_once('_db.php');

    // get request parameters
    $user = $app->request->get('id');;

    // if there are no parameters, query all
    if (count($user) != 0)
    {
        $results = $db->query( 
            'SELECT su.user, su.event, su.shift, e.name, e.date, s.start_time, s.end_time, su.timestamp
            FROM signups as su 
            JOIN events as e ON e.id = su.event
            JOIN shifts as s ON s.id = su.shift  
            WHERE su.user = ' . $user . ' ORDER BY e.date ASC, su.timestamp ASC' );
        echo parseJsonFromSQL($results);
    } 
});

?>