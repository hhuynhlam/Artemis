<?php

$app->get('/member/list', function () use ($app) {
    
    // authenticate before do anything
    if ( !authenticate($app->request->params('apiKey')) ) {
        $app->status(403);
        echo json_encode('You are not allowed to see this page.');
        return;
    }

    // connect to db
    require_once('_db.php');

    $results = $db->query( 'SELECT first_name, last_name, position, class as class_name, family, email, phone FROM members ORDER BY first_name' );
    echo parseJsonFromSQL($results);
});

$app->post('/member/update', function () use ($app) {
    
    // authenticate before do anything
    if ( !authenticate($app->request->post('apiKey')) ) {
        $app->status(403);
        echo json_encode('You are not allowed to see this page.');
        return;
    }

    // connect to db
    require_once('_db.php');

    // get request body
    $params = $app->request->post();
    $where = array("id" => $app->request->post('_id'));

    $db->query( db_update("members", $params, $where) );
    $result = $db->query( 'SELECT * FROM members WHERE id="' . $app->request->post('_id') . '"');
    
    echo parseJsonFromSQL($result); 

});

?>