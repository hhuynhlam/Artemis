<?php

$app->get('/member', function () use ($app) {
    
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
        
        $results = $db->query( 'SELECT * FROM members' );
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

        $results = $db->query( 'SELECT * FROM members WHERE ' . $where );
        echo parseJsonFromSQL($results);
    } 
});

?>