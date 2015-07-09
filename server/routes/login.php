<?php

$app->get('/login', function () use ($app) {

    // check required params
    if(is_null($app->request->get('username')) || is_null($app->request->get('password'))) {
        $app->status(406); 
        echo json_encode('You need to send a username and password.');
        return; 
    }
    
    // get request parameters
    $username = $app->request->get('username');
    $password = $app->request->get('password');

    // temp to mark firstTime users
    $member = MembersQuery::create()
        ->findOneByUsername($username)
        ->setFirstTime(1);

    $member->save();

    // construct query
    $member = MembersQuery::create()
        ->filterByUsername($username)
        ->filterByPassword($password);

    // execute and return
    returnDataJSON($member->find()->toJSON(), 'Memberss');
});