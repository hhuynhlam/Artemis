<?php

$app->get('/member/list', function () use ($app) {

    // authenticate before do anything
    if ( !authenticate($app->request->params('apiKey')) ) {
        $app->status(403);
        echo json_encode('You are not allowed to see this page.');
        return;
    }

    // get request parameters
    $select = $app->request->get('select');

    // construct query
    $members = MembersQuery::create()
        ->orderByFirstName('asc');

    if(!is_null($select)){ $members->select($select); }

    // execute and return
    returnDataJSON($members->find()->toJSON(), 'Memberss');
    
    // echo $members->toString();
});

$app->post('/member/update', function () use ($app) {

    // authenticate before do anything
    if ( !authenticate($app->request->params('apiKey')) ) {
        $app->status(403);
        echo json_encode('You are not allowed to see this page.');
        return;
    }

    // check required params
    if (is_null($app->request->post('_id'))) {
        $app->status(406); 
        echo json_encode('You need to specify a user id.');
        return; 
    }
    
    // get request parameters
    $userId = $app->request->post('_id');
    $phone = $app->request->post('phone');
    $email = $app->request->post('email');
    $shirtSize = $app->request->post('shirtSize');
    $tempAddress = $app->request->post('tempAddress');
    $permAddress = $app->request->post('permAddress');
    $password = $app->request->post('password');

    // construct query
    $member = MembersQuery::create()->findPk($userId);
    if(!is_null($phone)) { $member->setPhone($phone); }
    if(!is_null($email)) { $member->setEmail($email); }
    if(!is_null($shirtSize)) { $member->setShirtSize($shirtSize); }
    if(!is_null($tempAddress)) { $member->setTempAddress($tempAddress); }
    if(!is_null($permAddress)) { $member->setPermAddress($permAddress); }
    if(!is_null($password)) { $member->setPassword($password); }

    // execute
    $member->save();

    // return updated profile
    $member = MembersQuery::create()
        ->filterById($userId);

    returnDataJSON($member->find()->toJSON(), 'Memberss');
});