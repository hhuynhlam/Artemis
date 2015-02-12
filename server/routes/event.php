<?php

$app->get('/event', function () use ($app) {
    
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
    
    $results = $db->query( db_select('events', '*', $where, $between, 'date DESC', $app->request->get('limit'), $app->request->get('offset')) );
    echo parseJsonFromSQL($results);
    //echo db_select('events', $where, $between, 'date DESC', $app->request->get('limit'), $app->request->get('offset'));
     
});

?>