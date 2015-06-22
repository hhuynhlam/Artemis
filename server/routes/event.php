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
    // type, startDate, endDate, limit, offset
    $id = $app->request->get('id');
    $type = $app->request->get('event_code');
    $startDate = $app->request->get('startDate');
    $endDate = $app->request->get('endDate');
    $limit = $app->request->get('limit');
    $offset = $app->request->get('offset');

    $between = "";
    $where = "";
    $first = true;

    if ( !is_null($id) ) {
        $where .= " id = " . $id;
        $first = false;
    }

    if ( !is_null($type) ) {
        if ($first == true) {
            $where .= " event_code & " . $type;
            $first = false;
        } else {
            $where .= " AND event_code & " . $type;
        }
    }

    if ( !is_null($startDate) && !is_null($endDate) ) {
        if ($first == true) {
            $where .= " date BETWEEN " . $startDate . " AND " . $endDate;
            $first = false;
        } else {
            $where .= " AND date BETWEEN " . $startDate . " AND " . $endDate;
        }
        
    }

    if ( !is_null($startDate) && is_null($endDate) ) {
        if ($first == true) {
            $where .= " date >= " . $startDate;
            $first = false;
        } else {
            $where .= " AND date >= " . $startDate;
        }
    }
    
    $results = $db->query( db_select_explicit('events', "*", $where, 'date ASC', $limit, $offset) );
    echo parseJsonFromSQL($results);
    
    // $table, $columns, $where, $between, $order, $limit, $offset
    // // echo db_select_explicit('events', "*", $where, 'date ASC', $limit, $offset);
     
});

?>