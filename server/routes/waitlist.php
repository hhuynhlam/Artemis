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
        'm.first_name, m.last_name', 
        $where, null, 'timestamp ASC', null, null ) );
    echo parseJsonFromSQL($results);
});

?>