<?php
use Propel\Runtime\Propel;

$app->get('/document', function () use ($app) {

    // authenticate before do anything
    if ( !authenticate($app->request->params('apiKey')) ) {
        $app->status(403);
        echo json_encode('You are not allowed to see this page.');
        return;
    }

    // construct query
    $con = Propel::getConnection();
    $sql =  'SELECT "newsletter" as `Type`, n.`title` as `Name`, n.`date` as `Date`, n.`term` as Term, n.`filename` as `File`, n.`uploaded_by` as `Uploaded` FROM `newsletters` as n ';
    $sql .=  'UNION ALL ';
    $sql .= 'SELECT "minutes" as `Type`, m.`description` as `Name`, m.`date` as `Date`, null as Term, m.`filename` as `File`, m.`uploaded_by` as `Uploaded` FROM `minutes` as m ';
    $sql .= 'ORDER BY Date DESC';
    $stmt = $con->prepare($sql);
    
    // execute and return
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($result);
    // echo $sql;
});