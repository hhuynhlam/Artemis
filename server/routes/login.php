<?php

$app->get('/login', function () use ($app) {
    
    // connect to db
    require_once('_db.php');

    // get request parameters
    $params = $app->request->params();

    // if there are no parameters, query all
    if (count($params) == 0)
    {
        
        $app->status(403);
        echo json_encode('You are not allowed to see this page.');

    } 

    // if there are parameters
    else 
    {
        $username = $app->request->params('username');
        $password = $app->request->params('password');

        $results = $db->query( 'SELECT * FROM members WHERE username=\'' . $username . '\' AND password=MD5(\'' . $password . '\')');
        echo parseJsonFromSQL($results);
    } 
});

?>